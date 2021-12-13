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
                                <h4>Клиент 1</h4>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Имя</label>
                                        <input required name="name1" type="text" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Телефон</label>
                                        <input required name="phone1" type="text" class="md-input label-fixed" />
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1" style="margin-top: 21px;">
                                        <label>Email</label>
                                        <input required name="email" type="text" class="md-input label-fixed" />
                                    </div>
                                </div>
                                <hr style="margin-top: 25px;">
                                <h4>Клиент 2</h4>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Имя</label>
                                        <input required name="name2" type="text" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Телефон</label>
                                        <input required name="phone2" type="text" class="md-input label-fixed" />
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Статус</label>
                                        <select required data-md-selectize name="status_id">
                                            @if(count($lead_statuses) > 0)
                                                @foreach($lead_statuses as $lead_status)
                                                    <option value="{{ $lead_status->id }}">{{ $lead_status->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Клуб</label>
                                        <select required data-md-selectize name="club_id">
                                            <option value="">Выбрать...</option>
                                            @if(count($clubs) > 0)
                                                @foreach($clubs as $club)
                                                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="uk-width-medium-1-2">
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
                                </div>
                                <hr style="margin-top: 25px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Имя ребенка</label>
                                        <input required name="child_name" type="text" class="md-input label-fixed" required/>
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>День рождения</label>
                                        <input required name="birthday" id="birthday_datepicker_a" value="{{ \Carbon\Carbon::now() }}" />
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Уровень</label>
                                        <select required data-md-selectize name="level_id">
                                            <option value="">Выбрать</option>
                                            @if(count($levels) > 0)
                                                @foreach($levels as $level)
                                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <hr style="margin-top: 25px;">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Запрос</label>
                                        <select data-md-selectize name="request_id">
                                            <option value="">Выбрать</option>
                                            @if(count($requests) > 0)
                                                @foreach($requests as $request)
                                                    <option value="{{ $request->id }}">{{ $request->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                        <div class="uk-form-row">
                                            <textarea name="request_text" cols="30" rows="4" class="md-input"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Предложение</label>
                                        <select data-md-selectize name="offer_id">
                                            <option value="">Выбрать</option>
                                            @if(count($offers) > 0)
                                                @foreach($offers as $offer)
                                                    <option value="{{ $offer->id }}">{{ $offer->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="uk-width-medium-1-1">
                                        <div class="uk-form-row">
                                            <textarea name="offer_text" cols="30" rows="4" class="md-input"></textarea>
                                        </div>
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
