@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner" style="width: 50%">
        <form action="/admin/groups" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_a">Создание группы</h3>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2" style="margin-top: 20px;">
                                    <label>Название</label>
                                    <input value="{{ old('name') }}" name="name" type="text" class="md-input label-fixed" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label>Выбрать клуб</label>
                                    <select data-md-selectize name="club_id">
                                        @foreach($clubs->where('frozen', 0) as $club)
                                            <option value="{{ $club->id }}">{{ $club->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label>Spec</label>
                                    <select data-md-selectize name="spec_id">
                                        @foreach($specs as $spec)
                                            <option value="{{ $spec->id }}">{{ $spec->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label>Level</label>
                                    <select data-md-selectize name="level_id">
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-3">
                                    <label>Возраст от</label>
                                    <input value="{{ old('age_start') }}" name="age_start" type="text" class="md-input label-fixed" />
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label>Возраст до</label>
                                    <input value="{{ old('age_start') }}" name="age_end" type="text" class="md-input label-fixed" />
                                </div>
                                <div class="uk-width-medium-1-3">
                                    <label>Площадь на группу</label>
                                    <input value="{{ old('area_on_group') }}" name="area_on_group" type="text" class="md-input label-fixed" />
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin style="display: grid;">
                                <p>
                                    <input type="checkbox" name="available" id="available" data-md-icheck />
                                    <label for="checkbox_demo_1" class="inline-label">Поставить галочку, если группа тренировок доступна</label>
                                </p>
                                <p>
                                    <input type="checkbox" name="individual_training" id="individual_training" data-md-icheck />
                                    <label for="checkbox_demo_1" class="inline-label">Поставить галочку, если группа создана для индивид. тренировок</label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="md-card">
                <div class="md-card-content" style="text-align: center;">
                    <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Сохранить
                    </button>

                    <a style="float:right" href="/admin/groups" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Назад
                    </a>
                </div>
            </div>
        </form>
    </div>
@stop
