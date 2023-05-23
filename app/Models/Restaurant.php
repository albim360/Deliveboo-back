<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Typology;
use App\Models\Product;

class Restaurant extends Model
{
    use HasFactory;

    protected $with = ['typologies'];

    protected $fillable = [
        'company_name',
        'address',
        'vat_number',
        'telephone',
        'description',
        'slug',
        'user_id'
        //'product_id', eliminato
    ];

    public function typologies()
    {
        return $this->belongsToMany(Typology::class);
    }

    public function product()
    {
        //return $this->belongsTo(Product::class);
        
        return $this->hasMany(Product::class); //questo ristorante ha molti prodotti
    }

    public function getTypologyIds()
    {
        return $this->typologies->pluck('id')->all();
    }
}
