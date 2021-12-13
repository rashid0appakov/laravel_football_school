@extends('managers.layouts.app')

@section('content')

    <div id="page_content_inner" style="width: 50%;">
        @if (session('success'))
            <div class="alert alert-success">
                <div class="uk-alert uk-alert-success" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <form action="/manager/warehouses/store" method="POST" enctype="multipart/form-data">
        @csrf
            <input type="hidden" name="club_id" value="{{ $club_id }}">
            <div class="md-card">
            <div class="md-card-content">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-medium-1-1">
                        <div class="uk-form-row">
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label>Название</label>
                                    <input required value="{{ old('name') }}" name="name" type="text" class="md-input label-fixed" />
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label>Цена (за еденицу)</label>
                                    <input value="{{ old('price_one') }}" name="price_one" type="text" class="md-input label-fixed" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label>Количиство</label>
                                    <input  value="{{ old('count') }}" name="count" type="text" class="md-input label-fixed" />
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label>Производитель</label>
                                    <input  value="{{ old('manufacturer') }}" name="manufacturer" type="text" class="md-input label-fixed" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label>Цвет</label>
                                    <input  value="{{ old('color') }}" name="color" type="text" class="md-input label-fixed" />
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-2">
                                    <label>Ссылка</label>
                                    <input  value="{{ old('link') }}" name="link" type="text" class="md-input label-fixed" />
                                </div>
                                <div class="uk-width-medium-1-2">
                                    <label>Сумма (общая)</label>
                                    <input  value="{{ old('full_price') }}" name="full_price" type="text" class="md-input label-fixed" />
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-margin>
                                <div class="uk-width-medium-1-1">
                                    <label for="user_edit_personal_info_control">Комментарий</label>
                                    <textarea class="md-input" name="comment" id="comment" cols="30" rows="4">
                                        {{old('comment')}}
                                    </textarea>
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

                    <a style="float:right" href="/manager/clubs/{{ $club_id }}/edit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Назад
                    </a>
                </div>
            </div>
        </form>

    </div>
@stop
