@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="">대시보드</a>
                </li>
                <li class="list-group-item">
                    <a href="">게시글관리</a>
                </li>
                <li class="list-group-item">
                    <a href="">정보수정</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
