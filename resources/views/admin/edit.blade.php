@extends('layouts.admin')

@section('body_id', 'admin_edit')

@section('content')
    <h2>Edit: {{ $post->title }}</h2>
    <form method="POST" action="{{ route('admin.edit', ['slug'=> $post->slug]) }}">
        @csrf
        <p>
            <label for="title">Title</label>
            <br/>
            <input type="text" name="title" id="title" required value="{{ $post->title }}">
        </p>
        <p>
            <label for="minutes">Reading time in minutes</label>
            <br/>
            <input type="number" name="minutes" id="minutes" value="1" min="0" required value="{{ $post->read_minutes }}">
        </p>
        <p>
            <label for="description">Description (300 characters max)</label>
            <br/>
            <textarea name="description" id="description" cols="100" rows="5" maxlength="300">{{ $post->description }}</textarea>
        </p>
        <p>
            <label for="editor">Content</label>
            <br/>
            <textarea name="postcontent" id="editor" cols="30" rows="10">{{ $post->content }}</textarea>
        </p>
        <p>
            <label for="ispublish">Is published</label>
            <br/>
            <input type="checkbox" name="ispublish" @if($post->is_published == 1)checked @endif>
        </p>
        <button type="submit">Edit post</button>
    </form>
@endsection

@section('javascript')
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
