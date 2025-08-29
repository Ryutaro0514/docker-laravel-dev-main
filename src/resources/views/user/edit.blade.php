@extends('app')
@section('title')
    編集画面
@endsection
@section('content')
    <form method="POST" action="{{route("user.update",$task->id)}}">
        @csrf
        @method("patch")
        <input name="title" type="text" placeholder="タイトル" value="{{$task->title}}">
        <input name="description" type="text" placeholder="説明文" value="{{$task->description}}">
        <input name="completed" type="number" max="1" min="0" value="{{$task->completed}}">
        <button class="btn btn-primary">作成</button>
    </form>
    @if ($errors->any())
        <p class="text-danger">{{$errors->first()}}</p>
    @endif
@endsection