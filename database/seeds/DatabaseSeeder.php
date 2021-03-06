<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert(['email' => 'taylor@example.com', 'usuario' => 'admin','clave'=>Hash::make('Admin123')]);

        DB::table('clientes')->insert([
            ['nombre' => 'Pedro','apellido' => 'Peres', 'telefono' => '809-655-6852','celular'=>'829-652-3695','email'=>'ejemplo@gmail.com','estado'=>1],
            ['nombre' => 'Firo','apellido' => 'Hernandez', 'telefono' => '829-655-6234','celular'=>'829-652-3632','email'=>'ejemplo2@gmail.com','estado'=>1],
            ['nombre' => 'Jose','apellido' => 'Jimenez', 'telefono' => '829-623-6234','celular'=>'829-652-3632','email'=>'ejemplo3@gmail.com','estado'=>1],
            ['nombre' => 'Andre','apellido' => 'Herrera', 'telefono' => '829-655-6624','celular'=>'829-652-3632','email'=>'ejemplo4@gmail.com','estado'=>1],
            ['nombre' => 'Freddy','apellido' => 'Poder', 'telefono' => '829-235-6234','celular'=>'829-652-3632','email'=>'ejemplo5@gmail.com','estado'=>1],
            ['nombre' => 'Giovanny','apellido' => 'Kilac', 'telefono' => '829-655-6234','celular'=>'829-652-3632','email'=>'ejemplo6@gmail.com','estado'=>1],
            ['nombre' => 'Gustavo','apellido' => 'Nil', 'telefono' => '829-135-6234','celular'=>'829-652-3632','email'=>'ejemplo7@gmail.com','estado'=>1],
            ['nombre' => 'Josefina','apellido' => 'Jaz', 'telefono' => '829-525-6234','celular'=>'829-652-3632','email'=>'ejemplo8@gmail.com','estado'=>1],
            ['nombre' => 'Neithan','apellido' => 'Rodriguez', 'telefono' => '829-455-6234','celular'=>'829-652-3632','email'=>'ejemplo9@gmail.com','estado'=>1],
            ['nombre' => 'Dilan','apellido' => 'Diamante', 'telefono' => '829-335-6234','celular'=>'829-652-3632','email'=>'ejemplo10@gmail.com','estado'=>1],
            ['nombre' => 'Edilenia','apellido' => 'Leal', 'telefono' => '829-885-6234','celular'=>'829-652-3632','email'=>'ejemplo11@gmail.com','estado'=>1],
            ['nombre' => 'Jhoel','apellido' => 'Caceres', 'telefono' => '829-4555-6234','celular'=>'829-652-3632','email'=>'ejemplo12@gmail.com','estado'=>1],
            ['nombre' => 'Manuel','apellido' => 'Halep', 'telefono' => '829-455-6234','celular'=>'829-652-3632','email'=>'ejemplo13@gmail.com','estado'=>1],
            ['nombre' => 'Rafael','apellido' => 'Garcia', 'telefono' => '829-355-6234','celular'=>'829-652-3632','email'=>'ejemplo14@gmail.com','estado'=>1],
            ['nombre' => 'Leonela','apellido' => 'Deligne', 'telefono' => '829-795-6234','celular'=>'829-652-3632','email'=>'ejemplo15@gmail.com','estado'=>1],
            ['nombre' => 'Isaura','apellido' => 'Sabato', 'telefono' => '829-455-6234','celular'=>'829-652-3632','email'=>'ejemplo16@gmail.com','estado'=>1],
            ['nombre' => 'Eduard','apellido' => 'Gil', 'telefono' => '829-155-6234','celular'=>'829-652-3632','email'=>'ejemplo17@gmail.com','estado'=>1],

        ]);
        DB::table('configurations')->insert([
            ['names' => 'Metodo Absoluto','type' => '1'],
            ['names' => 'Metodo Insoluto','type' => '1'],
            ['names' => 'Quincenal','type' => '2'],
            ['names' => 'Mensual','type' => '2'],
            ['names' => 'Semestral','type' => '2'],
            ['names' => 'Trimestral','type' => '2'],
            ['names' => 'Cuatrimestral','type' => '2'],
            ['names' => 'Anual','type' => '2'] 
        ]);
        $prestamos =  [  
                'id_cliente' => 2,
                'metodologia' => 1,
                'periodo' => 3,
                'dias_pago' => 1,
                'capital_solicitado' => 50000.00,
                'capital_pagado' => 0.00,
                'capital_restante' => 50000.00,
                'interes' => 10,
                'interes_pagado' => 0.00,
                'interes_restante' => 150000.00,
                'interes_total' => 150000.00,
                'mora_pagado' => 0.00,
                'mora_monto' => 0.00,
                'cuotas_numero' => 30,
                'cuotas_pagada' => 0.00,
                'cuotas_restante' => 30.00,
                'cuotas_monto' => 1833.33,
                'cuotas_interes' => 166.67,
                'cuotas_capital' => 1666.67,
                'estado' => 1, 
            ];
            DB::table('prestamos')->insert( $prestamos );
            DB::table('company')->insert(  [
                'name'=>'Agencia ATD',
                'direccion'=>'Calle 5, casa 2 los Restaruradores',
                'telefono' =>'809-714-3871',
                'RNC' => '15351351'
            ]);
        
    }
}
