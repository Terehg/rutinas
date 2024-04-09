<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EjercicioRutina extends Model
{
    protected $table = 'ejercicio_rutinas';
    protected $fillable = ['id', 'dia_id', 'ejercicio_id', 'peso','repeticiones'];

    public function dia()
    {
       return $this->belongsTo(Dia::class, 'dia_id');
    }

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class, 'ejercicio_id');
    }
}
