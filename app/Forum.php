<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Forum extends Model
{
    use Sluggable;
    protected $table = 'forum';
    protected $guarded = ['id'];


     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function komentar(){
        return $this->hasMany(Komentar::class);
    }
}
