@extends('layouts.site')

@section('content')
<div class="champ_heading">
    <span class="sm-title competition-title text-center">
        Соревнования в Школе мяча
    </span>
    <div class="champ_img-wrp text-center">
        <img src="img/champ.svg" alt="victory" class="champ_img img-fluid">
    </div>
    <span class="champ_heading_text text-center">Соревнования это неотъемлемая часть жизни любого спортсмена
    </span>
</div>

<div class="training-text-content container">
    <div class="training-text-content-wrp">
        <span class="sm-title">Развитие лидерства</span>

        <p class="text-content training">
            Желание быть первым заложено в каждом из нас. Соревнования — естественная среда для проверки себя.
            Приобретать этот опыт победы и поражений лучше
            в дружеском коллективе и со своими родителями.
        </p>
        <img src="img/arrow_1.svg" alt="" class="arrow-decor arrow-decor-1">
        <img src="img/arrow_2.svg" alt="" class="arrow-decor arrow-decor-2">
    </div>
    <div class="training-text-content_img">
        <img src="img/photo_1(2x).png" alt="training">
    </div>
</div>
<div class="training-text-content container">
    <div class="training-text-content_img">
        <img src="img/photo_2(2x).png" alt="training">
    </div>
    <div class="training-text-content-wrp">
        <span class="sm-title">Мотивация к развитию</span>

        <p class="text-content training">
            Дети часто думают, что турнир — это развлечение
            и рассчитывают на свою стандартную работоспособность. После первого опыта они понимают, что кроме
            удовольствия от процесса, необходимо демонстрировать весь набор своих навыков для достижения
            желаемого результата.
        </p>
        <img src="img/arrow_3.svg" alt="" class="arrow-decor arrow-decor-3">
    </div>
</div>
<div class="training-text-content container">
    <div class="training-text-content-wrp">
        <span class="sm-title">Опыт</span>

        <p class="text-content training">
            Новая, непривычная атмосфера и окружение важны
            для развития и успешной социализации детей
        </p>
    </div>
    <div class="training-text-content_img">
        <img src="img/photo_3(2x).png" alt="training">
    </div>
</div>
<div class="training-text-content container">
    <div class="training-text-content_img">
        <img src="img/photo_4(2x).png" alt="training">
    </div>
    <div class="training-text-content-wrp">
        <span class="sm-title">Атмосфера</span>

        <p class="text-content training">
            Наша цель — создать семейную атмосферу, ведь каждый наш ученик является частью нашей большой семьи.
            На соревнования мы приглашаем родителей, и в целом делаем всё, чтобы это мероприятие запомнилось
            ребятам как весёлый футбольный праздник!
        </p>
        <img src="img/arrow_4.svg" alt="" class="arrow-decor arrow-decor-4">
    </div>
</div>
<div class="competition-wrp">
    <div class="competition_heading container">
        <span class="sm-title">Проведение соревнований</span>
        <span class="competition-subtitle">Чемпионат проходит среди всех клубов города</span>
    </div>

    <div class="competition-block">
        <div class="training_list container">
            <div class="competition-block-inner">
                <div class="competition-block-col">
                    <span class="competition-block_title">Цели соревнования</span>
                    <ul class="skills-list">
                        <li class="skills-item skills-block-title">Cплотить коллектив
                        </li>
                        <li class="skills-item skills-block-title">Получить яркие эмоции
                        </li>
                        <li class="skills-item skills-block-title">Выявить сильнейший клуб школы
                        </li>
                        <li class="skills-item skills-block-title">Получить опыт выступления на крупных
                            соревнованиях
                        </li>
                    </ul>
                </div>
                <div class="competition-block-col">
                    <span class="competition-block_title">Итоги</span>
                    <ul class="skills-list">
                        <li class="skills-item skills-block-title">Грамоты
                        </li>
                        <li class="skills-item skills-block-title">Рейтинг клубов
                        </li>
                        <li class="skills-item skills-block-title">Ведение мяча, приём и жонглирование с
                            рук
                        </li>
                        <li class="skills-item skills-block-title">
                            Рейтинг бомбардиров
                        </li>
                    </ul>
                </div>
            </div>
            <div class="training-text-content_img skills">
                <img src="img/photo_5(2x).png" alt="competition-block_img">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <button class="main-btn button main-btn_submit subscription-btn" data-bs-toggle="modal"
        data-bs-target="#signupModal">Оставить заявку</button>
