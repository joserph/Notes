<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIslr99228sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('islr99228s', function (Blueprint $table) {
            $table->increments('id');

            $table->decimal('monto', 12, 2);
            $table->integer('porcion');
            $table->enum('estatus', ['pago', 'por pagar', 'vencido']);
            $table->string('pagado_por');
            $table->string('periodo');
            $table->date('fecha_pago');
            $table->integer('update_user');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')
                ->references('id')
                ->on('users');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('islr99228s');
    }
}
