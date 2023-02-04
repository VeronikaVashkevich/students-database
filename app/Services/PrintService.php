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
                        return $q->where('course_id', $filters['course']);
                    })
                    ->when(!empty($filters['group']), function ($q) use ($filters) {
                        return $q->where('group_id', '=', $filters['group']);
                    })
                    ->when(!empty($filters['date_start_study']), function ($q) use ($filters) {
                        return $q->where('date_start_study', '=', $filters['date_start_study']);
                    })
                    ->when(!empty($filters['date_finish_study']), function ($q) use ($filters) {
                        return $q->where('date_finish_study', '=', $filters['date_finish_study']);
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
        $sheet->setCellValue('C1', 'Группа');
        $sheet->setCellValue('D1', 'Курс');
        $sheet->setCellValue('E1', 'Дата начала обучения');
        $sheet->setCellValue('F1', 'Дата конца обучения');
        $sheet->setCellValue('G1', 'Направившая организация');

        $rawIndex = 2;
        foreach($students as $student) {
            $sheet->setCellValue('A' . $rawIndex, $student->id);
            $sheet->setCellValue('B' . $rawIndex, $student->full_name);
            $sheet->setCellValue('C' . $rawIndex, $student->group->name);
            $sheet->setCellValue('D' . $rawIndex, $student->course->name);
            $sheet->setCellValue('E' . $rawIndex, date('d.m.Y', strtotime($student->date_start_study)));
            $sheet->setCellValue('F' . $rawIndex, date('d.m.Y', strtotime($student->date_finish_study)));
            $sheet->setCellValue('G' . $rawIndex, $student->organization->name);

            foreach(self::COLUMNS as $column) {
                $spreadsheet->getActiveSheet()->getStyle($column . $rawIndex)->getAlignment()->setWrapText(true);
                $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
            }

            $rawIndex++;
        }

        $rawIndex++;
        $sheet->setCellValue('A' . $rawIndex, 'Количество слушателей');
        $sheet->setCellValue('B' . $rawIndex, count($students));

        return $spreadsheet;
    }

}