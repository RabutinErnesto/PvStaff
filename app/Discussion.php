<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{

    protected $table = 'discussions';

     protected $fillable  =[
         'theme_id', 'intervenant_id', 'idee'
     ];

    public function themes(){
        $this->belongsTo('App\Theme', 'theme_id', 'id');
    }
    public function intervenants(){
        $this->hasMany('App\Intervenant');
    }
    public function autreintervenants(){
        $this->hasMany('App\Intervenant');
    }
}
