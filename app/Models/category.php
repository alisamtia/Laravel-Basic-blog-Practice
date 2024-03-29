<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;

class Category extends Model
{
    use HasFactory;

    protected $fillable=["name","user_id"];

    public static function boot()
    {
        parent::boot();

        static::creating(function($category){
            $category->slug=Str::slug($category->name);
        });
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
