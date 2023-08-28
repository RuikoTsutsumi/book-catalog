<link rel="stylesheet" href="/css/add.css">
@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
<h1>商品登録</h1>
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
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">タイトル<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            id="title" name="title" placeholder="タイトル" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="name">商品画像</label>
                        <span class="btn btn-primary">
                            <input type="file" name="image" class="uploadFile">
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="price">価格<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                            id="price" name="price" placeholder="価格" value="{{ old('price')}}" oninput="javascript:if(this.value.length > this.maxLength)
                        this.value = this.value.slice(0, this.maxLength);" maxlength="7" min="1" max="9999999">
                    </div>
                    <div class="form-group">
                        <label for="type">カテゴリ</label>
                        <!-- <input type="text" class="form-control" id="category" name="category" placeholder="カテゴリ"> -->
                        <select class="form-control" name="category">
                            <option value="文芸・評論" @if(old('category')=='文芸・評論' )selected @endif>文芸・評論</option>
                            <option value="人文・思想" @if(old('category')=='人文・思想' )selected @endif>人文・思想 </option>
                            <option value="社会・政治" @if(old('category')=='社会・政治' )selected @endif>社会・政治</option>
                            <option value="ノンフィクション" @if(old('category')=='ノンフィクション' )selected @endif>ノンフィクション
                            </option>
                            <option value="歴史・地理" @if(old('category')=='歴史・地理' )selected @endif>歴史・地理</option>
                            <option value="ビジネス・経済" @if(old('category')=='ビジネス・経済' )selected @endif>ビジネス・経済</option>
                            <option value="投資・金融・会社経営" @if(old('category')=='投資・金融・会社経営' )selected @endif>投資・金融・会社経営
                            </option>
                            <option value="科学・テクノロジー" @if(old('category')=='科学・テクノロジー' )selected @endif>科学・テクノロジー
                            </option>
                            <option value="医学・薬学・看護学・歯科学" @if(old('category')=='医学・薬学・看護学・歯科学' )selected @endif>
                                医学・薬学・看護学・歯科学</option>
                            <option value="コンピュータ・IT" @if(old('category')=='コンピュータ・IT' )selected @endif>コンピュータ・IT
                            </option>
                            <option value="アート・建築・デザイン" @if(old('category')=='アート・建築・デザイン' )selected @endif>
                                アート・建築・デザイン
                            </option>
                            <option value="趣味・実用" @if(old('category')=='趣味・実用' )selected @endif>趣味・実用</option>
                            <option value="スポーツ・アウトドア" @if(old('category')=='スポーツ・アウトドア' )selected @endif>スポーツ・アウトドア
                            </option>
                            <option value="資格・検定・就職" @if(old('category')=='資格・検定・就職' )selected @endif>資格・検定・就職
                            </option>
                            <option value="暮らし・健康・子育て" @if(old('category')=='暮らし・健康・子育て' )selected @endif>暮らし・健康・子育て
                            </option>
                            <option value="旅行ガイド・マップ" @if(old('category')=='旅行ガイド・マップ' )selected @endif>旅行ガイド・マップ
                            </option>
                            <option value="語学・辞典・年鑑" @if(old('category')=='語学・辞典・年鑑' )selected @endif>語学・辞典・年鑑
                            </option>
                            <option value="絵本・児童書" @if(old('category')=='絵本・児童書' )selected @endif>絵本・児童書</option>
                            <option value="コミック" @if(old('category')=='コミック' )selected @endif>コミック</option>
                            <option value="新書・文庫・ノベルス" @if(old('category')=='新書・文庫・ノベルス' )selected @endif>新書・文庫・ノベルス
                            </option>
                            <option value="雑誌" @if(old('category')=='雑誌' )selected @endif>雑誌</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="author">著者名<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}"
                            id="author" name="author" placeholder="著者名" value="{{ old('author')}}">
                    </div>


                    <div class="form-group">
                        <label for="detail">詳細<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <textarea type="text" rows="4" name="detail" class="form-control"
                            id="detail">{{ old('detail') }}</textarea>
                        <!-- <input type="text" class="form-control{{ $errors->has('detail') ? 'is-invalid' : '' }}" id="detail" name="detail" placeholder="詳細説明" value="{{ old('detail')}}" style="width:100%; height:100px;"> -->
                        <!-- <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明"> -->
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-warning btn-lg">登録</button>
                    <a class="btn btn-secondary" href="https://book-catalog-91d5bc3f8f04.herokuapp.com/items"
                        style="margin-top: 2px; margin-left: 30px;">戻る</a>

                    <!-- <button class="btn btn-secondary" style="margin-left: 20px;" onClick="location.href='http://127.0.0.1:8000/items'">戻る</button> -->
                </div>
                <!-- <div class="return-btn>
                    <button class="btn btn-secondary" onClick="history.back();">戻る</button>
                    </div> -->
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')
@stop