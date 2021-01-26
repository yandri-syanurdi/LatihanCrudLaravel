<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';
    // protected $fillable = ['id','nama','kategori','deskripsi','keterangan']; //tambah kolom user_id
    protected $fillable = ['id','nama','kategori','deskripsi','document','created_at','updated_at'];
}
