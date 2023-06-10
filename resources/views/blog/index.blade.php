@extends('base')

@section('title', 'Accueil du blog')

@section('content')
    <h1 class="m-5 text-center bg-primary p-2 rounded text-white">Mon blog</h1>

    @foreach ($posts as $post)
        <article class="d-flex flex-column align-items-center m-3">
            <h2>{{ $post->title }}</h2>
            <p class="small">
                @if($post ->category)
                    Categorie : <strong>{{ $post->category?->name }}</strong>@if(!$post->tags->isEmpty())
                        ,
                    @endif
                @endif
                @if(!$post->tags->isEmpty())
                    Tags :
                    @foreach($post->tags as $tag)
                        <span class="badge bg-secondary">{{ $tag->name }}</span>
                    @endforeach
                @endif
            </p>
            @if($post ->image)
                <img class="w-25 h-25" src="{{ $post->imageUrl() }}" alt="">
            @endif
            <p>
                {{ $post->content }}
            </p>
            <p>
                <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}"
                   class="btn btn-primary">Lire la suite</a>
            </p>
        </article>
    @endforeach

    {{ $posts->links() }}
@endsection




