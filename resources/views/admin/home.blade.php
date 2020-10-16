@extends('layouts.admin')

@section('admin_content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

{{ __('You are logged in') }}
@endsection
