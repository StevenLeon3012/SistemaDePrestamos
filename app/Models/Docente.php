<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' ,'email', 'telefono', 'disponibilidad'
    ];

    //Relacion uno a muchos
     public function prestamos(){
        return $this->hasMany(Prestamo::class);
    }
}
