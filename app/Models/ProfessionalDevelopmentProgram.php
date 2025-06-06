<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalDevelopmentProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date_approval_faculty',
        'date_approval_council',
        'date_approval_rector',
        'education_program'
    ];

}
