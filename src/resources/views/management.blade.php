@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/management.css') }}">
@endsection

@section('content')
<div class="management_content">
    <div class="management_title">管理システム</div>
    <div class="search-form_container">
        <form class="search-form" action="/managements/search" method="get">
            @csrf
            <div class="search-form_wrapper">
                <div class="search-form_inner">
                    <label class="search-form_item">
                        お名前
                        <input class="search-form_item-input" type="text" name="fullname" >
                    </label>
                    <label class="search-form_item">
                        性別
                        <input class="search-form_item-input search-form_item-radio" type="radio" name="gender">全て
                        <input class="search-form_item-input search-form_item-radio" type="radio" name="gender">男性
                        <input class="search-form_item-input search-form_item-radio" type="radio" name="gender">女性
                    </label>
                </div>
                <div class="search-form_inner">
                    <label class="search-form_item">
                        登録日
                        <input class="search-form_item-input" type="timestamp" name="from_time">-
                        <input class="search-form_item-input" type="timestamp" name="to_time">
                    </label>
                </div>
                <div class="search-form_inner">
                    <label class="search-form_item">
                        メールアドレス
                        <input class="search-form_item-input" type="email" name="email">
                    </label>
                </div>
            </div>
            <div class="search-form_button">
                <button class="search-form_button-submit" type="submit">検索</button>
            </div>
            <div class="search-form_reset">
                <a class="search-form_reset_link" href="">リセット</a>
            </div>
        </form>
    </div>
    <div class="result_container">
        <div class="result_page">
            <div class="result_page-number">
                全<!-- 取得件数 -->件中  <!-- 表示件数 -->~<!-- 表示件数 -->件
            </div>
            <div class="result_page-switching">
            </div>
        </div>
        <form class="result_table-form" action="/managements/delete" method="post">
            @method('DELETE')
            @csrf
        <table class="result_table">
            <tr class="table-row">
                <th class="table-header">ID</th>
                <th class="table-header">お名前</th>
                <th class="table-header">性別</th>
                <th class="table-header">メールアドレス</th>
                <th class="table-header">ご意見</th>
                <th class="table-header"></th>
            </tr>
            @foreach($contacts as $contact)
            <tr class="table-row">
                <td class="table-data">
                    {{$contact['id'] }}
                </td>
                <td class="table-data">
                    {{ $contact['fullname'] }}
                </td>
                <td class="table-data">
                    {{ $contact['gender'] }}
                </td>
                <td class="table-data">
                    {{ $contact['email'] }}
                </td>
                <td class="table-data">
                    {{ $contact['opinion'] }}
                </td>
                <td class="table-data">
                    <div class="result-table_button">
                        <input type="hidden" name="id" value="{{$contact['id']}}">
                        <button class="result-table_button-submit">削除</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        </form>
    </div>
</div>
@endsection