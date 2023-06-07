<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/ress@4.0.0/dist/ress.min.css">
    <title>追加画面</title>
</head>

<body>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="err_msg-container">
                            <div class="err_msg-validation">
                                <li class="err_msg">{{ $error }}</li>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container-inner">
            <form method="POST" action="{{ route('store') }}">
                @csrf
                    <div class="space">
                        <span class="title-text-position">タイトル</span>
                        <input class="title-text" type="text" name="title">
                    </div>
                    <div class="space">
                        <span class="comment-position">コメント</span>
                        <textarea class="comment" name="comment"></textarea>
                    </div>
                <div class="btn-position">
                    <button type="submit" class="btn addBtn" onclick="return onClickAdd();">追加</button>
                    <button type="button" class="btn backBtn" onclick="location.href='{{ route('home') }}'">戻る</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            </form>
        </div>
    </div>
    <script>
        function onClickAdd (){
            var res = confirm("追加します。よろしいですか？");
            if( res == true ) {
                return true;
            }
            return false;
        }
    </script>
</body>

</html>