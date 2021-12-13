@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <form action="/admin/users/manager/store-manager" class="uk-form-stacked" id="manager_create_form" method="POST" enctype="multipart/form-data">
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
                                <li class="uk-active"><a href="#">Данные менеджера</a></li>
                            </ul>
                            <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <div class="uk-margin-top">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Имя</label>
                                                <input value="{{old('name')}}" class="md-input form-control" type="text" id="name" name="name" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Фамилия</label>
                                                <input value="{{old('surname')}}" class="md-input form-control" type="text" id="name" name="surname" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Отчество</label>
                                                <input value="{{old('patronymic')}}" class="md-input form-control" type="text" id="name" name="patronymic" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_position_control">Номер</label>
                                                <input class="md-input form-control input-tels" value="{{old('phone')}}" type="text" id="phone" name="phone" required />
                                            </div>
                                        </div>
                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <label for="user_edit_personal_info_control">Информация</label>
                                                <textarea class="md-input" name="info" id="info" cols="30" rows="4">{{old('info')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Whatsapp</label>
                                                <input class="md-input input-tels" value="{{old('whatsapp')}}" type="text" id="whatsapp" name="whatsapp" />
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_position_control">Telegramm</label>
                                                <input class="md-input input-tels" type="text" value="{{old('telegramm')}}" id="telegramm" name="telegramm" />
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Городской</label>
                                                <input class="md-input" type="text" value="{{old('city_number')}}" id="city_number" name="city_number" />
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Email</label>
                                                <input class="md-input form-control" type="email" value="{{old('email')}}" id="email" name="email" required />
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control form-control">Пароль</label>
                                                <input class="md-input" type="password" id="password" name="password" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control form-control">Повторите пароль</label>
                                                <input class="md-input" type="password" id="password_confirmation" name="password_confirmation" required />
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Сохранить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-large-3-10">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_c uk-margin-medium-bottom">Другие настройки</h3>
                            <div class="uk-form-row">
                                <input type="checkbox" checked data-switchery id="active" name="active" />
                                <label for="user_edit_active" class="inline-label">Пользователь активен</label>
                            </div>
                            <hr class="md-hr">
                            <div class="uk-form-row">
                                <label class="uk-form-label" for="user_edit_role">Должность</label>
                                <select data-md-selectize name="position_id">
                                    <option value="">Выбрать...</option>
                                    @foreach($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" for="user_edit_role">Закреплен за клубом</label>
                                <select data-md-selectize name="club_id">
                                    <option value="">Выбрать...</option>
                                    @foreach($clubs as $club)
                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

@stop
