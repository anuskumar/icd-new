<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_exam_detail extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'course_exam_details';
    protected $fillable = ['course_id', 'exam_id'];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
