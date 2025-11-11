<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddress extends Model
{
    use HasFactory;

    protected $table = 'student_addressess';

    protected $fillable = ['student_id', 'address', 'city', 'state', 'country', 'zipcode'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country', 'id');
    }
}
