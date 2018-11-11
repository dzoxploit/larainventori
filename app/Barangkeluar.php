<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    protected $table = 'barang_keluar';

    protected $primaryKey = 'id_barang_keluar';
    
    protected $fillable = [
       'id_barang_keluar', 'kode_barang', 'tgl_keluar', 'penerima', 'jumlah_barang_keluar', 'keperluan' 
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