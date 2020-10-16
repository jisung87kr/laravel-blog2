@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            @include('posts/includes/write')
        </form>
    </div>
@endsection