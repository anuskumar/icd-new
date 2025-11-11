<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class College extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'colleges';
    protected $fillable = ['name', 'country_id', 'state_id', 'city_id', 'intake_date', 'institution_type_id', 'graduation_marks', 'image', 'banner_image', 'content', 'admission', 'brochure', 'status', 'map_info', 'streetview_info'];
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function collegeCourseDetails()
    {
        return $this->hasMany(College_course_detail::class, 'college_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'college_course_details', 'college_id', 'course_id')
            ->whereNull('college_course_details.deleted_at');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function course()
    {
        return $this->hasMany(College_course_detail::class, 'college_id')
            ->whereNull('deleted_at');
    }

    public function institutionType()
    {
        return $this->belongsTo(InstitutionType::class, 'institution_type_id');
    }

    public function enrollments()
    {
        return $this->hasMany(EnrollmentModel::class);
    }
    public function courseEnroll()
    {
        return $this->hasMany(Course::class);
    }
}
