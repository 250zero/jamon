<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    protected $table="prestamos"; 
    protected $primaryKey="id_prestamo"; 

    public function rsPeriodo()
    {
        return $this->belongsTo('App\Models\Configuration', 'periodo', 'id');
    }
    public function rsTipoPrestamo()
    {
        return $this->belongsTo('App\Models\Configuration', 'metodologia', 'id');
    }
    public function rsCliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'id_cliente', 'id_cliente');
    } 
}
