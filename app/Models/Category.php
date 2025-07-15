<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name_product', 'price', 'image', 'likes','description','user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
