@extends("app")
@section('title')
    user一覧画面
@endsection

@section('content')
<a href="{{route("user.create")}}" class="btn btn-primary">新規作成</a>
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
                    {{$item->title}}
                </td>
                <td>
                    {{$item->description}}
                </td>
                <td>
                    <a href=""><button class="btn btn-success">編集</button></a>
                </td>
                <td>
                    <form action="{{route("user.destroy",$item->id)}}" method="post">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger">消去</button>
                    </form>
                </td>
                <td>
                    <button class="btn">{{$item->completed?"完了":"未完了"}}</button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection