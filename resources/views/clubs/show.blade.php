@extends('layouts.site')

@section('content')
<div class="club-info">
    <span class="sm-title club-info_title text-center">
        Футбольная секция в клубе {{$club->name}}
    </span>
    <div class="club-info_text-wrp text-center">
        <span class="club-info_text">Более 240 детей тренируются в клубе</span>
        <div class="club-info_bg"></div>
    </div>
</div>

           <div class="swiper-container slider_clubs">
                <div class="swiper-wrapper">
                    @if($club->image)
                        @foreach($club->images as $imago)
                        <div class="swiper-slide">
                            <div class="slideroso" style="background-image: url('/storage/<?=$imago->src?>');"></div>
                        </div>   
                        @endforeach
                    @endif
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

       <iframe width="100%" height="300" src="https://www.youtube.com/embed/{{$club->title2}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary club-video" data-toggle="modal" data-target="#exampleModal">
    <div class="video-player_icon">
        <svg width="84px" height="52px" viewBox="0 0 84 52" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="ШФ_Страница-клуба" transform="translate(-552.000000, -1154.000000)">
                    <g id="Group-3" transform="translate(550.000000, 1152.000000)">
                        <g id="Group-63-Copy" transform="translate(2.000000, 2.000000)">
                            <rect id="Rectangle" fill="#FFFFFF" x="0" y="0" width="84" height="52" rx="8">
                            </rect>
                            <polygon id="Path" fill="#FC5252" fill-rule="nonzero"
                                points="34 36 51 26.0000001 34 16"></polygon>
                        </g>
                    </g>
                </g>
            </g>
        </svg>
    </div>
    <span class="club-video-text">Видео про клуб</span>
</button>
<div class="modal fade modal-video_club" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class='embed-container'><iframe src='https://www.youtube.com/embed//bWms--s5d2g'
                            frameborder='0' allowfullscreen></iframe></div>
                </div>
            </div>
        </div>
    </div>
</div>
<span class="sm-title text-center about-club-title">В нашей школе</span>

<div class="swiper-container club-advantages_slider">
    <div class="swiper-wrapper">
        <div class="swiper-slide club-info-slide text-center">
            <div class="about-club-card">
                <div class="advantages_img">
                    <img src="/img/ico_1@1x.svg" alt="advantage icon" class="/img-fluid">
                </div>
                <span class="advantages_text">Профессиональные тренеры</span>
            </div>
        </div>
        <div class="swiper-slide club-info-slide text-center">
            <div class="about-club-card">
                <div class="advantages_img">
                    <img src="/img/ico_2@1x.svg" alt="advantage icon" class="/img-fluid">
                </div>
                <span class="advantages_text">Участие в турнирах</span>
            </div>
        </div>
        <div class="swiper-slide club-info-slide text-center">
            <div class="about-club-card">
                <div class="advantages_img">
                    <img src="/img/ico_3@1x.svg" alt="advantage icon" class="/img-fluid">
                </div>
                <span class="advantages_text">Персональный менеджер</span>
            </div>
        </div>
        <div class="swiper-slide club-info-slide text-center">
            <div class="about-club-card">
                <div class="advantages_img">
                    <img src="/img/ico_5@1x.svg" alt="advantage icon" class="/img-fluid">
                </div>
                <span class="advantages_text">Для любителей и игроков ДЮСШ</span>
            </div>
        </div>
        <div class="swiper-slide club-info-slide text-center">
            <div class="about-club-card">
                <div class="advantages_img">
                    <img src="/img/ico_4@1x.svg" alt="advantage icon" class="/img-fluid">
                </div>
                <span class="advantages_text">Контроль успеваемости футболистов</span>
            </div>
        </div>
        <div class="swiper-slide club-info-slide text-center">
            <div class="about-club-card">
                <div class="advantages_img">
                    <img src="/img/ico_6@1x.svg" alt="advantage icon" class="/img-fluid">
                </div>
                <span class="advantages_text">Система лояльности</span>
            </div>
        </div>


    </div>
</div>

