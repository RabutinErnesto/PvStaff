<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    protected $table ='themes';

    protected $fillable =[
        'theme','observation',
    ];

     public function discussions(){
    return $this->hasMany('App\Discussion');
    }
    public function conclusion(){
        return $this->hasMany('App\Conclusion');
    }
    public function intervenants(){
        return $this->hasMany('App\Intervenant');
    }
    public function direction(){
        return $this->hasMany('App\Direction');
    }
}
