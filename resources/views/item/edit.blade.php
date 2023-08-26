<link rel="stylesheet" href="/css/edit.css">

@extends('adminlte::page')


@section('title', '商品編集')

@section('content_header')
<h1>商品編集</h1>
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
            <form action="/items/update" method="post" enctype="multipart/form-data">

                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label">タイトル</label>
                        <input class="form-control" type="text" name="title" value="{{ $item->title }}">
                        <p>{{ $errors->first('title') }}</p>
                    </div>
                    <div class=" form-group">
                        <label class="control-label">価格</label>
                        <input class="form-control" type="number" name="price" value="{{$item->price}}">
                        <p>{{ $errors->first('price') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">カテゴリ</label>
                        <select class="form-control" name="category">
                            <option value="文芸・評論" {{ $item->category == "文芸・評論" ? "selected" : null }}>文芸・評論</option>
                            <option value="人文・思想" {{ $item->category == "人文・思想" ? "selected" : null }}>人文・思想</option>
                            <option value="社会・政治" {{ $item->category == "社会・政治" ? "selected" : null }}>社会・政治</option>
                            <option value="ノンフィクション" {{ $item->category == "ノンフィクション" ? "selected" : null }}>ノンフィクション
                            </option>
                            <option value="歴史・地理" {{ $item->category == "歴史・地理" ? "selected" : null }}>歴史・地理</option>
                            <option value="ビジネス・経済" {{ $item->category == "ビジネス・経済" ? "selected" : null }}>ビジネス・経済
                            </option>
                            <option value="投資・金融・会社経営" {{ $item->category == "投資・金融・会社経営" ? "selected" : null }}>
                                投資・金融・会社経営</option>
                            <option value="科学・テクノロジー" {{ $item->category == "科学・テクノロジー" ? "selected" : null }}>科学・テクノロジー
                            </option>
                            <option value="医学・薬学・看護学・歯科学" {{ $item->category == "医学・薬学・看護学・歯科学" ? "selected" : null }}>
                                医学・薬学・看護学・歯科学</option>
                            <option value="コンピュータ・IT" {{ $item->category == "コンピュータ・IT" ? "selected" : null }}>コンピュータ・IT
                            </option>
                            <option value="アート・建築・デザイン" {{ $item->category == "アート・建築・デザイン" ? "selected" : null }}>
                                アート・建築・デザイン</option>
                            <option value="趣味・実用" {{ $item->category == "趣味・実用" ? "selected" : null }}>趣味・実用</option>
                            <option value="スポーツ・アウトドア" {{ $item->category == "スポーツ・アウトドア" ? "selected" : null }}>
                                スポーツ・アウトドア</option>
                            <option value="資格・検定・就職" {{ $item->category == "資格・検定・就職" ? "selected" : null }}>資格・検定・就職
                            </option>
                            <option value="暮らし・健康・子育て" {{ $item->category == "暮らし・健康・子育て" ? "selected" : null }}>
                                暮らし・健康・子育て</option>
                            <option value="旅行ガイド・マップ" {{ $item->category == "旅行ガイド・マップ" ? "selected" : null }}>旅行ガイド・マップ
                            </option>
                            <option value="語学・辞典・年鑑" {{ $item->category == "語学・辞典・年鑑" ? "selected" : null }}>語学・辞典・年鑑
                            </option>
                            <option value="絵本・児童書" {{ $item->category == "絵本・児童書" ? "selected" : null }}>絵本・児童書</option>
                            <option value="コミック" {{ $item->category == "コミック" ? "selected" : null }}>コミック</option>
                            <option value="新書・文庫・ノベルス" {{ $item->category == "新書・文庫・ノベルス" ? "selected" : null }}>
                                新書・文庫・ノベルス</option>
                            <option value="雑誌" {{ $item->category == "雑誌" ? "selected" : null }}>雑誌</option>
                        </select>
                        <p>{{ $errors->first('category') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">著者名</label>
                        <input class="form-control" type="text" name="author" value="{{$item->author}}">
                        <p>{{ $errors->first('author') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="control-label">詳細</label>
                        <textarea rows="4" class="form-control" name="detail">{{ $item->detail }}</textarea>
                        <p>{{ $errors->first('detail') }}</p>
                    </div>
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                                <input type="file" accept="image/jpeg,image/png" name="item_image" class="uploadFile">
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly="">
                        <img src="data:image/png;base64,{{ $item->image }}" alt="image"
                            style="width: 10%; height: 10%; margin-top: 10px; margin-right: 600px;">

                    </div>
                    <input type="hidden" name="id" value="{{ $item->id }}">
                </div>

                <div class="btn" style="text-align: left; margin-bottom: 30px; margin-left: 10px;">
                    <button class="btn btn-warning" type="submit">更新</button>
                    <button class="btn btn-secondary" onClick="history.back();" style="margin-left: 15px;">戻る</button>
                </div>

            </form>

        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop