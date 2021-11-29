<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prestamoID' , 'detalle'
    ];

    //Relacion uno a muchos inversa
    public function prestamos() {
        return $this->belongsTo(Equipo::class);
    }
}
