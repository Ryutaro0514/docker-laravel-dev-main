@extends('app')
@section('title')
    一覧画面
@endsection

@section('content')
    <h1>一覧画面</h1>
    <a href="{{ route('user.create') }}" class="btn btn-primary">新規作成</a>
    <a href="{{ route('user.signout') }}" class="btn btn-danger">ログアウト</a>
    <table class="table">
        <tr>
            <th>
                タイトル
            </th>
            <th>
                説明文
            </th>
            <th>

            </th>
            <th>

            </th>
            <th>

            </th>
        </tr>
        @foreach ($tasks as $item)
            <tr>
                <td>
                    {{ $item->title }}
                </td>
                <td>
                    {{ $item->description }}
                </td>
                <td>
                    <a href="{{ route('user.edit', $item->id) }}"><button class="btn btn-success">編集</button></a>
                </td>
                <td>
                    <form action="{{ route('user.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">削除</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('user.complete', $item->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <button class="btn">{{ $item->completed ? '完了' : '未完了' }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
