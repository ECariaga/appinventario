<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $table = 'ubicacion';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = ['lugar'];

    public function articulos()
    {
        return $this->hasMany(Articulo::class, 'id_ubicacion', 'id');
    }
}
