<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function galleries(){
        return $this->hasMany(Gallery::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
