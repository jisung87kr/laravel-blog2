@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $post->title }}</h4>
                <p class="text-muted">{{ $post->user->name }} / {{ $post->created_at->diffForHumans() }}</p>
                <hr>
                <p class="card-text">{{ $post->content }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('posts.index', ['page'=>request()->query('page')]) }}" class="btn btn-primary">목록</a>
                <a href="{{ route('posts.edit', [$post->id, 'page'=>request()->query('page')]) }}" class="btn btn-primary">수정</a>
                <a href="" onclick="event.preventDefault();
                document.getElementById('post-delete').submit();"  class="btn btn-danger">삭제</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="post" id="post-delete">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
@endsection