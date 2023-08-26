<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/items_list.css">
</head>

<body class="body">

<div class ="container">
    <div class="row">
            <p class= home>
                <a href="/items/home">商品管理ホーム画面</a>
            </p>
    </div>
</div>
    <div class="main">
        <div class="top">
            <div class="panel-heading">
                <h1 class="list_title">商品一覧</h1>
            </div>
            <div class=add_btn>
                <a class="btn btn-warning" href="/items/create" role="button">新規商品登録</a>
            </div>
        </div>
            <div class="panel-body">
                <table class="table table-bordered">
        
                    <!-- テーブルヘッダ -->
                    <thead class="item">
                        <th>ID</th>
                        <th>カテゴリ</th>
                        <th>商品名</th>
                        <th class="item_img">商品画像</th>
                        <th>価格</th>
                        <th>詳細</th>
                        <th>編集</th>
                        <th>削除</th>
                    </thead>
        
                    <!-- テーブル本体 -->
                    <tbody>

                        @foreach ($items as $item)
                        <tr>
                            <!-- タスク名 -->
                            <td class="table-text">
                                <div>{{ $item->id }}</div>
                            </td>
                            <td class="table-text">
                                @php
                                    $type_array = [
                                        1 => "スキンケア",
                                        2 => "フレグランス",
                                        3 => "メイクアップ",
                                        4 => "その他"
                                    ];
                                @endphp
                                <div>{{ $type_array[$item->type] }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $item->name }}</div>
                            </td>
                            <td class="table-text">
                                <div><img src="data:image/png;base64,{{ $item->item_image }}" alt=""></div>
                            </td>
                            <td class="table-text">
                                <div>{{ $item->price }}</div>
                            </td>
                            <td class="table-text-detail">
                                <div>{{ $item->detail }}</div>
                            </td>
                            <td class="table-text">
                                    <a class="btn btn-outline-primary btn-sm" href="/item/edit/{{$item->id}}">編集</a></td>
                            </td>
                            <td class="table-text">
                            {{--<a href="/items/delete/{{$item->id}}" class="delete-action btn btn-outline-danger btn-sm" "javascript:void(0);" onclick="var yes=confirm('この商品を削除しますか？'); if (yes) alert('承知しました。削除します。'); return false;">削除</a>--}}
                            <a href="javascript:void(0);" class="delete-action btn btn-outline-danger btn-sm"  onclick="var yes=confirm('この商品を削除しますか？'); if (yes) {location.href='/items/delete/{{$item->id}}';} return false;">削除</a>
                            </td>
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>


</body>
</html>