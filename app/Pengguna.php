<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'users_group';
    // protected $fillable = ['id','nama','kategori','deskripsi','keterangan']; //tambah kolom user_id
    protected $fillable = ['id','user_id','nama_depan','nama_belakang','jenis_kelamin','agama','alamat','avatar','tgl_lahir','suku','created_at','updated_at'];
}
