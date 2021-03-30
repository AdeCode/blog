<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(POST::class,'category_posts')->orderBy('created_at','DESC')->paginate(5);
    }
}
