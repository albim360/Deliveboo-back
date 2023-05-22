<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Typology;
use App\Models\Product;

class Restaurant extends Model
{
    use HasFactory, SoftDeletes;

    public function typologies()
    {
        return $this->belongsToMany(Typology::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
