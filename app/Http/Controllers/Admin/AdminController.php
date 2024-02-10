<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index");
    }

    public function indexSitemap(){
        $sitemap=Sitemap::create()
        ->add(Url::create('/'));

        Category::all()->each(function(Category $category) use ($sitemap){
            $sitemap->add(Url::create('/category/'.$category->slug));
        });

        User::where('role','author')->get()->each(function(User $user) use ($sitemap){
            $sitemap->add(Url::create('/author/'.$user->username));
        });

        Post::all()->each(function(Post $post) use ($sitemap){
            $sitemap->add(Url::create('/posts/'.$post->slug));
        });
        
        $sitemap->writeTofile(public_path('sitemap.xml'));

        return back()->with('success','Sitemap Indexed Successfully!');
    }
}
