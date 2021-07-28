<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id','nomP', 'quantite', 'mesure', 'etat'
    ];
    public function hotel()
    {
    	return $this->belongsTo('App\Models\Hotel');
    }
}
