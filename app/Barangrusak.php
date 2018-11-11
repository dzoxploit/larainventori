<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barangrusak extends Model
{
    protected $table = 'barang_rusak';

    protected $primaryKey = 'id_barang';
        
        protected $fillable = [
           'id_barang', 'nama_barang', 'merk',  'id_kategori', 'quantity_rusak', 'satuan', 
        ];
    
        // protected $hidden = [
        //     'password', 'remember_token'
        // ];
    
        // public function getShortContentAttribute()
        // {
        //     return str_limit($this->content, rand(60,150));
        // }
        // public function getPublishedAtAttribute($dates)
        // {
        //     return $dates->diffForHumans(); // Use whatever you want here to format the date, this is just an example
        // }
}
