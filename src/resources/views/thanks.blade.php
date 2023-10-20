@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks_items">
    <p class="thanks_text">ご意見いただきありがとうございました。</p>
    <button class="thanks_button-submit" type="submit">トップページへ</button>
</div>
@endsection