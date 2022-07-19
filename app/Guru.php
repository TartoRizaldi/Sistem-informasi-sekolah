<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
   protected $table = 'guru';
   protected $fillable = ['nama','telepon','alamat','user_id']; 

   public function mapel()
   {
   		return $this->hasMany(Mapel::class);
   }
}