<div class="club-advantages_wrp">
    <div class="row club-advantages_row">
        <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10 about-club-card">
            <div class="advantages_img">
                <img src="/img/ico_1@1x.svg" alt="advantage icon" class="/img-fluid">
            </div>
            <span class="advantages_text">Профессиональные тренеры</span>
        </div>
        <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10 about-club-card">
            <div class="advantages_img">
                <img src="/img/ico_2@1x.svg" alt="advantage icon" class="/img-fluid">
            </div>
            <span class="advantages_text">Участие в турнирах</span>
        </div>
        <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10 about-club-card">
            <div class="advantages_img">
                <img src="/img/ico_3@1x.svg" alt="advantage icon" class="/img-fluid">
            </div>
            <span class="advantages_text">Персональный менеджер</span>
        </div>
    </div>
    <div class="row club-advantages_row">
        <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10 about-club-card">
            <div class="advantages_img">
                <img src="/img/ico_4@1x.svg" alt="advantage icon" class="/img-fluid">
            </div>
            <span class="advantages_text">Контроль успеваемости футболистов</span>
        </div>
        <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10 about-club-card">
            <div class="advantages_img">
                <img src="/img/ico_5@1x.svg" alt="advantage icon" class="/img-fluid">
            </div>
            <span class="advantages_text">Для любителей и игроков ДЮСШ</span>
        </div>
        <div class="col-4 col-xl-4 col-lg-6 col-md-6 col-sm-10 about-club-card">
            <div class="advantages_img">
                <img src="/img/ico_6@1x.svg" alt="advantage icon" class="/img-fluid">
            </div>
            <span class="advantages_text">Система лояльности</span>
        </div>
    </div>
</div>

<div class="training-text-content">
    <div class="training-text-content-wrp">
        <span class="sm-title">{{ $club->title1 }}</span>
   
        <p class="text-content training">
         @if($club->textarea1)
           {!!$club->textarea1!!} 
         @endif 
           
       
        </p>
    
    </div>
    <div class="training-text-content_img">
        <img src="/img/man_with_horn.svg" alt="training">
    </div>
</div>
<div class="training-text-content">
    <div class="training-text-content_img">
        <img src="/img/man_with_map.svg" alt="training">
    </div>
    <div class="training-text-content-wrp">
         <span class="sm-title">{{ $club->title2 }}</span>

        <p class="text-content training">
           @if($club->textarea2)
            {!!$club->textarea2!!} 
           @endif 
            <!-- Школа располагается в черте Донского, Даниловского, Гагаринского и Академического районов.
            В непосредственной близости находятся ТТК и три станции метро – Тульская, Ленинский проспект,
            Шаболовская. -->
            
        
        </p>
  
        <!-- <p class="text-content training">
            Обучение футболу в клубе «Молния» проводится
            на просторной площадке с современным покрытием.
            Для детей предусмотрены раздевалки с персональными шкафчиками, а на территории клуба действует
            бесплатная парковка.
        </p>
        <p class="text-content training">
            Записаться в футбольную секцию можно как лично посетив школу, так и путем покупки абонемента на
            сайте. Также вы можете прийти в клуб «Молния» на бесплатную футбольную тренировку для детей, что
            позволит познакомить ребенка
            с миром футбола и отлично провести время.
        </p> -->
    </div>
</div>
<div class="training-text-content">
    <div class="training-text-content-wrp">
        <span class="sm-title"> {{$club->title3}} </span>
       
        <p class="text-content training">
            @if($club->textarea3)
             {!!$club->textarea3!!} 
            @endif 
            <!-- Обучение включает в себя два тренировочных сезона
            по 72 занятия в год с продолжительностью в 1 час. -->
        </p>

        <!-- <p class="text-content training">
            Все тренировки проходят «от простого к сложному».
            На протяжении тренировочного года требования к ученикам и сложность упражнений постепенно
            возрастают.
        </p>
        <p class="text-content training">
            Если уровень подготовки ученика отстаёт от общего уровня группы, ему предлагаются дополнительные
            индивидуальные занятия с тренером.
        </p> -->
    </div>
    <div class="training-text-content_img">
        <img src="/img/img_3.svg" alt="training">
    </div>
