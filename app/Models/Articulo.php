<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulo';
    protected $primaryKey = 'id';
    protected $fillable = ['id_estado','Nombre','Marca','Modelo','NumSerie','Cantidad','Estado','Ubicacion','Foto'];

    public function estado(){
        return $this->belongsTo(Estado::class, 'id_estado', 'id');
    }
}
