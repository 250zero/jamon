<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table="agenda"; 
    protected $primaryKey="id_agenda"; 

    public function rsCliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'id_cliente', 'id_cliente');
    }
}
