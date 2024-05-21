<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'subcategories';
    protected $guarded = [];


    public function articles() {
        return $this->hasMany(Articles::class, 'subcategory_id', 'id');
    }

    public function category() {
        return $this->hasOne('\App\Models\Category', 'id', 'category_id');
    }
}
