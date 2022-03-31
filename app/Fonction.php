<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    protected $fillable =[
        'fonction'
    ];

    public function intervenants(){
        return $this->belongsTo('App\Intervenant');
    }
}
