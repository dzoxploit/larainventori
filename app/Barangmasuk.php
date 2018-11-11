<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangmasuk extends Model
{
    protected $table = 'barang_masuk';

    protected $primaryKey = 'id_masuk_barang';
    
    protected $fillable = [
       'id_masuk_barang', 'kode_barang', 'tanggal_masuk', 'jumlah_masuk', 'kode_supplier', 
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