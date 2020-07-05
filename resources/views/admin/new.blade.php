@extends('layouts.admin')

@section('body_id', 'admin_new')

@section('content')
    <h2>Create a new blog post</h2>
    <form method="POST" action="/admin/new">
        @csrf
        <p>
            <label for="title">Title</label>
            <br/>
            <input type="text" name="title" id="title" required>
        </p>
        <p>
            <label for="minutes">Reading time in minutes</label>
            <br/>
            <input type="number" name="minutes" id="minutes" value="1" min="0" required>
        </p>
        <p>
            <label for="editor">Content</label>
            <br/>
            <textarea name="postcontent" id="editor" cols="30" rows="10"></textarea>
        </p>
        <p>
            <label for="ispublish">Publish immediately</label>
            <br/>
            <input type="checkbox" checked name="ispublish">
        </p>
        <button type="submit">Add post</button>
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
