@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner" style="width: 50%">
        <form action="/admin/aboniments" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_a">Создание абонемента</h3>
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label>Название:</label>
                                    <input value="{{ old('name') }}" name="name" type="text" class="md-input label-fixed" />
                                </div>
                            </div>

                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label>Выбрать групппу</label>
                                    <select id="" name="groups[]" size="{{ count($groups) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>
                                        @foreach($groups->where('frozen', 0) as $group)
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
                                    <input type="checkbox" name="hide_for_new" id="hide_for_new" data-md-icheck />
                                    <label for="checkbox_demo_1" class="inline-label">Скрывать для новых клиентов</label>
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

                    <a style="float:right" href="/admin/aboniments" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Назад
                    </a>
                </div>
            </div>
        </form>
    </div>
@stop
