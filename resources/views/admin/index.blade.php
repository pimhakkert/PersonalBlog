@extends('layouts.admin')

@section('body_id', 'admin_index')

@section('content')
    <section>
        <h2>Create or edit posts</h2>
        <a href="{{ route('admin.new') }}">
            <button>Create new post</button>
        </a>
    </section>
    <table>
        <caption>Blog posts</caption>
        <thead>
        <tr>
            <th>Title</th>
            <th>Date</th>
            <th>Published</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->format('j F, Y') }}</td>
                <td>@if($post->is_published == 1) true @else false @endif</td>
                <td>
                    <a href=""><button>Edit</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
