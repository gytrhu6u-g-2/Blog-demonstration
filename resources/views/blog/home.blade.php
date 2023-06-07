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
                <div class="succecc_msg-container">
                    <div class="success_msg-validation">
                        <p class="success_msg">{{ session('success_msg') }}</p>
                    </div>
                </div>
            @endif
        <div class="position-table">
            <table class="show-blogTable">
                <tr>
                    <th>id</th>
                    <th>タイトル</th>
                    <th>更新日</th>
                    <th class="btn-table"></th>
                    <th class="btn-table"></th>
                </tr>
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td><a href="/comment/{{ $blog->id }}">{{ $blog->title }}</a></td>
                    <td>{{ $blog->updated_at }}</td>
                    <td><button  class="btn editBtn" onclick="onClickEdit('{{ route('showEdit', ['id' => $blog->id]) }}')">編集</button></td>
                    <form method="POST" action="/delete/{{ $blog->id }}">
                        @csrf
                        <input type="hidden" >
                        <td><button type="submit" class="btn deleteBtn" onclick="return onClickDelete('{{ route('delete', ['id'=>$blog->id]) }}')">削除</button></td>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    </form>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    
    <script>
        // 追加ボタンモーダル表示
        function onClickAdd (){
            var res = confirm("追加画面へ移動しますか？");
            if( res == true ) {
                window.location='{{ route('showAdd') }}';
            }
            else {
                return false;
            }
        }
        // 編集ボタンモーダル表示
        function onClickEdit (url){
            var res = confirm("編集画面へ移動しますか？");
            if( res == true ) {
                window.location.href = url;
            }
            else {
                return false;
            }
        }
         // 削除ボタンモーダル表示
         function onClickDelete(url){
            var res = confirm('aaを削除しますか？');
            if (res == true) {
                window.location.href = url;
            }else {
                return false;
            }
        }
    </script>
</body>

</html>