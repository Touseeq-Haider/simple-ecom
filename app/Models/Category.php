<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ MUST be here
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; // ✅ inside the class

    protected $fillable = ['name', 'slug', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}