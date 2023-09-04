<link rel="stylesheet" href="/css/detail.css">
@extends('adminlte::page')

@section('title', '商品詳細')

@section('content_header')
<h1>商品詳細</h1>
@stop

@section('content')

<div class="row">
    <div class="col-md-10">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card card-primary">
            <!-- <form action="/items/update" method="post" enctype="multipart/form-data"> -->

            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label class="control-label">タイトル</label>
                    <div class="col-sm-10">{{ $item->title }}</div>
                    <p>{{ $errors->first('title') }}</p>
                    <img src="data:image/png;base64,{{ $item->image }}" alt="image" style="width: 10%; height: 10%;">
                </div>
                <div class="form-group">
                    <label class="control-label">価格</label>
                    <div class="col-sm-10">{{ number_format($item->price) }}円</div>
                    <p>{{ $errors->first('price') }}</p>
                </div>
                <!-- <div>
                <input class="form-control" type="file" name="item_image" alt="" >
            </div> -->
                <div class="form-group">
                    <label class="control-label">カテゴリ</label>
                    <div class="col-sm-10">{{ $item->category }}</div>
                    <p>{{ $errors->first('type') }}</p>
                </div>
                <div class="form-group">
                    <label class="control-label">著者名</label>
                    <div class="col-sm-10">{{ $item->author }}</div>
                    <p>{{ $errors->first('author') }}</p>
                </div>
                <div class="form-group">
                    <label class="control-label">詳細</label>
                    <div class="col-sm-10">{{ $item->detail }}</div>
                    <!-- <textarea rows="3" class="form-control" name="detail" >{{ $item->detail }}</textarea> -->
                    <p>{{ $errors->first('detail') }}</p>
                </div>
                <table>
                    <item class="item-item">
                        <!-- <div class="item-title"><a href="{{ route('items.show', $item) }}">{{ $item->title }}</a></div>
                <div class="item-info">
                    {{ $item->created_at }}|{{ $item->user->name }}
                </div> -->
                        @auth
                        @if (auth()->user()->role === 1)
                        <div class="item-control">
                            @if (!Auth::user()->is_bookmark($item->id))
                            <form action="{{ route('bookmark.store', $item) }}" method="post">
                                @csrf
                                <button>お気に入り登録</button>
                            </form>
                            @else
                            <form action="{{ route('bookmark.destroy', $item) }}" method="post">
                                @csrf
                                @method('delete')
                                <button>お気に入り解除</button>
                            </form>
                            @endif
                        </div>
                        @endif
                        @endauth
                    </item>
                    @auth
                    @if (auth()->user()->role === 0)
                    <tr>
                        <td style="padding-left: 620px; padding-bottom: 15px; padding-top: 0px">
                            <a class="btn btn-outline-primary btn-sm" style=font-size: .900rem;
                                href="/items/edit/{{$item->id}}">編集</a>
                        </td>
                        <td style="padding-left: 26px;">
                            <form action="/items/delete/{{$item->id}}" method="post"
                                onclick="if(confirm('削除しますか？')){ return true;}else{ return false;}">
                                @csrf
                                <!-- ↑Laravelでformタグを書いたら必ず書く -->
                                <input class="delete-action btn btn-outline-danger btn-sm" style=font-size: .900rem;
                                    type="submit" value="削除">
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endauth
                </table>

                <div class="return-btn">
                    <button class="btn btn-secondary" onClick="history.back();">戻る</button>
                </div>
                <!-- <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary">
                        <input type="file" accept="image/jpeg,image/png" name="item_image"  class="uploadFile">
                    </span>
                </label>
                <input type="text" class="form-control" readonly="">
            </div>
            <input type="hidden" name="id" value="{{ $item->id }}"> -->
            </div>


        </div>
    </div>
</div>
<!--お名前-->
<!-- <div class="form-group row">
    <label class="col-sm-2 col-form-label">タイトル</label>
    <div class="col-sm-10">{{ $item->title }}</div>
</div> -->
<!--/お名前-->

@stop

@section('css')
@stop

@section('js')
@stop