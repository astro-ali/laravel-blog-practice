<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public static function find($slug) 
    {
        $path = resource_path("posts/post-{$slug}.html");
    
        if(!file_exists($path)){
            throw new ModelNotFoundException();
        }
    
        return cache()->remember("posts.{$slug}", now()->addMinutes(15), function () use ($path) {
            return file_get_contents($path);
        });
    }

    public static function fetchAll()
    {
        $files = File::files(resource_path("posts/"));

        return array_map(function ($file) {
            return $file->getContents();
        }, $files);

    }
}