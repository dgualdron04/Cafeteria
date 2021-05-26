<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flavor extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relación uno a muchos
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
