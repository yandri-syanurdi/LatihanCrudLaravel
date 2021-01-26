<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    // protected $fillable = ['id','nama','kategori','deskripsi','keterangan']; //tambah kolom user_id
    protected $fillable = ['id','id_user','acara','tanggal_mulai','tanggal_selesai','lokasi','kegiatan','kontak','brosur','created_at','updated_at'];
}
