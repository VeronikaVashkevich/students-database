<?php


namespace App\Services;

use App\Models\CourseStudyItem;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Lang;

class CourseStudyItemsService extends Service {

    public function createItem($request) {
        $data = $request->validated();

        if (!$this->isValidDates($data)) {
            throw ValidationException::withMessages(['date_finish_study' => Lang::get('validation.date_finish_study_error')]);
        }

        $item = new CourseStudyItem();

        $item->student_id = $data['student'];
        $item->course_id = $data['course'];
        $item->group_id = $data['group'];
        $item->date_start_study = $data['date_start_study'];
        $item->date_finish_study = $data['date_finish_study'];

        $item->save();
    }

    private function isValidDates($data) {
        return strtotime($data['date_start_study']) < strtotime($data['date_finish_study']);
    }
}
