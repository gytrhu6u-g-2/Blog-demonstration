<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ブログ一覧画面</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/ress@4.0.0/dist/ress.min.css">
</head>

<body>
    <div class="container">
        <div class="position-addBtn">
            <button type="button" class="btn addBtn" onclick="onClickAdd();">追加</button>
        </div>
        @if (session('success_msg'))
            <p>{{ session('success_msg') }}</p>
        @endif
        <div class="position-table">
            <table class="show-blogTable">
                <tr>
                    <th>id</th>
                    <th>タイトル</th>
                    <th>作成日</th>
                    <th class="btn-table"></th>
                    <th class="btn-table"></th>
                </tr>
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td><a href="">{{ $blog->title }}</a></td>
                    <td>{{ $blog->created_at }}</td>
                    <td><button class="btn editBtn">編集</button></td>
                    <td><button class="btn deleteBtn">削除</button></td>
                </tr>
                @endforeach
            </table>
        </div>
        <div></div>
    </div>
    
    <script>
        function onClickAdd (){
            var res = confirm("追加画面へ移動しますか？");
            if( res == true ) {
                window.location='{{ route('showAdd') }}';
            }
            else {
                return false;
            }
        }
    </script>
</body>

</html>