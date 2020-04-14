<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $uploads = '/photos/users-photo/' ;

    protected $postsUploads = '/photos/posts-photo/' ;


    protected $fillable = ['file'];


    public function getFileAttribute($photo){

        return $this->uploads . $photo ;

    }


    public function getPhotoAttribute($photo){

        return $this->postsUploads . $photo ;

    }

}
