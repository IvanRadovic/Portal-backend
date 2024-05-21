<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Author extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

       protected $table = 'authors';

       protected $guarded = [];

       public function articles() {
           return $this->hasMany('\App\Models\Articles', 'author_id', 'id');
       }
}
