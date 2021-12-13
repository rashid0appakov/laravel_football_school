const {
    default: axios
} = require('axios');

require('./bootstrap');
import Swiper, {
    Navigation,
    Pagination,
    EffectFade
} from 'swiper';
Swiper.use([Navigation, Pagination, EffectFade]);

import 'swiper/swiper-bundle.css';
import 'vue-select/dist/vue-select.css';
import moment from 'moment';
require('moment/locale/ru');
moment.locale('ru')
window.moment = moment
window.Vue = require('vue').default;
import vSelect from 'vue-select'
import Vue from 'vue';
Vue.component('v-select', vSelect)
Vue.component('schedule-table', require('./components/schedule-table').default)

const app = new Vue({
    el: '#app',
});

$(document).ready(function () {
    $('.call-button').click(function (e) {
        e.preventDefault()
        axios.post('/call/' + $(this).data('phone'))
            .then(function (data) {
                alert('Запрос на звонок успешно отправлен, ожидайте...')
            })
            .catch(err => {
                alert('Заказать обратный звонок не удалось')
            })
    })
    $('.lead-form').submit(function (e) {
        e.preventDefault()
        const action = $(this).attr('action')
        axios.post(action, $(this).serialize())
            .then(function (data) {
                console.log(data)
                $('#signupModal').modal('hide')
                $('#thanksModal').modal('show')
            })
        return false
    })
    $('.menu-burger__header').click(function () {
        $('.menu-burger__header').toggleClass('open-menu');
        $('.nav-links-wrp').toggleClass('open-menu');
    });
    $(window).scroll(function () {
        var height = $(window).scrollTop();

        /*Если сделали скролл на 100px задаём новый класс для header*/
        if (height > 50) {
            $('.header_nav').addClass('header-fixed');
        } else {
            /*Если меньше 100px удаляем класс для header*/
            $('.header_nav').removeClass('header-fixed');
        }

    });
    var swiper = new Swiper(".blockeros", {});
    var swiper = new Swiper(".agesSwiper", {
        slidesPerView: 'auto',
        allowSlidePrev: true,
    });

    var swiper = new Swiper(".partners-slider_mobile", {
        slidesPerView: 'auto',
        spaceBetween: 5,
    });

    var swiper = new Swiper(".students-slider_mobile", {
        slidesPerView: 'auto',
        spaceBetween: 30,
        loop: true,
    });

    var swiper = new Swiper(".trainers-slider_mobile", {
        slidesPerView: 'auto',
        spaceBetween: 30,
        loop: true,
    });

    var swiper = new Swiper(".options-slider_mobile", {
        slidesPerView: 'auto',
        spaceBetween: 30,
        loop: true,
    });

    var swiper = new Swiper(".advantages-slider_mobile", {
        slidesPerView: 'auto',
        spaceBetween: 30,
        loop: true,
    });

    var swiper = new Swiper(".news-slider", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-news",
            prevEl: ".swiper-button-prev-news",
        },
        breakpoints: {
            499: {
                slidesPerView: 1,
                spaceBetweenSlides: 30
            },
            999: {
                slidesPerView: 2,
                spaceBetweenSlides: 30
            },

            1399: {
                slidesPerView: 3,
                spaceBetweenSlides: 30
            }


        }
    });

    var swiper = new Swiper(".blockeros", {});
    var swiper = new Swiper(".team-slider", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next-team-reviewe",
            prevEl: ".swiper-button-prev-team-reviewe",
        },
    });

    var swiper = new Swiper(".nomySwiper", {
        slidesPerView: 1,
        autoplay: true,
        loop: true,
        effect: "fade"
    });

    var swiper = new Swiper(".slider_clubs", {
        slidesPerView: 1,
        autoplay: true,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        }
    });

    $('form.confirmed').submit(function (e) {
        if (!confirm($(this).data('text') || 'Подтвердите действие!')) {
            e.preventDefault()
            return false;
        }
    })

    var phoneInput = document.querySelectorAll('.input-tels')
    phoneInput.forEach(function (element) {

        element.addEventListener('keydown', function (event) {
            if (!(event.key == 'ArrowLeft' || event.key == 'ArrowRight' || event.key == 'Backspace' || event.key == 'Tab')) {
                event.preventDefault()
            }
            var mask = '+7 (111) 111-11-11'; // Задаем маску

            if (/[0-9\+\ \-\(\)]/.test(event.key)) {
                var currentString = this.value;
                var currentLength = currentString.length;
                if (/[0-9]/.test(event.key)) {
                    if (mask[currentLength] == '1') {
                        this.value = currentString + event.key;
                    } else {
                        for (var i = currentLength; i < mask.length; i++) {
                            if (mask[i] == '1') {
                                this.value = currentString + event.key;
                                break;
                            }
                            currentString += mask[i];
                        }
                    }
                }
            }
        })
    })


    $('.js-open-modal').click(function (event) {
        event.preventDefault();

        var modalName = $(this).attr('data-modal');
        var modal = $('.js-modal[data-modal="' + modalName + '"]');

        modal.addClass('is-show');
        $('.js-modal-overlay').addClass('is-show')
        $(".backos").attr("style", "display:block")
    });

    $('.js-modal-close').click(function () {
        $('.js-modal').removeClass('is-show');
        $('.js-modal-overlay').removeClass('is-show');
        $(".backos").attr("style", "display:none")
    });

    $('.backos').click(function () {
        $('.js-modal').removeClass('is-show');
        $('.js-modal-overlay').removeClass('is-show');
        $(".backos").attr("style", "display:none")
    });

    $('.js-modal-overlay').click(function () {
        $('.js-modal.is-show').removeClass('is-show');
        $(this).removeClass('is-show');
    })






})
