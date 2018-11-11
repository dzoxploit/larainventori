<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posisitions extends Model
{
    protected $table = 'posisitions';
    protected $primaryKey = 'id_posisitions';
    
    protected $fillable = [
       'id_posisitions', 'name_posisitions', 'id_departemen',
    ];
}
