<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = [];

    use HasFactory;
    protected $appends = ['image_path','video_path'];

    public function getImagePathAttribute()
    {
        return asset('uploads/'.$this->image);
    }
    public function getVideoPathAttribute()
    {
        return asset('uploads/'.$this->video);
    }
}
