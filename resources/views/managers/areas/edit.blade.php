@extends('managers.layouts.app')

@section('content')

    <div id="page_content_inner">
        <div class="uk-grid" data-uk-grid-margin="" style="margin-bottom: 20px;">
            <div class="uk-width-medium-1-2">
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a uk-margin-small-bottom">Видео</h3>
                        <div class="uk-slidenav-position" data-uk-slideshow="{animation:'scale'}">
                            <ul class="uk-slideshow">
                                <li>
                                    <iframe width="760" height="415" src="https://www.youtube.com/embed/zblQdr-Qd1c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </li>
                                <li>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/zblQdr-Qd1c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </li>
                                <li>
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/zblQdr-Qd1c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </li>
                            </ul>
                            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                                <li data-uk-slideshow-item="0"><a href=""></a></li>
                                <li data-uk-slideshow-item="1"><a href=""></a></li>
                                <li data-uk-slideshow-item="2"><a href=""></a></li>
                                <li data-uk-slideshow-item="3"><a href=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-1-2">
                <div class="md-card">
                    <div class="md-card-content">
                        <h3 class="heading_a uk-margin-small-bottom">Фото</h3>
                        <div class="uk-slidenav-position" data-uk-slideshow="{animation:'scale'}">
                            <ul class="uk-slideshow">
                                <li><img src="/altair/assets/img/gallery/Image01.jpg" alt=""></li>
                                <li><img src="/altair/assets/img/gallery/Image02.jpg" alt=""></li>
                                <li><img src="/altair/assets/img/gallery/Image03.jpg" alt=""></li>
                                <li><img src="/altair/assets/img/gallery/Image04.jpg" alt=""></li>
                            </ul>
                            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                            <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                                <li data-uk-slideshow-item="0"><a href=""></a></li>
                                <li data-uk-slideshow-item="1"><a href=""></a></li>
                                <li data-uk-slideshow-item="2"><a href=""></a></li>
                                <li data-uk-slideshow-item="3"><a href=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <form action="/manager/areas/{{ $area->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <input type="hidden" name="area_id" value="{{ $area->id }}">
            <div class="md-card">
                <div class="md-card-content">
                    <h3 class="heading_a">ОСНОВНАЯ ИНФОРМАЦИЯ</h3>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Название</label>
                                        <input required value="{{ old('name', $area->name) }}" name="name" type="text" class="md-input label-fixed" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Адрес</label>
                                        <input required value="{{ old('address', $area->address) }}" name="address" type="text" class="md-input label-fixed" />
                                    </div>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label>Описание</label>
                                <textarea name="description" cols="30" rows="4" class="md-input">
                                {{ old('description', $area->description) }}
                            </textarea>
                            </div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <input type="file" id="input-file-b" name="image" class="dropify" data-default-file="/areas/{{ $area->image }}"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">ПАРАМЕТРЫ ПЛОЩАДКИ</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Размер</label>
                                                <input value="{{ old('size', $area->size) }}" name="size" type="text" class="md-input label-fixed" />
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label>Покрытие</label>
                                                <input value="{{ old('coating', $area->coating) }}" name="coating" type="text" class="md-input label-fixed" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Вместимость</label>
                                                <input value="{{ old('capacity', $area->capacity) }}" name="capacity" type="text" class="md-input label-fixed" />
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label>Стоимость аренды</label>
                                                <input value="{{ old('rent_price', $area->rent_price) }}" name="rent_price" type="text" class="md-input label-fixed" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_a">МЕНЕДЖЕР ПЛОЩАДКИ</h3>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <div class="uk-form-row">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Адмистратор</label>
                                                <input value="{{ old('admin', $area->admin) }}" name="admin" type="text" class="md-input label-fixed" />
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label>E-mail</label>
                                                <input value="{{ old('email', $area->email) }}" name="email" type="text" class="md-input label-fixed" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Телефон</label>
                                                <input value="{{ old('phone', $area->phone) }}" name="phone" type="text" class="md-input label-fixed" />
                                            </div>
                                        </div>
                                    </div>
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
