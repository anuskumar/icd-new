<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEducation extends Model
{
    use HasFactory;

    protected $table = 'student_education';

    protected $fillable = [
        'student_id',
        'country_of_education',
        'highest_education',
        'grading_scheme',
        'grade_scale',
        'grade_average',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'studnet_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_of_education', 'id');
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class, 'highest_education');
    }
}
