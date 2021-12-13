@extends('managers.layouts.app')

@section('content')
<div id="page_content_inner">
    <div class="uk-vertical-align-middle">
        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/manager/crm/clients/create">
            Создать клиента
        </a>
    </div>

    <h4 style="margin-top: 20px;" class="heading_a uk-margin-bottom">Заявки</h4>

    <div class="uk-form-row">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-5" style="margin-bottom: 20px;">
                <form action="/manager/crm/client/filter/type" method="POST">
                    @csrf
                    <label>Тип</label>
                    <select data-md-selectize name="lead_type_id">
                        @if(count($lead_types) > 0)
                            @foreach($lead_types as $lead_type)
                                <option value="{{ $lead_type->id }}">{{ $lead_type->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <button style="margin-top: 65px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Отфильтровать
                    </button>
                </form>
            </div>
            <div class="uk-width-medium-1-5" style="margin-bottom: 20px;">
                <form action="/manager/crm/clients/filter/start-date" method="POST">
                    @csrf
                    <label>Дата начала</label>
                    <input name="start_date" id="kUI_datepicker_fileter" value="{{ \Carbon\Carbon::now() }}" />
                    <button style="margin-top: 10px" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Отфильтровать
                    </button>
                </form>
            </div>
            <div class="uk-width-medium-1-5" style="margin-bottom: 20px;">
                <form action="/manager/crm/clients/filter/entry-point-client" method="POST">
                    @csrf
                    <label>Точка входа</label>
                    <select required data-md-selectize name="entry_point_id">
                        <option value="">Выбрать...</option>
                        @if(count($entry_points) > 0)
                            @foreach($entry_points as $entry_point)
                                <option value="{{ $entry_point->id }}">{{ $entry_point->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <button style="margin-top: 10px" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Отфильтровать
                    </button>
                </form>
            </div>
            <div class="uk-width-medium-1-5" style="margin-bottom: 20px;">
                <form action="/manager/crm/leads/filter/child-exist" method="POST">
                    @csrf
                    <label>Есть ребенок?</label>
                    <select required data-md-selectize name="child">
                        <option value="">Выбрать...</option>
                        <option value="1">Да</option>
                        <option value="0">Нет</option>
                    </select>
                    <button style="margin-top: 10px" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Отфильтровать
                    </button>
                </form>
            </div>
            <div class="uk-width-medium-1-5" style="margin-bottom: 20px;">
                <form action="/manager/crm/leads/filter/workout-balance" method="POST">
                    @csrf
                    <label>Осталось тренировок</label>
                    <input name="workout_balance" type="text" class="md-input label-fixed" />
                    <button style="margin-top: 10px" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Отфильтровать
                    </button>
                </form>
            </div>
        </div>
    </div>


    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-striped uk-table-hover">
                    <thead>
                    <tr>
                        <th>Статус</th>
                        <th>Email</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->status->name }}</td>
                                <td>{{ $client->user->email }}</td>
                                <td>{{$client->user->name}}</td>
                                <td>{{$client->phone}}</td>
                                <td class="uk-text-center">
                                    <a href="/manager/crm/clients/{{ $client->id }}/edit"><i class="md-icon material-icons"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
