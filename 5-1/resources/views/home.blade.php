@extends('layouts.app')

@section('content')

<script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    
                    <div class="title">
                        {{ __('Mutter') }}
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-content">
                        <div class="form">
                            <div class="title">
                                ホーム
                            </div>
                            <div class="form-body">
                                <input type="text" name="body" placeholder="いまどうしてる ?"/>
                                <button type="button" class="add">
                                    つぶやく
                                </button>
                            </div>
                        </div>

                        <div class="article-list">
                            @foreach($articles as $article)
                                <div class="article-item">
                                    <div class="article-header">
                                        <B>{{ $article->user->name}}</B>
                                        <span> {{ $article->updated_at}}</span>
                                    </div>
                                    <div class="article-content">
                                        <span>{{ $article->body}}</span>
                                        @if (Auth::id() === $article->user_id)
                                            <B class="remove" id="{{ $article->id }}"> 削除</B>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.remove').click(function(e){
            var _token = $('input[name="_token"]').val();
            var id = $(this).attr('id');

            $.ajax({
                type: 'DELETE',
                data: {
                    'id': id,
                    '_token': _token
                },
                url: '/article',
                success: function(res){
                    location.reload();
                }
            });
        });

        $('.add').click(function(e){
            var _token = $('input[name="_token"]').val();
            var body = $('input[name="body"]').val();

            if(body.length == 0 || body.length > 255){
                alert('テキストは正しく入れてください。');
                return;
            }

            $.ajax({
                type: 'POST',
                data: {
                    'body': body,
                    '_token': _token
                },
                url: '/article',
                success: function(res){
                    location.reload();
                }
            });

        });
    </script>
</div>
@endsection
