<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';

    protected $primaryKey = 'nip';
    
    protected $fillable = [
       'nip', 'first_name', 'last_name', 'address', 'email','posisition','no_mobile','id_departemen','status'
    ];

    protected $hidden = [
        'password', 'rememd'
    ];
    // public function} getShortContentAttribute()
    // {
    //     return str_limit($this->content, rand(60,150));
    // }
    // public function getPublishedAtAttribute($dates)
    // {
    //     return $dates->diffForHumans(); // Use whatever you want here to format the date, this is just an example
    // }
}