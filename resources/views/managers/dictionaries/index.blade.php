@extends('managers.layouts.app')

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
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2" style="margin-top: 20px;">

            <div class="md-card">

                <div class="md-card-content">
                    <h3 class="heading_a">Лид статусы</h3>

                    <div class="uk-grid" data-uk-grid-margin>

                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                            @if(count($lead_statuses) > 0)
                                @foreach($lead_statuses as $lead_status)
                                    <form method="POST" action="/manager/crm/dictionary/lead_status/edit/{{ $lead_status->id }}">
                                        @csrf
                                        <input type="hidden" name="lead_status_id" value="{{ $lead_status->id }}">
                                        <div class="uk-form-row" style="padding-bottom: 20px;">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-3">
                                                    <label>Название</label>
                                                    <input value="{{ old('name', $lead_status->name) }}" name="name" type="text" class="md-input label-fixed" />
                                                </div>
                                                <div class="uk-width-medium-1-3">
                                                    <label>Цвет</label>
                                                    <input value="{{ old('color', $lead_status->color) }}" name="color" type="text" class="md-input label-fixed" />
                                                </div>
                                                <div class="uk-width-medium-1-3" style="margin-top: -15px;">
                                                    <button type="submit" class="md-btn md-btn-success md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                        Сохранить
                                                    </button>
                                                    <a style="margin-top: 5px;" href="/manager/crm/dictionaries/delete-lead-status/{{ $lead_status->id }}" class="md-btn md-btn-danger md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                        Удалить
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            @endif
                            </div>
                            <div class="uk-form-row">
                                <form method="POST" action="/manager/crm/dictionary/lead_status/create">
                                    @csrf
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3">
                                                <label>Название</label>
                                                <input value="{{ old('name') }}" name="name" type="text" class="md-input label-fixed" required/>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <label>Цвет</label>
                                                <input value="{{ old('color') }}" name="color" type="text" class="md-input label-fixed" required/>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Добавить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-medium-1-2" style="margin-top: 20px;">
            <div class="md-card">

                <div class="md-card-content">
                    <h3 class="heading_a">Типы лидов</h3>

                    <div class="uk-grid" data-uk-grid-margin>

                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                @if(count($lead_types) > 0)
                                    @foreach($lead_types as $lead_type)
                                        <form method="POST" action="/manager/crm/dictionary/lead_types/edit/{{ $lead_type->id }}">
                                            @csrf
                                            <input type="hidden" name="lead_type_id" value="{{ $lead_type->id }}">
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <label>Название</label>
                                                        <input value="{{ old('name', $lead_type->name) }}" name="name" type="text" class="md-input label-fixed" />
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <button type="submit" class="md-btn md-btn-success md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                            Сохранить
                                                        </button>
                                                        <a style="margin-top: 5px;" href="/admin/crm/dictionaries/delete-lead-type/{{ $lead_type->id }}" class="md-btn md-btn-danger md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                            Удалить
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                @endif
                            </div>
                            <div class="uk-form-row">
                                <form method="POST" action="/manager/crm/dictionary/lead_types/create">
                                    @csrf
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Название</label>
                                                <input value="{{ old('name') }}" name="name" type="text" class="md-input label-fixed" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Добавить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2" style="margin-top: 20px;">

            <div class="md-card">

                <div class="md-card-content">
                    <h3 class="heading_a">Тип клиента</h3>

                    <div class="uk-grid" data-uk-grid-margin>

                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                @if(count($client_types) > 0)
                                    @foreach($client_types as $client_type)
                                        <form method="POST" action="/manager/crm/dictionary/client_type/edit/{{ $client_type->id }}">
                                            @csrf
                                            <input type="hidden" name="client_id" value="{{ $client_type->id }}">
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <label>Название</label>
                                                        <input value="{{ old('name', $client_type->name) }}" name="name" type="text" class="md-input label-fixed" />
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <button type="submit" class="md-btn md-btn-success md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                            Сохранить
                                                        </button>
                                                        <a style="margin-top: 5px;" href="/manager/crm/dictionaries/delete-client-type/{{ $client_type->id }}" class="md-btn md-btn-danger md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                            Удалить
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                @endif
                            </div>
                            <div class="uk-form-row">
                                <form method="POST" action="/manager/crm/dictionary/client_type/create">
                                    @csrf
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3">
                                                <label>Название</label>
                                                <input value="{{ old('name') }}" name="name" type="text" class="md-input label-fixed" required/>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Добавить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-medium-1-2" style="margin-top: 20px;">
            <div class="md-card">

                <div class="md-card-content">
                    <h3 class="heading_a">Амплуа игроков</h3>

                    <div class="uk-grid" data-uk-grid-margin>

                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                @if(count($spec) > 0)
                                    @foreach($spec as $sp)
                                        <form method="POST" action="/manager/crm/dictionary/spec/edit/{{ $sp->id }}">
                                            @csrf
                                            <input type="hidden" name="spec_id" value="{{ $sp->id }}">
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <label>Название</label>
                                                        <input value="{{ old('name', $sp->name) }}" name="name" type="text" class="md-input label-fixed" />
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <button type="submit" class="md-btn md-btn-success md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                            Сохранить
                                                        </button>
                                                        <a style="margin-top: 5px;" href="/manager/crm/dictionaries/delete-spec/{{ $sp->id }}" class="md-btn md-btn-danger md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                            Удалить
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                @endif
                            </div>
                            <div class="uk-form-row">
                                <form method="POST" action="/manager/crm/dictionary/spec/create">
                                    @csrf
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Название</label>
                                                <input value="{{ old('name') }}" name="name" type="text" class="md-input label-fixed" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Добавить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2" style="margin-top: 20px;">

            <div class="md-card">

                <div class="md-card-content">
                    <h3 class="heading_a">Каналы</h3>

                    <div class="uk-grid" data-uk-grid-margin>

                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                @if(count($channels) > 0)
                                    @foreach($channels as $channel)
                                        <form method="POST" action="/manager/crm/dictionary/channels/edit/{{ $channel->id }}">
                                            @csrf
                                            <input type="hidden" name="channel_id" value="{{ $channel->id }}">
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <label>Название</label>
                                                        <input value="{{ old('name', $channel->name) }}" name="name" type="text" class="md-input label-fixed" />
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <button type="submit" class="md-btn md-btn-success md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                            Сохранить
                                                        </button>
                                                        <a style="margin-top: 5px;" href="/manager/crm/dictionaries/delete-channels/{{ $channel->id }}" class="md-btn md-btn-danger md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                            Удалить
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                @endif
                            </div>
                            <div class="uk-form-row">
                                <form method="POST" action="/manager/crm/dictionary/channels/create">
                                    @csrf
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3">
                                                <label>Название</label>
                                                <input value="{{ old('name') }}" name="name" type="text" class="md-input label-fixed" required/>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Добавить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-medium-1-2" style="margin-top: 20px;">
            <div class="md-card">

                <div class="md-card-content">
                    <h3 class="heading_a">Точка входа</h3>

                    <div class="uk-grid" data-uk-grid-margin>

                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                @if(count($entry_points) > 0)
                                    @foreach($entry_points as $entry_point)
                                        <form method="POST" action="/manager/crm/dictionary/entry-point/edit/{{ $sp->id }}">
                                            @csrf
                                            <input type="hidden" name="entry_point_id" value="{{ $entry_point->id }}">
                                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-2">
                                                        <label>Название</label>
                                                        <input value="{{ old('name', $entry_point->name) }}" name="name" type="text" class="md-input label-fixed" />
                                                    </div>
                                                    <div class="uk-width-medium-1-2">
                                                        <button type="submit" class="md-btn md-btn-success md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                            Сохранить
                                                        </button>
                                                        <a style="margin-top: 5px;" href="/manager/crm/dictionaries/delete-entry-point/{{ $entry_point->id }}" class="md-btn md-btn-danger md-btn-mini md-btn-wave-light waves-effect waves-button waves-light">
                                                            Удалить
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                @endif
                            </div>
                            <div class="uk-form-row">
                                <form method="POST" action="/manager/crm/dictionary/entry-point/create">
                                    @csrf
                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Название</label>
                                                <input value="{{ old('name') }}" name="name" type="text" class="md-input label-fixed" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Добавить
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@stop
