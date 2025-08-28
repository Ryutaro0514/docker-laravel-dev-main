@extends('app')
@section('title')
    新規登録画面
@endsection
@section('content')
    <form method="POST" action="{{route("user.store")}}">
        @csrf
        <input name="title" type="text" placeholder="タイトル">
        <input name="description" type="text" placeholder="説明文">
        <button class="btn btn-primary">作成</button>
    </form>
    @if ($errors->any())
        <p class="text-danger">{{$errors->first()}}</p>
    @endif
@endsection