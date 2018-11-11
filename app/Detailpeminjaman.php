<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailpeminjaman extends Model
{
    protected $table = 'detail_peminjaman';

    protected $primaryKey = 'no_peminjaman';

    
    protected $fillable = [
       'no_peminjaman', 'id_barang', 'nama_barang', 'quantity', 'satuan',  
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
