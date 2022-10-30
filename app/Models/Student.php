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

    public function group() {
        return $this->belongsTo(Group::class, 'group_id', 'id');       
    }

    public function courses() {
        return $this->belongsToMany(Course::class);
    }

    public function organization() {
        return $this->belongsTo(Organization::class);
    }
}
