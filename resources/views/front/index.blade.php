@extends('layouts.front')

@section('body_id', 'front_index')

@section('content')
    @foreach ($posts as $post)
        <article>
            <h2>{{ $post->title }} @if($post->is_published == 0) <span>UNPUBLISHED POST</span> @endif</h2>
            <p>{{ $post->description }}...</p>
            <a href="{{ route('post.view', ['slug' => $post->slug]) }}"><button>Read more...</button></a>
            - <small>{{ $post->created_at->format('d/m/Y') }}</small>
            <br/>
            <small><em>{{ $post->read_minutes }} minute read</em></small>
        </article>
        @if(!$loop->last)
            <hr/>
        @endif
    @endforeach
@endsection
