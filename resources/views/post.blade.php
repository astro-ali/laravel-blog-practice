<x-layout>
    <div class="container">
        <div class="my-post">
            <h1>{{ $post->title }}</h1>
            <div>{!! $post->body !!}</div>
        </div>
        <div class="go-back-link">
            <a href="/">Go Back</a>
        </div>
    </div>
</x-layout>