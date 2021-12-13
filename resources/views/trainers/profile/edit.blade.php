@extends('trainers.layouts.app')

@section('content')

    <div id="page_content_inner">
        <form action="/trainer/update" class="uk-form-stacked" id="trainer_create_form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $trainer->user->id }}">
            <input type="hidden" name="trainer_id" value="{{ $trainer->id }}">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="/user/trainers/avatars/{{ $trainer->image }}" alt="user avatar"/>
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
                                <li class="uk-active"><a href="#">Данные тренера</a></li>
                            </ul>
                            <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <div class="uk-margin-top">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3">
                                                <label for="user_edit_uname_control">Имя</label>
                                                <input value="{{old('name', $trainer->name)}}" class="md-input" type="text" id="name" name="name" required/>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <label for="user_edit_position_control">Фамилия</label>
                                                <input class="md-input" value="{{old('surname', $trainer->surname)}}" type="text" id="surname" name="surname" required />
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <label for="user_edit_position_control">Отчество</label>
                                                <input class="md-input" value="{{old('patronymic', $trainer->patronymic)}}" type="text" id="patronymic" name="patronymic" required />
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3">
                                                <label for="user_edit_uname_control">Пол</label>
                                                <select data-md-selectize name="gender">
                                                    @if($trainer->gender != null)
                                                        <option selected value="{{ $trainer->gender }}">{{ $trainer->gender }}</option>
                                                    @endif
                                                    <option value="Мужской">Мужской</option>
                                                    <option value="Женский">Женский</option>
                                                </select>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <label for="user_edit_position_control">Дата рождения</label>
                                                <input name="birthday" id="kUI_datepicker_a" value="{{ $trainer->birthday != null ? $trainer->birthday : \Carbon\Carbon::now() }}" />
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <p>
                                                    <input {{ $trainer->show_on_main == 1 ? "checked" : "" }} value="" type="checkbox" name="show_on_main" id="show_on_main" data-md-icheck />
                                                    <label for="checkbox_demo_1" class="inline-label">отображать на главной</label>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>


                            <ul id="" class="uk-tab">
                                <li class="uk-active"><a href="#">КОНТАКТНАЯ ИНФОРМАЦИЯ</a></li>
                            </ul>

                            <div class="uk-margin-top">

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label for="user_edit_uname_control">Адрес</label>
                                        <input value="{{old('address', $trainer->address)}}" class="md-input" type="text" id="address" name="address"/>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="user_edit_uname_control">Email</label>
                                        <input value="{{old('email', $trainer->user->email)}}" class="md-input" type="text" id="email" name="email" required/>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="user_edit_position_control">Телефон</label>
                                        <input class="md-input" value="{{old('phone', $trainer->phone)}}" type="text" id="phone" name="phone" required />
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label for="user_edit_uname_control">Пароль</label>
                                        <input class="md-input" type="password" id="password" name="password" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label for="user_edit_uname_control">Повторите пароль</label>
                                        <input class="md-input" type="password" id="password_confirmation" name="password_confirmation" />
                                    </div>
                                </div>


                            </div>
                            <ul id="" class="uk-tab" style="margin-top: 20px;">
                                <li class="uk-active"><a href="#">СТРАНИЦЫ В СОЦИАЛЬНЫХ СЕТЯХ</a></li>
                            </ul>

                            <div class="uk-margin-top">

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3">
                                        <label for="user_edit_uname_control">Facebook</label>
                                        <input value="{{old('facebook', $trainer->facebook)}}" class="md-input" type="text" id="facebook" name="facebook"/>
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <label for="user_edit_position_control">VK</label>
                                        <input class="md-input" value="{{old('vk', $trainer->vk)}}" type="text" id="vk" name="vk" />
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <label for="user_edit_position_control">Instagram</label>
                                        <input class="md-input" value="{{old('instagram', $trainer->instagram)}}" type="text" id="instagram" name="instagram" />
                                    </div>
                                </div>
                            </div>

                            <ul id="" class="uk-tab" style="margin-top: 20px;">
                                <li class="uk-active"><a href="#">КАРТОЧКА ТРЕНЕРА</a></li>
                            </ul>

                            <div class="uk-margin-top">

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3">
                                        <label for="user_edit_uname_control">Образование</label>
                                        <input value="{{old('education', $trainer->education)}}" class="md-input" type="text" id="education" name="education"/>
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <label for="user_edit_position_control">Лицензия</label>
                                        <input class="md-input" value="{{old('license', $trainer->license)}}" type="text" id="license" name="license" />
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <label for="user_edit_position_control">Стаж</label>
                                        <input class="md-input" value="{{old('experience', $trainer->experience)}}" type="text" id="experience" name="experience" />
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-3">
                                        <label for="user_edit_uname_control">Размер одежды</label>
                                        <select data-md-selectize name="clothing_size">
                                            @if($trainer->clothing_size != null)
                                                <option selected value="{{ $trainer->clothing_size }}">{{ $trainer->clothing_size }}</option>
                                            @endif
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                        </select>
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <label for="user_edit_position_control">Семейное положение</label>
                                        <select data-md-selectize name="family_status">
                                            @if($trainer->family_status != null)
                                                <option selected value="{{ $trainer->family_status }}">{{ $trainer->family_status }}</option>
                                            @endif
                                            <option value="Холост/Не замужем">Холост/Не замужем</option>
                                            <option value="Женат/Замужем">Женат/Замужем</option>
                                        </select>
                                    </div>
                                    <div class="uk-width-medium-1-3">
                                        <label for="user_edit_position_control">Дети</label>
                                        <select data-md-selectize name="children">
                                            @if($trainer->children != null)
                                                <option selected value="{{ $trainer->children }}">{{ $trainer->children }}</option>
                                            @endif
                                            <option value="Да">Да</option>
                                            <option value="Нет">Нет</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label for="user_edit_position_control">Карьера</label>
                                        <textarea class="md-input" name="career" id="career" cols="30" rows="4">
                                                    {{old('career', $trainer->career)}}
                                            </textarea>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Сохранить
                                        </button>
                                        <a style="float: right" href="/trainer" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Назад
                                        </a>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
{{--                <div class="uk-width-large-3-10">--}}
{{--                    <div class="md-card">--}}
{{--                        <div class="md-card-content">--}}
{{--                            <h3 class="heading_c uk-margin-medium-bottom">Другие настройки</h3>--}}
{{--                            <div class="uk-form-row">--}}
{{--                                <input type="checkbox" checked data-switchery id="active" name="active" />--}}
{{--                                <label for="user_edit_active" class="inline-label">Пользователь активен</label>--}}
{{--                            </div>--}}
{{--                            <hr class="md-hr">--}}
{{--                            <div class="uk-form-row">--}}
{{--                                <label class="uk-form-label" for="user_edit_role">ДОСТУПНЫЕ ДНИ НЕДЕЛИ</label>--}}
{{--                                @foreach($trainer->availableDay as $available_teacher_day)--}}
{{--                                    <p>--}}
{{--                                        <input {{ $available_teacher_day != null ? "checked" : "" }} type="checkbox" value="{{ $available_teacher_day->alias }}" name="available_day[]" id="day_name" data-md-icheck />--}}
{{--                                        <label for="checkbox_demo_1" class="inline-label">{{ $available_teacher_day->day_name }}</label>--}}
{{--                                    </p>--}}
{{--                                @endforeach--}}
{{--                                @foreach($available_days as $available_day)--}}
{{--                                    <p>--}}
{{--                                        <input type="checkbox" value="{{ $available_day->alias }}" name="available_day[]" id="day_name" data-md-icheck />--}}
{{--                                        <label for="checkbox_demo_1" class="inline-label">{{ $available_day->day_name }}</label>--}}
{{--                                    </p>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

        </form>

    </div>

@stop
