@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="create-form_container">
    <div class="create-form_title">お問い合わせ</div>
    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
    @if (count($errors) > 0)
    @endif
    <form class="h-adr create-form" action="/contacts/confirm" method="post">
        @csrf
        <span class="p-country-name" style="display:none;">Japan</span>
        <table class="create-form_table">
            <tr class="table-row">
                <th class="table-header">お名前</th>
                <td class="table-data">
                    <label class="table-data_item">
                        <input class="table-data_item-input table-data_item-name"  type="name" name="fullname[][last_name]" value="{{ old('last_name') }}">
                    </label>
                    <label class="table-data_item">
                        <input class="table-data_item-input table-data_item-name" type="name" name="fullname[][first_name]" value="{{ old('first_name') }}">
                    </label>
                </td>
            </tr>
            @if ($errors->has('fullname'))
            <tr class="table-row">
                <th class="table-header"></th>
                <td class="table-data table-error">
                    {{ $errors->first('fullname') }}
                </td>
            </tr>
            @endif
            <tr class="table-row">
                <th class="table-header">性別</th>
                <td class="table-data">
                    <label class="table-data_item">
                        <input class="table-data_item-input table-data_item-radio" type="radio" name="gender[][1][男性]" value="{{ old('1') }}" checked>男性
                    </label>
                    <label class="table-data_item">
                        <input class="table-data_item-input table-data_item-radio" type="radio" name="gender[][2][女性]" value="{{ old('2') }}">女性
                    </label>
                </td>
            </tr>
            @if ($errors->has('gender'))
            <tr class="table-row">
                <th class="table-header"></th>
                <td class="table-data table-error">
                    {{$errors->first('gender')}}
                </td>
            </tr>
            @endif
            <tr class="table-row">
                <th class="table-header">メールアドレス</th>
                <td class="table-data">
                    <label class="table-data_item">
                        <input class="table-data_item-input" type="email" name="email" value="{{ old('email') }}">
                    </label>
                </td>
            </tr>
            @if($errors->has('email'))
            <tr class="table-row">
                <th class="table-header"></th>
                <td class="table-data table-error">
                    {{$errors->first('email')}}
                </td>
            </tr>
            @endif
            <tr class="table-row">
                <th class="table-header">郵便番号</th>
                <td class="table-data">
                    <label class="table-data_item">
                        〒<input type="text" name="postcode" class="p-postal-code table-data_item-input" size="8" maxlength="8" value="{{ old('postcode') }}"><br>
                    </label>
                </td>
            </tr>
            @if($errors->has('postcode'))
            <tr class="table-row">
                <th class="table-header"></th>
                <td class="table-data table-error">
                    {{$errors->first('postcode')}}
                </td>
            </tr>
            @endif
            <tr class="table-row">
                <th class="table-header">住所</th>
                <td class="table-data">
                    <label class="table-data_item">
                        <input type="text" name="address" class="p-region p-locality p-street-address p-extended-address table-data_item-input" value="{{ old('address') }}" /><br>
                    </label>
                </td>
            </tr>
            @if($errors->has('address'))
            <tr class="table-row">
                <th class="table-header"></th>
                <td class="table-data table-error">
                    {{$errors->first('address')}}
                </td>
            </tr>
            @endif
            <tr class="table-row">
                <th class="table-header">建物名</th>
                <td class="table-data">
                    <label class="table-data_item">
                        <input class="table-data_item-input" type="text" name="building_name" value="{{ old('building_name') }}">
                    </label>
                </td>
            </tr>
            @if($errors->has('building_name'))
            <tr class="table-row">
                <th class="table-header"></th>
                <td class="table-data table-error">
                    {{$errors->first('building_name')}}
                </td>
            </tr>
            @endif
            <tr class="table-row">
                <th class="table-header">ご意見</th>
                <td class="table-data">
                    <label class="table-data_item">
                        <input class="table-data_item-input" type="textarea" name="opinion" value="{{ old('opinion') }}">
                    </label>
                </td>
            </tr>
            @if($errors->has('opinion'))
            <tr class="table-row">
                <th class="table-header"></th>
                <td class="table-data table-error">
                    {{$errors->first('opinion')}}
                </td>
            </tr>
            @endif
        </table>
        <div class="create-form_button">
            <button class="create-form_button-submit" type="submit">確認</button>
        </div>
    </form>
</div>
@endsection