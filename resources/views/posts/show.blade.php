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
                <a href="{{ route('posts.edit', [$post->id, 'page'=>request()->query('page')]) }}" class="btn btn-secondary">수정</a>
                <a href="" onclick="event.preventDefault();
                document.getElementById('post-delete').submit();"  class="btn btn-danger">삭제</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="post" id="post-delete">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>

        <div id="commentbox" class="mt-5">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title">댓글입력</h4>
                    @include('posts/comments/write', [
                        'parent' => null,
                        'top' => true,
                        ])
                </div>
            </div>

            @foreach ($comments as $comment)
                @include('posts/comments/comment', [
                    'comment' => $comment,
                    'parent' => $comment->id,
                    'depth' => $loop->depth,
                ])
            @endforeach
        </div>
        <script>
            window.addEventListener('load', function(){
                $(".btn-modify").click(function(e){
                    e.preventDefault();
                    $(this).siblings('form').toggle();
                });
            })
        </script>
    </div>
@endsection