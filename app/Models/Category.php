<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Obtient les produits associés à la catégorie.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Ajoutez d'autres méthodes et propriétés selon vos besoins
}