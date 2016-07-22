<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Light extends Model
{
    protected $table = 'lights';

    protected $fillable = ['monto', 'estatus', 'pagado_por', 'periodo', 'fecha_pago', 'id_user', 'update_user'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
