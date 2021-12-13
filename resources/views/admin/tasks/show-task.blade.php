@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner" style="padding-bottom: 10px;">
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
                                    <h4 class="heading_a">2391 <span class="sub-heading">Posts</span></h4>
                                </li>
                                <li>
                                    <h4 class="heading_a">120 <span class="sub-heading">Photos</span></h4>
                                </li>
                                <li>
                                    <h4 class="heading_a">284 <span class="sub-heading">Following</span></h4>
                                </li>
                            </ul>
                        </div>
                        <a class="md-fab md-fab-small md-fab-accent hidden-print" href="/admin/manager/task/task-edit/{{ $task->id }}">
                            <i class="material-icons">&#xE150;</i>
                        </a>
                    </div>
                    <div class="user_content">
                        <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}" data-uk-sticky="{ top: 48, media: 960 }">
                            <li class="uk-active"><a href="#">Задача</a></li>
                            <li><a href="#">Все задачи</a></li>
                        </ul>
                        <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                            <li>
                                <h3>{{ $task->title }}</h3>
                                {{ $task->description }}
                                <div class="uk-grid uk-margin-medium-top uk-margin-large-bottom" data-uk-grid-margin>
                                    <div class="uk-width-large-1-2">
                                        <h4 class="heading_c uk-margin-small-bottom"></h4>
                                        <ul class="md-list md-list-addon">
                                            <li>
                                               <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $task->deadline }}</span>
                                                    <span class="uk-text-small uk-text-muted">Дедлайн</span>
                                                </div>
                                            </li>
                                            <li>
                                                {{--                                                <div class="md-list-addon-element">--}}
                                                {{--                                                    <i class="md-list-addon-icon uk-icon-twitter"></i>--}}
                                                {{--                                                </div>--}}
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">{{ $task->status->name }}</span>
                                                    <span class="uk-text-small uk-text-muted">Статус</span>
                                                </div>
                                            </li>
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
                                                <span class="uk-margin-right">
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
                <div >
                    <a style="margin-top: 20px;margin-left: 47px;" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/manager/create-task/{{ $manager->id }}">
                        Добавить задачу
                    </a>
                </div>
            </div>
        </div>
    </div>




    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin data-uk-grid-match id="user_profile">
            <div class="uk-width-large-7-10">
                <div class="md-card">
                    <div class="user_content">
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <label for="user_edit_personal_info_control">Оставить комментарий</label>
                                <textarea class="md-input" name="description" id="description" cols="20" rows="4">
                                    {{old('comment')}}
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@stop
