<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $fillable = ['nombre', 'contenido', 'tipo', 'fecha', 'id_user', 'update_user'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
