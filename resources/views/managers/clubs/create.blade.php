@extends('managers.layouts.app')

@section('content')

    <div id="page_content_inner">
        <form action="/manager/clubs" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">ОСНОВНАЯ ИНФОРМАЦИЯ</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Название</label>
                                        <input required value="{{ old('name') }}" name="name" type="text" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <select data-md-selectize name="manager_id">
                                            @foreach($managers as $manager)
                                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Площадка</label>
                                        <select data-md-selectize name="area_id">
                                            <option value="">Выбрать...</option>
                                            @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- first paragrapher -->

                                    <div class="uk-width-medium-1-1">
                                        <label for="title1" class="col-md-4 col-form-label text-md-right">Заголовок первого блока</label>
                                        <input id="title1" type="text" class="md-input label-fixed form-control @error('description') is-invalid @enderror" name="title1" value="" required autocomplete="title1" autofocus>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <label for="Textarea1" >Текст первого блока</label>
                                        <textarea class="md-input autosized form-control  @error('textarea1') is-invalid @enderror" name="textarea1" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;">
                                        </textarea>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <label for="training" class="col-md-4 col-form-label text-md-right">Заголовок первого блока</label>
                                        <input id="training" type="text" class="md-input label-fixed form-control @error('description') is-invalid @enderror" name="training" value="" required autocomplete="training" autofocus>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <label for="Textarea12" >Текст второго блока</label>
                                        <textarea class="md-input autosized form-control  @error('textarea12') is-invalid @enderror" name="textarea12" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;"></textarea>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <label for="month" class="col-md-4 col-form-label text-md-right">Заголовок третьего блока</label>
                                        <input id="month" type="text" class="md-input label-fixed form-control @error('description') is-invalid @enderror" name="month" value="" required autocomplete="month" autofocus>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <label for="Textarea2" >Текст третьего блока</label>
                                        <textarea class="md-input autosized form-control  @error('textarea2') is-invalid @enderror" name="textarea2" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;"></textarea>
                                    </div>

                                    <!-- second paragrapher -->

                                    <div class="uk-width-medium-1-1">

                                        <label for="title1" class="col-md-4 col-form-label text-md-right">Ссылка на видео в видеохостинге Yotube.com</label>

                                        <input id="title2" type="text" class="md-input label-fixed form-control @error('title2') is-invalid @enderror" name="title2" value="" required autocomplete="title2" autofocus>

                                    </div>


                                    <div class="uk-width-medium-1-2">
                                        <div>
                                            <label>Тренеры</label>
                                            <select required id="" name="trainers[]" size="{{ count($trainers) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>
                                                @foreach($trainers as $trainer)
                                                    <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label>Описание</label>
                                <textarea name="description" cols="30" rows="4" class="md-input">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <input type="file" id="input-file-b" name="image" class="dropify"  data-default-file=""/>
                        </div>


                        <div class="uk-width-medium-1-2">
                            <label>Фотографии для слайдера</label>
                            <input type="file" name="imagess[]" multiple/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md-card">
                <div class="md-card-content" style="text-align: center;">
                    <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
@stop
