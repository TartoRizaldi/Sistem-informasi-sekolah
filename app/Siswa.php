<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','user_id','NIS','kelas_id'];

    public function getAvatar()
    { 
     if($this->avatar == "none"){
      return asset('images/default.jpg');
     }

     return asset('images/'.$this->avatar);
    }

    public function kelas(){
      return $this->belongsTo(Kelas::class);
    }

    public function mapel ()
    {
     return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function rataRataNilai()
    {
        $total = 0; 
        $hitung = 0;
        $rerata = 0;
        if (count($this->mapel)!=0){

        foreach($this->mapel as $mapel){
          $total += $mapel->pivot->nilai;
          $hitung++; 
        }

          $rerata = $total/$hitung;
        }
        return round($rerata);
    }
    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang; 
    }
}