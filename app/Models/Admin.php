<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'prenom','adresse','email','tel','age','sexe','nationnalite','ville'
    ];

    public function hotels()
    {
    	return $this->HasMany('App\Models\Hotel');
    }
}
