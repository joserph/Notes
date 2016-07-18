<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waters', function (Blueprint $table) {
            $table->increments('id');

            $table->decimal('monto', 12, 2);
            $table->enum('estatus', ['pago', 'por pagar', 'vencido']);
            $table->string('pagado_por');
            $table->string('periodo');
            $table->date('fecha_pago');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')
                ->references('id')
                ->on('users');
            $table->integer('update_user');
            
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
        Schema::drop('waters');
    }
}
