<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjamanbarang extends Model
{
    protected $table = 'peminjaman_barang';

    protected $primaryKey = 'no_pinjam';
    
    protected $fillable = [
       'no_pinjam', 'tgl_pinjam', 'tgl_pengembalian', 'id_pegawai', 'keterangan', 'status_peminjaman',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
protected $dates = ['tgl_pinjam', 'tgl_pengembalian'];

    // public function getShortContentAttribute()
    // {
    //     return str_limit($this->content, rand(60,150));
    // }
    // public function getPublishedAtAttribute($dates)
    // {
    //     return $dates->diffForHumans(); // Use whatever you want here to format the date, this is just an example
    // }
}

