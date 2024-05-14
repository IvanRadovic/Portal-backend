<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Articles extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'article';

    protected $guarded = [];

     public function categories()
        {
            return $this->hasOne(Category::class, 'id', 'category_id');
        }

     public function subcategories()
        {
            return $this->hasOne(Subcategory::class, 'id', 'subcategory_id');
        }

}
