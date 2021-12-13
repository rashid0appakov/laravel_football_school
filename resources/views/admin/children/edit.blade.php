@extends('admin.layouts.app')

@section('content')
<div id="page_content_inner">
    <div class="uk-vertical-align-middle">
        <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/children">
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

            <div class="md-card" style="margin-top: 20px;">

                <div class="md-card-content">
                    <h3 class="heading_a">Редактивароние ребенка</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <form action="/admin/crm/children/{{ $child->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
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
                                            <input value="{{ $child->birthday }}" name="birthday" id="birthday_datepicker_child" value="{{ \Carbon\Carbon::now() }}" />
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
        </div>
    </div>
</div>
@stop
