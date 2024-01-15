<?php

namespace App\Models;
use App\Models\category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    public function Category(){
        return $this->belongsTo(category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,"user_id");
    }
}
