<div class="form-group">
    <label for="title">제목</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" aria-describedby="helpId" placeholder="" value="{{ $post->title }}">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="content">내용</label>
    <textarea class="form-control @error('content') is-invalid @enderror"" name="content" id="content" rows="3">{{ $post->content }}</textarea>
    @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary">저장</button>