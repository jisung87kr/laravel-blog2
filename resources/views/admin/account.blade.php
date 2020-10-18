@extends('layouts.admin')

@section('admin_content')
<form action="{{ route('admin.account_update') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="email">이메일</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $user->email }}">
    </div>
    <div class="form-group">
        <label for="name">이름</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $user->name }}">
    </div>
    
    <div class="form-group">
        <label for="password">패스워드</label>
        <div class="input-group flex-nowrap">
            <input type="text" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $user->password }}" disabled>
            <div class="input-group-append">
                <a href="{{ route('password.update') }}" class="input-group-text">변경</a>
            </div>
        </div>
    </div>
    <input type="submit" value="저장" class="btn btn-primary">
</form>
@endsection
