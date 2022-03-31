<?php

namespace App;
use App\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Direction extends Model
{
    protected $fillable = [
        'abr', 'libelle',
    ];

    public function services(){
        return  $this->belongsToMany('App\Service');
    }
    public function intervenants(){
        return  $this->belongsTo('App\Intervenant');
    }
}
