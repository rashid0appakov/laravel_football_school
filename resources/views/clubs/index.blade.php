@extends('layouts.site')

@section('content')
<div class="clubs">
    <span class="sm-title text-center clubs-title">Наши футбольные клубы</span>
    <div class="clubs-img-wrp">
        <img src="/img/img-pleers.svg" alt="pleers">
    </div>
</div>
<div class="clubs-tabs">
    <ul class="nav nav-tabs nav-tabs_clubs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="map-tab" data-toggle="tab" data-target="#map"
                type="button" role="tab" aria-controls="map" aria-selected="true">На карте</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="list-tab" data-toggle="tab" data-target="#list" type="button"
                role="tab" aria-controls="list" aria-selected="false">Списком</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show" id="map" role="tabpanel" aria-labelledby="map-tab">
            <div class="map-tab-wrp">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A685e7260afa31125a970a47eda2097c263b0c167edee608803b10bfbae7ce924&amp;source=constructor" width="1148" height="582" frameborder="0"></iframe>
            </div>

        </div>
        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
            <div class="map-tab-wrp">

                <div class="swiper-container clubs-slider_mobile">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide clubs-slide">
                            <div class="row clubs_row">
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Пятый элемент@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">5-й элемент</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Atlant_Logo 2@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Атлант</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Vershina_Logo 2@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Вершина</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide clubs-slide">
                            <div class="row clubs_row">
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Пятый элемент@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Волна</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Гладиатор@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Гладиатор</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Горизонт@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Горизонт</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide clubs-slide">
                            <div class="row clubs_row">
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Джокер@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Джокер</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Зевс@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Зевс</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Zvezda_Logo 2@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Звезда</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide clubs-slide">
                            <div class="row clubs_row">
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Пятый элемент@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Искра</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Пятый элемент@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Корона</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Kosmos_Logo 2@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Космос</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide clubs-slide">
                            <div class="row clubs_row">
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Пятый элемент@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Конструктор</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Крылья@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Крылья</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Lotos_Logo 2@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Лотос</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-slide clubs-slide">
                            <div class="row clubs_row">
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Пятый элемент@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Молния</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Пятый элемент@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Молот</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Ogonek_Logo 2@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Огонёк</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide clubs-slide">
                            <div class="row clubs_row">
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Olimp_Logo 2@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Олимп</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Raketa_Logo 2@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Ракета</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Пятый элемент@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Стрела</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide clubs-slide">
                            <div class="row clubs_row">
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Тигры@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Тигры</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Favorit_Logo 2@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Фаворит</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Flagman_Logo 2@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Флагман</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide clubs-slide">
                            <div class="row clubs_row">
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Пятый элемент@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Халк</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                                <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                                    <div class="clubs_card">
                                        <div class="clubs_card-img-wrp">
                                            <img src="/img/Чемпион@2x.png" alt="club emblem"
                                                class="clubs_card-img img-fluid">
                                        </div>
                                        <span class="clubs_card_title">Чемпион</span>
                                        <div class="rating-result clubs-card">
                                            <span class="rating-result-sum">5,0</span>
                                            <div class="stars">
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                                <div class="star">
                                                    <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                                </div>
                                            </div>
                                            <span class="rating-result_text">54 отзыва на Яндекс</span>
                                        </div>
                                        <div class="clubs_card_link">
                                            <a href="tel:+74951206006" class="header_link tel-club-link">+7 495
                                                120-60-06</a>
                                            <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                        </div>
                                        <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр.
                                            5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="clubs_row_wrp">
                    <div class="row clubs_row">
                        @foreach($clubs as $club)
                        <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
                            <a href="/clubs/{{$club->id}}">
                            <div class="clubs_card">
                                <div class="clubs_card-img-wrp">
                                    <img src="storage/{{$club->image}}" alt="club emblem"
                                        class="clubs_card-img img-fluid">
                                </div>
                                <span class="clubs_card_title">{{$club->name}}</span>
                                <div class="rating-result clubs-card">
                                    <span class="rating-result-sum">5,0</span>
                                    <div class="stars">
                                        <div class="star">
                                            <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                        </div>
                                        <div class="star">
                                            <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                        </div>
                                        <div class="star">
                                            <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                        </div>
                                        <div class="star">
                                            <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                        </div>
                                        <div class="star">
                                            <img src="/img/bxs-star.svg" alt="star" class="star-img">
                                        </div>
                                    </div>
                                    <span class="rating-result_text">54 отзыва на Яндекс</span>
                                </div>
                                <div class="clubs_card_link">
                                    <a href="tel:+74951206006" class="header_link tel-club-link">{{$club->phone}}</a>
                                    <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                                </div>
                                <span class="clubs_card_address">Зеленоград, площадь Шокина, 1, стр. 5</span>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


