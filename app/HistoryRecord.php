<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryRecord extends Model
{
    protected $fillable = [
        'apprentice_id', 'fecha',
    ];

    public function apprentice() {
    	return $this->belongsTo('App\Apprentice');
    }
}
