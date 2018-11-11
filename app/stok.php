<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok extends Model
{
    protected $table = 'stok';

    protected $primaryKey = 'kode_barang';
    
    protected $fillable = [
       'kode_barang', 'nama_barang', 'jumlah_barang_masuk', 'jumlah_barang_keluar', 'total_barang', 'keterangan' 
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