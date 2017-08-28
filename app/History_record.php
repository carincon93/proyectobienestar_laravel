<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History_record extends Model
{
    protected $fillable = [
        'id_aprendiz', 'fecha',
    ];

    public function apprentice() {
    	return $this->belongsTo('App\Apprentice');
    }
}
