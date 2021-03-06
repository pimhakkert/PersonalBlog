@extends('layouts.admin')

@section('body_id', 'admin_new')

@section('content')
    <h2>Create a new blog post</h2>
    <form method="POST" action="{{ route('admin.new') }}">
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
            <label for="description">Description (300 characters max)</label>
            <br/>
            <textarea name="description" id="description" cols="100" rows="5" maxlength="300"></textarea>
        </p>
        <p>
            <label for="postcontent">Content</label>
            <br/>
            <textarea name="postcontent" id="postcontent" cols="30" rows="10"></textarea>
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
            .create( document.querySelector( '#postcontent' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
