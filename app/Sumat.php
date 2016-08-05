<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumat extends Model
{
    protected $table = 'sumats';

    protected $fillable = ['monto', 'estatus', 'pagado_por', 'periodo', 'fecha_pago', 'id_user', 'update_user'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
