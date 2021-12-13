@extends('managers.layouts.app')

@section('content')

    <div id="page_content_inner" style="padding-bottom: 10px;">

        <form action="/manager/clubs/{{ $club->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" name="club_id" value="{{ $club->id }}">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">ОСНОВНАЯ ИНФОРМАЦИЯ</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Название</label>
                                        <input required value="{{ old('name', $club->name) }}" name="name" type="text" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <select data-md-selectize name="manager_id">
                                            <option value="{{ $club->manager->id }}">{{ $club->manager->name }}</option>

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
                                            @if($club->area_id != null)
                                                <option selected value="{{ $club->area_id }}">{{ $club->area->name }}</option>
                                            @endif
                                            @foreach($areas as $area)
                                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- first paragrapher -->

                                    <div class="uk-width-medium-1-1">
                                        <label for="title1" class="col-md-4 col-form-label text-md-right">Заголовок первого блока</label>
                                        <input id="title1" type="text" class="md-input label-fixed form-control @error('description') is-invalid @enderror" name="title1" value="<?=$club->getOriginal('title1')?>" required autocomplete="title1" autofocus>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <label for="Textarea1" >Текст первого блока</label>
                                        <textarea class="md-input autosized form-control  @error('textarea1') is-invalid @enderror" name="textarea1" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;"><?=$club->getOriginal('textarea1')?></textarea>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <label for="training" class="col-md-4 col-form-label text-md-right">Заголовок второго блока</label>
                                        <input id="training" type="text" class="md-input label-fixed form-control @error('description') is-invalid @enderror" name="title2" value="<?=$club->getOriginal('title2')?>" required autocomplete="training" autofocus>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <label for="Textarea12" >Текст второго блока</label>
                                        <textarea class="md-input autosized form-control  @error('textarea12') is-invalid @enderror" name="textarea2" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;"><?=$club->getOriginal('textarea2')?></textarea>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <label for="month" class="col-md-4 col-form-label text-md-right">Заголовок третьего блока</label>
                                        <input id="title3" type="text" class="md-input label-fixed form-control @error('description') is-invalid @enderror" name="title3" value="<?=$club->getOriginal('title3')?>" required autocomplete="title3" autofocus>
                                    </div>

                                    <div class="uk-width-medium-1-1">
                                        <label for="Textarea2" >Текст третьего блока</label>
                                        <textarea class="md-input autosized form-control  @error('textarea3') is-invalid @enderror" name="textarea3" required cols="30" rows="4" style="overflow-x: hidden; overflow-wrap: break-word; height: 121px;"><?=$club->getOriginal('textarea3')?></textarea>
                                    </div>

                                    <!-- second paragrapher -->

                                    <div class="uk-width-medium-1-1">

                                        <label for="linkYoutube" class="col-md-4 col-form-label text-md-right">Ссылка на видео в видеохостинге Yotube.com</label>

                                        <input id="linkYoutube" type="text" class="md-input label-fixed form-control @error('linkYoutube') is-invalid @enderror" name="linkYoutube" value="{{ $club->linkYoutube }}" required autocomplete="linkYoutube" autofocus>

                                    </div>


                                    <div class="uk-width-medium-1-2">
                                        <div>
                                            <label>Тренеры</label>
                                            <select id="" name="trainers[]" size="{{ count($trainers) }}" class="uk-width-1-1" multiple="multiple" data-md-select2>
                                                @foreach($club->trainers as $trainer)
                                                    <option value="{{ $trainer->id }}" selected>{{ $trainer->name }}</option>
                                                @endforeach
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
                                <textarea name="description" cols="30" rows="4" class="md-input">{{ old('description', $club->description) }}</textarea>
                            </div>
                            <div class="uk-width-medium-1-1">
                                {{--                                <input type="file" id="input-file-b" name="image" class="dropify"  data-default-file="/clubs/{{ $club->image }}"/>--}}
                                <br><br>
                                <div class="uk-width-medium-1-1">
                                    <div id="map_wrapper_div">
                                        <div class="map-wrp" id="map_tuts">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="md-input-wrapper">
                                        <label>Широта</label>
                                        <input id="lat" type="text" class="md-input label-fixed form-control @error('lat') is-invalid @enderror" name="lat" value="<?=$club->getOriginal('lat')?>" required autocomplete="lat" autofocus>
                                    </div>
                                    <div class="md-input-wrapper">
                                        <label>Долгота</label>
                                        <input id="lng" type="text" class="md-input label-fixed form-control @error('lng') is-invalid @enderror" name="lng" value="<?=$club->getOriginal('lng')?>" required autocomplete="lng" autofocus>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="uk-width-medium-1-2">
                            <input type="file" id="input-file-b" name="image" class="dropify"  data-default-file="/clubs/{{ $club->image }}"/>
                        </div>

                        @foreach($club->images as $image)
                            <div class="image_box">
                                <button type="button" class="krestos" onclick="if(confirm('Потдвердите действие'))$('#imgdel').attr('action', '/image/{{$image->id}}').submit()">✖</button>
                                <input type="hidden" name="img_id" value="{{$image->id}}">
                                <img src="/storage/{{$image->src}}">
                            </div>
                        @endforeach

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

                    <a style="float: right" href="/manager/clubs" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Список клубов
                    </a>
                </div>
            </div>

        </form>
    </div>

    <form action="" id="imgdel" method="POST">
        @csrf
        @method('DELETE')
    </form>

    <div id="page_content_inner">
        @if (session('success'))
            <div class="alert alert-success">
                <div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="uk-vertical-align-middle" style="display: flex;">
            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/manager/warehouses/create/{{ $club->id }}">
                Добавить инвентарь
            </a>
            <form  enctype="multipart/form-data" action="/manager/warehouses/import" method="POST" style="margin-left: 30px;">
                @csrf
                <input type="hidden" name="name" value="{{ $club->id }}">
                <input type="hidden" name="price_one" value="{{ $club->id }}">
                <input type="hidden" name="count" value="{{ $club->id }}">
                <input type="hidden" name="manufacturer" value="{{ $club->id }}">
                <input type="hidden" name="color" value="{{ $club->id }}">
                <input type="hidden" name="comment" value="{{ $club->id }}">
                <input type="hidden" name="link" value="{{ $club->id }}">
                <input type="hidden" name="full_price" value="{{ $club->id }}">
                <input type="hidden" name="club_id" value="{{ $club->id }}">
                <div class="uk-form-file md-btn md-btn-primary">
                    Выберите файл
                    <input id="form-file" type="file" name="excel_file">
                </div>
                <button class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" type="submit">Импорт</button>
            </form>
        </div>
        <h4 style="margin-top: 20px;" class="heading_a uk-margin-bottom">Список вещей на складе</h4>
        <div class="md-card uk-margin-medium-bottom">
            <div class="md-card-content">
                <div class="uk-overflow-container">
                    <table class="uk-table uk-table-striped uk-table-hover">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Количество</th>
                            <th>Сумма</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($warehouses) > 0)
                            <?php
                            $i = 1;
                            ?>
                            @foreach($warehouses as $warehouse)
                                <tr>
                                    <td>{{ $warehouse->name }}</td>
                                    <td>{{ $warehouse->count }}</td>
                                    <td>{{ $warehouse->full_price }}</td>
                                    <td class="uk-text-center">
                                        <a href="/manager/warehouses/edit/{{ $warehouse->id }}"><i class="md-icon material-icons"></i></a>
                                        <a href="javascript:void(0);" onclick="return submit_form_warehouse({{ $i }})">
                                            <i class="md-icon material-icons"></i>
                                        </a>
                                        <form action="/manager/warehouses/delete" method="POST" id="delete_warehouse_{{ $i }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $warehouse->id }}">
                                            <input type="hidden" name="club_id" value="{{ $warehouse->club_id }}">
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                ?>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