</div>
<div class="reviews reviews_clubs">
    <div class="reviews-top reviews-top_training clubs">
        <span class="sm-title sm-title_reviews">Отзывы родителей о Школе мяча</span>
        <div class="rating-result reviews-wrp">
            <span class="rating-result-sum reviews bg">4,7</span>
            <div class="stars">
                <div class="star">
                    <img src="/img/star.svg" alt="star" class="star-img bg">
                </div>
                <div class="star">
                    <img src="/img/star.svg" alt="star" class="star-img bg">
                </div>
                <div class="star">
                    <img src="/img/star.svg" alt="star" class="star-img bg">
                </div>
                <div class="star">
                    <img src="/img/star.svg" alt="star" class="star-img bg">
                </div>
                <div class="star">
                    <img src="/img/star_3.svg" alt="star" class="star-img bg">
                </div>
            </div>
            <span class="rating-result_text reviews bg">192 отзывов на Яндекс</span>
        </div>
        <div class="rating-wrp reviews-wrp">
            <div class="rating-inner">
                <span class="rating-result-sum reviews">4,8</span>
                <span class="rating-result_text reviews">тренерский состав</span>
            </div>
            <div class="rating-inner">
                <span class="rating-result-sum reviews">4,6</span>
                <span class="rating-result_text reviews">стадионы</span>
            </div>
            <div class="rating-inner">
                <span class="rating-result-sum reviews">4,6</span>
                <span class="rating-result_text reviews">менеджеры</span>
            </div>
        </div>
    </div>
    <div class="reviews-part container">
        <div class="reviews-row">
            <div class="reviews-content">
                <div class="reviews-block reviews-block_training">
                    <div class="reviews-block_img clubs">
                        <img src="/img/no_photo.svg" alt="user-photo">
                    </div>
                    <div class="reviews-inner">
                        <span class="reviews-block_title">
                            Татьяна Самарцева
                        </span>
                        <span class="reviews-block_text">Ребёнок тренируется</span>
                        <a href="#" class="reviews-block_text link">в клубе «Волна»</a>
                        <div class="rating-wrp rating-wrp_reviews">
                            <div class="rating-inner">
                                <span class="rating-result-sum reviews">5,0</span>
                                <div class="stars">
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                </div>
                                <span class="rating-result_text reviews">тренерский состав</span>
                            </div>
                            <div class="rating-inner">
                                <span class="rating-result-sum reviews">4,6</span>
                                <div class="stars">
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star_3.svg" alt="star" class="star-img bg">
                                    </div>
                                </div>
                                <span class="rating-result_text reviews">стадион</span>
                            </div>
                            <div class="rating-inner">
                                <span class="rating-result-sum reviews">5,0</span>
                                <div class="stars">
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                    <div class="star">
                                        <img src="/img/star.svg" alt="star" class="star-img bg">
                                    </div>
                                </div>
                                <span class="rating-result_text reviews">менеджер</span>
                            </div>
                        </div>
                        <p class="reviews-block_text">
                            Ребенок ходит на занятия с удовольствием. Тренерский состав это дружные отзывчивые
                            ребята с
                            пониманием своего дела. Мы отходили не так много занятий, чтобы сделать полноценный
                            вывод.
                            Спасибо
                            за Вашу работу!
                        </p>
                    </div>
                </div>
                <a href="#" class="reviews-link reviews-link_training">Еще отзыв</a>
            </div>
        </div>
        <div class="request request_clubs">
            <span class="request_title">Поделитесь мнением о работе вашего клуба</span>
            <span class="trainers-card_text">Оставьте отзыв, если у вас есть замечания
                или пожелания по улучшению работы клуба</span>
            <button class="button main-btn main-btn_reviews" type="submit">Отправить</button>
            <span class="request_text">или пишите на эл. почту holnov@school-ball.com</span>
        </div>
    </div>
    <div class="reviews-img reviews-img_training img-fluid">
        <img src="/img/img_2.svg" alt="horn">
    </div>
</div>
@stop