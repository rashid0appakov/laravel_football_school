@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">
        <form action="/admin/products/{{ $product->id }}" class="uk-form-stacked" id="trainer_create_form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-large-7-10">
                    <div class="md-card">
                        <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }">
                            <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="/products/images/{{ $product->image }}" alt="user avatar"/>
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
                                <li class="uk-active"><a href="#">???????????? ????????????</a></li>
                            </ul>
                            <ul id="user_edit_tabs_content" class="uk-switcher uk-margin">
                                <li>
                                    <div class="uk-margin-top">
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">????????????????</label>
                                                <input value="{{old('name', $product->name)}}" class="md-input" type="text" id="name" name="name" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">??????????????????</label>
                                                <select data-md-selectize name="group_product_id">
                                                    <option value="{{ $product->group_product->id }}">{{ $product->group_product->name }}</option>
                                                    @foreach($group_products as $group_product)
                                                        <option value="{{ $group_product->id }}">{{ $group_product->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">??????????????????</label>
                                                <input value="{{old('price', $product->price)}}" class="md-input" type="text" id="price" name="price" required/>
                                            </div>
                                            <div class="uk-width-medium-1-2">
                                                <label for="user_edit_uname_control">??????????????????????????</label>
                                                <input value="{{old('cost_price', $product->cost_price)}}" class="md-input" type="text" id="cost_price" name="cost_price" required/>
                                            </div>
                                        </div>
                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <label for="user_edit_personal_info_control">????????????????</label>
                                                <textarea class="md-input" name="description" id="description" cols="30" rows="4">{{old('description', $product->description)}}</textarea>
                                            </div>
                                        </div>

                                        <div class="uk-grid" data-uk-grid-margin>
                                            <div class="uk-width-medium-1-1">
                                                <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    ??????????????????
                                                </button>
                                                <a style="float: right" href="/admin/products" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                                                    ??????????
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
                            <h3 class="heading_c uk-margin-medium-bottom">???????????? ??????????????????</h3>
                            <div class="uk-form-row">
                                <input type="checkbox" checked data-switchery id="active" name="active" />
                                <label for="user_edit_active" class="inline-label">???????????????????????? ??????????????</label>
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
