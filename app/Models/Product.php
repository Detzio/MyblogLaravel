<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'is_promotion',
        'promotion_price',
        'image_url',
        'category_id', // Ajoutez cette ligne
    ];

    /**
     * Obtient la catégorie associée au produit.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}