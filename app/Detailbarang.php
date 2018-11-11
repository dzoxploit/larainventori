<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailbarang extends Model
{
    protected $table = 'detail_permintaans';
    
    protected $fillable = [
       'no_permintaan', 'id_barang', 'nama_barang', 'quantity', 'satuan', 
    ];

    protected $hidden = [
    'password', 'remember_token'
    ];

    // public function getShortContentAttribute()
    // {
    //     return str_limit($this->content, rand(60,150));
    // }
    // public function getPublishedAtAttribute($dates)
    // {
    //     return $dates->diffForHumans(); // Use whatever you want here to format the date, this is just an example
    // }
}