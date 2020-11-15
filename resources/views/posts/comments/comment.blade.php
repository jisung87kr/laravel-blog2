<div class="card mb-3" style="margin-left : {{ 30*($depth-1) }}px;">
    <div class="card-body">
        <div class="small">{{ $comment->user->name }} | {{ $comment->created_at->diffForHumans() }}</div>
        <p class="card-text">{{ $comment->content }}</p>
        <form action="{{ route('comments.update', $comment->id) }}" method="POST" style="display: none; margin-bottom: 20px;">
            @csrf
            @method('PUT')
            <textarea name="content" id="" class="form-control" cols="30" rows="5">{{ $comment->content }}</textarea>
            <input type="submit" value="저장" class="btn btn-primary btn-sm m-3">
        </form>
        <div style="margin-bottom: 20px;">
            <a href="" class="btn btn-primary btn-sm btn-modify">수정</a>
            <a href="{{ route('comments.destroy', ['comment' => $comment->id] ) }}" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-comment-{{ $loop->index }}').submit()">삭제</a>
            <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="POST" id="delete-comment-{{ $loop->index }}">
                @csrf
                @method('delete')
            </form>
        </div>
        @include('posts/comments/write', [
            'parent' => $parent
        ])
    </div>
</div>
@foreach ($comment->comments as $child)
    @include('posts/comments/comment', [
        'comment' => $child,
        'parent' => $child->id,
        'depth' => $loop->depth
    ])
@endforeach
