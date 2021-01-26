<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'video';
    // protected $fillable = ['id','nama','kategori','deskripsi','keterangan']; //tambah kolom user_id
    protected $fillable = ['id','nama','nama_tingkat','nama_mapel','deskripsi','video','created_at','updated_at'];
}
