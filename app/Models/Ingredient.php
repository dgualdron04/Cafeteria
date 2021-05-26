<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación muchos a muchos
    public function categories()
    {
        return $this->belongsToMany(Product::class);
    }
}
