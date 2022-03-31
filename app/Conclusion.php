<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conclusion extends Model
{
    protected $fillable=[
        'conclusion', 'observation', 'theme_id'
    ];
    protected $table='conclusion';

    public function themes(){
        return $this->belongsTo('APP\Theme');
    }

}

