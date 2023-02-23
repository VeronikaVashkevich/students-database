<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Models\Student;

class PrintService extends Service {

    const COLUMNS = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];

    public function getStudentsByFilters($requestData) {
        $filters = $this->getFilters($requestData);

        $students = Student::query()
                    ->when(!empty($filters['course']), function ($q) use ($filters) {
                        return $q
                            ->select('students.*')
                            ->join('course_study_items', 'course_study_items.student_id', '=', 'students.id')
                            ->where('course_study_items.course_id', $filters['course']);
                    })
                    ->when(!empty($filters['group']), function ($q) use ($filters) {
                            return $q
                                ->select('students.*')
                                ->join('course_study_items', 'course_study_items.student_id', '=', 'students.id')
                                ->where('course_study_items.group_id', $filters['group']);
                    })
                    ->when(!empty($filters['date_start_study']), function ($q) use ($filters) {
                        return $q
                            ->select('students.*')
                            ->join('course_study_items', 'course_study_items.student_id', '=', 'students.id')
                            ->where('course_study_items.date_start_study', $filters['date_start_study']);
                    })
                    ->when(!empty($filters['date_finish_study']), function ($q) use ($filters) {
                        return $q
                            ->select('students.*')
                            ->join('course_study_items', 'course_study_items.student_id', '=', 'students.id')
                            ->where('course_study_items.date_finish_study', $filters['date_finish_study']);
                    })
                    ->when(!empty($filters['organization']), function ($q) use ($filters) {
                        return $q->where('organization_id', '=', $filters['organization']);
                    })
                    ->when(!empty($filters['student']), function ($q) use ($filters) {
                        return $q->where('id', '=', $filters['student']);
                    })
                    ->get();

        return $students;
    }

    private function getFilters($data) {
        $filters = array_filter($data);
        unset($filters['_token']);

        return $filters;
    }

    public function getSpreadsheet($request) {
        $students = $this->getStudentsByFilters($request->all());

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Номер п/п');
        $sheet->setCellValue('B1', 'ФИО слушателя');
        $sheet->setCellValue('C1', 'Направившая организация');
        $sheet->mergeCells('D1:G1');
        $sheet->setCellValue('D1', 'Информация о прохождении курсов');
//        $sheet->setCellValue('D1', 'Курс');
//        $sheet->setCellValue('E1', 'Дата начала обучения');
//        $sheet->setCellValue('F1', 'Дата конца обучения');

        $rawIndex = 2;
        foreach($students as $student) {
            $sheet->setCellValue('A' . $rawIndex, $student->id);
            $sheet->setCellValue('B' . $rawIndex, $student->full_name);
            $sheet->setCellValue('C' . $rawIndex, $student->organization->name);
            foreach ($student->courseStudyItems as $item) {
                $sheet->setCellValue('D' . $rawIndex, $item->group->name);
                $sheet->setCellValue('E' . $rawIndex, $item->course->name);
                $sheet->setCellValue('F' . $rawIndex, date('d.m.Y', strtotime($item->date_start_study)));
                $sheet->setCellValue('G' . $rawIndex, date('d.m.Y', strtotime($item->date_finish_study)));
                $rawIndex++;
            }

            $rawIndex++;
        }

        for ($i = 0; $i < $rawIndex; $i++) {
            foreach (self::COLUMNS as $column) {
                $spreadsheet->getActiveSheet()->getStyle($column . $i)->getAlignment()->setWrapText(true);
                $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
            }
        }

        $rawIndex++;
        $sheet->mergeCells('A' . $rawIndex . ':' . 'C' . $rawIndex);
        $sheet->setCellValue('A' . $rawIndex, 'Количество слушателей');
        $sheet->setCellValue('D' . $rawIndex, count($students));

        return $spreadsheet;
    }

}
