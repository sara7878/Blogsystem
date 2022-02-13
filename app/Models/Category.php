<?php

namespace App\Models;
use App\Models\Artical;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function articals()
    {
        return $this->hasMany(Artical::class);
    }
}
