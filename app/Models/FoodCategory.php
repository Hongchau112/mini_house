<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;
    protected $table='food_categories';
    protected $fillable = [
        'name',
        'description',
        'parent_category_id'
    ];
}
