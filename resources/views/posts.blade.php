<x-layout>
    <div class="container">
        @foreach ($posts as $post)
            <div class="my-post">
                <h1>
                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                </h1>
                <div>
                    {{ $post->excerpt }}
                </div>
            </div>
        @endforeach
    </div>
</x-layout>

