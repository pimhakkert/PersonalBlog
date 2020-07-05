@extends('layouts.admin')

@section('body_id', 'admin_edit')

@section('content')
    <h2>Edit: {{ $post->title }}</h2>
    <form method="POST" action="/admin/edit">
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
            <label for="editor">Content</label>
            <br/>
            <textarea name="postcontent" id="editor" cols="30" rows="10">{{ $post->content }}</textarea>
        </p>
        <p>
            <label for="ispublish">Publish/unpublish</label>
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
