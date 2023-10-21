@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-form_container">
    <div class="confirm-form_title">内容確認</div>
    <form class="confirm-form" action="/contacts" method="post">
        @csrf
        <table class="confirm-form_table">
            @foreach{{$contacts as $contact}}
            <tr class="table-row">
                <th class="table-header">お名前</th>
                <td class="table-data">
                    <input type="text" name="fullname" value="{{$contact['fullname']}}" readonly>
                    {{$contact['fullname']}}
                </td>
            </tr>
            <tr class="table-row">
                <th class="table-header">性別</th>
                <td class="table-data">
                    <input type="radio" name="gender" value="{{$contact['gender']}}" readonly>
                    {{$contact['gender']}}
                </td>
            </tr>
            <tr class="table-row">
                <th class="table-header">メールアドレス</th>
                <td class="table-data">
                    <input type="email" name="email" value="{{$contact['email']}}" readonly>
                    {{$contact['email']}}
                </td>
            </tr>
            <tr class="table-row">
                <th class="table-header">郵便番号</th>
                <td class="table-data">
                    <input type="text" name="postcode" value="{{$contact['postcode']}}" readonly>
                    {{$contact['postcode']}}
                </td>
            </tr>
            <tr class="table-row">
                <th class="table-header">住所</th>
                <td class="table-data">
                    <input type="text" name="address" value="{{$contact['address']}}" readonly>
                    {{$contact['address']}}
                </td>
            </tr>
            <tr class="table-row">
                <th class="table-header">建物名</th>
                <td class="table-data">
                    <input type="text" name="building_name" value="{{$contact['building_name']}}" readonly>
                    {{$contact['building_name']}}
                </td>
            </tr>
            <tr class="table-row">
                <th class="table-header">ご意見</th>
                <td class="table-data">
                    <input type="textarea" name="opinion" value="{{$contact['opinion']}}" readonly>
                    {{$contact['opinion']}}
                </td>
            </tr>
            @endforeach
        </table>
        <div class="confirm-form_button">
            <button class="confirm-form_button-submit" type="submit">送信</button>
        </div>
    </form>
    <div class="confirm-return">
        <a class="confirm-return_link" href="/">修正する</a>
    </div>
</div>
@endsection