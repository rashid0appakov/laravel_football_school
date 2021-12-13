@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <form action="/admin/trainers/{{ $trainer->id }}" class="uk-form-stacked" id="trainer_create_form" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" name="user_id" value="{{ $trainer->user->id }}">
            <input type="hidden" name="trainer_id" value="{{ $trainer->id }}">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="/users/trainers/avatar/{{ $trainer->image }}" alt="user avatar"/>
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
                                        <input class="md-input input-tels" value="{{old('phone', $trainer->phone)}}" type="text" id="phone" name="phone" required />
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
                                        <textarea class="md-input" name="career" id="career" cols="30" rows="4">{{old('career', $trainer->career)}}</textarea>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Сохранить
                                        </button>
                                        <a style="float: right" href="/admin/trainers" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Назад
                                        </a>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="uk-width-large-3-10">
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
                    </form>

        <div class="md-card">
            <div class="md-card-content">
                <button id="open-form" type="button"
                         class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">
                    Создать задачу
                </button>
                @if($errors->any())
                    <div class="uk-alert uk-alert-danger" data-uk-alert="">
                        {{$errors->first()}}
                    </div>
                @endif
                @if(\Session::has('success'))
                    <div class="uk-alert uk-alert-success" data-uk-alert="">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
                <div style="margin-top: 20px;display: none;height: 0px;"  id="form">

                        <h3 class="heading_a">Новая задача</h3>
                        <form id="form" action="/admin/tasks/trainer/trainerTaskStore" method="POST">
                            @csrf
                            <input type="hidden" name="trainer_id" value="{{ $trainer->id }}">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row" style="margin-top: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label>Заголовок"</label>
                                                <input value="{{ old('title') }}" id="title" required style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label>Статус</label>
                                                <select data-md-selectize name="status_id">
                                                    @if(count($statuses) > 0)
                                                        @foreach($statuses as $status)
                                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label>Дедлайн</label>
                                                <input style="float: right;" name="deadline" id="kUI_datetimepicker_basic" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label>Описание</label>
                                                <textarea required id="description" name="description" cols="30" rows="4" class="md-input">
                                                    {{ old('description') }}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label>Теги</label>
                                                <br>
                                                <select style="width: 90% !important;" id="" name="tasktags[]" size="{{ count($tasktags) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>
                                                    @foreach($tasktags as $tasktag)
                                                        <option value="{{ $tasktag->id }}">{{ $tasktag->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" style="margin-top: 20px" onclick="return checkTasksField()"
                                                class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">
                                            Создать
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </form>
                </div>

                @if(count($tasks) > 0)
                    <?php
                    $i = 1;
                    ?>
                    @foreach($tasks as $task)
                        <div class="md-card" style="margin-top: 20px;">
                            <div class="md-card-content">
                                <h3 class="heading_a">#{{ $task->id }}</h3>
                                <div class="uk-grid" data-uk-grid-margin style="margin-top: 2px;">
                                    <div class="uk-width-medium-1-1">
                                        <div class="uk-form-row">
                                            <span>{{ $task->deadline }}</span>
                                            <br>
                                            Задача {{ $task->title }}
                                            <div>
                                                @if(count($task->tags) > 0)
                                                    @foreach($task->tags as $tag)
                                                        <span style="background: {{ $tag->color }}" class="uk-badge uk-badge-success">{{ $tag->name }}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" style="margin: 20px;margin-top: 0px;" onclick="return edit_admin_task_form({{ $i }})"
                                    class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">
                                Редактировать
                            </button>
                        </div>

                        <div class="md-card expandable" style="margin-top: 20px;display: none;"  id="task_form_edit{{$i}}">
                            <div class="md-card-content">
                                <form id="formUpdate" action="/admin/tasks/trainer/trainerTaskUpdate" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <input type="hidden" name="trainer_id" value="{{ $trainer->id }}">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <div class="uk-form-row" style="margin-top: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label>Заголовок"</label>
                                                        <input id="titleUpdate" value="{{ $task->title }}" style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label>Статус</label>
                                                        <select data-md-selectize name="status_id">
                                                            <option value="{{ $task->status->id }}">{{ $task->status->name }}</option>
                                                            @if(count($statuses) > 0)
                                                                @foreach($statuses as $status)
                                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label>Дедлайн</label>
                                                        <input value="{{ $task->deadline }}" style="float: right;" name="deadline" id="birthday_datepicker_ch_{{ $task->id }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label>Описание</label>
                                                        <textarea id="descriptionUpdate" name="description" cols="30" rows="4" class="md-input">
                                                                    {{ $task->description }}
                                                                </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-1">
                                                        <label>Теги</label>
                                                        <br>
                                                        <select style="width: 90% !important;" id="" name="tasktags[]" size="{{ count($tasktags) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>
                                                            @if(count($task->tags) > 0)
                                                                @foreach($task->tags as $tag)
                                                                    <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                                @endforeach
                                                            @endif
                                                            @foreach($tasktags as $tasktag)
                                                                <option value="{{ $tasktag->id }}">{{ $tasktag->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button  onclick="return checkTasksFieldUpdate()" type="button"
                                                    class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">
                                                Сохранить
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                        $i++;
                        ?>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@stop
