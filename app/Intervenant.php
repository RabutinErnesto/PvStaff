<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intervenant extends Model
{
    protected $fillable=[
        'nom', 'service_id'
    ];

     public function direction()
    {
        return $this->belongsTo('App\Direction');
    }
    public function fonction()
    {
        return $this->belongsTo('App\Fonction');
    }
    public function discussion()
    {
        return $this->belongsTo('App\Discussion');
    }

    public function themes()
    {
        return $this->belongsTo('App\Theme');
    }
}
