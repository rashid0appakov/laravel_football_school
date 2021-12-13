@extends('parents.layouts.app')

@section('content')

    <div id="page_content_inner">

        <div class="uk-grid uk-grid-medium" data-uk-grid-margin>
            <div class="uk-width-xLarge-2-10 uk-width-large-3-10">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            {{ $product->group_product->name }}
                        </h3>
                    </div>
                    <div class="md-card-content">
                        <div class="uk-margin-bottom uk-text-center">
                            <img src="/products/images/{{ $product->image }}" alt="" class="img_medium" />
                        </div>
                    </div>
                </div>

            </div>
            <div class="uk-width-xLarge-8-10  uk-width-large-7-10">
                <div class="md-card">
                    <div class="md-card-toolbar">
                        <h3 class="md-card-toolbar-heading-text">
                            Подробнее
                        </h3>
                    </div>
                    <div class="md-card-content large-padding">
                        <div class="uk-grid uk-grid-divider uk-grid-medium">
                            <div class="uk-width-large-1-2">
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-large-1-3">
                                        <span class="uk-text-muted uk-text-small">Название</span>
                                    </div>
                                    <div class="uk-width-large-2-3">
                                        <span class="uk-text-large uk-text-middle"><a href="#">{{ $product->name }}</a></span>
                                    </div>
                                </div>
                                <hr class="uk-grid-divider">
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-large-1-3">
                                        <span class="uk-text-muted uk-text-small">Цена</span>
                                    </div>
                                    <div class="uk-width-large-2-3">
                                        <span class="uk-text-large uk-text-middle">{{ $product->price  }}</span>
                                    </div>
                                </div>
                                <hr class="uk-grid-divider">
                                <div class="uk-grid uk-grid-small">
                                    <div class="uk-width-large-1-3">
                                        <span class="uk-text-muted uk-text-small">ID</span>
                                    </div>
                                    <div class="uk-width-large-2-3">
                                        {{ $product->uuid }}
                                    </div>
                                </div>
                                <hr class="uk-grid-divider uk-hidden-large">
                            </div>
                            <div class="uk-width-large-1-2">
                                <p>
                                    <span class="uk-text-muted uk-text-small uk-display-block uk-margin-small-bottom">Description</span>
                                    {{ $product->description }}
                                </p>

                                <div class="uk-vertical-align-middle">
                                    <a style="margin-top: 20px;" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" href="/parents/products/payment/create/{{ $product->id }}">
                                        Купить
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