</div>
<front-schedule :club="{{$club}}"></front-schedule>
<div class="faq" style="display: none;">
    <div class="training-text-content">
        <div class="training-text-content_img">
            <img src="/img/faq.svg" alt="questions" class="/img-fluid">
        </div>
        <div class="training-text-content-wrp">
            <span class="sm-title">Часто задаваемые вопросы</span>

            <div class="swiper-container accordionSwiper">
                <div class="swiper-wrapper">
          
                    <div class="swiper-slide">
                        <div class="accordion">
                           
                            <div class="accordion-header">
                               {{ $club->questions}}
                            </div>
                            <div class="accordion-text">
                               {{ $club->answer}}
                            </div>
                         

                            <!-- <div class="accordion-header">Нужно ли проходить просмотр, чтобы попасть в вашу
                                школу?</div>
                            <div class="accordion-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Molestias
                                quisquam cupiditate sed
                                laboriosam blanditiis eveniet quasi doloribus! Deleniti, et magnam!</div>

                            <div class="accordion-header">Как проходит первая (пробная) тренировка?</div>
                            <div class="accordion-text">
                                На первом (пробном) занятии тренер знакомит нового ученика
                                с группой и уделяет ему повышенное внимание. После окончания занятия, тренер
                                общается с
                                родителями и консультирует
                                их по текущему уровню развития ребёнка (даёт рекомендации).
                            </div>

                            <div class="accordion-header">Как делятся дети в группе?</div>
                            <div class="accordion-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                elit. Ducimus
                                accusantium doloremque
                                cumque voluptatum deleniti! Aperiam?</div>
                        </div> -->
                    </div>
           
                    <!-- <div class="swiper-slide">
                        <div class="accordion">
                            <div class="accordion-header">С какого возраста можно отдавать ребёнка в вашу школу?
                            </div>
                            <div class="accordion-text">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur magni
                                nulla dolorum
                                veritatis! Consectetur magnam sit obcaecati totam at quaerat.
                            </div>

                            <div class="accordion-header">Нужно ли проходить просмотр, чтобы попасть в вашу
                                школу?</div>
                            <div class="accordion-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Molestias
                                quisquam cupiditate sed
                                laboriosam blanditiis eveniet quasi doloribus! Deleniti, et magnam!</div>

                            <div class="accordion-header">Как проходит первая (пробная) тренировка?</div>
                            <div class="accordion-text">
                                На первом (пробном) занятии тренер знакомит нового ученика
                                с группой и уделяет ему повышенное внимание. После окончания занятия, тренер
                                общается с
                                родителями и консультирует
                                их по текущему уровню развития ребёнка (даёт рекомендации).
                            </div>

                            <div class="accordion-header">Как делятся дети в группе?</div>
                            <div class="accordion-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                elit. Ducimus
                                accusantium doloremque
                                cumque voluptatum deleniti! Aperiam?</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="accordion">
                            <div class="accordion-header">С какого возраста можно отдавать ребёнка в вашу школу?
                            </div>
                            <div class="accordion-text">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur magni
                                nulla dolorum
                                veritatis! Consectetur magnam sit obcaecati totam at quaerat.
                            </div>

                            <div class="accordion-header">Нужно ли проходить просмотр, чтобы попасть в вашу
                                школу?</div>
                            <div class="accordion-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Molestias
                                quisquam cupiditate sed
                                laboriosam blanditiis eveniet quasi doloribus! Deleniti, et magnam!</div>

                            <div class="accordion-header">Как проходит первая (пробная) тренировка?</div>
                            <div class="accordion-text">
                                На первом (пробном) занятии тренер знакомит нового ученика
                                с группой и уделяет ему повышенное внимание. После окончания занятия, тренер
                                общается с
                                родителями и консультирует
                                их по текущему уровню развития ребёнка (даёт рекомендации).
                            </div>

                            <div class="accordion-header">Как делятся дети в группе?</div>
                            <div class="accordion-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                elit. Ducimus
                                accusantium doloremque
                                cumque voluptatum deleniti! Aperiam?</div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="accordion">
                            <div class="accordion-header">С какого возраста можно отдавать ребёнка в вашу школу?
                            </div>
                            <div class="accordion-text">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur magni
                                nulla dolorum
                                veritatis! Consectetur magnam sit obcaecati totam at quaerat.
                            </div>

                            <div class="accordion-header">Нужно ли проходить просмотр, чтобы попасть в вашу
                                школу?</div>
                            <div class="accordion-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Molestias
                                quisquam cupiditate sed
                                laboriosam blanditiis eveniet quasi doloribus! Deleniti, et magnam!</div>

                            <div class="accordion-header">Как проходит первая (пробная) тренировка?</div>
                            <div class="accordion-text">
                                На первом (пробном) занятии тренер знакомит нового ученика
                                с группой и уделяет ему повышенное внимание. После окончания занятия, тренер
                                общается с
                                родителями и консультирует
                                их по текущему уровню развития ребёнка (даёт рекомендации).
                            </div>

                            <div class="accordion-header">Как делятся дети в группе?</div>
                            <div class="accordion-text">Lorem ipsum, dolor sit amet consectetur adipisicing
                                elit. Ducimus
                                accusantium doloremque
                                cumque voluptatum deleniti! Aperiam?</div>
                        </div>
                    </div> -->

                </div>
                <div class="accordion-nav">
                    <div class="accordion-arr-prev">
                        <svg width="12px" height="12px" viewBox="0 0 12 12" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="ШФ_Страница-клуба" transform="translate(-1166.000000, -6374.000000)"
                                    fill="#6e6d7a" fill-rule="nonzero">
                                    <g id="Group-24" transform="translate(73.000000, 5734.000000)">
                                        <g id="Group-23" transform="translate(1079.000000, 626.000000)">
                                            <g id="Group-3-Copy-8"
                                                transform="translate(20.000000, 20.000000) scale(-1, 1) translate(-20.000000, -20.000000) ">
                                                <g id="bx-right-arrow-alt"
                                                    transform="translate(14.000000, 14.000000)">
                                                    <polygon id="Path"
                                                        points="4.73505293 10.7350529 6 12 12 6 6 0 4.73505293 1.26494707 8.57551812 5.10541226 0 5.10541226 0 6.89458774 8.57551812 6.89458774">
                                                    </polygon>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="accordion-pag"></div>
                    <div class="accordion-arr-next">
                        <svg width="12px" height="12px" viewBox="0 0 12 12" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="ШФ_Стартовая" transform="translate(-1318.000000, -8778.000000)"
                                    fill="#6E6D7A" fill-rule="nonzero">
                                    <g id="Group-73" transform="translate(72.000000, 8470.000000)">
                                        <g id="Group-3-Copy-6" transform="translate(1232.000000, 294.000000)">
                                            <g id="bx-right-arrow-alt"
                                                transform="translate(14.000000, 14.000000)">
                                                <polygon id="Path"
                                                    points="4.73505293 10.7350529 6 12 12 6 6 0 4.73505293 1.26494707 8.57551812 5.10541226 0 5.10541226 0 6.89458774 8.57551812 6.89458774">
                                                </polygon>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
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
            <span class="rating-result_text reviews bg">576 отзывов на Яндекс</span>
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
    <div class="reviews-part">
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
            <button class="button main-btn main-btn_reviews"  data-toggle="modal" data-target="#formulaire" type="submit">Оставить отзыв</button>
            
                <div class="modal fade" id="formulaire">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"></h4>              
                        <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        <form class="col" action="{{route('club_comment')}}" method="POST" >
                        @csrf
                        <div class="form-group">
                          
                                  
                                 <div class="uk-grid" data-uk-grid-margin>
                                    <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('имя') }}</label>

                                    <div class="col-md-12">
                                        <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                 <div class="uk-grid" data-uk-grid-margin>
                                    
                                    <label for="comment" >{{ __('отзыв') }}</label>
                                    

                                    <div class="col-md-12">
                                        <textarea class="form-control  @error('comment') is-invalid @enderror" name="comment" required rows="3"></textarea>

                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                        </div>
                        <button class="button main-btn main-btn_reviews"type="submit">Оставить отзыв</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                        
            
            <span class="request_text">или пишите на эл. почту holnov@school-ball.com</span>
        </div>
    </div>
    <div class="reviews-img reviews-img_training img-fluid">
        <img src="/img/img_2.svg" alt="horn">
    </div>
