<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admission extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['category_id', 'college_id', 'course_id','content','status'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function college()
    {
        return $this->belongsTo(College::class,'college_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
