<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id','hotel_id','start','end','adultes','enfants','capacite','chambre_id',
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function hotel()
    {
    	return $this->belongsTo('App\Models\Hotel');
    }
    
    public function chambre()
    {
    	return $this->belongsTo('App\Models\Chambre');
    }

}