</div>
        <div id="map_wrapper_div">
            <div class="map-wrp" id="map_tuts">
            </div>
        </div>
<div class="clubs-tabs">
    <span class="sm-title text-center">Адрес клуба</span>
    <span class="club-tabs_subtitle text-center">Москва, г.о. Красногорск, деревня Путилково,
        ул. Новотушинская</span>
    <ul class="nav nav-tabs club-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="map-tab" data-bs-toggle="tab" data-bs-target="#map"
                type="button" role="tab" aria-controls="map" aria-selected="true">На карте</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button"
                role="tab" aria-controls="list" aria-selected="false">Парковка и вход в зал</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
      
        <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
            <div class="map-wrp">
                <img src="/img/polya-006.jpg" alt="photo of the club">
            </div>
        </div>
    </div>


</div>
<button class="main-btn button main-btn_submit subscription-btn club-btn">Вступить в клуб</button>
<div class="club-manager">
    <div class="club-manager_col">
        <div class="club-manager_img-wrp">
            <img src="/img/photo_1_2x.png" alt="photo of the manager" class="club-manager_img">
        </div>
        <div class="club-manager_text-wrp">
            <span class="club-manager_name">Иванов Иван И.</span>
            <span class="club-manager_info">Менеджер клуба с опытом более 5 лет</span>
            <p class="club-manager_text">
                От моей работы зависит атмосфера нашего клуба🔆
                Моя задача — подробная и оперативная консультация
                по любому запросу родителей наших спортсменов🤝
                Я помогу вам разобраться в мире детского футбола⚽️
            </p>
        </div>
    </div>
    <div class="club-manager_col">
        <span class="club-manager_text">Если у вас есть вопросы, звоните</span>
        <div class="club-manager_contacts-wrp">
            <span class="club-manager_contacts">+7 495 120-60-06</span>
            <span class="club-manager_contacts">Ежедневно с 10:00 до 20:00</span>
        </div>
        <span class="club-manager_text">или пишите в WhatsApp
        </span>
        <span class="club-manager_text">
            +7 916 651-66-38 в любое время
        </span>
    </div>
