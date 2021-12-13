<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Детская футбольная школа</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div id="app">
    <div class="modal fade" id="thanksModal" tabindex="-1" aria-labelledby="thanksModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body_form modal-body_thanks">
                    <div class="smile-img-wrp">
                        <img src="/img/smile.png" alt="smile" class="smile-img img-fluid">
                    </div>
                    <h5 class="signup_title">Спасибо за заявку!</h5>
                    <span class="signup_txt text-center">
                        Мы свяжемся с вами в течение дня и обсудим детали
                    </span>
                    <button type="submit" class="main-btn button" data-dismiss="modal">Хорошо</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="trainingModal" tabindex="-1" aria-labelledby="trainingModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="signup_title">Заявка на пробную тренировку1</h5>
                </div>
                <div class="modal-body_form">
                    <form action="{{route('leads.store')}}" class="lead-form">
                        <div class="signup_form">
                            <label for="input-name_training" class="form-label">Имя ребенка</label>
                            <div>
                                <input type="text" class="input input-name" name="name" id="input-name_training" placeholder="">
                            </div>
                            <label for="input-age" class="form-label">Возраст</label>
                            <div>
                                <input type="number" class="input input-age" name="age" id="input-age" placeholder="">
                            </div>
                            <label for="input-club" class="form-label">Клуб</label>
                            <div>
                                <select class="input input-club" aria-label="select club" name="club_id">
                                    <option selected>Любой</option>
                                    @foreach($clubs as $club)
                                    <option value="{{$club->id}}">{{$club->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="button" class="main-btn button thanks-btn" data-toggle="modal"
                            data-target="#">Отправить</button>
                        <span class="request_text m-0">Заполните все поля</span>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="trainerModal" tabindex="-1" aria-labelledby="trainerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="signup_title">Заявка на вступление в тренерский состав</h5>
                </div>
                <div class="modal-body_form">
                    <form action="{{route('leads.store')}}" class="lead-form">
                        <div class="signup_form">

                            <label for="input-name" class="form-label">Имя</label>
                            <div>
                                <input type="text" class="input input-name" name="name" id="input-name_trainer"
                                    placeholder="Константин">
                            </div>
                            <label for="input-tel" class="form-label">Мобильный телефон</label>
                            <div>
                                <input type="text" class="input input-tels" name="phone" id="input-tel"
                                    placeholder="+7 999 999-99-99">
                            </div>
                            <span class="request_text m-0">Только для звонка. Без спама.</span>

                        </div>
                        <button type="button" class="main-btn button thanks-btn" data-toggle="modal"
                            data-target="#thanksModal">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="signup_title" id="exampleModalLabel">Заявка на пробную тренировку</h5>
                </div>
                <div class="modal-body_form">
                    <form action="{{route('leads.store')}}" class="lead-form">
                        <div class="signup_form">
                            <label for="input-name" class="form-label">Имя</label>
                            <div>
                                <input type="text" name="name" class="input input-name" id="input-name" placeholder="Константин">
                            </div>
                            <label for="input-tel" class="form-label">Мобильный телефон</label>
                            <div>
                                <input type="text" name="phone" class="input input-tels" id="input-tel"
                                    placeholder="+7 999 999-99-99">
                            </div>
                            <span class="request_text m-0">Только для звонка. Без спама.</span>

                        </div>
                        <button type="submit" class="main-btn button thanks-btn">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="header-wrp">
        <header class="container header-content">
            <div class="header container" id="header">
                <ul class="header_list_mobile">
                    <li class="header_item">
                        <span class="header-span">Москва</span>
                    </li>
                    <li class="header_item">
                        <a href="tel:+74951206006" class="header_link">+7 (495) 120-60-06</a>
                    </li>
                </ul>

                <ul class="header_list">
                    <li class="header_item">
                        <span class="header-span">Школа мяча</span>
                        <div class="dropdown">
                            <a href="#map">в Москве и МО</a>

                           <!--  <a class="btn btn-secondary dropdown-toggle header-list-title" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">в Москве и МО</a> -->

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($clubs as $club)
                                <li><a class="dropdown-item" href="{{route('clubs.show', $club->id)}}">{{$club->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    <li class="header_item">
                        <div class="rating-result">
                            <span class="rating-result-sum">4,7</span>
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
                                    <img src="/img/bxs-star-half.svg" alt="star" class="star-img">
                                </div>
                            </div>
                            <span class="rating-result_text">192 отзывов на Яндекс</span>
                        </div>
                    </li>
                    <li class="header_item">
                        <a href="tel:+74951206006" class="header_link">+7 (495) 120-60-06</a>
                        <span class="link_text">Ежедневно с 10:00 до 20:00</span>
                    </li>
                    <li class="header_item">
                        <button class="login_btn button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#303337" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M2.75 2.842c0 1.567 1.234 2.842 2.75 2.842S8.25 4.41 8.25 2.842C8.25 1.275 7.016 0 5.5 0S2.75 1.275 2.75 2.842zM10.389 12H11v-.632c0-2.437-1.92-4.42-4.278-4.42H4.278C1.918 6.947 0 8.93 0 11.367V12H10.388z"
                                                        transform="translate(-1180.000000, -20.000000) translate(72.000000, 16.000000) translate(1108.000000, 0.000000) translate(0.000000, 4.000000)" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle header-list-title" href="{{route('login')}}" role="button"
                                    @auth data-toggle="dropdown" @endauth aria-expanded="false">Мой кабинет</a>

                                <ul class="dropdown-menu">
                                    @if(Auth::user() != null)
                                    @if(Auth::user()->hasRole('Менеджер'))
                                        <li><a class="dropdown-item" href="/manager">Профиль</a></li>
                                    @elseif(Auth::user()->hasRole('Тренер'))
                                        <li><a class="dropdown-item" href="/trainer">Профиль</a></li>
                                    @elseif(Auth::user()->hasRole('Родитель'))
                                        <li><a class="dropdown-item" href="/parents">Профиль</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="/admin">Админка</a></li>
                                    @endif
                                    @if(Auth::user()->hasRole('Родитель'))
                                       <li><a class="dropdown-item" href="/parents/products">Услуги</a></li>
                                    @endif
                                    <li><a class="dropdown-item exit"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Выйти</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @endif
                                </ul>
                            </div>
                        </button>
                    </li>
                </ul>

                <nav class="header_nav container">

                    <a href="{{route('home')}}" class="logo-link">
                        <img class="/img-fluid logo-img" src="/img/school-ball-logo-rus-3@3x.png" alt="logo">
                    </a>
                    <div class="nav-links-wrp">
                        <div class="nav_link_line">
                            <div class="dropdown">
                                <a class="nav_link @if(Route::is('trainings')) selected @endif dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="">Методика</span>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><span class="dropdown-item fw-bold">Для детей</span></li>
                                    @foreach(['3-4', '5-7', '8-10', '11-12', '13-16'] as $age)
                                    <li><a class="dropdown-item ages" href="{{route('trainings', $age)}}">{{$age}} лет</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="nav_link_line">
                            <a href="#" class="nav_link">Тренеры</a>
                        </div>

                        <div class="nav_link_line">
                            <a href="{{route('clubs.index')}}" class="nav_link @if(Route::is('clubs.*')) selected @endif">Клубы</a>
                        </div>

                        <div class="nav_link_line">
                            <a href="{{route('championship')}}" class="nav_link @if(Route::is('championship')) selected @endif">Соревнования</a>
                        </div>

                        <div class="nav_link_line">
                            <a href="{{route('faq')}}" class="nav_link @if(Route::is('faq')) selected @endif">FAQ</a>
                        </div>

                        <div class="nav_link_line">
                            <a href="{{route('posts.index')}}" class="nav_link @if(Route::is('posts.*')) selected @endif">Новости</a>
                        </div>

                        <div class="nav_link_line">
                            <a href="#" class="nav_link">Лагерь</a>
                        </div>

                        <div class="nav_link_line">
                            <div class="sm-line">
                                <a href="#" class="nav_link">Франшиза</a>
                            </div>
                        </div>
                        <ul class="login-menu_mobile">
                            <li><a class="login-mobile_item" href="login.html">Профиль игрока</a></li>
                            <li><a class="login-mobile_item" href="#">Услуги</a></li>
                            <li><a class="login-mobile_item exit" href="#">Выйти</a></li>
                        </ul>
                    </div>

                    <div class="header_nav_inner">
                        <div class="dropdown">
                            <button class="button dropdown-toggle dropdown_tg-bot" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-expanded="false">
                                <img src="/img/t_bot.svg" alt="telegram" class="/img-fluid">
                            </button>
                            <div class="dropdown-menu dropdown-menu_tg-bot dropdown-menu-end"
                                aria-labelledby="dropdownMenuButton">
                                <div class="qr-img-wrp text-center">
                                    <img src="/img/qr_2x.png" alt="QR code" class="qr-img">
                                    <span class="qr_title text-center">Виртуальный помощник</span>
                                    <p class="qr_title_text text-center">
                                        Подключайся к нашему
                                        чат-боту в Telegram,
                                        который поможет тебе узнать больше о «Школе мяча»
                                    </p>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="nav-btn button" data-toggle="modal"
                            data-target="#signupModal">Записаться <span class="nav-btn_mobile">на
                                тренировку</span></button>

                        <div class="menu-burger__header">
                            <span></span>
                        </div>
                    </div>
                </nav>
            </div>
            @if(Route::is('home'))
            <div class="about-us">
                <div class="about-us_content">
                    <div class="about-us_top">
                        <div class="about-us_top_age">3+</div>
                        <div class="about-us_top_logo">
                            <img class="img-fluid" src="/img/pfk-cska-2008-2.png" alt="cska">
                        </div>
                        <span class="about-us_top_text">Партнёр ЦСКА</span>
                    </div>
                    <h1 class="main-title">Детская <br>
                        футбольная школа</h1>
                    <span class="main-subtitle">
                        Обучаем мальчиков и девочек от 3 до 14 лет,
                        с любым уровнем подготовки
                    </span>
                    <button class="main-btn button sign-up-btn" data-bs-toggle="modal"
                        data-bs-target="#signupModal">Пробная
                        тренировка</button>
                    <span class="text-desc">К нам присоединилось уже 3050 детей</span>
                </div>
                <div class="img-block">
                    <img src="/img/slider_back.svg" alt="football school" class="about-us-img img-fluid rot">
                        <div class="swiper-container nomySwiper">
                          <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="/img/sl_1(2x).png" alt="football school">
                            </div>
                            <div class="swiper-slide">
                                <img src="/img/sl_2(2x).png" alt="football school">
                            </div>
                            <div class="swiper-slide">
                                <img src="/img/sl_3(2x).png" alt="football school">
                            </div>
                          </div>
                        </div>
                </div>


            </div>
            @endif
        </header>
    @if(Route::is('trainings'))
        <div class="lineso_rtain"></div>
    @endif
    <div class="lineso"></div>
    </div>
    @if(!Route::is('home'))
    <div class="decor">
        <div class="square"></div>
        <div class="header-bg-wave big"></div>
    </div>
    @endif
    <main class="main-wrp">
        <div class="main container">
            @yield('content')
        </div>
    </main>
    <div class="footer-wrp">
        <footer class="footer container">
            <div class="interview interview_mobile">
                <img src="/img/logo_m24_2(2x).png" alt="moscow24" class="m24logo">
                <div class="interview-inner">
                    <span class="trainers-card_text card_text_footer">Руководитель, Андрей Вершинин, </span>
                    <a href="#" class="trainers-card_text interview-link interview-link_footer">
                        дал интервью на радио «Москва24»</a>
                </div>
            </div>
            <div class="footer-column">
                <span class="md-footer_text">Остались вопросы? Звоните:</span>
                <a href="tel:+74951206006" class="bg-footer_text">+7 (495) 120-60-06</a>
                <span class="sm-footer_text">Ежедневно с 10:00 до 20:00</span>
                <a href="" class="footer_link">info@schoolball.ru</a>
                <span class="sm-footer_text">Для отзывов и предложений</span>
                <span class="bold-sm-footer_text">Присоединяйтесь к нам в соцсетях, <br> чтобы быть в курсе событий
                    школы</span>
                <div class="footer-social_block">
                    <a href="#" class="footer-social-link">
                        <img src="/img/vk_b.svg" alt="social" class="footer_social-icon">
                    </a>
                    <a href="#" class="footer-social-link">
                        <img src="/img/fb_b.svg" alt="social" class="footer_social-icon">
                    </a>
                    <a href="#" class="footer-social-link">
                        <img src="/img/insta_b.svg" alt="social" class="footer_social-icon">
                    </a>
                    <a href="#" class="footer-social-link">
                        <img src="/img/yt_b.svg" alt="social" class="footer_social-icon">
                    </a>
                </div>
                <div class="footer_card-info">
                    <img src="/img/visa_mc.svg" alt="visa">
                    <span class="bold-sm-footer_text">или по счету</span>
                </div>
            </div>
            <div class="footer-column">
                <div class="footer-nav-wrp">
                    <nav class="footer-nav">
                        <a href="#" class="footer-nav_link bold-sm-footer_text">Методика</a>
                        <a href="#" class="footer-nav_link bold-sm-footer_text">Тренеры</a>
                        <a href="#" class="footer-nav_link bold-sm-footer_text">Клубы</a>
                    </nav>
                    <nav class="footer-nav">
                        <a href="#" class="footer-nav_link bold-sm-footer_text">Соревнования</a>
                        <a href="#" class="footer-nav_link bold-sm-footer_text">FAQ</a>
                        <a href="#" class="footer-nav_link bold-sm-footer_text">Новости</a>
                    </nav>
                    <nav class="footer-nav">
                        <a href="#" class="footer-nav_link bold-sm-footer_text">Лагерь</a>
                        <a href="#" class="footer-nav_link bold-sm-footer_text">Франшиза</a>
                    </nav>
                </div>
                <div class="interview interview_footer">
                    <img src="/img/logo_m24_2(2x).png" alt="moscow24" class="m24logo">
                    <div class="interview-inner">
                        <span class="trainers-card_text card_text_footer">Руководитель, Андрей Вершинин, </span>
                        <a href="#" class="trainers-card_text interview-link interview-link_footer">
                            дал интервью на радио «Москва24»</a>
                    </div>
                </div>
                <div class="sm-footer_text">
                    <p>ООО «Школа мяча плюс», Адрес: 121 087, г. Москва, ул. Филёвская, 4Б, пом. 163,
                        ИНН 7707407900, КПП 770701001, банк: АО «АЛЬФА-БАНК», г. Москва
                        р/с 40702810702390003476, кор/сч 30101810200000000593, БИК 044525593
                    </p>
                    <p>
                        Взаимодействуя с сайтом и используя формы обратной связи, вы даёте <a href="#"
                            class="footer_link">согласие</a>
                        на обработку персональных данных и соглашаетесь с политикой конф-ных данных
                    </p>
                </div>
            </div>
        </footer>
    </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <script>
jQuery(function($) {
// Asynchronously Load the map API
var script = document.createElement('script');
script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBNwgMhniGd4orh6i-m7mcRjzdJLljYF3c&callback=initialize";
document.body.appendChild(script);
});
function initialize() {
var map;
var bounds = new google.maps.LatLngBounds();
var mapOptions = {
mapTypeId: 'roadmap'
};
// Display a map on the page
map = new google.maps.Map(document.getElementById("map_tuts"), mapOptions);
map.setTilt(45);
// Multiple Markers
var markers = [
@foreach($clubs as $club)
    @if($club->lat)
    ['{{$club->name}}', {{$club->lat}}, {{$club->lng}}],
    @endif
@endforeach

];
// Info Window Content
var infoWindowContent = [
  @foreach($clubs as $club)
['<div class="info_content">' +
'<h3>{{$club->name}}</h3>' +
'<p>{{$club->description}}</p>' +'</div>'],
  @endforeach

];
// Display multiple markers on a map
var infoWindow = new google.maps.InfoWindow(), marker, i;
// Loop through our array of markers & place each one on the map
for( i = 0; i < markers.length; i++ ) {
var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
bounds.extend(position);
marker = new google.maps.Marker({
position: position,
map: map,
title: markers[i][0]
});
// Each marker to have an info window
google.maps.event.addListener(marker, 'click', (function(marker, i) {
return function() {
infoWindow.setContent(infoWindowContent[i][0]);
infoWindow.open(map, marker);
}
})(marker, i));
// Automatically center the map fitting all markers on the screen
map.fitBounds(bounds);
}
// Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
this.setZoom(12);
google.maps.event.removeListener(boundsListener);
});
}
</script>
</body>

</html>
