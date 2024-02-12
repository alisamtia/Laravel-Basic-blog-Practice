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
use App\Http\Requests\SaveSettingsRequest;
use File;
use Storage;

class AdminController extends Controller
{
    public function index(){
        return view("admin.index");
    }

    public function settings(){
        return view("admin.settings");
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

    public function save_settings(SaveSettingsRequest $data){
        $data=$data->validated();
        $configFile = config_path('site.php');

        $config = File::getRequire($configFile);

        $config['siteTitle'] = $data['title'];
        $config['siteTagline'] = $data['tagline'];
        $config['siteDescription'] = $data['description'];
        $config['siteKeywords'] = $data['keywords'];

        if(request()->file('favicon')){
            File::delete(config('site.siteFavicon'));
            $config['siteFavicon'] = Storage::url(request()->file('favicon')->store());
        }

        File::put($configFile, '<?php return ' . var_export($config, true) . ';');

        return back()->with("success","Settings Changed Successfully!");
    }
}
