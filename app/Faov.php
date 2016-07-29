<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faov extends Model
{
    protected $table = 'faovs';

    protected $fillable = ['monto', 'estatus', 'pagado_por', 'periodo', 'fecha_pago', 'id_user', 'update_user'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
