<?php

namespace App\Models;
use App\Models\Category;
use App\Models\HasMediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Artical extends Model  
{
    use HasFactory;

     
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
