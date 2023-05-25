<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Typology extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_kitchen',
        'slug'
    ];

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function index() {
        $typologies = Typology::all();
        return view('typologies.index', compact('typologies'));
    }
    
}
