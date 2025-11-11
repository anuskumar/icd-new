<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentFile extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'student_file_upload';
    protected $fillable = ['student_id', 'user_id', 'qualification_id', 'files', '	original_file_name'];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class, 'qualification_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
