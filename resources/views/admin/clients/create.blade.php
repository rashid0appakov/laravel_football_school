@extends('admin.layouts.app')

@section('content')
<div id="app">
<div id="page_content_inner">
    <div class="uk-vertical-align-middle">
        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/crm/clients">
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
        <div class="uk-width-medium-1-1" style="margin-top: 20px;">



                <div class="md-card-content">
                    <h3 class="heading_a">Создание клиента</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <form action="/admin/crm/clients" method="POST">
                                @csrf
                               <div class="uk-form-row" style="padding-bottom: 20px;">
                                  <div class="uk-grid" data-uk-grid-margin>
                                     <div class="uk-width-medium-1-2">
                                       <label>Канал</label>
                                       <select data-md-selectize name="channel_id">
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
                                          <select data-md-selectize name="entry_point_id">
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
                                        <div class="uk-width-medium-1-2">
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
                                        <div class="uk-width-medium-1-2">
                                        <label>Телефон</label>
                                        <input name="phone" value="{{old('phone')}}" type="text" style="margin-top: 20px" class="md-input input-tels label-fixed" />
                                    </div>
                                    </div>
                                </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
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
                                    <div class="uk-width-medium-1-2">
                                        <label>Email</label>
                                        <input name="email" value="{{old('email')}}" type="text" class="md-input label-fixed" />
                                    </div>
                                </div>
                            </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Пароль</label>
                                            <input name="password" value="{{old('password')}}" type="password" class="md-input label-fixed" />
                                        </div><div class="uk-width-medium-1-2">
                                            <label>Подтвердите пароль</label>
                                            <input name="password_confirmation" type="password" class="md-input label-fixed" />
                                        </div>
                                    </div>
                                </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Имя предаставителя</label>
                                        <input name="name" value="{{old('name')}}" type="text" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Фамилия</label>
                                        <input name="surname" value="{{old('surname')}}" type="text" class="md-input label-fixed" />
                                    </div>
                                </div>
                            </div>
                                <div class="uk-form-row" style="padding-bottom: 20px;">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-2">
                                            <label>Отчество</label>
                                            <input name="patronymic" value="{{old('patronymic')}}" type="text" class="md-input label-fixed" />
                                        </div>
                                                 <div class="uk-width-medium-1-2">
                                            <label>Кто создал</label>

                             
                                            
                                            <select required data-md-selectize name="who_create">
                                                @foreach($managers as $manager)
                                                   <option selected value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                  
                                                @endforeach
                                              
                                                    @foreach($managers as $manager)
                                                        <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Предложение</label>
                                        <input name="offer" type="text" value="{{old('offer')}}" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                            <label>Адрес</label>
                                            <input name="address" value="{{old('address')}}" type="text" class="md-input label-fixed" />
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Запрос</label>
                                        <div class="uk-form-row">
                                            <textarea name="request" value="{{old('request')}}" cols="30" rows="4" class="md-input"></textarea>
                                        </div>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Комментарий</label>
                                        <div class="uk-form-row">
                                            <textarea name="comment" value="{{old('comment')}}" cols="30" rows="4" class="md-input"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Причина "отскока"</label>
                                        <input style="margin-top: 20px;" value="{{old('refusal_reason')}}" name="refusal_reason" type="text" class="md-input label-fixed"  />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Дата начала</label>
                                        <input name="start_date" id="kUI_datepicker_a" value="{{ \Carbon\Carbon::now() }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row" style="padding-bottom: 20px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>WhatsApp (чат)"</label>
                                        <input name="whatsapp" type="text" value="{{old('whatsapp')}}" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Телеграм (бот)</label>
                                        <input name="telegram" value="{{old('telegram')}}" type="text" class="md-input label-fixed" />
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
