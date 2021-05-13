<x-layout>
    <x-slot name="banner">
        <header>
            <h1><a href="/">My Blog</a></h1>
        </header>
    </x-slot>
    <x-slot name="content">
        @foreach ($posts as $post)
            <article>
                <h1>
                    <a href="/posts/{{ $post->slug }}">{!! $post->title !!}</a>
                </h1>
                <p>
                    By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p>
                <div>
                    <p>{!! $post->excerpt !!}</p>
                </div>
            </article>
        @endforeach
    </x-slot>
</x-layout>
