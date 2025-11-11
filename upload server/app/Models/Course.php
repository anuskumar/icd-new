<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'courses';
    protected $fillable = ['name', 'status', 'description', 'duration', 'fee', 'qualification_id', 'status'];


    public function courseExamDetails()
    {
        return $this->hasMany(Course_exam_detail::class, 'course_id', 'id', 'exam_id');
    }

    public function colleges()
    {
        return $this->belongsToMany(College::class, 'college_course_details', 'course_id', 'college_id')
            ->whereNull('college_course_details.deleted_at');
    }


    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'course_exam_details', 'course_id', 'exam_id')
            ->whereNull('course_exam_details.deleted_at');
    }

    public function courseType()
    {
        return $this->belongsTo(CourseType::class, 'course_type_id');
    }

    public function enrollments()
    {
        return $this->hasMany(EnrollmentModel::class);
    }
    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }
}
