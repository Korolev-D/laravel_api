<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureStudent extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'lecture_student';
}
