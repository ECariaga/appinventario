<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulo';
    protected $primaryKey = 'id';
    protected $fillable = ['Nombre','Marca','Modelo','NumSerie','Estado','Ubicacion','Foto'];
}
