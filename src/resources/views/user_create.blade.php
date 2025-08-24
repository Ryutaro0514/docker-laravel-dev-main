@extends('app')
@section('title')
    サインアップ画面
@endsection
@section('content')
    <form method="POST" action="{{route("user.store")}}">
        @csrf
        <input name="name" type="text" placeholder="名前">
        <input name="password" type="password" placeholder="パスワード">
        <button class="btn btn-primary">作成</button>
    </form>
@endsection