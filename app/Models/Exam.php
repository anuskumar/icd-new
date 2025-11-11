<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Exam extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'exam';
    protected $fillable = ['name', 'status'];
    public function isactive()
    {
        return $this->attributes['status'] == 1 ? 'Active' : 'Inactive';
    }
}
