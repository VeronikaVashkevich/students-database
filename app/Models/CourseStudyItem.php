<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudyItem extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'date_finish_study',
        'date_start_study'
    ];

    public $timestamps = false;

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function group() {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
