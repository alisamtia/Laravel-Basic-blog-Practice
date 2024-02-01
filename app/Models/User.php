<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Storage;

class User extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $guarded=[];


    public static function boot()
    {
        parent::boot();

        static::creating(function($user){
            $user->password=bcrypt($user->password);
        });
    }


    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function avatar(): Attribute{
        return Attribute::make(
            get: fn (string $value) => Storage::url($value),
        );
    }
}
