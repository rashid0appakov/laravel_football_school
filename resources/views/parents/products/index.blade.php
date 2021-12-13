@extends('parents.layouts.app')

@section('content')

    <div id="page_content_inner">

        <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4 hierarchical_show" data-uk-grid="{gutter: 20, controls: '#products_sort'}" data-show-delay="280">
            @if(count($products) > 0)
                @foreach($products as $product)
                    <div data-product-name="Repellat dignissimos.">
                        <div class="md-card md-card-hover-img">
                            <div class="md-card-head uk-text-center uk-position-relative">
                                <div class="uk-badge uk-badge-danger uk-position-absolute uk-position-top-left uk-margin-left uk-margin-top">$ 585.00</div>
                                <img class="md-card-head-img" src="/products/images/{{ $product->image }}" alt=""/>
                            </div>
                            <div class="md-card-content">
                                <h4 class="heading_c uk-margin-bottom">
                                    {{ $product->name }}
                                    <span class="sub-heading">SKU: 174474</span>
                                </h4>
                                <p>
                                    {{ $product->description }}
                                </p>
                                <a class="md-btn md-btn-small" href="/parents/products/{{ $product->id }}/show">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

    </div>

@stop
