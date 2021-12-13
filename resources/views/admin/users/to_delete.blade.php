@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner" style="width: 50%">
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
            <div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_a">Переназначение менеджера</h3>
                @if($leads->count())
                    <form action="/admin/users/manager/reassignment" method="POST">
                        @csrf
                        <input type="hidden" name="current_manager_id" value="{{ $manager->id }}">
                        <input type="hidden" name="type" value="lead">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Менеджер в лидах</label>
                                        <select required data-md-selectize name="manager_id">
                                            <option value="">Выбрать...</option>
                                            @if(count($managers) > 0)
                                                @foreach($managers as $manager)
                                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <button style="margin-top: 20px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                            Сохранить
                        </button>
                    </form>
                @endif
                @if($tasks->count())
                    <form action="/admin/users/manager/reassignment" method="POST">
                        @csrf
                        <input type="hidden" name="current_manager_id" value="{{ $id }}">
                        <input type="hidden" name="type" value="task">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Менеджер в задачах</label>
                                            <select required data-md-selectize name="manager_id">
                                                <option value="">Выбрать...</option>
                                                @if(count($managers) > 0)
                                                    @foreach($managers as $manager)
                                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button style="margin-top: 20px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                            Сохранить
                        </button>
                    </form>
                @endif
                @if($areas->count())
                    <form action="/admin/users/manager/reassignment" method="POST">
                        @csrf
                        <input type="hidden" name="current_manager_id" value="{{ $id }}">
                        <input type="hidden" name="type" value="area">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Менеджер в площадке</label>
                                            <select required data-md-selectize name="manager_id">
                                                <option value="">Выбрать...</option>
                                                @if(count($managers) > 0)
                                                    @foreach($managers as $manager)
                                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button style="margin-top: 20px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                            Сохранить
                        </button>
                    </form>
                @endif

                @if($clubs->count())
                    <form action="/admin/users/manager/reassignment" method="POST">
                        @csrf
                        <input type="hidden" name="current_manager_id" value="{{ $id }}">
                        <input type="hidden" name="type" value="club">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-form-row">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Менеджер в клубах</label>
                                            <select required data-md-selectize name="manager_id">
                                                <option value="">Выбрать...</option>
                                                @if(count($managers) > 0)
                                                    @foreach($managers as $manager)
                                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button style="margin-top: 20px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                            Сохранить
                        </button>
                    </form>
                @endif
            </div>
        </div>
            <div class="md-card">
                <div class="md-card-content" style="text-align: center;">
                    <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Удалить
                    </button>

                    <a style="float: right" href="/admin/users/managers" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Вернуться назад
                    </a>
                </div>
            </div>
    </div>
@stop
