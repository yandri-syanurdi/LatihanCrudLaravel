<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Posting extends Model
{
    use Sluggable;
    protected $table = 'posts';
    protected $fillable = ['title','content','thumbnail','slug','user_id'];
    protected $dates = ['created_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    //users punya banyak posts, post dimiliki oleh user, post belongs to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
        //Alternatif 1
        // if($this->thumbnail){
        //     return $this->thumbnail;
        // } else {
        //     return asset('no-thumbnail.jpg');
        // }

        //Alternatif 2
        // if(!$this->thumbnail){
        //     return asset('no-thumbnail.jpg');
        // } 
        // return $this->thumbnail;

        //Alternatif 3
        return !$this->thumbnail ? asset('no-thumbnail.jpg') : $this->thumbnail;



    }
}
