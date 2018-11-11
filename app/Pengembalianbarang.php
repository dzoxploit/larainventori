<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalianbarang extends Model
{
    protected $table = 'pengembalian';

    protected $primaryKey = 'no_pengembalian';
    
    protected $fillable = [
       'no_pengembalian', 'kode_peminjaman', 
       'tanggal_pengembalian','status_pengembalian', 'keterangan', 
    ];

protected $dates = ['tanggal_pengembalian'];

    // public function getShortContentAttribute()
    // {
    //     return str_limit($this->content, rand(60,150));
    // }
    // public function getPublishedAtAttribute($dates)
    // {
    //     return $dates->diffForHumans(); // Use whatever you want here to format the date, this is just an example
    // }
}

