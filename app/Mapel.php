<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode','nama','semester'];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }

    // satu mapel dimiliki guru, bukan satu mapel dimiliki banyak guru
    // memakai belongsTo

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
