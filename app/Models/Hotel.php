<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id','image','nom','ville','adresse' ,'tel','code_postale' ,'categorie','etat','description',
    ];
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
