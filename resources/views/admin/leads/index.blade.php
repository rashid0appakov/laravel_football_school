@extends('admin.layouts.app')

@section('content')
<div id="page_content_inner">
    <div class="uk-vertical-align-middle">
        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/crm/leads/create">
            Создать заявку
        </a>
    </div>

    <h4 style="margin-top: 20px;" class="heading_a uk-margin-bottom">Входящий трафик</h4>
    <div style="text-align: center;margin-bottom: 20px;font-size: 20px;">
        <a style="text-decoration: underline;padding: 5px;" href="/admin/crm/leads/">
            Сбросить все фильтры
        </a>
        <br>
        <button style=" margin-top: 10px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
            {{ count($leads) }}
        </button>
    </div>

    <div class="md-card uk-margin-large-bottom">
        <div class="md-card-content">
            <div class="uk-slidenav-position uk-margin-large-bottom" data-uk-slider="{center:true,autoplay: true,autoplayInterval: '3000'}">

                <div class="uk-slider-container">
                    <ul class="uk-slider uk-slider-center uk-grid-width-medium-1-5 uk-grid-width-small-1-2">
                        <li style="padding:10px;">
                            <div class="md-card">
                                <div style="height: 180px;">
                                    <form style="margin-top: 25px;" action="/admin/crm/leads/filter/start-date" method="POST">
                                        @csrf
                                        <label style="margin-left: 40px;">Дата начала</label>
                                        <input style="width: 163px;" name="start_date" id="kUI_datepicker_fileter" value="{{ \Carbon\Carbon::now() }}" />
                                        <button style=" margin-top: 50px;margin-left: 6px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Отфильтровать
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li style="padding:10px;">
                            <div class="md-card">
                                <div style="height: 180px;">
                                    <form style="margin-top: 20px;" action="/admin/crm/leads/filter/status" method="POST">
                                        @csrf
                                        <label style="margin-left: 57px;">Статус</label>
                                        <select style="margin-top: 20px" data-md-selectize name="lead_status_id">
                                            @if(count($lead_statuses) > 0)
                                                @foreach($lead_statuses as $lead_status)
                                                    <option value="{{ $lead_status->id }}">{{ $lead_status->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <button style=" margin-top: 50px;margin-left: 6px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Отфильтровать
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li style="padding:10px;">
                            <div class="md-card">
                                <div style="height: 180px;">
                                    <form style="margin-top: 25px;" action="/admin/crm/leads/filter/manager" method="POST">
                                        @csrf
                                        <label style="margin-left: 40px;">Менеджер</label>
                                        <select required data-md-selectize name="manager_id">
                                            <option value="">Выбрать...</option>
                                            @if(count($managers) > 0)
                                                @foreach($managers as $manager)
                                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <button style=" margin-top: 50px;margin-left: 6px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Отфильтровать
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li style="padding:10px;">
                            <div class="md-card">
                                <div style="height: 180px;">
                                    <form style="margin-top: 25px;" action="/admin/crm/leads/filter/club" method="POST">
                                        @csrf
                                        <label style="margin-left: 40px;">Клуб</label>
                                        <select required data-md-selectize name="club_id">
                                            <option value="">Выбрать...</option>
                                            @if(count($clubs) > 0)
                                                @foreach($clubs as $club)
                                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <button style=" margin-top: 50px;margin-left: 6px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Отфильтровать
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>


                        {{--                        <li style="padding:10px;">--}}
                        {{--                            <div class="md-card">--}}
                        {{--                                <div style="height: 180px;">--}}
                        {{--                                    <form style="margin-top: 25px;" action="/admin/crm/leads/filter/channel" method="POST">--}}
                        {{--                                        @csrf--}}
                        {{--                                        <label style="margin-left: 40px;">Канал</label>--}}
                        {{--                                        <select required data-md-selectize name="channel_id">--}}
                        {{--                                            <option value="">Выбрать...</option>--}}
                        {{--                                            @if(count($channels) > 0)--}}
                        {{--                                                @foreach($channels as $channel)--}}
                        {{--                                                    <option value="{{ $channel->id }}">{{ $channel->name }}</option>--}}
                        {{--                                                @endforeach--}}
                        {{--                                            @endif--}}
                        {{--                                        </select>--}}
                        {{--                                        <button style=" margin-top: 50px;margin-left: 6px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">--}}
                        {{--                                            Отфильтровать--}}
                        {{--                                        </button>--}}
                        {{--                                    </form>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </li>--}}
                        {{--                        <li style="padding:10px;">--}}
                        {{--                            <div class="md-card">--}}
                        {{--                                <div style="height: 180px;">--}}
                        {{--                                    <form style="margin-top: 25px;" action="/admin/crm/leads/filter/entry-point" method="POST">--}}
                        {{--                                        @csrf--}}
                        {{--                                        <label style="margin-left: 40px;">Точка входа</label>--}}
                        {{--                                        <select required data-md-selectize name="entry_point_id">--}}
                        {{--                                            <option value="">Выбрать...</option>--}}
                        {{--                                            @if(count($entry_points) > 0)--}}
                        {{--                                                @foreach($entry_points as $entry_point)--}}
                        {{--                                                    <option value="{{ $entry_point->id }}">{{ $entry_point->name }}</option>--}}
                        {{--                                                @endforeach--}}
                        {{--                                            @endif--}}
                        {{--                                        </select>--}}
                        {{--                                        <button  style=" margin-top: 50px;margin-left: 6px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">--}}
                        {{--                                            Отфильтровать--}}
                        {{--                                        </button>--}}
                        {{--                                    </form>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </li>--}}
                        <li style="padding:10px;">
                            <div class="md-card">
                                <div style="height: 180px;">
                                    <form style="margin-top: 25px;" action="/admin/crm/leads/filter/when" method="POST">
                                        @csrf
                                        <label style="margin-left: 40px;">Задачи, Когда</label>
                                        <select required data-md-selectize name="when">
                                            <option value="in_past">Не указана</option>
                                            <option value="yesterday">В прошлом</option>
                                            <option value="today">Сегодня</option>
                                            <option value="tomorrow">Завтра</option>
                                        </select>
                                        <button style="margin-top: 10px" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Отфильтровать
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li style="padding:10px;">
                            <div class="md-card">
                                <div style="height: 180px;">
                                    <form style="margin-top: 25px;" action="/admin/crm/leads/filter/date-range" method="POST">
                                        @csrf
                                        <label style="margin-left: 40px;">Задачи - период</label>
                                        <input name="start_date" id="date_range_start" value="{{ \Carbon\Carbon::now() }}" />
                                        <input name="end_date" id="date_range_end" value="{{ \Carbon\Carbon::now() }}" />
                                        <button style="margin-top: 10px" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Отфильтровать
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li style="padding:10px;">
                            <div class="md-card">
                                <div style="height: 180px;">
                                    <form style="margin-top: 25px;" action="/admin/crm/leads/filter/tasks-date" method="POST">
                                        @csrf
                                        <label style="margin-left: 40px;">Задача - дата</label>
                                        <input name="date" id="date_taskst" value="{{ \Carbon\Carbon::now() }}" />
                                        <button style="margin-top: 10px" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                            Отфильтровать
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <a href="#" class="uk-slidenav uk-slidenav-previous" data-uk-slider-item="previous"></a>
                <a href="#" class="uk-slidenav uk-slidenav-next" data-uk-slider-item="next"></a>

            </div>
        </div>
    </div>


    <div class="md-card uk-margin-medium-bottom">
        <div class="md-card-content">
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-striped uk-table-hover">
                    <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Время</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Статус</th>
                        <th>Исполнитель</th>
                        <th>Ссылка</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($leads as $lead)
                        <tr>
                            <td>{{ $lead->created_at->format('d M Y') }}</td>
                            <td>{{ $lead->created_at->format('H:i:s') }}</td>
                            <td>{{$lead->name1}}</td>
                            <td>{{ $lead->phone1 }}</td>
                            <td>
                                <span class="uk-badge" style="background: {{ $lead->status->color }}">{{ $lead->status->name ?? 'Не выбран' }}</span>
                            </td>
                            <td>
                                @if($lead->manager != null)
                                    {{$lead->manager->name}}
                                @else
                                    "Администратор"
                                @endif
                            </td>
                            <td>{{ $lead->url }}</td>
                            <td class="uk-text-center">
                                <a href="/admin/crm/leads/client-create/{{ $lead->id }}"><i style="font-size: 21px;" class="uk-icon-plus-square"></i></a>
                                <a href="/admin/crm/leads/{{ $lead->id }}/edit"><i class="md-icon material-icons"></i></a>
                                <a href="/admin/crm/leads/client-delete/{{ $lead->id }}"><i style="font-size: 21px;" class="uk-icon-trash"></i></a>
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
