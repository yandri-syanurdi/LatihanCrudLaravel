<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquran extends Model
{
    protected $table = 'daftar_ayat';
    // protected $fillable = ['id','nama','kategori','deskripsi','keterangan']; //tambah kolom user_id
    protected $fillable = ['id','penggalan_ayat','terjemahan','urutan_penggalan','urutan_ayat','nama_surat','gambar_ayat','video_terjemahan','created_at','updated_at'];
}
