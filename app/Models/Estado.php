<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{   protected $table = 'estado';
    protected $primaryKey = 'id';
    public $incrementing = true;

    use HasFactory;

    protected $fillable = ['description',];

    public function articulos(){
        return $this->hasMany(Articulo::class, 'id_estado', 'id');
    }
}