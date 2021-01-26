<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    //  protected $table = 'users_group';
    protected $fillable = ['id','nama_belakang',
    'nama_depan','role','jenis_kelamin','agama','alamat','avatar','user_id',
    'tgl_lahir','suku',
    'nisn', 'tempat_lahir',
    'nama_ibu',
    'kontak_ortu',
    'asal_sekolah',
    'alamat_sekolah',
    
]; //tambah kolom user_id

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('images/default.jpg');
        }

        return asset('images/'.$this->avatar);
    }


    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    //contoh custom function
    public function rataRataNilai()
    {
        // return 'test';
        // return 1 + 2;

        // ambil nilai2
        $total = 0;
        $hitung = 0;
        foreach($this->mapel as $mapel){
            // $total = $total + $mapel->pivot->nilai;
            $total += $mapel->pivot->nilai;
            $hitung++;
            //$hitung + 1;

           
        }

        if($hitung==0)
        {
            return 0;
        }
        else {
            // return $total/$hitung;
             return round($total/$hitung);
        }
        //return $total/$hitung;
    }

     public function totalNilai()
    {
        // return 'test';
        // return 1 + 2;

        // ambil nilai2
        $total = 0;
        $hitung = 0;
        foreach($this->mapel as $mapel){
            // $total = $total + $mapel->pivot->nilai;
            $total += $mapel->pivot->nilai;
            $hitung++;
            //$hitung + 1;

           
        }

        if($hitung==0)
        {
            return 0;
        }
        else {
            // return $total/$hitung;
             return round($total);
        }
        //return $total/$hitung;
    }

    public function rataRataNilaii()
    {
        // ambil nilai2
        if($this->mapel->isNotEmpty()){
            $total = 0;
            $hitung = 0;
            foreach($this->mapel as $mapel){
                $total += $mapel->pivot->nilai;
                $hitung++;
            }

            return round($total/$hitung);
        }

        return 0;
       

    }

    public function nama_lengkap()
    {
        return $this->nama_depan.' '.$this->nama_belakang;
    }
    

    public function user()
    {
        // return $this->belongsTo(User::class)->withDefault(['avatar' => 'default.jpg']);
        return $this->belongsTo(User::class)->withDefault(['avatar' => 'default.jpg']);
        // return $this->belongsTo(User::class);
    }

}
