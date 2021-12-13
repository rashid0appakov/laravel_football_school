@extends('trainers.layouts.app')

@section('content')

    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_heading">
                        <div class="user_heading_avatar">
                            <div class="thumbnail">
                                <img src="/users/managers/avatars/{{ $trainer->image }}" alt="user avatar"/>
                            </div>
                        </div>
                        <div class="user_heading_content">
                            <h2 class="heading_b uk-margin-bottom"><span class="uk-text-truncate">
                                    {{ $trainer->user->name }}
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
                        <a class="md-fab md-fab-small md-fab-accent hidden-print" href="/trainer/{{ $trainer->id }}/edit">
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
                                {{ $trainer->info }}
                                <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                                    <div class="uk-width-large-1-2">
                                        <h4 class="heading_c uk-margin-small-bottom">Контакты</h4>
                                        <ul class="md-list md-list-addon">
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE158;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $trainer->user->email }}</span>
                                                    <span class="uk-text-small uk-text-muted">Email</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $trainer->phone }}</span>
                                                    <span class="uk-text-small uk-text-muted">Номер телефона</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons">&#xE0CD;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $trainer->city_number }}</span>
                                                    <span class="uk-text-small uk-text-muted">Городской номер</span>
                                                </div>
                                            </li>
                                            <li>
                                                {{--                                                <div class="md-list-addon-element">--}}
                                                {{--                                                    <i class="md-list-addon-icon uk-icon-twitter"></i>--}}
                                                {{--                                                </div>--}}
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $trainer->whatsapp }}</span>
                                                    <span class="uk-text-small uk-text-muted">Whatsapp</span>
                                                </div>
                                            </li>
                                            <li>
                                                {{--                                                <div class="md-list-addon-element">--}}
                                                {{--                                                    <i class="md-list-addon-icon uk-icon-twitter"></i>--}}
                                                {{--                                                </div>--}}
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $trainer->telegramm }}</span>
                                                    <span class="uk-text-small uk-text-muted">Telegramm</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="uk-width-large-1-2">
                                        <h4 class="heading_c uk-margin-small-bottom"></h4>
                                        <ul class="md-list">
                                            @if($trainer->position != null)
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="#">{{ $trainer->position->name}}</a></span>
                                                        <span class="uk-text-small uk-text-muted">Должность</span>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($trainer->club != null)
                                                <li>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="#">{{ $trainer->club->name }}</a></span>
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
                                    @if(count($tasks) > 0)
                                        @foreach($tasks as $task)
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="/admin/manager/task/{{ $task->id }}">{{ $task->title }}.</a></span>
                                                    <div class="uk-margin-small-top">
                                                        $tasks                       <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">{{ $task->created_at }}</span>
                                                </span>
                                                        <span class="uk-margin-right">
                                                    <i class="material-icons">&#xE0B9;</i> <span class="uk-text-muted uk-text-small">15</span>
                                                </span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
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

            </div>
        </div>
    </div>

@stop
