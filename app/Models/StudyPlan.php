<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    use HasFactory;

    protected $table = 'study_plans';
    protected $guarded = [];

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}
