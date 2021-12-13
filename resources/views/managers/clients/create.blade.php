@extends('managers.layouts.app')

@section('content')
<div id="page_content_inner">
    <div class="uk-vertical-align-middle">
        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/manager/crm/clients">
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
    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2" style="margin-top: 20px;">

            <div class="md-card">

                <div class="md-card-content">
                    <h3 class="heading_a">Создание клиента</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <form action="/manager/crm/clients" method="POST">
                                @csrf
                               <div class="uk-form-row" style="padding-bottom: 20px;">
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
                               </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Тип</label>
                                            <select required data-md-selectize name="lead_type_id">
                                                <option value="">Выбрать...</option>
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
                                        <input required name="phone" type="text" class="md-input label-fixed" />
                                    </div><div class="uk-width-medium-1-2">
                                        <label>Email</label>
                                        <input required name="email" type="text" class="md-input label-fixed" />
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
                                        <input required name="name" type="text" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Фамилия</label>
                                        <input name="surname" type="text" class="md-input label-fixed" />
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
                                        <input name="offer" type="text" class="md-input label-fixed" />
                                    </div>
                                </div>
                            </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <label>Адрес</label>
                                            <input name="address" type="text" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Запрос</label>
                                        <div class="uk-form-row">
                                            <textarea name="request" cols="30" rows="4" class="md-input">

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

                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Причина "отскока"</label>
                                        <input style="margin-top: 20px;" name="refusal_reason" type="text" class="md-input label-fixed" />
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
                            </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>WhatsApp (чат)"</label>
                                        <input name="whatsapp" type="text" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Телеграм (бот)</label>
                                        <input name="telegram" type="text" class="md-input label-fixed" />
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Дата начала</label>
                                        <input name="start_date" id="kUI_datepicker_a" value="{{ \Carbon\Carbon::now() }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Следующий звонок</label>
                                        <input style="float: right;" name="next_day_time_call" id="next_day_time_call" />
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
    </div>
</div>
@stop
