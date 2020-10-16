@extends('layouts.admin')

@section('admin_content')
<form>
    {{-- @csrf
    @method('delete') --}}
    {{-- <input type="submit" value="submit"> --}}
    <div class="form-row mb-3">
        <div class="form-gorup col-2">
            <select class="form-control form-control-sm" name="action" id="action">
                <option>행동</option>
                <option value="delete">삭제</option>
            </select>
        </div>
        <div class="col">
            <a href="{{ route('admin.destroy') }}" class="btn btn-sm btn-primary" onclick="delete_posts(event)">적용</a>
            <script defer>
                var delete_posts;

                window.addEventListener('load', function(){
                    delete_posts = function(e){
                        if(!confirm('선택항목을 정말로 삭제하시겠습니까 ?')){
                            return false;
                        }
                        e.preventDefault();
                        var data = $("form").serialize();
                        $.ajax({
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('admin.destroy') }}",
                            data : data,
                            type : 'DELETE',
                            dataType : 'json',
                        }).done(function(data){
                            if(data.result == 'ok'){
                                location.reload();
                            }
                        });
                    }
                });
            </script>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>선택</th>
                <th>제목</th>
                <th>날짜</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td scope="row">
                    <input type="checkbox" name="post[{{ $post->id }}]">
                </td>
                <td>
                    <a href="{{ route('admin.edit', $post->id) }}">
                        {{ $post->title }}
                    </a>
                </td>
                <td>{{ $post->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</form>
<div class="justify-content-center">
    {{ $posts->links() }}
</div>
@endsection
