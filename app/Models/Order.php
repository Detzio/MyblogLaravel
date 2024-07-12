<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        // Ajoutez d'autres colonnes selon votre schéma de base de données
    ];

    /**
     * Obtient l'utilisateur associé à la commande.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtient les articles de la commande.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Vous pouvez ajouter ici d'autres méthodes, comme des accesseurs et des mutateurs ou des méthodes d'aide.
}