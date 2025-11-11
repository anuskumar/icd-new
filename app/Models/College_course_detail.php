<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class College_course_detail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'college_course_details';
    protected $fillable = ['college_id', 'course_id','course_amount'];


    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id');

    }

}
