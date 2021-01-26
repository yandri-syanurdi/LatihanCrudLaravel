<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $fillable = ['id','title','detail','created_at','updated_at']; //tambah kolom user_id
}
