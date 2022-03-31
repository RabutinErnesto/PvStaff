<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'abr', 'libelle',
    ];

    public function intervenants(){
        return  $this->hasMany('App\Intervenant');
    }
    public function users(){
        return  $this->belongsToMany('App\Service');
    }
}
