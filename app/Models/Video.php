<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends=['video_path'];


    public function getVideoPathAttribute()
    {
        return asset('uploads/'.$this->video);
    }
}
