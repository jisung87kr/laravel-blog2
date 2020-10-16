@extends('layouts.admin')

@section('admin_content')
<form action="{{ route('admin.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('posts/includes/write')
    <a href="{{ route('admin.posts') }}" class="btn btn-secondary">목록</a>
</form>
@endsection
