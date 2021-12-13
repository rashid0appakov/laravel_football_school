@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <h2>{{ $club->name }}</h2>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"></span><span class="sub-heading" id="user_edit_position"></span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <img src="/clubs/{{ $club->image }}" style="width: 200px;" alt="">
                            <br><br>
                            <strong>Описание:</strong>
                            <br>
                            {{ $club->description }}
                            <br>
                            <strong>Менеджер:</strong>
                            <br>
                            {{ $club->manager->name }} {{ $club->manager->surname }}
                            <br>
                            <strong>Площадка:</strong>
                            <br>
                            {{ $club->area->name }}
                            <br>
                            <strong>Заголовок первого блока:</strong>
                            <br>
                            {{ $club->title1 }}
                            <br>
                            <strong>Текст первого блока:</strong>
                            <br>
                            {{ $club->textarea1 }}
                            <br>
                            <strong>Текст второго блока:</strong>
                            <br>
                            {{ $club->textarea12 }}
                            <br>
                            <strong>Заголовок третьего блока:</strong>
                            <br>
                            {{ $club->month }}
                            <br>
                            <strong>Текст третьего блока:</strong>
                            <br>
                            {{ $club->textarea2 }}
                            <br>
                            <strong>Ссылка на видео в видеохостинге Yotube.com:</strong>
                            <br>
                            {{ $club->title2 }}
                            <br><br>
                            <a href="/admin/clubs" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                Назад
                            </a>
                        </div>
                    </div>
                </div>
    </div>

@stop
