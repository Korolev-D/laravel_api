<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function studyPlan()
    {
        return $this->belongsTo(StudyPlan::class, 'group_id', 'group_id');
    }

    public function lectures()
    {
        return $this->belongsToMany(Lecture::class);
    }
}
