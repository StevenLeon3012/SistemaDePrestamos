<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre' ,'tipoDispositivo', 'modelo','marca' , 'color', 'estado', 'detalle', 'disponibilidad'
    ];

    //Relacion uno a muchos
     public function prestamos(){
        return $this->hasMany(Prestamo::class);
    }
}
