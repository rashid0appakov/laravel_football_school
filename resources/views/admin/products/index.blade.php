@extends('admin.layouts.app')

@section('content')

    <div id="page_content_inner">

        @if($errors->any())
            <div class="uk-alert uk-alert-danger" data-uk-alert="">
                {{$errors->first()}}
            </div>
        @endif
        @if(\Session::has('success'))
            <div class="uk-alert uk-alert-success" data-uk-alert="">
                {!! \Session::get('success') !!}
            </div>
        @endif

        <div class="uk-vertical-align-middle" style="margin-bottom: 20px;">
            <a class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/admin/products/create">
                Добавить товар
            </a>
        </div>

{{--        <h3 class="heading_a uk-margin-bottom">Sort products by name:</h3>--}}

{{--        <ul id="products_sort" class="uk-subnav uk-subnav-pill">--}}
{{--            <li data-uk-sort="product-name:asc"><a href="#">Ascending</a></li>--}}
{{--            <li data-uk-sort="product-name:desc"><a href="#">Descending</a></li>--}}
{{--        </ul>--}}

        <div style="margin-top: 20px;" class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}" data-show-delay="280">
            @if(count($products) > 0)
                @foreach($products as $product)
                    <div data-product-name="Repellat dignissimos.">
                        <div class="md-card md-card-hover-img">
                            <div class="md-card-head uk-text-center uk-position-relative">
                                <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">
                                    {{ $product->price }} руб</div>
                                <img style="height: auto;width: 100%;" class="md-card-head-img" src="/products/images/{{ $product->image }}" alt=""/>
                            </div>
                            <div class="md-card-content" style="margin-top: 20px;">
                                <h4 class="heading_c uk-margin-bottom">
                                    {{ $product->name }}
                                    <span class="sub-heading">ID: {{ $product->uuid }}</span>
                                </h4>
                                <p>
                                    {{ $product->description }}
                                </p>
                                <a class="md-btn md-btn-small" href="/admin/products/{{ $product->id }}/edit">Редактировать</a>
                                <a style="background: #9a140d" class="md-btn md-btn-small" href="/admin/product/delete/{{ $product->id }}">Удалить</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

    </div>

@stop
