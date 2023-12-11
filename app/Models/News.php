<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['title', 'description','short_name'];
    protected $fillable = ['status', 'image', 'category_id'];

    protected $appends = ['image_path'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/' . $this->image);

    }

}
