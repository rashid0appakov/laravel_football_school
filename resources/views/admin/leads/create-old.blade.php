@extends('admin.layouts.app')

@section('content')
<div id="page_content_inner">

    <div class="uk-vertical-align-middle">
        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/crm/leads">
            Вернуться назад
        </a>
    </div>

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

    <div class="md-card" style="margin-top: 20px;width: 50%;">
        <div class="md-card-content">
            <h3 class="heading_a"></h3>
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1">
                    <form action="/admin/crm/leads" method="POST">
                        @csrf
                    <div class="uk-form-row">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <label>Канал</label>
                                <select required data-md-selectize name="channel_id">
                                    <option value="">Выбрать...</option>
                                    @if(count($channels) > 0)
                                        @foreach($channels as $channel)
                                            <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label>Точка входа</label>
                                <select required data-md-selectize name="entry_point_id">
                                    <option value="">Выбрать...</option>
                                    @if(count($entry_points) > 0)
                                        @foreach($entry_points as $entry_point)
                                            <option value="{{ $entry_point->id }}">{{ $entry_point->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <label>Тип</label>
                                <select data-md-selectize name="lead_type_id">
                                    <option value="">Выбрать...</option>
                                    @if(count($lead_types) > 0)
                                        @foreach($lead_types as $lead_type)
                                            <option value="{{ $lead_type->id }}">{{ $lead_type->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2" style="margin-top: 21px;">
                                <label>Email</label>
                                <input name="email" type="text" class="md-input label-fixed" />
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label>Клуб</label>
                                <select required data-md-selectize name="club_id">
                                    <option value="">Выбрать...</option>
                                    @if(count($clubs) > 0)
                                        @foreach($clubs->where('frozen', 0) as $club)
                                            <option value="{{ $club->id }}">{{ $club->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2">
                                <label>Имя предаставителя</label>
                                <input name="name" type="text" class="md-input label-fixed" required/>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label>Телефон</label>
                                <input name="phone" type="text" class="md-input input-tels label-fixed" required/>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-2" style="margin-top: 21px;">
                                <label>Менеджер</label>
                                <select data-md-selectize name="manager_id">
                                    <option value="">Выбрать...</option>
                                    @if(count($managers) > 0)
                                        @foreach($managers as $manager)
                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="uk-width-medium-1-2">
                                <label>Статус</label>
                                <select data-md-selectize name="lead_status_id">
                                    @if(count($lead_statuses) > 0)
                                        @foreach($lead_statuses as $lead_status)
                                            <option value="{{ $lead_status->id }}">{{ $lead_status->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <label>URL</label>
                                <input name="url" type="text" class="md-input label-fixed" required/>
                            </div>
                        </div>
                    </div>
                    <button style="margin-top: 21px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Создать
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
