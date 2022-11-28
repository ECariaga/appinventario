<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Articulo extends Model implements Auditable
{
    
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    
    

    protected $table = 'articulo';
    protected $primaryKey = 'id';
    protected $fillable = ['id_estado','Nombre','Marca','Modelo','NumSerie','Cantidad','Estado','Ubicacion','Foto'];

    

    public function estado(){
        return $this->belongsTo(Estado::class, 'id_estado', 'id');
    }
}
