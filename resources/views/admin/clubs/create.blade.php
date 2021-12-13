@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <form action="/admin/clubs" method="POST" enctype="multipart/form-data">
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

                               <div class="uk-width-medium-1-1">
                                    <label>Площадка</label>
                                    <select data-md-selectize name="area_id">
                                        @foreach($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <!-- first paragrapher -->
                                <div class="uk-grid" data-uk-grid-margin>


                                    <!-- first paragrapher -->
                                    <br><br>
                                    <div class="uk-width-medium-1-1">
                                        <label for="title1" class="col-md-4 col-form-label text-md-right">Заголовок первого блока</label>
                                        <br>
                                        <input id="title1" type="text" class="md-input label-fixed form-control" name="title1">
                                    </div>
                                    <br><br>
                                    <div class="uk-width-medium-1-1">
                                        <label for="Textarea1" >Текст первого блока</label>
                                        <br><br>
                                        <textarea class="md-input autosized form-control" name="textarea1" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;">
                                        </textarea>
                                    </div>
                                    <br><br>
                                    <div class="uk-width-medium-1-1">
                                        <label for="title2" class="col-md-4 col-form-label text-md-right">Заголовок второго блока</label>
                                        <br><br>
                                        <input id="title2" type="text" class="md-input label-fixed form-control" name="title2">
                                    </div>
                                    <br><br>
                                    <div class="uk-width-medium-1-1">
                                        <label for="Textarea12" >Текст второго блока</label>
                                        <br><br>
                                        <textarea class="md-input autosized form-control" name="textarea2" id="textarea2" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;"></textarea>
                                    </div>

                                <br><br>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">
                                        <h3>Текст третьего блока</h3>
                                        <textarea class="md-input label-fixed form-control" name="textarea3" required rows="3"></textarea>

                                        <label for="month" class="col-md-4 col-form-label text-md-right">Заголовок третьего блока</label>
                                        <input id="month" type="text" class="md-input label-fixed form-control" name="title3" required autocomplete="month" autofocus>
                                    </div>
                                    <br><br>
                                    <div class="uk-width-medium-1-1">
                                        <label for="Textarea2" >Текст третьего блока</label><br><br>
                                        <textarea class="md-input autosized form-control" name="textarea3" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;"></textarea>
                                    </div>
                                </div>

                                <!-- second paragrapher -->
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-1">

                                        <label for="linkYoutube" class="col-md-4 col-form-label text-md-right">Ссылка на видео в видеохостинге Yotube.com</label><br><br>

                                        <input id="linkYoutube" type="text" class="md-input label-fixed form-control" name="linkYoutube" required autocomplete="linkYoutube" autofocus>

                                    </div>


                                   </div>
                                </div>

                                <div class="uk-width-medium-1-2">
                                    <div>
                                        <label>Тренеры</label>
                                        <select id="" name="trainers[]" size="{{ count($trainers) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>
                                            @foreach($trainers as $trainer)
                                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="uk-width-medium-1-2">
                            <h3>Анонсовая фотогрфия</h3>
                            <div class="uk-width-medium-1-1">
                                <input type="file" id="input-file-b" name="image" class="dropify" data-default-file=""/>
                            </div>
                            <br><br>
                            <div class="uk-width-medium-1-1">

                                <div class="uk-width-medium-1-2">
                                    <h3>Фотографии для слайдера</h3>
                                    <input type="file" name="imagess[]" multiple/>
                                </div>
                                <br><br>
                                <h3>Карта</h3>
                                <div class="uk-width-medium-1-1">
                                    <div id="map_wrapper_div">
                                        <div class="map-wrp" id="map_tuts">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="uk-grid">
                            <div class="uk-width-medium-1-2">
                                    <label>Широта</label>
                                    <input id="lat" type="text" class="md-input label-fixed form-control @error('lat') is-invalid @enderror" name="lat" value="{{ old('lat') }}" autocomplete="lat" autofocus>
                            </div>
                            <div class="uk-width-medium-1-2">
                                    <label>Долгота</label>
                                     <input id="lng" type="text" class="md-input label-fixed form-control @error('lng') is-invalid @enderror" name="lng" value="{{ old('lng') }}" autocomplete="lng" autofocus>
                            </div>
                            </div>
                            <br>

                        <!--     <div class="uk-width-medium-1-1">
                               <label>Вопрос</label>
                               <input id="questions" type="text" class="md-input label-fixed form-control @error('questions') is-invalid @enderror" name="questions" value="{{ old('questions') }}" required autocomplete="questions" autofocus>
                            </div>
                            <br>
                            <div class="uk-width-medium-1-1">
                                <label>Ответ</label>
                                <input id="answer" type="text" class="md-input label-fixed form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer') }}" required autocomplete="answer" autofocus>
                            </div> -->

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
                </div>
            </div>
        </form>
    </div>



@stop
