<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;
    protected $table = 'course_type';

    public function courseType()
    {
        return $this->belongsTo(CourseType::class, 'course_type_id');
    }
}
