<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'date_start_study',
        'date_finish_study',
        'note'
    ];

    public function organization() {
        return $this->belongsTo(Organization::class);
    }

    public function courseStudyItems() {
        return $this->hasMany(CourseStudyItem::class);
    }
}
