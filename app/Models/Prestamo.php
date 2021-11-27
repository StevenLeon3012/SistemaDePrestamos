<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model {
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuarioID' ,'equipoID', 'docenteID', 'detalle' , 'estado'
    ];

    //Relacion uno a muchos
     public function reportes(){
        return $this->hasMany(Reporte::class);
    }
    //Relacion uno a muchos inversa
    public function user() {
        return $this->belongsTo(User::class);
    }
    //Relacion uno a muchos inversa
    public function docentes() {
        return $this->belongsTo(Docente::class);
    }
    //Relacion uno a muchos inversa
    public function equipos() {
        return $this->belongsTo(Equipo::class);
    }
}
