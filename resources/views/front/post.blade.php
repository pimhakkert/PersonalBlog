@extends('layouts.front')

@section('content')
    <article>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->description }}</p>
        <hr/>
        {!! $post->content !!}
    </article>
@endsection
