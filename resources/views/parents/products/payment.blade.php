@extends('parents.layouts.app')

@section('content')

    <div id="page_content_inner">

        <div class="uk-grid">
            <div class="uk-width-medium-4-5 uk-container-center">
                <div class="md-card">
                    <div class="md-card-content large-padding">
                        <form action="/parents/products/payments/purchase" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product_id }}" name="product_id">
                        <h2 class="heading_b">1. Адрес</h2>
                        <div class="uk-grid uk-grid-divider uk-margin-medium-bottom" data-uk-grid-margin>
                            <div class="uk-width-medium-2-3">
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-medium-1-2">
                                        <label>Имя</label>
                                        <input name="name" required value="{{ $client->user->name }}" type="text" class="md-input" />
                                    </div>
                                    <div class="uk-width-medium-1-2">
                                        <label>Фамилия</label>
                                        <input name="surname" required value="{{ $client->surname }}" type="text" class="md-input" />
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-1-1">
                                        <label>Адрес</label>
                                        <input name="address" required value="{{ $client->address }}" type="text" class="md-input" />
                                    </div>
                                </div>
                                <div class="uk-grid" data-uk-grid-margin>
                                    <div class="uk-width-1-3">
                                        <label>Индекс</label>
                                        <input required type="text" class="md-input" />
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-medium-1-3">
                                <p class="uk-text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam dolor dolorum excepturi nulla perferendis quam quas temporibus. Aliquam aliquid, amet asperiores, culpa ea eos fuga ipsa molestiae tempore veniam veritatis?</p>
                            </div>
                        </div>
                        <hr class="uk-grid-divider">

                        <h2 class="heading_b">2. Методы доставки</h2>
                        <div class="uk-grid uk-grid-divider" data-uk-grid-margin>
                            <div class="uk-width-medium-2-3">
                                @if($deliveryMethods->count())
                                    @foreach($deliveryMethods as $deliveryMethod)
                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <input type="radio" name="deliveryMethod" id="sm_regular" data-md-icheck />
                                                <label for="sm_regular" class="inline-label">{{ $deliveryMethod->name }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                        <hr class="uk-grid-divider">

                        <h2 class="heading_b">3. Способы оплаты</h2>
                        <div class="uk-grid uk-grid-divider" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <input type="radio" name="pm" id="pm_credit_card" data-md-icheck />
                                        <label for="pm_credit_card" class="inline-label"><img src="/altair/assets/img/ecommerce/payment_icons/Visa.png" alt=""><img src="assets/img/ecommerce/payment_icons/MasterCard.png" alt=""><img src="assets/img/ecommerce/payment_icons/Diners Club.png" alt=""></label>
                                    </div>
                                    <div class="uk-width-1-1">
                                        <div class="js-pm_info pm_credit_card uk-margin-top" style="display: none">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-2-4">
                                                    <label>Card Number</label>
                                                    <input type="text" class="md-input" />
                                                </div>
                                                <div class="uk-width-medium-1-4">
                                                    <label>Expiration Date</label>
                                                    <input type="text" class="md-input label-fixed" placeholder="MM/YYYY"/>
                                                </div>
                                                <div class="uk-width-medium-1-4">
                                                    <label>Card Verification Number</label>
                                                    <input type="text" class="md-input"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <input type="radio" name="pm" id="pm_paypal" data-md-icheck />
                                        <label for="pm_paypal" class="inline-label"><img src="/altair/assets/img/ecommerce/payment_icons/PayPal.png" alt=""></label>
                                    </div>
                                    <div class="uk-width-1-1">
                                        <div class="js-pm_info pm_paypal uk-margin-top" style="display: none">
                                            <div class="uk-grid" data-uk-grid-margin>
                                                <div class="uk-width-medium-1-1">
                                                    <label>PayPal аккаунт</label>
                                                    <input type="text" class="md-input" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr class="uk-grid-divider">

                        <div class="uk-grid uk-margin-large-top" data-uk-grid-margin>
                            <div class="uk-width-medium-1-1">
                                <button class="md-btn md-btn-large md-btn-primary" type="submit">Купить</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
