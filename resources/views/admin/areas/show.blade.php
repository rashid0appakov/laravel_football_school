@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <h2>{{ $area->name }}</h2>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"></span><span class="sub-heading" id="user_edit_position"></span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <img src="/areas/{{ $area->image }}" style="width: 200px;" alt="">
                            <br><br>
                            <strong>Адрес:</strong>
                            <br>
                            {{ $area->address }}
                            <br>
                            <strong>Описание:</strong>
                            <br>
                            {{ $area->description }}
                            <br>
                            <strong>Email:</strong>
                            <br>
                            {{ $area->email }}
                            <br>
                            <strong>Размер:</strong>
                            <br>
                            {{ $area->size }}
                            <br>
                            <strong>Покрытие:</strong>
                            <br>
                            {{ $area->coating }}
                            <br>
                            <strong>Вместимость:</strong>
                            <br>
                            {{ $area->capacity }}
                            <br>
                            <strong>Стоимость аренды:</strong>
                            <br>
                            {{ $area->rent_price }}
                            <br>
                            <strong>Менеджер:</strong>
                            <br>
                            {{ $area->manager->name }}
                            <br>
                            <strong>Телефон:</strong>
                            <br>
                            {{ $area->phone }}
                            <br><br>
                            <a href="/admin/areas" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                Назад
                            </a>
                        </div>
                    </div>
                </div>
    </div>

@stop
