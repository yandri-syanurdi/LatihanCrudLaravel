<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';

    protected $fillable = ['id','user_id','nama','nama_belakang','jenis_kelamin','agama','telpon','alamat','avatar','tgl_lahir','suku','created_at','updated_at'];

    //pakai nama yang sesuai dengan yang dihubungkan yaitu mapel jangan diganti meski memakai nama matapelajaran sesuai dengan model takutnya kalau tidak sesuai akan payah mendeklarasikan nya

    //relasi one to many
    //dimana satu guru punya banyak mapel mahai hasMany

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

}



