<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionType extends Model
{
    use HasFactory;
    protected $table = 'institution_type';


    public function college()
    {
        return $this->hasMany(College::class, 'institution_type_id');
    }
}
