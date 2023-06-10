@extends('base')

@section('title', $post->title)

@section('content')
        <article class="m-5">
            <h1>{{ $post->title }}</h1>
            <p>
                {{ $post->content }}
            </p>
        </article>
@endsection




