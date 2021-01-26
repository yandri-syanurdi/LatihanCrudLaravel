<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    // protected $fillable = ['id','nama','kategori','deskripsi','keterangan']; //tambah kolom user_id
    protected $fillable = ['id','user_id','nama','nama_belakang','jenis_kelamin','agama','telepon','whatsapp','instagram','facebook','alamat','profile','tgl_lahir','suku','created_at','updated_at'];
}
