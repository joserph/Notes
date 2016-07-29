<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaovsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faovs', function (Blueprint $table) {
            $table->increments('id');

            $table->decimal('monto', 12, 2);
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
        Schema::drop('faovs');
    }
}
