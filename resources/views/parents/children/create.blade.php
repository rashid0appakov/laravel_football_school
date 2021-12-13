@extends('parents.layouts.app')

@section('content')

    <div id="page_content_inner">
        <form action="/parents/children" class="uk-form-stacked" id="trainer_create_form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="/altair/assets/img/avatars/user.png" alt="user avatar"/>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="image" id="image">
                                        </span>
                                    <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                </div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"></span><span class="sub-heading" id="user_edit_position"></span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            @foreach ($errors->all() as $error)
                                <div class="uk-alert uk-alert-danger" data-uk-alert>
                                    <a href="#" class="uk-alert-close uk-close"></a>
                                    {{ $error }}
                                </div>
                            @endforeach
                            <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                                <li class="uk-active"><a href="#">Данные ребенка</a></li>
                            </ul>
                            <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <div class="uk-margin-top">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3">
                                                <label for="user_edit_uname_control">Имя</label>
                                                <input value="{{old('name')}}" class="md-input" type="text" id="name" name="name" required/>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <label for="user_edit_position_control">Фамилия</label>
                                                <input class="md-input" value="{{old('surname')}}" type="text" id="surname" name="surname" required />
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <label for="user_edit_position_control">Отчество</label>
                                                <input class="md-input" value="{{old('patronymic')}}" type="text" id="patronymic" name="patronymic" required />
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-4">
                                                <label for="user_edit_uname_control">Пол</label>
                                                <select data-md-selectize name="gender">
                                                    <option value="">Выбрать...</option>
                                                    <option value="Мужской">Мужской</option>
                                                    <option value="Женский">Женский</option>
                                                </select>
                                            </div>
                                            <div class="uk-width-medium-1-4">
                                                <label for="user_edit_position_control">Дата рождения</label>
                                                <input name="birthday" id="birthday" value="{{ old('birthday', now()) }}" />
                                            </div>
                                            <div class="uk-width-medium-1-4" style="margin-top: 20px;">
                                                <label for="user_edit_position_control">Возраст</label>
                                                <input class="md-input" disabled value="{{\Carbon\Carbon::parse(old('birthday', now()))->age}}" type="text" id="age" />
                                            </div>
                                            <div class="uk-width-medium-1-4">
                                                <label for="user_edit_uname_control">Клуб</label>
                                                <select data-md-selectize name="club_id">
                                                    <option value="">Выбрать...</option>
                                                    @foreach($clubs as $club)
                                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Сохранить
                                                </button>
                                                <a style="float: right" href="/parents" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Назад
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

@stop
