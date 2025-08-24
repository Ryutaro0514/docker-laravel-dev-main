@extends('app')
@section('title')
    サインイン画面
@endsection
@section('content')
<h1>サインイン画面</h1>
    <form method="POST" action="{{route("user.check")}}">
        @csrf
        <input name="name" type="text" placeholder="名前">
        <input name="password" type="password" placeholder="パスワード">
        <button class="btn btn-primary">サインイン</button>
        @if (session("message"))
            <div class="alert alert-danger">{{session("message")}}</div>
        @endif

    </form>
@endsection