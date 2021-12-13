@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <h2>{{ $trainer->name }} {{ $trainer->surname }} {{ $trainer->patronymic }}</h2>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"></span><span class="sub-heading" id="user_edit_position"></span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            <img src="/trainers/{{ $trainer->image }}" style="width: 200px;" alt="">
                            <br><br>
                            <strong>Пол:</strong>
                            <br>
                            {{ $trainer->gender }}
                            <br>
                            <strong>Возраст:</strong>
                            <br>
                            {{ $trainer->birthday }}
                            <br>
                            <strong>Телефон:</strong>
                            <br>
                            {{ $trainer->phone }}
                            <br>
                            <strong>Адрес:</strong>
                            <br>
                            {{ $trainer->address }}
                            <br>
                            <strong>facebook:</strong>
                            <br>
                            {{ $trainer->facebook }}
                            <br>
                            <strong>vk:</strong>
                            <br>
                            {{ $trainer->vk }}
                            <br>
                            <strong>instagram:</strong>
                            <br>
                            {{ $trainer->instagram }}
                            <br>
                            <strong>Образование:</strong>
                            <br>
                            {{ $trainer->education }}
                            <br>
                            <strong>Лицензия:</strong>
                            <br>
                            {{ $trainer->license }}
                            <br>
                            <strong>Размер одежды:</strong>
                            <br>
                            {{ $trainer->clothing_size }}
                            <br>
                            <strong>Опыт:</strong>
                            <br>
                            {{ $trainer->experience }}
                            <br>
                            <strong>Холост/Женат:</strong>
                            <br>
                            {{ $trainer->family_status }}
                            <br>
                            <strong>Дети:</strong>
                            <br>
                            {{ $trainer->children }}
                            <br>
                            <strong>Карьера:</strong>
                            <br>
                            {{ $trainer->career }}
                            <br><br>
                            <a href="/admin/trainers" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                Назад
                            </a>
                        </div>
                    </div>
                </div>
    </div>

@stop
