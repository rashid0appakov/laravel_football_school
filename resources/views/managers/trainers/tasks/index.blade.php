@extends('managers.layouts.app')

@section('content')

    <div id="page_content_inner">
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
                            @if($errors->any())
                                <div class="uk-alert uk-alert-danger" data-uk-alert="">
                                    <a href="#" class="uk-alert-close uk-close"></a>
                                    {{$errors->first()}}
                                </div>
                            @endif
                            @if(\Session::has('success'))
                                <div class="uk-alert uk-alert-success" data-uk-alert="">
                                    <a href="#" class="uk-alert-close uk-close"></a>
                                    {!! \Session::get('success') !!}
                                </div>
                            @endif
                            <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                                <li class="uk-active"><a href="#">Данные тренера</a></li>
                            </ul>
                            <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <ul class="md-list">
                                        <form action="/manager/trainers/task-store" method="POST">
                                            @csrf
                                            <div class="uk-margin-top">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Заголовок</label>
                                                        <input value="" class="md-input" type="text" id="title" name="title" required/>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_position_control">Статус</label>
                                                        <select data-md-selectize name="status_id">
                                                            @foreach($statuses as $status)
                                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_uname_control">Пол</label>
                                                        <textarea required class="md-input" name="description" id="description" cols="30" rows="4">

                                                        </textarea>
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <label for="user_edit_position_control">Дедлайн</label>
                                                        <input name="deadline" id="deadline" value="" />
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" style="margin-top: 20px;" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                Добавить задачу
                                            </button>
                                        </form>
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
                <div class="uk-width-large-3-10">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_c uk-margin-medium-bottom">Другие настройки</h3>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@stop
