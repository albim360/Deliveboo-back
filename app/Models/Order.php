<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{  
    use HasFactory;
    protected $fillable = [
        'restaurant_id',
        'date',
        'total_payment',
        'full_name',
        'telephone',
        'address',
        'email',
    ];
    
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
