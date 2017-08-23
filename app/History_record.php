<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History_record extends Model
{
    protected $fillable = [
        'estado_beneficio', 'numero_documento', 'fecha',
    ];

    public function apprentice() {
    	return $this->belongsTo('App\Apprentice');
    }
}
