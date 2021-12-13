@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
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

        <h3 class="heading_b uk-margin-bottom"></h3>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-2">
                        <div class="uk-vertical-align">
                            <div class="uk-vertical-align-middle">
                                <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/users/manager/create">
                                    Добавить менеджера
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <label for="contact_list_search">Поисе... (мин 3 символа.)</label>
                        <input class="md-input" type="text" id="contact_list_search"/>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="heading_b uk-text-center grid_no_results" style="display:none">No results found</h3>

        <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 uk-grid-width-xlarge-1-5" id="contact_list" data-show-delay="280">
            @if(count($managers) > 0)
                @foreach($managers as $manager)
                    <div data-uk-filter="strosin groupa,brant romaguera,casimir.breitenberg@gmail.com">
                        <div class="md-card md-card-hover">
                            <div class="md-card-head">
                                <div class="md-card-head-menu" data-uk-dropdown="{pos:'bottom-right'}">
                                    <i class="md-icon material-icons">&#xE5D4;</i>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav">
                                            <li><a href="/admin/users/manager-edit/{{ $manager->id }}">Редактировать</a></li>
                                            <li><a href="/admin/users/managers/show-manager/{{ $manager->id }}">Просмотр</a></li>
                                            <li><a href="/admin/users/managers/delete-manager/{{ $manager->id }}">Удалить</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="uk-text-center">
                                    <img class="md-card-head-avatar" src="/users/managers/avatars/{{ $manager->image }}" alt=""/>
                                </div>
                                <h3 class="md-card-head-text uk-text-center">
                                    {{ $manager->user->name }} {{ $manager->user->surname }}
                                    <span class="uk-text-truncate">
                                        @if($manager->position != null)
                                        {{ $manager->position->name }}
                                            @endif
                                    </span>
                                </h3>
                            </div>
                            <div class="md-card-content">
                                <ul class="md-list">
                                    <li>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Инфо</span>
                                            <span class="uk-text-small uk-text-muted">
                                                {{ Str::limit($manager->info, 100) }}
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Email</span>
                                            <span class="uk-text-small uk-text-muted uk-text-truncate">
                                                {{ $manager->user->email }}
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Номер</span>
                                            <span class="uk-text-small uk-text-muted">
                                                {{ $manager->phone }}
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>
    </div>

@stop
