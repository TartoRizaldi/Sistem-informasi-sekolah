<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'kelas';
    protected $fillable = ['kelas','guru_id']; 
 
    public function guru()
    {
            return $this->belongsTo(Guru::class);
    }
}
