@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
<h1>商品一覧</h1>
@stop


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <!-- <h3 class="card-title">商品一覧</h3> -->
                <div>
                    <form action="{{ url('/items/search') }}" method="GET">
                        <input type="text" name="keyword" value="{{$keyword}}" placeholder="タイトル/著者名">
                        <input type="submit" value="検索">
                    </form>
                </div>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        @auth
                        @if (auth()->user()->role === 0)
                        <div class="input-group-append">
                            <a href="{{ url('items/add') }}" class="btn btn-warning" style="font-size: 1.0rem;">商品登録</a>
                        </div>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th class="id">ID</th>
                            <th class="title">タイトル</th>
                            <th class="item_img">商品画像</th>
                            <th class="price">価格</th>
                            <th class="category">カテゴリ</th>
                            <th class="author">著者名</th>
                            <!-- <th class="detail">詳細</th> -->
                            <th class="detail2">詳細</th>
                            @auth
                            @if (auth()->user()->role === 0)
                            <th class="edit">編集</th>
                            <th class="delete">削除</th>
                            @endif
                            @endauth

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td><img src="data:image/png;base64,{{ $item->image }}" alt="image"
                                    style="width: 50%; height: auto;"></td>
                            <td>{{ number_format($item->price) }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->author }}</td>
                            <!-- <td><div class="table-hover">{{ $item->detail }}</div></td> -->
                            <td><a href="/items/detail/{{$item->id}}"><button type="submit"
                                        class="btn btn-outline-success"
                                        style="font-size: 14px; padding-top: 4px; padding-bottom: 4px; padding-left: 8px; padding-right: 8px;">詳細</button></a>
                            </td>
                            @auth
                            @if (auth()->user()->role === 0)
                            <td style="padding-left: 4px; padding-right: 20px;"><a
                                    class="btn btn-outline-primary btn-sm" style="font-size: 14px;"
                                    href="/items/edit/{{$item->id}}">編集</a></td>
                            <td>
                                <form action="/items/delete/{{$item->id}}" method="post"
                                    onclick="if(confirm('削除しますか？')){ return true;}else{ return false;}">
                                    @csrf
                                    <!-- ↑Laravelでformタグを書いたら必ず書く -->
                                    <input class="delete-action btn btn-outline-danger btn-sm" style="font-size: 14px;"
                                        type="submit" value="削除">
                                </form>
                                @endif
                                @endauth
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{!! $items->links() !!}
@stop

@section('css')
<link href="{{asset('/css/items_list.css')}}" rel="stylesheet">
@stop

@section('js')
@stop