<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PartesDelCuerpo;

class Dia extends Model
{
    protected $table = 'dias';
    protected $fillable = ['nombre', 'parte_cuerpo_id'];

    public function partesDelCuerpo()
    {
        return $this->belongsTo(PartesDelCuerpo::class, 'parte_cuerpo_id');
    }
}
