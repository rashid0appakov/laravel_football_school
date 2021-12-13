@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <form action="/admin/products" class="uk-form-stacked" id="trainer_create_form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="/altair/assets/img/avatars/user.png" alt="user avatar"/>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div class="user_avatar_controls">
                                        <span class="btn-file">
                                            <span class="fileinput-new"><i class="material-icons">&#xE2C6;</i></span>
                                            <span class="fileinput-exists"><i class="material-icons">&#xE86A;</i></span>
                                            <input type="file" name="image" id="image">
                                        </span>
                                    <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons">&#xE5CD;</i></a>
                                </div>
                            </div>
                            <div class="user_heading_content">
                                <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname"></span><span class="sub-heading" id="user_edit_position"></span></h2>
                            </div>
                        </div>
                        <div class="user_content">
                            @foreach ($errors->all() as $error)
                                <div class="uk-alert uk-alert-danger" data-uk-alert>
                                    <a href="#" class="uk-alert-close uk-close"></a>
                                    {{ $error }}
                                </div>
                            @endforeach
                            <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#user_edit_tabs_content'}">
                                <li class="uk-active"><a href="#">Данные товара</a></li>
                            </ul>
                            <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <div class="uk-margin-top">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Название</label>
                                                <input value="{{old('name')}}" class="md-input" type="text" id="name" name="name" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Категория</label>
                                                <select data-md-selectize name="group_product_id">
                                                    <option value="">Выбрать...</option>
                                                    @foreach($group_products as $group_product)
                                                        <option value="{{ $group_product->id }}">{{ $group_product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Стоимость</label>
                                                <input value="{{old('price')}}" class="md-input" type="text" id="price" name="price" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">Себестоимость</label>
                                                <input value="{{old('cost_price')}}" class="md-input" type="text" id="cost_price" name="cost_price" required/>
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label for="user_edit_personal_info_control">Описание</label>
                                                <textarea class="md-input" name="description" id="description" cols="30" rows="4">
                                                    {{old('description')}}
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Сохранить
                                                </button>
                                                <a style="float: right" href="/admin/products" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    Назад
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-large-3-10">
                    <div class="md-card">
                        <div class="md-card-content">
                            <h3 class="heading_c uk-margin-medium-bottom">Другие настройки</h3>
                            <div class="uk-form-row">
                                <input type="checkbox" checked data-switchery id="active" name="active" />
                                <label for="user_edit_active" class="inline-label">Пользователь активен</label>
                            </div>
                            <hr class="md-hr">
                            <div class="uk-form-row">
                                <label class="uk-form-label" for="user_edit_role">---</label>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

@stop
