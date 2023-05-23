<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'price', 'description', 'slug', 'img_product', 'restaurant_id'];
    // aggiunto img e restaurant id in fillable

    public function restaurants()
    {
        //return $this->hasMany(Restaurant::class);
        return $this->belongsTo(Restaurant::class); //questo prodotto appartiena ad un ristorante
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}

