@extends('managers.layouts.app')

@section('content')
<div id="page_content_inner">
    <div class="uk-vertical-align-middle">
        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/manager/crm/clients">
            Вернуться назад
        </a>
        <button data-phone="{{$client->phone}}" style="float: right;margin-right: 20px;background: #2196f3;" class="call-button md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
            Позвонить
        </button>
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
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2" style="margin-top: 20px;">

            <div class="md-card">

                <div class="md-card-content">
                    <h3 class="heading_a">Создание клиента</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <form action="/manager/crm/clients/{{ $client->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" value="{{ $client->user_id }}">
                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Канал</label>
                                            <select required data-md-selectize name="channel_id">
                                                @if($client->channel)<option selected value="{{ $client->channel->id }}">{{ $client->channel->name }}</option>@endif
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
                                                <option selected value="{{ $client->entry_point->id }}">{{ $client->entry_point->name }}</option>
                                                @if(count($entry_points) > 0)
                                                    @foreach($entry_points as $entry_point)
                                                        <option value="{{ $entry_point->id }}">{{ $entry_point->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Тип</label>
                                            <select required data-md-selectize name="lead_type_id">
                                                <option selected value="{{ $client->lead_type->id }}">{{ $client->lead_type->name }}</option>
                                                @if(count($lead_types) > 0)
                                                    @foreach($lead_types as $lead_type)
                                                        <option value="{{ $lead_type->id }}">{{ $lead_type->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Телефон</label>
                                            <input required value="{{ $client->phone }}" name="phone" type="text" class="md-input label-fixed" />
                                        </div><div class="uk-width-medium-1-2">
                                            <label>Email</label>
                                            <input required value="{{ $client->user->email }}" name="email" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Пароль</label>
                                            <input required name="password" type="password" class="md-input label-fixed" />
                                        </div><div class="uk-width-medium-1-2">
                                            <label>Подтвердите пароль</label>
                                            <input required name="password_confirmation" type="password" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Имя предаставителя</label>
                                            <input required value="{{ $client->user->name }}" name="name" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Фамилия</label>
                                            <input required value="{{ $client->surname }}" name="surname" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Отчество</label>
                                            <input value="{{ $client->patronymic }}" name="patronymic" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Кто создал</label>
                                            <select required data-md-selectize name="who_create">
                                                @foreach($managers as $manager)
                                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Предложение</label>
                                            <input value="{{ $client->offer }}" name="offer" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Адрес</label>
                                            <input value="{{ $client->address }}" name="address" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Запрос</label>
                                            <div class="uk-form-row">
                                            <textarea name="request" cols="30" rows="4" class="md-input">
                                                {{ $client->request }}
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Комментарий</label>
                                            <div class="uk-form-row">
                                            <textarea name="comment" cols="30" rows="4" class="md-input">
                                                {{ $client->comment }}
                                            </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Причина "отскока"</label>
                                            <input value="{{ $client->refusal_reason }}" style="margin-top: 20px;" name="refusal_reason" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Статус</label>
                                            <select data-md-selectize name="lead_status_id">
                                                <option selected value="{{ $client->status->id }}">{{ $client->status->name }}</option>
                                                @if(count($lead_statuses) > 0)
                                                    @foreach($lead_statuses as $lead_status)
                                                        <option value="{{ $lead_status->id }}">{{ $lead_status->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>WhatsApp (чат)"</label>
                                            <input value="{{ $client->whatsapp }}" name="whatsapp" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Телеграм (бот)</label>
                                            <input value="{{ $client->telegram }}" name="telegram" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Дата начала</label>
                                            <input value="{{ $client->start_date }}" name="start_date" id="kUI_datepicker_a" value="{{ \Carbon\Carbon::now() }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Следующий звонок</label>
                                            <input value="{{ $client->next_day_time_call }}" style="float: right;" name="next_day_time_call" id="next_day_time_call" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
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

        <div class="uk-width-medium-1-2" style="margin-top: 20px;">
            <button  id="open-form"
            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom"
            href="#nav">
               Создать задачу
            </button>

            <div class="md-card expandable" style="margin-top: 20px;display: none"  id="form">
                                    <div class="md-card-content">
                                        <h3 class="heading_a">Новая задача</h3>
                                        <form id="form" action="/manager/task/store" method="POST">
                                            @csrf
                                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
{{--                                                    <div class="uk-form-row" style="margin-top: 20px;">--}}
{{--                                                        <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                                            <div class="uk-width-medium-1-1">--}}
{{--                                                                <label>Заголовок"</label>--}}
{{--                                                                <input id="title" style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />--}}
{{--                                                            </div>--}}

{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                                        <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                                            <div class="uk-width-medium-1-1">--}}
{{--                                                                <label>Статус</label>--}}
{{--                                                                <select data-md-selectize name="status_id">--}}
{{--                                                                    @if(count($statuses) > 0)--}}
{{--                                                                        @foreach($statuses as $status)--}}
{{--                                                                            <option value="{{ $status->id }}">{{ $status->name }}</option>--}}
{{--                                                                        @endforeach--}}
{{--                                                                    @endif--}}
{{--                                                                </select>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                                        <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                                            <div class="uk-width-medium-1-1">--}}
{{--                                                                <label>Менеджер</label>--}}
{{--                                                                <select required data-md-selectize name="manager_id">--}}
{{--                                                                    @if(count($managers) > 0)--}}
{{--                                                                        @foreach($managers as $manager)--}}
{{--                                                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>--}}
{{--                                                                        @endforeach--}}
{{--                                                                    @endif--}}
{{--                                                                </select>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                                        <div class="uk-grid" data-uk-grid-margin>
                                                            <div class="uk-width-medium-1-1">
                                                                <label>Дедлайн</label>
                                                                <input style="float: right;" name="deadline" id="deadline" />
                                                            </div>
                                                        </div>
                                                    </div>
{{--                                                    <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                                        <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                                            <div class="uk-width-medium-1-1">--}}
{{--                                                                <label>Описание</label>--}}
{{--                                                                <textarea id="description" name="description" cols="30" rows="4" class="md-input"></textarea>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="uk-form-row" style="padding-bottom: 20px;">
                                                        <div class="uk-grid" data-uk-grid-margin>
                                                            <div class="uk-width-medium-1-1">
                                                                <label>Теги</label>
                                                                <br>
                                                                <select style="width: 90% !important;" id="" name="tasktags[]" size="{{ count($tasktags) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>
                                                                    @foreach($tasktags as $tasktag)
                                                                        <option value="{{ $tasktag->id }}">{{ $tasktag->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">
                                                        Создать
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
            </div>

            <div class="md-card">

                <div class="md-card-content">
                    <h3 class="heading_a">Создание ребенка</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <form action="/manager/crm/children" method="POST">
                                @csrf
                                <input type="hidden" name="parent_id" value="{{ $client->id }}">
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <input type="file" id="input-file-b" name="image" class="dropify" data-default-file=""/>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Фамилия ребенка</label>
                                            <input required name="surname" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Имя ребенка</label>
                                            <input required name="name" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Отчество</label>
                                            <input name="patronymic" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>День рождения</label>
                                            <input required value="{{ $client->start_date }}" name="birthday" id="birthday_datepicker_a" value="{{ \Carbon\Carbon::now() }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Клуб</label>
                                            <select required data-md-selectize name="club_id">
                                                @if(count($clubs) > 0)
                                                    @foreach($clubs as $club)
                                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Остаток тренировок / заморозок</label>
                                            <input style="margin-top: 20px;" disabled name="workout_balance" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Амплуа</label>
                                            <select data-md-selectize name="game_role">
                                                @if(count($spec) > 0)
                                                    @foreach($spec as $sp)
                                                        <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Уровень</label>
                                            <select data-md-selectize name="level_id">
                                                <option value="">Выбрать</option>
                                                @if(count($levels) > 0)
                                                    @foreach($levels as $level)
                                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Пол</label>
                                            <select required data-md-selectize name="gender">
                                                <option value="Мужской">Мужской</option>
                                                <option value="Женский">Женский</option>
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Возраст</label>
                                            <input readonly name="age" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
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
                @if(count($children) > 0)
                    @foreach($children as $child)
                <hr>
                <div class="md-card-content">
                    <h3 class="heading_a">Редактивароние ребенка</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <form action="/manager/crm/children/{{ $child->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <input type="hidden" name="parent_id" value="{{ $client->id }}">
                                <input type="hidden" name="id" value="{{ $child->id }}">
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <input type="file" id="input-file-b" name="image" class="dropify" data-default-file="/users/children/avatars/{{ $child->image }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Фамилия ребенка</label>
                                            <input required value="{{ $child->surname }}" name="surname" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Имя ребенка</label>
                                            <input required value="{{ $child->name }}" name="name" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Отчество</label>
                                            <input value="{{ $child->patronymic }}" name="patronymic" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>День рождения</label>
                                            <input value="{{ $child->birthday }}" name="birthday" id="birthday_datepicker_ch_{{ $child->id }}" value="{{ \Carbon\Carbon::now() }}" />
                                        </div>

                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Клуб</label>
                                            <select required data-md-selectize name="club_id">
                                                <option value="{{ $child->club->id }}">{{ $child->club->name }}</option>
                                                @if(count($clubs) > 0)
                                                    @foreach($clubs as $club)
                                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Остаток тренировок / заморозок</label>
                                            <input value="{{ $child->workout_balance }} / {{ $child->freezing_balance }}" disabled style="margin-top: 20px;" name="workout_balance" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Амплуа</label>
                                            <select required data-md-selectize name="game_role">
                                                @if($child->spec) <option selected value="{{ $child->spec->id }}">{{ $child->spec->name }}</option> @endif
                                                @if(count($spec) > 0)
                                                    @foreach($spec as $sp)
                                                        <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Уровень</label>
                                            <select required data-md-selectize name="level_id">
                                                @if($child->level)<option selected value="{{ $child->level->id }}">{{ $child->level->name }}</option>@endif
                                                @if(count($levels) > 0)
                                                    @foreach($levels as $level)
                                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Пол</label>
                                            <select data-md-selectize name="gender">
                                                <option selected value="{{ $child->gender }}">{{ $child->gender }}</option>
                                                <option value="Мужской">Мужской</option>
                                                <option value="Женский">Женский</option>
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Возраст</label>
                                            <input readonly value="{{ $child->age }}" name="age" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                Сохранить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                    @endforeach
                    @endif
            </div>
        </div>
    </div>
</div>
@stop
