@extends('layouts.site')

@section('content')
<div class="no-page-block">
    <div class="login-img-wrp">
        <img src="/img/404.svg" alt="computer" class="login-img img-fluid">
    </div>
    <span class="sm-title text-center training-title">Упс, страница не найдена</span>
    <p class="no-page-text text-center">Возможно, она была удалена или её никогда не существовало. Приносим
        извинения
        за неудобства. Позвольте предложить вам пробную тренировку.</p>
    <button class="main-btn button sign-up-btn" data-bs-toggle="modal" data-bs-target="#signupModal">Пробная
        тренировка</button>
    <a href="{{route('home')}}" class="trainers-link news-link no-page">На главную страницу</a>
</div>
@stop