</div>
</div>
<div class="competition_video container">
    <span class="sm-title text-center">Видео с чемпионата школы</span>
    <div class="row competition_video_row">
        <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
            <div class="competition_card">
                <button type="button" class="btn pleer-btn button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="58" viewBox="0 0 90 58">
                        <g fill="none" fill-rule="evenodd">
                            <g>
                                <g>
                                    <g>
                                        <g
                                            transform="translate(-215.000000, -4163.000000) translate(72.000000, 3958.000000) translate(0.000000, 126.000000) translate(144.000000, 80.000000)">
                                            <rect width="89" height="57" x="-.5" y="-.5" fill="#FC5252"
                                                stroke="#FC5252" rx="8" />
                                            <path fill="#FFF" fill-rule="nonzero" d="M36 38L53 28 36 18z" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
            <span class="competition_txt">Название видео</span>
        </div>
        <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
            <div class="competition_card">
                <button type="button" class="btn pleer-btn button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="58" viewBox="0 0 90 58">
                        <g fill="none" fill-rule="evenodd">
                            <g>
                                <g>
                                    <g>
                                        <g
                                            transform="translate(-215.000000, -4163.000000) translate(72.000000, 3958.000000) translate(0.000000, 126.000000) translate(144.000000, 80.000000)">
                                            <rect width="89" height="57" x="-.5" y="-.5" fill="#FC5252"
                                                stroke="#FC5252" rx="8" />
                                            <path fill="#FFF" fill-rule="nonzero" d="M36 38L53 28 36 18z" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>


                </button>
            </div>
            <span class="competition_txt">Название видео</span>
        </div>
        <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10">
            <div class="competition_card">
                <button type="button" class="btn pleer-btn button" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="90" height="58" viewBox="0 0 90 58">
                        <g fill="none" fill-rule="evenodd">
                            <g>
                                <g>
                                    <g>
                                        <g
                                            transform="translate(-215.000000, -4163.000000) translate(72.000000, 3958.000000) translate(0.000000, 126.000000) translate(144.000000, 80.000000)">
                                            <rect width="89" height="57" x="-.5" y="-.5" fill="#FC5252"
                                                stroke="#FC5252" rx="8" />
                                            <path fill="#FFF" fill-rule="nonzero" d="M36 38L53 28 36 18z" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
            <span class="competition_txt">Название видео</span>
        </div>
    </div>
    <div class="swiper-container competition-video-slider_mobile">
        <div class="swiper-wrapper">
            <div class="swiper-slide competition-video-slide">
                <div class="competition-card">
                    <div class="competition_card">
                        <button type="button" class="btn pleer-btn button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="58" viewBox="0 0 90 58">
                                <g fill="none" fill-rule="evenodd">
                                    <g>
                                        <g>
                                            <g>
                                                <g
                                                    transform="translate(-215.000000, -4163.000000) translate(72.000000, 3958.000000) translate(0.000000, 126.000000) translate(144.000000, 80.000000)">
                                                    <rect width="89" height="57" x="-.5" y="-.5" fill="#FC5252"
                                                        stroke="#FC5252" rx="8" />
                                                    <path fill="#FFF" fill-rule="nonzero"
                                                        d="M36 38L53 28 36 18z" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </button>
                    </div>
                    <span class="competition_txt">Название видео</span>
                </div>
            </div>
            <div class="swiper-slide competition-video-slide">
                <div class="competition-card">
                    <div class="competition_card">
                        <button type="button" class="btn pleer-btn button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="58" viewBox="0 0 90 58">
                                <g fill="none" fill-rule="evenodd">
                                    <g>
                                        <g>
                                            <g>
                                                <g
                                                    transform="translate(-215.000000, -4163.000000) translate(72.000000, 3958.000000) translate(0.000000, 126.000000) translate(144.000000, 80.000000)">
                                                    <rect width="89" height="57" x="-.5" y="-.5" fill="#FC5252"
                                                        stroke="#FC5252" rx="8" />
                                                    <path fill="#FFF" fill-rule="nonzero"
                                                        d="M36 38L53 28 36 18z" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </button>
                    </div>
                    <span class="competition_txt">Название видео</span>
                </div>
            </div>
            <div class="swiper-slide competition-video-slide">
                <div class="competition-card">
                    <div class="competition_card">
                        <button type="button" class="btn pleer-btn button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="90" height="58" viewBox="0 0 90 58">
                                <g fill="none" fill-rule="evenodd">
                                    <g>
                                        <g>
                                            <g>
                                                <g
                                                    transform="translate(-215.000000, -4163.000000) translate(72.000000, 3958.000000) translate(0.000000, 126.000000) translate(144.000000, 80.000000)">
                                                    <rect width="89" height="57" x="-.5" y="-.5" fill="#FC5252"
                                                        stroke="#FC5252" rx="8" />
                                                    <path fill="#FFF" fill-rule="nonzero"
                                                        d="M36 38L53 28 36 18z" />
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </button>
                    </div>
                    <span class="competition_txt">Название видео</span>
                </div>
            </div>
        </div>
    </div>
</div>
@stop