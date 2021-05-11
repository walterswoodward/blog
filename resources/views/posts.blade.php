<x-layout>
    <x-slot name="banner">
        <header>
            <h1>My Blog</h1>
        </header>
    </x-slot>
    <x-slot name="content">
        @foreach ($posts as $post)
            <article>
                <h1>
                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                </h1>
                <div>
                    <p>{{ $post->excerpt }}</p>
                </div>
            </article>
        @endforeach
    </x-slot>
</x-layout>