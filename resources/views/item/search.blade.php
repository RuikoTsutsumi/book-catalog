@extends('adminlte::page')

@section('title', '商品検索')

@section('content_header')
    <h1>商品検索</h1>
@stop

@section('content')
@stop

<form method="GET" action="{{ route('items') }}">
    <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('items') }}" class="text-white">
                クリア
            </a>
        </button>
    </div>
</form>

@section('css')
@stop

@section('js')
@stop