@extends('layouts/app')
@section('content')
    <div class="container">
        @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('posts.show', [$post->id, 'page'=>request()->query('page')]) }}">
                    <h4 class="card-title">{{$post->title}}</h4>
                </a>
                <p class="card-text">{{$post->content}}</p>
            </div>
        </div>
        @endforeach
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection