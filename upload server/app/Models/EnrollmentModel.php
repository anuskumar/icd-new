<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentModel extends Model
{
    use HasFactory;

    protected $table = 'enrollments';
    protected $fillable = ['user_id', 'college_id', 'course_id', 'message', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function student()
    {
        return $this->hasOne(Student::class, 'user_id', 'user_id');
    }
    public function college()
    {
        return $this->belongsTo(College::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
