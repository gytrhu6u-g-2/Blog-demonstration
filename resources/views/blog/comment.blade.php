<!DOCTYPE html>
<html lang="js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/ress@4.0.0/dist/ress.min.css">
    <title>コメント閲覧画面</title>
</head>
<body>
    <div class="container">
        <div class="position-addBtn">
            <button type="button" class="btn backBtn" onclick="location.href='{{ route('home') }}'">戻る</button>
        </div>
        @if (session('err_msg'))
            <p>{{ session('err_msg') }}</p>
        @endif
        <div class="position-table">
            <table class="show-blogTable">
                <tr>
                    <th>id</th>
                    <th>タイトル</th>
                    <th>コメント</th>
                </tr>
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->comment }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>