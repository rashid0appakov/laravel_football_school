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
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
                <div class="md-card-content">
                    <div class="flexos">
                        <div>
                            <h3 class="heading_a rash">Создание клиента</h3>
                        </div>
                        <div class="gridos">
                            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/crm/clients">
                                Вернуться назад
                            </a>
                            <button data-phone="{{$client->phone}}" class="call-button md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                Позвонить
                            </button>
                            <button class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom js-open-modal"
                            data-modal="client_task">Создать задачу для клиента</button>
                            <button class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom js-open-modal"
                            data-modal="manager_task">Создать задачу для менеджера</button>
                            @if($children->count())
                            <button class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom js-open-modal"
                            data-modal="childs">Дети</button>
                            @endif
                            <button class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom js-open-modal"
                            data-modal="new_child">Добавить ребенка</button>
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <form action="/admin/crm/clients/{{ $client->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" value="{{ $client->user_id }}">
                                <input type="hidden" name="client_id" value="{{ $client->id }}">

                                <div class="flexos rashid">
                                    <div class="uk-width-medium-1-4 one-card">
                                        <div class="uk-width-medium-1-1">
                                            <h4 class="rash">Имя</h4>
                                            <input required value="{{ $client->user->name }}" name="name" type="text" class="rash-input" />
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <h4 class="rash">Фамилия</h4>
                                            <input required value="{{ $client->surname }}" name="surname" type="text" class="rash-input" />
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <h4 class="rash">Отчество</h4>
                                            <input value="{{ $client->patronymic }}" name="patronymic" type="text" class="rash-input" />
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <h4 class="rash">Телефон</h4>
                                            <input required value="{{ $client->phone }}" name="phone" type="text" class="input-tels rash-input" />
                                        </div>
                                        <div class="uk-width-medium-1-1" style="margin-bottom:25px">
                                            <h4 class="rash">Email</h4>
                                            <input required value="{{ $client->user->email }}" name="email" type="text" class="rash-input" />
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-3 one-card">
                                        <div class="uk-width-medium-1-1">
                                            <h4 class="rash">WhatsApp (чат)"</h4>
                                            <input value="{{ $client->whatsapp }}" name="whatsapp" type="text" class="rash-input" />
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <h4 class="rash">Телеграм (бот)</h4>
                                            <input value="{{ $client->telegram }}" name="telegram" type="text" class="rash-input" />
                                        </div>


                                        <div class="uk-width-medium-1-2">
                                            <label>Кто создал</label>


                                            <select data-md-selectize name="who_create">
                                                @if($client->who_create == null)
                                                    <option selected value="">Администратор</option>
                                                @else
                                                    @if($lead->first() != null)
                                                        @foreach($managers as $manager)
                                                            @if($manager->id == $lead->first()->manager_id)<option selected value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                            @endif
                                                        @endforeach

                                                    @endif
                                                @endif

                                                    @foreach($managers as $manager)
                                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                    @endforeach

                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-1">
                                            <h4 class="rash">Дата начала</h4>
                                            <input value="{{ $client->start_date }}" class="rash-input" name="start_date" id="kUI_datepicker_a" value="{{ \Carbon\Carbon::now() }}" />
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-3 one-card">
                                        <div class="uk-width-medium-1-1">
                                            <h4 class="rash">Комментарий</h4>
                                            <div class="uk-form-row">
                                            <textarea name="comment" cols="30" rows="4" class="rash-input">{{ $client->comment }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="one-card appakov">
                                    <div class="uk-grid rashid" data-uk-grid-margin>

                                            <div class="uk-width-medium-1-3">
                                                <h4 class="rash">Статус</h4>
                                                <select data-md-selectize name="lead_status_id">
                                                        <option selected value="{{ $client->status->id }}">{{ $client->status->name }}</option>
                                                    @if(count($lead_statuses) > 0)
                                                        @foreach($lead_statuses as $lead_status)
                                                            <option value="{{ $lead_status->id }}">{{ $lead_status->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                    <h4 class="rash">Причина "отскока"</h4>
                                                    <input value="{{ $client->refusal_reason }}" name="refusal_reason" type="text" class="rash-input" />
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                    <h4 class="rash">Пароль</h4>
                                                    <input required name="password" type="password" value="$user->phone" class="rash-input" />
                                            </div>

                                    </div>

                                    <div class="uk-grid rashid"  style="margin-bottom:20px; " data-uk-grid-margin>
                                        <div class="uk-width-medium-1-3">
                                           <h4 class="rash">Канал</h4>
                                            <select required data-md-selectize name="channel_id">
                                                @if($client->channel)<option selected value="{{ $client->channel->id }}">{{ $client->channel->name }}</option>@endif
                                                @if(count($channels) > 0)
                                                    @foreach($channels as $channel)
                                                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <h4 class="rash">Точка входа</h4>
                                            <select required data-md-selectize name="entry_point_id">
                                                @if($client->entry_point)<option selected value="{{ $client->entry_point->id }}">{{ $client->entry_point->name }}</option>@endif
                                                @if(count($entry_points) > 0)
                                                    @foreach($entry_points as $entry_point)
                                                        <option value="{{ $entry_point->id }}">{{ $entry_point->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <h4 class="rash">Подтвердите пароль</h4>
                                            <input required name="password_confirmation" type="password" value="$user->phone" class="rash-input" />
                                        </div>
                                    </div>
                                    <h3>Данные из формы</h3>
                                    <div class="uk-grid rashid"  style="margin-bottom:20px; " data-uk-grid-margin>
                                        <div class="uk-width-medium-1-5">
                                            <input type="text" value="{{$client->tel}}" class="rash-input" readonly />
                                        </div>
                                        <div class="uk-width-medium-1-5">
                                            <input type="text" value="{{$client->own}}" class="rash-input" readonly />
                                        </div>
                                        <div class="uk-width-medium-1-5">
                                            <input type="text" value="{{$client->ch}}" class="rash-input" readonly />
                                        </div>
                                        <div class="uk-width-medium-1-5">
                                            <input type="text" value="{{$client->url}}" class="rash-input" readonly />
                                        </div>
                                        <div class="uk-width-medium-1-5">
                                            <input type="text" value="{{$client->pl}}" class="rash-input" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="one-card appakov">
                                    <div class="uk-grid" style="margin-bottom:20px; " data-uk-grid-margin>
                                        <div class="uk-width-medium-1-3">
                                            <h4 class="rash">Тип</h4>
                                            <select required data-md-selectize name="lead_type_id">
                                                @if($client->lead_type)<option selected value="{{ $client->lead_type->id }}">{{ $client->lead_type->name }}</option>@endif
                                                @if(count($lead_types) > 0)
                                                    @foreach($lead_types as $lead_type)
                                                        <option value="{{ $lead_type->id }}">{{ $lead_type->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <h4 class="rash">Предложение</h4>
                                            <input value="{{ $client->offer }}" name="offer" type="text" class="rash-input" />
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <h4 class="rash">Адрес</h4>
                                            <input value="{{ $client->address }}" name="address" type="text" class="rash-input" />
                                        </div>
                                        <div class="uk-width-medium-1-3">
                                            <h4 class="rash">Запрос</h4>
                                            <div class="uk-form-row">
                                                <textarea name="request" cols="30" rows="4" class="rash-input">{{ $client->request }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                        Добавить
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<div class="backos"></div>
<div class="modal js-modal " tabindex="-1" data-modal="manager_task" aria-hidden="true">
    <div class="modal__cross js-modal-close">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
   </div>



{{--            <div class="uk-width-medium-1-2">--}}
{{--                <button  id="open-form"--}}
{{--                         class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom"--}}
{{--                         href="#nav">--}}
{{--                    Создать задачу для менеджера--}}
{{--                </button>--}}
{{--                <br>--}}
{{--                <button style="margin-top: 10px;"  id="open-client-task-form"--}}
{{--                         class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom"--}}
{{--                         href="#nav">--}}
{{--                    Создать задачу для клиента--}}
{{--                </button>--}}
{{--                <div class="md-card expandable" style="margin-top: 20px;display: none"  id="form">--}}
{{--                    <div class="md-card-content">--}}
{{--                        <h3 class="heading_a">Новая задача</h3>--}}
{{--                        <form id="form" action="/admin/tasks/manager/managerTaskStore" method="POST">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="client_id" value="{{ $client->id }}">--}}
{{--                            <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                <div class="uk-width-medium-1-1">--}}
{{--                                    <div class="uk-form-row" style="margin-top: 20px;">--}}
{{--                                        <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                            <div class="uk-width-medium-1-1">--}}
{{--                                                <label>Заголовок"</label>--}}
{{--                                                <input id="title" style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                        <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                            <div class="uk-width-medium-1-1">--}}
{{--                                                <label>Статус</label>--}}
{{--                                                <select data-md-selectize name="status_id">--}}
{{--                                                    @if(count($statuses) > 0)--}}
{{--                                                        @foreach($statuses as $status)--}}
{{--                                                            <option value="{{ $status->id }}">{{ $status->name }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    @endif--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                        <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                            <div class="uk-width-medium-1-1">--}}
{{--                                                <label>Менеджер</label>--}}
{{--                                                <select required data-md-selectize name="manager_id">--}}
{{--                                                    @if(count($managers) > 0)--}}
{{--                                                        @foreach($managers as $manager)--}}
{{--                                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    @endif--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                        <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                            <div class="uk-width-medium-1-1">--}}
{{--                                                <label>Дедлайн</label>--}}
{{--                                                <input style="float: right;" name="deadline" id="kUI_datetimepicker_task_client" />--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                        <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                            <div class="uk-width-medium-1-1">--}}
{{--                                                <label>Описание</label>--}}
{{--                                                <textarea id="description" name="description" cols="30" rows="4" class="md-input"></textarea>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="uk-form-row" style="padding-bottom: 20px;">--}}
{{--                                        <div class="uk-grid" data-uk-grid-margin>--}}
{{--                                            <div class="uk-width-medium-1-1">--}}
{{--                                                <label>Теги</label>--}}
{{--                                                <br>--}}
{{--                                                <select style="width: 90% !important;" id="" name="tasktags[]" size="{{ count($tasktags) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>--}}
{{--                                                    @foreach($tasktags as $tasktag)--}}
{{--                                                        <option value="{{ $tasktag->id }}">{{ $tasktag->name }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <button type="button" onclick="return checkTasksField()"--}}
{{--                                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">--}}
{{--                                        Создать--}}
{{--                                    </button>--}}
{{--                                </div>--}}

<div class="md-card-content">
    <h3 class="heading_a">Новая задача</h3>
    <form id="form" action="/admin/tasks/manager/managerTaskStore" method="POST">
        @csrf
        <input type="hidden" name="client_id" value="{{ $client->id }}">
        <div class="uk-grid" data-uk-grid-margin>
            <div class="uk-width-medium-1-1" style="overflow-y: scroll;height: 700px;">
                <div class="uk-form-row" style="margin-top: 20px;">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <label>Заголовок"</label>
                            <input id="title" style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />
                        </div>

                    </div>
                </div>
                <div class="uk-form-row" style="padding-bottom: 20px;">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Статус</label>
                            <select data-md-selectize name="status_id">
                                @if(count($statuses) > 0)
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="uk-form-row" style="padding-bottom: 20px;">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Менеджер</label>
                            <select required data-md-selectize name="manager_id">
                                @if(count($managers) > 0)
                                    @foreach($managers as $manager)
                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="uk-form-row" style="padding-bottom: 20px;">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Дедлайн</label>
                            <input name="deadline" id="kUI_datetimepicker_task_client" />
                        </div>
                    </div>
                </div>
                <div class="uk-form-row" style="padding-bottom: 20px;">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Описание</label>
                            <textarea id="description" name="description" cols="30" rows="4" class="md-input"></textarea>
                        </div>
                    </div>
                </div>
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
                <button type="button" onclick="return checkTasksField()"
                        class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">
                    Создать
                </button>
            </div>

        </div>
    </form>
  </div>
</div>

<div class="backos"></div>
<div class="modal js-modal " tabindex="-1" data-modal="client_task" aria-hidden="true">
    <div class="modal__cross js-modal-close">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
   </div>

    <div class="md-card-content">
        <h3 class="heading_a">Новая задача</h3>
        <form id="formUpdate" action="/admin/tasks/client/clientTaskStore" method="POST">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $client->id }}">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-1" style="overflow-y: scroll;height: 700px;">
                    <div class="uk-form-row" style="margin-top: 20px;">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <label>Заголовок"</label>
                                <input id="titleUpdate" style="margin-top: 20px;" name="title" type="text" class="md-input label-fixed" />
                            </div>

                        </div>
                    </div>
                    <div class="uk-form-row" style="padding-bottom: 20px;">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <label>Статус</label>
                                <select data-md-selectize name="status_id">
                                    @if(count($statuses) > 0)
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="uk-form-row" style="padding-bottom: 20px;">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <label>Дедлайн</label>
                                <input style="float: right;" name="deadline" id="kUI_datetimepicker_task" />
                            </div>
                        </div>
                    </div>
                    <div class="uk-form-row" style="padding-bottom: 20px;">
                        <div class="uk-grid" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <label>Описание</label>
                                <textarea id="descriptionUpdate" name="description" cols="30" rows="4" class="md-input"></textarea>
                            </div>
                        </div>
                    </div>
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
                    <button type="button"  onclick="return checkTasksFieldUpdate()"
                            class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom">
                        Создать
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
        <div class="uk-width-medium-1-2" style="margin-top: 20px;">



<div class="backos"></div>
<div class="modal js-modal " tabindex="-1" data-modal="new_child" aria-hidden="true">
    <div class="modal__cross js-modal-close">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
   </div>

                <div class="md-card-content" style="overflow-y: scroll;height: 700px;">
                    <h3 class="heading_a">Создание ребенка</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <form action="/admin/crm/children" method="POST" enctype="multipart/form-data">
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
                                            <input required name="patronymic" type="text" class="md-input label-fixed" />
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>День рождения</label>
                                            <input style="width: 100%;" required value="{{ $client->start_date }}" name="birthday" id="birthday_datepicker_a" value="{{ \Carbon\Carbon::now() }}" />
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
                                            <input required style="margin-top: 20px;" name="workout_balance" type="text" class="md-input label-fixed" />
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
                                            <input readonly name="age" type="text" value="" class="md-input label-fixed" />
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
                @if(count($children) > 0)
<div class="backos"></div>
<div class="modal js-modal " tabindex="-1" data-modal="childs" aria-hidden="true">
    <div class="modal__cross js-modal-close">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
   </div>
<div class="all_childs">
    @foreach($children as $child)
    <div class="childso">
        <h3>{{ $child->name }} {{ $child->surname }}</h3>
        <button class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light trigger-custom js-open-modal"
        data-modal="edit_child_{{$child->name}}">Редактировать</button>
    </div>
    @endforeach
</div>
</div>

 @foreach($children as $child)
<div class="backos"></div>
<div class="modal js-modal " tabindex="-1" data-modal="edit_child_{{$child->name}}" aria-hidden="true">
    <div class="modal__cross js-modal-close">
   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
   </div>

                <hr>
                <div class="md-card-content">
                    <h3 class="heading_a">Редактивароние ребенка</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <form action="/admin/crm/children/{{ $child->id }}" method="POST" enctype="multipart/form-data">
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
                                            <select data-md-selectize name="club_id">
                                                @if($child->club)<option required selected value="{{ $child->club->id }}">{{ $child->club->name }}</option>@endif
                                                @if(count($clubs) > 0)
                                                    @foreach($clubs as $club)
                                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="uk-width-medium-1-2">
                                            <label>Остаток тренировок / заморозок</label>
                                            <input value="{{ $child->workout_balance }}" style="margin-top: 20px;" name="workout_balance" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Амплуа</label>
                                            <select required data-md-selectize name="game_role">
                                                @if($child->spec)<option selected value="{{ $child->spec->id }}">{{ $child->spec->name }}</option>@endif
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

</div>
    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@stop
