@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <form action="/admin/areas" method="POST" enctype="multipart/form-data">
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
                                    <label>Адрес</label>
                                    <input required value="{{ old('address') }}" name="address" type="text" class="md-input label-fixed" />
                                </div>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <label>Описание</label>
                            <textarea name="description" cols="30" rows="4" class="md-input">
                                {{ old('description') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="uk-width-medium-1-2">
                        <input type="file" id="input-file-b" name="image" class="dropify" data-default-file=""/>
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
                                                <input value="{{ old('size') }}" name="size" type="text" class="md-input label-fixed" />
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label>Покрытие</label>
                                                <input value="{{ old('coating') }}" name="coating" type="text" class="md-input label-fixed" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Вместимость</label>
                                                <input value="{{ old('capacity') }}" name="capacity" type="text" class="md-input label-fixed" />
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label>Стоимость аренды</label>
                                                <input value="{{ old('rent_price') }}" name="rent_price" type="text" class="md-input label-fixed" />
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
                                                <label>Менеджер</label>
                                                <select required data-md-selectize name="manager_id">
                                                    @if(count($managers) > 0)
                                                        @foreach($managers as $manager)
                                                            <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="uk-width-medium-1-2" style="margin-top: 20px;">
                                                <label>E-mail</label>
                                                <input value="{{ old('email') }}" name="email" type="text" class="md-input label-fixed" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-form-row">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label>Телефон</label>
                                                <input value="{{ old('phone') }}" name="phone" type="text" class="md-input input-tels label-fixed" />
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
