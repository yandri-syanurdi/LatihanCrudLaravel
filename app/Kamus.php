<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamus extends Model
{
    protected $table = 'kamus';
    // protected $fillable = ['id','nama','kategori','deskripsi','keterangan']; //tambah kolom user_id
    protected $fillable = ['id','b_indonesia','b_inggris','video_isyarat','created_at','updated_at'];
}
