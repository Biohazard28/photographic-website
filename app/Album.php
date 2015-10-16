<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

 protected $fillable= [
     'album_id','photo_name','tag_id'];
 public function photos()
 {

  return $this->hasMany('\App\Photo');
 }
 public function category()
 {
   return $this->hasOne('\App\Category');
 }
}
