<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    public function update(User $user, Category $category): bool
    {
        return $user->role==="admin" || $category->user_id===$user->id;
    }
}
