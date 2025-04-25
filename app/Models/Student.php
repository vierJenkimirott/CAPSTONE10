<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'student_fname',
        'student_lname',
        'student_mi',
        'student_suffix',
        'student_email',
    ];
}
