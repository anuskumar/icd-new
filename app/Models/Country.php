<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';

    public function student_addresses()
    {
        return $this->hasMany(StudentAddress::class, 'country', 'id');
    }

    public function student_educations()
    {
        return $this->hasMany(StudentEducation::class, 'country_of_education', 'id');
    }

    public function colleges()
    {
        return $this->hasMany(College::class, 'name', 'id');
    }
}
