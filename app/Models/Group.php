<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function studyPlan()
    {
        return $this->hasOne(StudyPlan::class);
    }
    public function lectures(){
        return $this->hasManyThrough(Lecture::class, StudyPlan::class, 'group_id', 'study_plan_id','id','id');
    }
}
