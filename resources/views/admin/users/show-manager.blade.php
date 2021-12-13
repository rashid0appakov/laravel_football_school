@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading">
                        <div class="user_heading_avatar">
                            <div class="thumbnail">
                                <img src="/users/managers/avatars/{{ $manager->image }}" alt="user avatar"/>
                            </div>
                        </div>
                        <div class="user_heading_content">
                            <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate">
                                    {{ $manager->user->name }}
                                </span>
                                <span class="sub-heading">

                                </span>
                            </h2>
                            <ul class="user_stats">
                                <li>
                                    <h4 class="heading_a">2391 <span class="sub-heading">Тренировок назначено</span></h4>
                                </li>
                                <li>
                                    <h4 class="heading_a">120 <span class="sub-heading">Тренировок проведено</span></h4>
                                </li>
                                <li>
                                    <h4 class="heading_a">284 <span class="sub-heading">Отказ от тренировки</span></h4>
                                </li>
                            </ul>
                        </div>
                        <a class="md-fab md-fab-small md-fab-accent hidden-print" href="/admin/users/manager-edit/{{ $manager->id }}">
                            <i class="material-icons">&#xE150;</i>
                        </a>
                    </div>
                    <div class="user_content">
                        <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
                            <li class="uk-active"><a href="#">Инфо</a></li>
                            <li><a href="#">Задачи</a></li>
                        </ul>
                        <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                            <li>
                                {{ $manager->info }}
                                <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                                    <div class="uk-width-large-1-2">
                                        <h4 class="heading_c uk-margin-small-bottom">Контакты</h4>
                                        <ul class="md-list md-list-addon">
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $manager->user->email }}</span>
                                                    <span class="uk-text-small uk-text-muted">Email</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $manager->phone }}</span>
                                                    <span class="uk-text-small uk-text-muted">Номер телефона</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $manager->city_number }}</span>
                                                    <span class="uk-text-small uk-text-muted">Городской номер</span>
                                                </div>
                                            </li>
                                            <li>
{{--                                                <div class="md-list-addon-element">--}}
{{--                                                    <i class="md-list-addon-icon uk-icon-twitter"></i>--}}
{{--                                                </div>--}}
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $manager->whatsapp }}</span>
                                                    <span class="uk-text-small uk-text-muted">Whatsapp</span>
                                                </div>
                                            </li>
                                            <li>
                                                {{--                                                <div class="md-list-addon-element">--}}
                                                {{--                                                    <i class="md-list-addon-icon uk-icon-twitter"></i>--}}
                                                {{--                                                </div>--}}
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $manager->telegramm }}</span>
                                                    <span class="uk-text-small uk-text-muted">Telegramm</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="uk-width-large-1-2">
                                        <h4 class="heading_c uk-margin-small-bottom"></h4>
                                        <ul class="md-list">
                                            @if($manager->position != null)
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">{{ $manager->position->name}}</a></span>
                                                    <span class="uk-text-small uk-text-muted">Должность</span>
                                                </div>
                                            </li>
                                            @endif
                                            @if($manager->club != null)
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="#">{{ $manager->club->name }}</a></span>
                                                    <span class="uk-text-small uk-text-muted">Клуб</span>
                                                </div>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <ul class="md-list">
                                    <div class="uk-width-medium-1-1" style="margin-top: 20px;">
                                        <button  id="open-form"
                                                 class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom"
                                                 href="#nav">
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
                                        <div class="md-card expandable" style="margin-top: 20px;display: none"  id="form">
                                            <div class="md-card-content">
                                                <h3 class="heading_a">Новая задача</h3>
                                                <form id="form" action="/admin/tasks/manager/managerTaskStore" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="manager_id" value="{{ $manager->id }}">
                                                    <div class="uk-grid" data-uk-grid-margin>
                                                        <div class="uk-width-medium-1-1">
                                                            <div class="uk-form-row" style="margin-top: 20px;">
                                                                <div class="uk-grid" data-uk-grid-margin>
                                                                    <div class="uk-width-medium-1-1">
                                                                        <label>Заголовок"</label>
                                                                        <input id="title" value="{{ old('title') }}" style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />
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
                                                                        <input value="{{ old('deadline') }}" style="float: right;" name="deadline" id="kUI_datetimepicker_basic" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                                <div class="uk-grid" data-uk-grid-margin>
                                                                    <div class="uk-width-medium-1-1">
                                                                        <label>Описание</label>
                                                                        <textarea id="description" name="description" cols="30" rows="4" class="md-input">
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
                                                            </div>
                                                            <button type="button" onclick="return checkTasksField()"
                                                                    class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">
                                                                Создать
                                                            </button>
                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
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
                                                    <button style="margin: 20px;margin-top: 0px;" onclick="return edit_admin_task_form({{ $i }})"
                                                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom"
                                                            href="#nav">
                                                        Редактировать
                                                    </button>
                                                </div>

                                                <div class="md-card expandable" style="margin-top: 20px;display: none;"  id="task_form_edit{{$i}}">
                                                    <div class="md-card-content">
                                                        <form action="/admin/tasks/manager/managerTaskUpdate" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $task->id }}">
                                                            <input type="hidden" name="manager_id" value="{{ $manager->id }}">
                                                            <div class="uk-grid" data-uk-grid-margin>
                                                                <div class="uk-width-medium-1-1">
                                                                    <div class="uk-form-row" style="margin-top: 20px;">
                                                                        <div class="uk-grid" data-uk-grid-margin>
                                                                            <div class="uk-width-medium-1-1">
                                                                                <label>Заголовок"</label>
                                                                                <input required value="{{ $task->title }}" style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />
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
                                                                                <textarea name="description" cols="30" rows="4" class="md-input">
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
                                                                    <button type="submit"
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
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="uk-width-large-3-10 hidden-print">
                <div class="md-card">
                    <div class="md-card-content">
                        <div class="uk-margin-medium-bottom">
                            <h3 class="heading_c uk-margin-bottom">Оповещения</h3>
                            <ul class="md-list md-list-addon">
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">Важные задачи</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">Задачи на сегодня</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="md-list-addon-element">
                                        <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                    </div>
                                    <div class="md-list-content">
                                        <span class="md-list-heading">Просроченные задачи</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div >
{{--                    <a style="margin-top: 20px;margin-left: 47px;" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/manager/create-task/{{ $manager->id }}">--}}
{{--                        Добавить задачу--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>

@stop
