@extends('layouts.front')

@section('body_id', 'front_post')

@section('content')
    <article>
        <h2>{{ $post->title }} @if($post->is_published == 0) <span>UNPUBLISHED POST</span> @endif</h2>
        <p>{{ $post->description }}</p>
        <hr/>
        {!! $post->content !!}
    </article>
@endsection
