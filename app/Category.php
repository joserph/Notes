<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['nombre', 'id_user', 'update_user'];

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_user');
    }
}
