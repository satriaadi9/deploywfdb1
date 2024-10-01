<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Course extends Model
{
    use HasFactory;
    // protected $primaryKey = '$course_id';

    protected $fillable = [
        'course_code',
        'curriculum_year',
        'course_name',
        'course_name_en',
        'unit_id'
    ];

    // public static array $rules = [
    //     'course_code'=>'required|string|max:6',
    //     'curriculum_year'=>'required|year',
    //     'course_name'=>'required|string|max:255',
    //     'course_name_en'=>'required|string|max:255',
    //     'created_at'=>'nullable',
    //     'updated_at'=>'nullable'
    // ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function studyPlans(): HasMany
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(
            Student::class, // The final model (Student)
            StudyPlan::class, // The intermediate model (StudyPlan)
            'course_id', //Foreign key on StudyPlan (to Course)
            'id', // Foreign key on Student (primary key)
            'id', // Local key on Course (primary key)
            'student_id'  // Foreign key on StudyPlan (to Student)
        )->where('study_plans.is_cancel',0)->orderBy('students.nrp'); //default is ASC
    }

    public function studentCount(): int {
        return $this->students()->count();
    }
}
