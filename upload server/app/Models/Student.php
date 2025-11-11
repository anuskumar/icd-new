<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;
    protected $table = 'students';
    protected $fillable = ['first_name', 'last_name', 'birth_date', 'country_id', 'passport_number', 'passport_expiry', 'gender', 'email', 'phone', 'user_id'];
    protected $casts = [
        'gender' => 'integer',
    ];
    public function getGenderAttribute($value)
    {
        return $value == 0 ? 'Male' : ($value == 1 ? 'Female' : 'Other');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function studentFiles()
    {
        return $this->hasMany(StudentFile::class, 'student_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function student_address()
    {
        return $this->hasOne(StudentAddress::class, 'student_id', 'id');
    }

    public function student_education()
    {
        return $this->hasOne(StudentEducation::class, 'student_id', 'id');
    }

    // In Student.php
    public function enrollment()
    {
        return $this->hasMany(EnrollmentModel::class);
    }
}
