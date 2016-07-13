<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

    protected $fillable = ['nombre', 'contenido', 'fecha', 'id_user', 'update_user'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
