<x-layout>
    <x-slot name="content">
        <h1>{{ $post->title }}</h1>
        <p>
            <a href="#">{{ $post->category->name }}</a>
        </p>
        <p>{{ $post->body }}</p>
        <a href="/">Go Back</a>
    </x-slot>
</x-layout>