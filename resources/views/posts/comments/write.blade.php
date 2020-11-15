<form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
    @csrf
    <input type="hidden" name="parent" value="{{ $parent }}">
    <div class="form-group">
        <textarea class="form-control" name="content" id="" rows="3"></textarea>
    </div>
    <input type="submit" value="댓글등록" class="btn btn-primary">
</form>