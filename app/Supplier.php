<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    protected $primaryKey = 'kode_supplier';
    
    protected $fillable = [ 'kode_supplier', 'nama_supplier', 'alamat_supplier', 'telp_supplier', 'kota_supplier'];
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