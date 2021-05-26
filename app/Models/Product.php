<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relación uno a muchos inversa
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    //Relación uno a muchos inversa
    public function flavor()
    {
        return $this->belongsTo(Flavor::class);
    }

    //Relación uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relación uno a muchos inversa
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    //Relación uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    //Relación muchos a muchos
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class);
    }

}
