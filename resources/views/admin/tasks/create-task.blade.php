@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <form action="/admin/manager/store-task" class="uk-form-stacked" id="manager_create_form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="manager_id" value="{{ $manager->id }}">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar">
                                <div class="thumbnail">
                                    <img src="/users/managers/avatars/{{ $manager->image }}" alt="user avatar"/>
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
                                <li class="uk-active"><a href="#">Новая задача</a></li>
                            </ul>
                            <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <div class="uk-margin-top">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Заголовок</label>
                                                <input value="{{old('title')}}" class="md-input" type="text" id="title" name="title" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_position_control">Дедлайн</label>
                                                <input class="md-input" value="{{old('deadline')}}" type="text" id="deadline" name="deadline" required />
                                            </div>
                                        </div>
                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <label for="user_edit_personal_info_control">Описание</label>
                                                <textarea class="md-input" name="description" id="description" cols="30" rows="4">
                                                    {{old('description')}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Статус</label>
                                                <select data-md-selectize name="status_id">
                                                    <option value="">Выбрать...</option>
                                                    @foreach($statuses as $status)
                                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                    @endforeach
                                                </select>
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
                                            <span class="md-list-heading">Quasi laboriosam.</span>
                                            <span class="uk-text-small uk-text-muted uk-text-truncate">Enim perspiciatis odit aut deleniti.</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Qui sit.</span>
                                            <span class="uk-text-small uk-text-muted uk-text-truncate">Recusandae blanditiis non eaque nesciunt fuga pariatur vel.</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-addon-element">
                                            <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Iste ex magnam.</span>
                                            <span class="uk-text-small uk-text-muted uk-text-truncate">Dolorem in praesentium voluptatem laudantium ea.</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div >
                        <a style="margin-top: 20px;margin-left: 47px;" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/manager/create-task">
                            Добавить задачу
                        </a>
                    </div>
                </div>
            </div>

        </form>

    </div>

@stop
