<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable = [
        'image','hotel_id','etage','etat', 'typechambre_id','prix','devise','zone_residentielle', 'equipement',
    ];

    public function hotel()
    {
    	return $this->belongsTo('App\Models\Hotel');
    }

    public function typechambre()
    {
    	return $this->belongsTo('App\Models\typechambre');
    }

}
