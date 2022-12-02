<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Audit extends Model
{
    use HasFactory;
    

    protected $table = 'audits';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','event','auditable_type','auditable_id','new_values','url','updated_at'];

}
