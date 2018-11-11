<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sumberdana extends Model
{
    
    protected $table = 'sumber_dana';
    
        protected $primaryKey = 'id_sumber_dana';
        
        protected $fillable = [
           'nama_sumber_dana', 'investor_dana' 
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
