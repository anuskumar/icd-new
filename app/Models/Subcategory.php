<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'subcategories';
    protected $fillable = [
        'category_id',
        'name',
        'rank',
        'status',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getCategoryIdAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setCategoryIdAttribute($value)
    {
        $this->attributes['category_id'] = json_encode($value);
    }

    public function categories()
    {
        return Category::whereIn('id', $this->category_id)->get();
    }


}
