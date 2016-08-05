<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iva99035 extends Model
{
    protected $table = 'iva99035s';

    protected $fillable = ['monto', 'estatus', 'pagado_por', 'periodo', 'fecha_pago', 'id_user', 'update_user'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