</div>
<div class="training-cards training-cards_club">
    <span class="sm-title text-center">Вам подходит наше обучение, если</span>

    <div class="swiper-container club-advantages_slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide club-info-slide text-center">
                <div class="advantages-card">
                    <div class="advantages_img">
                        <img src="/img/ico_5.svg" alt="advantage icon" class="/img-fluid">
                    </div>
                    <span class="advantages_text">Хотите, чтоб ваш ребёнок занимался интересным и динамичным
                        видом
                        спорта</span>
                </div>
            </div>
            <div class="swiper-slide club-info-slide text-center">
                <div class="advantages-card">
                    <div class="advantages_img">
                        <img src="/img/ico_6.svg" alt="advantage icon" class="/img-fluid">
                    </div>
                    <span class="advantages_text">Хотите, чтобы ваш ребёнок занимался у профи своего дела</span>
                </div>
            </div>
            <div class="swiper-slide club-info-slide text-center">
                <div class="advantages-card">
                    <div class="advantages_img">
                        <img src="/img/ico_7.svg" alt="advantage icon" class="/img-fluid">
                    </div>
                    <span class="advantages_text">Хотите, чтобы ваш ребёнок занимался в комфортных
                        и современных условиях</span>
                </div>


            </div>
        </div>
    </div>

    <div class="advantages-row club-page">
        <div class="advantages-card">
            <div class="advantages_img">
                <img src="/img/ico_5.svg" alt="advantage icon" class="/img-fluid">
            </div>
            <span class="advantages_text">Хотите, чтоб ваш ребёнок занимался интересным и динамичным видом
                спорта</span>
        </div>
        <div class="advantages-card">
            <div class="advantages_img">
                <img src="/img/ico_6.svg" alt="advantage icon" class="/img-fluid">
            </div>
            <span class="advantages_text">Хотите, чтобы ваш ребёнок занимался у профи своего дела</span>
        </div>
        <div class="advantages-card">
            <div class="advantages_img">
                <img src="/img/ico_7.svg" alt="advantage icon" class="/img-fluid">
            </div>
            <span class="advantages_text">Хотите, чтобы ваш ребёнок занимался в комфортных
                и современных условиях</span>
        </div>
    </div>
</div>
  
@stop