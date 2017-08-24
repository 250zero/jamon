<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table){
            $table->increments('id_prestamo');
            $table->integer('porciento');
            $table->integer('id_cliente');
            $table->float('capital_solicitado',12,2);
            $table->float('capital_pagado');
            $table->float('capital_restante');
            $table->float('interes_pagado');
            $table->float('interes_total');
            $table->float('interes_restante');
            $table->float('interes_mora');
            $table->date('dias_pagos'); //fecha de pago
            $table->integer('dias_mora');
            $table->integer('periodo_pago');
            $table->integer('numero_cuotas');
            $table->integer('estado');
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
        Schema::dropIfExists('prestamos');
    }
}
