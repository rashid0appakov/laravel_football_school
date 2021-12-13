@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner" style="">
        <div class="uk-grid" data-uk-grid-margin="" style="margin-bottom: 20px;">
            <div class="uk-width-medium-1-2">
        <form action="/admin/aboniments/{{ $aboniment->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" name="aboniment_id" value="{{ $aboniment->id }}">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">Создание абонемента</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Название:</label>
                                        <input value="{{ old('name', $aboniment->name) }}" name="name" type="text" class="md-input label-fixed" />
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <label>Выбрать групппу</label>
                                        <select id="" name="groups[]" size="{{ count($groups) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>
                                            @foreach($aboniment->ab_groups as $ab_groups)
                                                <option selected value="{{ $ab_groups->id }}">
                                                    {{ $ab_groups->club->name }}
                                                    | Возраст:
                                                    {{ $ab_groups->age_start }}
                                                    -
                                                    {{ $ab_groups->age_end }}
                                                    |
                                                    {{ $ab_groups->spec->name }}
                                                    |
                                                    {{ $ab_groups->level->name }}
                                                </option>
                                            @endforeach
                                            @foreach($groups as $group)
                                                <option value="{{ $group->id }}">
                                                    {{ $group->club->name }}
                                                    | Возраст:
                                                    {{ $group->age_start }}
                                                    -
                                                    {{ $group->age_end }}
                                                    |
                                                    {{ $group->spec->name }}
                                                    |
                                                    {{ $group->level->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="uk-grid" data-uk-grid-margin style="display: grid;">
                                    <p>
                                        <input {{ $aboniment->hide_for_new == 1 ? "checked" : "" }} type="checkbox" name="hide_for_new" id="hide_for_new" data-md-icheck />
                                        <label for="checkbox_demo_1" class="inline-label">Скрывать для новых клиентов</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="md-card-content" style="text-align: center;width: 100%;">
                            <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                Сохранить
                            </button>

                            <a style="float:right;margin-right: 13px;" href="/admin/aboniments" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                Назад
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
            </div>

            <div class="uk-width-medium-1-2">

                @if(count($workouts) > 0)
                    <?php
                    $i = 1;
                    ?>

                    @foreach($workouts as $workout)
                        <form action="/admin/workouts/{{ $workout->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="aboniment_id" value="{{ $aboniment->id }}">
                            <input type="hidden" name="workout_id" value="{{ $workout->id }}">
                            <div class="md-card">
                                <div class="md-card-content">
                                    <div class="uk-grid" data-uk-grid-margin>
                                        <div class="uk-width-medium-1-1">
                                            <div class="uk-form-row">
                                                <div class="uk-grid" data-uk-grid-margin>
                                                    <div class="uk-width-medium-1-3">
                                                        <label>Число тренировок:</label>
                                                        <input value="{{ old('number_workouts', $workout->number_workouts) }}" name="number_workouts" type="text" class="md-input label-fixed" />
                                                    </div>
                                                    <div class="uk-width-medium-1-3">
                                                        <label>Цена тренировок</label>
                                                        <input value="{{ old('price_workouts', $workout->price_workouts) }}" name="price_workouts" type="text" class="md-input label-fixed" />
                                                    </div>
                                                    <div class="uk-width-medium-1-3">
                                                        <label>Число заморозок</label>
                                                        <input value="{{ old('number_freezing', $workout->number_freezing) }}" name="number_freezing" type="text" class="md-input label-fixed" />
                                                    </div>
                                                </div>
                                                <button style="margin-top: 10px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Изменить
                                                </button>

                                                <a href="/admin/workouts/delete/{{ $workout->id }}" style="margin-top: 10px;" class="md-btn md-btn-danger md-btn-wave-light waves-effect waves-button waves-light">
                                                    Удаить
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        $i++;
                        ?>
                    @endforeach
                @endif


                <form action="/admin/workouts" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="abonement_id" value="{{ $aboniment->id }}">
                    <div class="md-card" style="margin-top: 20px">
                        <div class="md-card-content">
                            <h3 class="heading_a">Пакет тренировок, добавить</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-3">
                                                <label>Число тренировок:</label>
                                                <input value="{{ old('number_workouts') }}" name="number_workouts" type="text" class="md-input label-fixed" />
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <label>Цена тренировок</label>
                                                <input value="{{ old('price_workouts') }}" name="price_workouts" type="text" class="md-input label-fixed" />
                                            </div>
                                            <div class="uk-width-medium-1-3">
                                                <label>Число заморозок</label>
                                                <input value="{{ old('number_freezing') }}" name="number_freezing" type="text" class="md-input label-fixed" />
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <button style="margin-top: 15px;" type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                        Добавить
                                    </button>


                        </div>
                    </div>


                </form>


                        </div>
                    </div>
            </div>
    </div>
@stop
