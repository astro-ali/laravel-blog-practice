<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;

        $this->excerpt = $excerpt;

        $this->date = $date;

        $this->body = $body;

        $this->slug = $slug;
    }

    public static function fetchAll()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path('posts')))
            ->map(function ($file) {
                $document = YamlFrontMatter::parseFile($file);
                return new Post(
                    $document->title,
                    $document->excerpt, 
                    $document->date, 
                    $document->body(),
                    $document->slug,
                );
            })->sortByDesc('date');
        });
    }

    public static function findOne($slug) 
    {
        return static::fetchAll()->firstWhere('slug', $slug);
    }

    public static function findOneOrFail($slug) 
    {
        $post = static::findOne($slug);

        if(!$post) abort(404);

        return $post;
    }
}