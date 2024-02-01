<?php

namespace App\Models;
use App\Models\category;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Comment;
use Storage;

class Post extends Model
{
    use HasFactory;
    protected $guarded=[];

    public static function boot()
    {
        parent::boot();

        static::creating(function($post){
            $post->slug=Str::slug($post->title);
        });
    }

    public function category(){
        return $this->belongsTo(category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,"user_id");
    }

    public function thumbnail(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Storage::url($value),
        );
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
