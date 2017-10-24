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
            $table->integer('id_cliente');
            $table->integer('metodologia'); 
            $table->integer('periodo'); 
            $table->integer('dias_pago');  

            $table->float('capital_solicitado',12,2);
            $table->float('capital_pagado');
            $table->float('capital_restante');
            
            $table->integer('interes');
            $table->float('interes_pagado');
            $table->float('interes_restante');
            $table->float('interes_total'); 

            $table->float('mora_pagado');
            $table->float('mora_monto');  

            $table->integer('cuotas_numero');
            $table->float('cuotas_pagada');
            $table->float('cuotas_restante');
            $table->float('cuotas_monto');
            $table->float('cuotas_interes');
            $table->float('cuotas_capital'); 
            
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
