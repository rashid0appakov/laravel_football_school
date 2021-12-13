<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="/altair/assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/altair/assets/img/favicon-32x32.png" sizes="32x32">

    <title>Детская футбольная школа</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/altair/bower_components/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="/altair/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/altair/assets/skins/dropify/css/dropify.css">
    <!-- additional styles for plugins -->
    <link rel="stylesheet" href="/altair/bower_components/kendo-ui/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="/altair/bower_components/kendo-ui/styles/kendo.material.min.css" id="kendoCSS"/>

    <!-- weather icons -->
    <link rel="stylesheet" href="/altair/bower_components/weather-icons/css/weather-icons.min.css" media="all">
    <!-- metrics graphics (charts) -->
    <link rel="stylesheet" href="/altair/bower_components/metrics-graphics/dist/metricsgraphics.css">
    <!-- chartist -->
    <link rel="stylesheet" href="/altair/bower_components/chartist/dist/chartist.min.css">

    <!-- uikit -->
    <link rel="stylesheet" href="/altair/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="/altair/assets/icons/flags/flags.min.css" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="/altair/assets/css/style_switcher.min.css" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="/altair/assets/css/main.min.css" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="/altair/assets/css/themes/themes_combined.min.css" media="all">
    <link rel="stylesheet" href="/altair/calendar/css/theme-basic.css" media="all">
    <link rel="stylesheet" href="/altair/calendar/css/theme-glass.css" media="all">

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
    <script type="text/javascript" src="/altair/bower_components/matchMedia/matchMedia.js"></script>
    <script type="text/javascript" src="/altair/bower_components/matchMedia/matchMedia.addListener.js"></script>
    <link rel="stylesheet" href="/altair/assets/css/ie.css" media="all">
    <![endif]-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//d2wy8f7a9ursnm.cloudfront.net/v7/bugsnag.min.js"></script>
    <script>Bugsnag.start({ apiKey: '41d59c9c2429682e1364048e570d6f10' })</script>
</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">

<!-- main header -->
<header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar">

            <!-- main sidebar switch -->
            <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>
            </a>

            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">fullscreen</i></a></li>
                    <li>
                        <a href="#" id="main_search_btn" class="user_action_icon">
                            <i class="material-icons md-24 md-light">&#xE8B6;</i>
                        </a>
                    </li>

                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_image"><img class="md-user-image" src="/altair/assets/img/avatars/avatar_11_tn.png" alt=""/></a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">
                                <li><a href="page_user_profile.html">Мой профиль</a></li>
                                <li><a href="page_settings.html">Настройки</a></li>
                                <li><a onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Выход</a></li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="header_main_search_form">
        <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
        <form method="POST" action="/admin/search" class="uk-form uk-autocomplete">
            @csrf
            <input type="text" name="search" class="header_main_search_input" />
            <button type="submit" class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
{{--            <script type="text/autocomplete">--}}
{{--                    <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">--}}
{{--                        {{~items}}--}}
{{--                <li data-value="{{ $item.value }}">--}}
{{--                            <a href="{{ $item.url }}" class="needsclick">--}}
{{--                                {{ $item.value }}<br>--}}
{{--                                <span class="uk-text-muted uk-text-small">{{{ $item.text }}}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        {{/items}}--}}
{{--                <li data-value="autocomplete-value">--}}
{{--                    <a class="needsclick">--}}
{{--                        Autocomplete Text<br>--}}
{{--                        <span class="uk-text-muted uk-text-small">Helper text</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--</script>--}}
        </form>


</header><!-- main header end -->
<!-- main sidebar -->
<aside id="sidebar_main">

    <div class="sidebar_main_header">
        <div class="sidebar_logo" style="height: 155px;">
            <a style="margin-left: 0px;" href="/admin" class="sSidebar_hide sidebar_logo_large">
                <img style="width: 240px;" class="logo_regular" src="/tg_image_3597617755.jpeg" alt="" height="15" width="71"/>
                <img class="logo_light" src="/tg_image_3597617755.jpeg" alt="" height="15" width="71"/>
            </a>

        </div>
    </div>

    <div class="menu_section" style="margin-top: 80px;">
        <ul>
            <li title="Dashboard">
                <a href="/admin/dashboard">
                    <span class="menu_icon"><i class="material-icons first"><img src="/img/statis.svg"></i></span>
                    <span class="menu_title">Статистика</span>
                </a>

            </li>
            <li title="Pages">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons"><img src="/img/polzovatels.svg"></i></span>
                    <span class="menu_title">Пользователи</span>
                </a>
                <ul>
                    <li><a href="/admin/users/managers">Менеджеры</a></li>
                    <li><a href="/admin/trainers">Тренера</a></li>
                    <li><a href="/admin/children">Дети</a></li>
                </ul>
            </li>
            <li title="Pages">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons"><img src="/img/crm.svg"></i></span>
                    <span class="menu_title">CRM</span>
                </a>
                <ul>
                    <li><a href="/admin/crm/leads">Входящий трафик</a></li>
                    <li><a href="/admin/crm/clients">Клиенты</a></li>
                    <li><a href="/admin/crm/dictionaries">Словари</a></li>
                </ul>
            </li>
            <li class="current_section" title="Dashboard">
                <a href="/admin/areas">
                    <span class="menu_icon"><i class="material-icons"><img src="/img/ploshadki.svg"></i></span>
                    <span class="menu_title">Площадки</span>
                </a>
            </li>
            <li title="Dashboard">
                <a href="{{route('admin.trainings.index')}}">
                    <span class="menu_icon"><i class="material-icons"></i></span>
                    <span class="menu_title">Расписание</span>
                </a>
            </li>
            <li class="current_section" title="Dashboard">
                <a href="/admin/clubs">
                    <span class="menu_icon"><i class="material-icons"><img src="/img/clubs.svg"></i></span>
                    <span class="menu_title">Клубы</span>
                </a>
            </li>
            <li title="Pages">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons"><img src="/img/zadachi.svg"></i></span>
                    <span class="menu_title">Задачи</span>
                </a>
                <ul>
                    <li><a href="/admin/tasks/my">Мои задачи</a></li>
                    <li><a href="/admin/tasks/trainer">Задачи тренеров</a></li>
                    <li><a href="/admin/tasks/manager">Задачи менеджеров</a></li>
{{--                    <li><a href="/admin/tasks/client">Задачи родителей</a></li>--}}
                </ul>
            </li>
            <li class="current_section" title="Dashboard">
                <a href="/admin/groups">
                    <span class="menu_icon"><i class="material-icons"><img src="/img/gropso.svg"></i></span>
                    <span class="menu_title">Группы</span>
                </a>
            </li>
            <li class="current_section" title="Dashboard">
                <a href="/admin/aboniments">
                    <span class="menu_icon"><i class="material-icons"><img src="/img/abonimets.svg"></i></span>
                    <span class="menu_title">Абонемент</span>
                </a>
            </li>
            <li class="current_section" title="Dashboard">
                <a href="/admin/news/">
                    <span class="menu_icon"><i class="material-icons"><img src="/img/newsos.svg"></i></span>
                    <span class="menu_title">Новости</span>
                </a>
            </li>
            <li class="current_section" title="Dashboard">
                <a href="/admin/products">
                    <span class="menu_icon"><i class="material-icons"><img src="/img/sales.svg"></i></span>
                    <span class="menu_title">Товары</span>
                </a>
            </li>

        </ul>
    </div>
</aside><!-- main sidebar end -->
<div id="page_content">
    <div id="app">
        @yield('content')
    </div>
</div>

<!-- secondary sidebar -->
<aside id="sidebar_secondary" class="tabbed_sidebar">
    <ul class="uk-tab uk-tab-icons uk-tab-grid" data-uk-tab="{connect:'#dashboard_sidebar_tabs', animation:'slide-horizontal'}">
        <li class="uk-active uk-width-1-3"><a href="#"><i class="material-icons">&#xE422;</i></a></li>
        <li class="uk-width-1-3 chat_sidebar_tab"><a href="#"><i class="material-icons">&#xE0B7;</i></a></li>
        <li class="uk-width-1-3"><a href="#"><i class="material-icons">&#xE8B9;</i></a></li>
    </ul>

    <div class="scrollbar-inner">
        <ul id="dashboard_sidebar_tabs" class="uk-switcher">
            <li>
                <div class="timeline timeline_small uk-margin-bottom">
                    <div class="timeline_item">
                        <div class="timeline_icon timeline_icon_success"><i class="material-icons">&#xE85D;</i></div>
                        <div class="timeline_date">
                            09<span>Jul</span>
                        </div>
                        <div class="timeline_content">Created ticket <a href="#"><strong>#3289</strong></a></div>
                    </div>
                    <div class="timeline_item">
                        <div class="timeline_icon timeline_icon_danger"><i class="material-icons">&#xE5CD;</i></div>
                        <div class="timeline_date">
                            15<span>Jul</span>
                        </div>
                        <div class="timeline_content">Deleted post <a href="#"><strong>Ea et non aliquam accusantium.</strong></a></div>
                    </div>
                    <div class="timeline_item">
                        <div class="timeline_icon"><i class="material-icons">&#xE410;</i></div>
                        <div class="timeline_date">
                            19<span>Jul</span>
                        </div>
                        <div class="timeline_content">
                            Added photo
                            <div class="timeline_content_addon">
                                <img src="/altair/assets/img/gallery/Image16.jpg" alt=""/>
                            </div>
                        </div>
                    </div>
                    <div class="timeline_item">
                        <div class="timeline_icon timeline_icon_primary"><i class="material-icons">&#xE0B9;</i></div>
                        <div class="timeline_date">
                            21<span>Jul</span>
                        </div>
                        <div class="timeline_content">
                            New comment on post <a href="#"><strong>Similique perferendis quia ab ex.</strong></a>
                            <div class="timeline_content_addon">
                                <blockquote>
                                    Blanditiis sit in unde voluptas non modi excepturi quia.&hellip;
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <div class="timeline_item">
                        <div class="timeline_icon timeline_icon_warning"><i class="material-icons">&#xE7FE;</i></div>
                        <div class="timeline_date">
                            29<span>Jul</span>
                        </div>
                        <div class="timeline_content">
                            Added to Friends
                            <div class="timeline_content_addon">
                                <ul class="md-list md-list-addon">
                                    <li>
                                        <div class="md-list-addon-element">
                                            <img class="md-user-image md-list-addon-avatar" src="/altair/assets/img/avatars/avatar_02_tn.png" alt=""/>
                                        </div>
                                        <div class="md-list-content">
                                            <span class="md-list-heading">Dasia Balistreri</span>
                                            <span class="uk-text-small uk-text-muted">Quia quae consectetur id delectus.</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <ul class="md-list md-list-addon chat_users">
                    <li>
                        <div class="md-list-addon-element">
                            <span class="element-status element-status-success"></span>
                            <img class="md-user-image md-list-addon-avatar" src="/altair/assets/img/avatars/avatar_02_tn.png" alt=""/>
                        </div>
                        <div class="md-list-content">
                            <div class="md-list-action-placeholder"></div>
                            <span class="md-list-heading">Brianne Kohler</span>
                            <span class="uk-text-small uk-text-muted uk-text-truncate">Quaerat qui est.</span>
                        </div>
                    </li>
                    <li>
                        <div class="md-list-addon-element">
                            <span class="element-status element-status-success"></span>
                            <img class="md-user-image md-list-addon-avatar" src="/altair/assets/img/avatars/avatar_09_tn.png" alt=""/>
                        </div>
                        <div class="md-list-content">
                            <div class="md-list-action-placeholder"></div>
                            <span class="md-list-heading">Heather Spencer</span>
                            <span class="uk-text-small uk-text-muted uk-text-truncate">Corrupti sunt.</span>
                        </div>
                    </li>
                    <li>
                        <div class="md-list-addon-element">
                            <span class="element-status element-status-danger"></span>
                            <img class="md-user-image md-list-addon-avatar" src="/altair/assets/img/avatars/avatar_04_tn.png" alt=""/>
                        </div>
                        <div class="md-list-content">
                            <div class="md-list-action-placeholder"></div>
                            <span class="md-list-heading">Maya Dietrich</span>
                            <span class="uk-text-small uk-text-muted uk-text-truncate">Et id.</span>
                        </div>
                    </li>
                    <li>
                        <div class="md-list-addon-element">
                            <span class="element-status element-status-warning"></span>
                            <img class="md-user-image md-list-addon-avatar" src="/altair/assets/img/avatars/avatar_07_tn.png" alt=""/>
                        </div>
                        <div class="md-list-content">
                            <div class="md-list-action-placeholder"></div>
                            <span class="md-list-heading">Katrine Franecki</span>
                            <span class="uk-text-small uk-text-muted uk-text-truncate">Autem fugit.</span>
                        </div>
                    </li>
                </ul>
                <div class="chat_box_wrapper chat_box_small" id="chat">
                    <div class="chat_box chat_box_colors_a">
                        <div class="chat_message_wrapper">
                            <div class="chat_user_avatar">
                                <img class="md-user-image" src="/altair/assets/img/avatars/avatar_11_tn.png" alt=""/>
                            </div>
                            <ul class="chat_message">
                                <li>
                                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, eum? </p>
                                </li>
                                <li>
                                    <p> Lorem ipsum dolor sit amet.<span class="chat_message_time">13:38</span> </p>
                                </li>
                            </ul>
                        </div>
                        <div class="chat_message_wrapper chat_message_right">
                            <div class="chat_user_avatar">
                                <img class="md-user-image" src="/altair/assets/img/avatars/avatar_03_tn.png" alt=""/>
                            </div>
                            <ul class="chat_message">
                                <li>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus distinctio dolor earum est hic id impedit ipsum minima mollitia natus nulla perspiciatis quae quasi, quis recusandae, saepe, sunt totam.
                                        <span class="chat_message_time">13:34</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="chat_message_wrapper">
                            <div class="chat_user_avatar">
                                <img class="md-user-image" src="/altair/assets/img/avatars/avatar_11_tn.png" alt=""/>
                            </div>
                            <ul class="chat_message">
                                <li>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque ea mollitia pariatur porro quae sed sequi sint tenetur ut veritatis.
                                        <span class="chat_message_time">23 Jun 1:10am</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="chat_message_wrapper chat_message_right">
                            <div class="chat_user_avatar">
                                <img class="md-user-image" src="/altair/assets/img/avatars/avatar_03_tn.png" alt=""/>
                            </div>
                            <ul class="chat_message">
                                <li>
                                    <p> Lorem ipsum dolor sit amet, consectetur. </p>
                                </li>
                                <li>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        <span class="chat_message_time">Friday 13:34</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <h4 class="heading_c uk-margin-small-bottom uk-margin-top">General Settings</h4>
                <ul class="md-list">
                    <li>
                        <div class="md-list-content">
                            <div class="uk-float-right">
                                <input type="checkbox" data-switchery data-switchery-size="small" checked id="settings_site_online" name="settings_site_online" />
                            </div>
                            <span class="md-list-heading">Site Online</span>
                            <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                        </div>
                    </li>
                    <li>
                        <div class="md-list-content">
                            <div class="uk-float-right">
                                <input type="checkbox" data-switchery data-switchery-size="small" id="settings_seo" name="settings_seo" />
                            </div>
                            <span class="md-list-heading">Search Engine Friendly URLs</span>
                            <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                        </div>
                    </li>
                    <li>
                        <div class="md-list-content">
                            <div class="uk-float-right">
                                <input type="checkbox" data-switchery data-switchery-size="small" id="settings_url_rewrite" name="settings_url_rewrite" />
                            </div>
                            <span class="md-list-heading">Use URL rewriting</span>
                            <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                        </div>
                    </li>
                </ul>
                <hr class="md-hr">
                <h4 class="heading_c uk-margin-small-bottom uk-margin-top">Other Settings</h4>
                <ul class="md-list">
                    <li>
                        <div class="md-list-content">
                            <div class="uk-float-right">
                                <input type="checkbox" data-switchery data-switchery-size="small" data-switchery-color="#7cb342" checked id="settings_top_bar" name="settings_top_bar" />
                            </div>
                            <span class="md-list-heading">Top Bar Enabled</span>
                            <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                        </div>
                    </li>
                    <li>
                        <div class="md-list-content">
                            <div class="uk-float-right">
                                <input type="checkbox" data-switchery data-switchery-size="small" data-switchery-color="#7cb342" id="settings_api" name="settings_api" />
                            </div>
                            <span class="md-list-heading">Api Enabled</span>
                            <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                        </div>
                    </li>
                    <li>
                        <div class="md-list-content">
                            <div class="uk-float-right">
                                <input type="checkbox" data-switchery data-switchery-size="small" data-switchery-color="#d32f2f" id="settings_minify_static" checked name="settings_minify_static" />
                            </div>
                            <span class="md-list-heading">Minify JS files automatically</span>
                            <span class="uk-text-muted uk-text-small">Lorem ipsum dolor sit amet&hellip;</span>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <button type="button" class="chat_sidebar_close uk-close"></button>
    <div class="chat_submit_box">
        <div class="uk-input-group">
            <input type="text" class="md-input" name="submit_message" id="submit_message" placeholder="Send message">
            <span class="uk-input-group-addon">
                    <a href="#"><i class="material-icons md-24">&#xE163;</i></a>
                </span>
        </div>
    </div>

</aside>

<!-- secondary sidebar end -->
<script src="/js/app.js"></script>

<script>
    WebFontConfig = {
        google: {
            families: [
                'Source+Code+Pro:400,700:latin',
                'Roboto:400,300,500,700,400italic:latin'
            ]
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
</script>

<!-- common functions -->
<script src="/altair/assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="/altair/assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="/altair/assets/js/altair_admin_common.min.js"></script>
<script src="/altair/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="/altair/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="/altair/bower_components/select2/dist/js/select2.js"></script>
<!--  dropify -->
<script src="/altair/bower_components/dropify/dist/js/dropify.min.js"></script>

<!--  form file input functions -->
<script src="/altair/assets/js/pages/forms_file_input.min.js"></script>

<!-- page specific plugins -->
<!-- d3 -->
<script src="/altair/bower_components/d3/d3.min.js"></script>
<!-- metrics graphics (charts) -->
<script src="/altair/bower_components/metrics-graphics/dist/metricsgraphics.min.js"></script>
<!-- chartist (charts) -->
<script src="/altair/bower_components/chartist/dist/chartist.min.js"></script>
<!-- maplace (google maps) -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyC2FodI8g-iCz1KHRFE7_4r8MFLA7Zbyhk"></script>
<script src="/altair/bower_components/maplace-js/dist/maplace.min.js"></script>
<!-- peity (small charts) -->
<script src="/altair/bower_components/peity/jquery.peity.min.js"></script>
<!-- easy-pie-chart (circular statistics) -->
<script src="/altair/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
<!-- countUp -->
<script src="/altair/bower_components/countUp.js/dist/countUp.min.js"></script>
<!-- handlebars.js -->
<script src="/altair/bower_components/handlebars/handlebars.min.js"></script>
<script src="/altair/assets/js/custom/handlebars_helpers.min.js"></script>
<!-- CLNDR -->
<script src="/altair/bower_components/clndr/clndr.min.js"></script>

<!--  dashbord functions -->
<script src="/altair/assets/js/pages/dashboard.min.js"></script>
<script src="/altair/bower_components/jquery-listnav/jquery-listnav.min.js"></script>

<!--  contact list v2 functions -->
<script src="/altair/assets/js/pages/page_contact_list.min.js"></script>

<!--  forms advanced functions -->
<script src="/altair/assets/js/pages/forms_advanced.min.js"></script>
<script src="/altair/calendar/js/bundle.js"></script>
<!-- uikit functions -->
<script src="/altair/assets/js/uikit_custom.min.js"></script>
<!-- altair common functions/helpers -->
<script src="/altair/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="/altair/bower_components/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="/altair/bower_components/select2/dist/js/select2.js"></script>
<!--  dropify -->
<script src="/altair/bower_components/dropify/dist/js/dropify.min.js"></script>

<!-- maplace (google maps) -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyC2FodI8g-iCz1KHRFE7_4r8MFLA7Zbyhk"></script>
<script src="/altair/bower_components/maplace-js/dist/maplace.min.js"></script>
<!--  forms advanced functions -->
<script>
    $(function() {
        if(isHighDensity()) {
            $.getScript( "/altair/assets/js/custom/dense.min.js", function(data) {
                // enable hires images
                altair_helpers.retina_images();
            });
        }
        if(Modernizr.touch) {
            // fastClick (touch devices)
            FastClick.attach(document.body);
        }
    });
    $window.load(function() {
        // ie fixes
        altair_helpers.ie_fix();
    });
</script>
<!-- kendo UI -->
<script src="/altair/assets/js/kendoui_custom.min.js"></script>
<!--  kendoui functions -->
<script src="/altair/assets/js/pages/kendoui.min.js"></script>
@yield('custom_scripts')
<script>
    $("#deadline").kendoDateTimePicker({
        timeFormat: "HH:mm",
        format: "yyyy/MM/dd HH:mm",
        value: new Date()
    });

    function submit_form(i) {
        $("#delete_area_"+i).submit();
    }
    function submit_form_club(i) {
        $("#delete_club_"+i).submit();
    }

    function submit_form_warehouse(i){
        $("#delete_warehouse_"+i).submit();
    }

    function submit_form_group(i){
        $("#delete_group_"+i).submit();
    }

    function submit_form_abonement(i){
        $("#delete_abonement_"+i).submit();
    }

    function submit_form_trainer(i){
        $("#delete_trainer_"+i).submit();
    }

    $("#kUI_datepicker_a").kendoDatePicker({
        format: "dd-MM-yyyy"
    });

    $("#birthday_datepicker_a").kendoDatePicker({
        format: "dd-MM-yyyy"
    });

    $("#kUI_datepicker_fileter").kendoDatePicker({
        format: "dd-MM-yyyy"
    });

    function submit_form_workout_delete(i){
        $("#delete_workout_"+i).submit();
    }

    @if(isset($children))
        @foreach($children as $child)
            $("#birthday_datepicker_ch_{{ $child->id }}").kendoDatePicker({
                format: "dd-MM-yyyy",
            });
        @endforeach
    @endif

</script>
<script>


    $('#open-form').click(function() {
        var height = $("#form").height();
        if( height > 0 ) {
            $('#form').css('height','0');
            $("#form").hide();
        } else {
            var clone = $('#form').clone()
                .css({'position':'absolute','visibility':'hidden','height':'auto'})
                .addClass('slideClone')
                .appendTo('body');
            $("#form").show();

            //$("#this").css({'position':'absolute','visibility':'hidden','height':'auto'});
            //var newHeight = $("#this").height();
            var newHeight = $(".slideClone").height();
            $(".slideClone").remove();
            //$("#this").css({'position':'static','visibility':'visible','height':'0'});
            $('#form').css('height',newHeight + 'px');
        }
    });


    $('#open-client-task-form').click(function() {
        var height = $("#client-task-form").height();
        if( height > 0 ) {
            $('#client-task-form').css('height','0');
            $("#client-task-form").hide();
        } else {
            var clone = $('#client-task-form').clone()
                .css({'position':'absolute','visibility':'hidden','height':'auto'})
                .addClass('slideClone')
                .appendTo('body');
            $("#client-task-form").show();

            //$("#this").css({'position':'absolute','visibility':'hidden','height':'auto'});
            //var newHeight = $("#this").height();
            var newHeight = $(".slideClone").height();
            $(".slideClone").remove();
            //$("#this").css({'position':'static','visibility':'visible','height':'0'});
            $('#client-task-form').css('height',newHeight + 'px');
        }
    });

    function edit_admin_task_form(i)
    {
            var height = $("#task_form_edit"+i).height();
            if( height > 0 ) {
                $("#task_form_edit"+i).css('height','0');
                $("#task_form_edit"+i).hide();
            } else {
                $("#task_form_edit"+i).show();
                var clone = $("#task_form_edit"+i).clone()
                    .css({'position':'absolute','visibility':'hidden','height':'auto'})
                    .addClass('slideClone')
                    .appendTo('body');

                //$("#this").css({'position':'absolute','visibility':'hidden','height':'auto'});
                //var newHeight = $("#this").height();
                var newHeight = $(".slideClone").height();
                $(".slideClone").remove();
                //$("#this").css({'position':'static','visibility':'visible','height':'0'});
                $("#task_form_edit"+i).css('height',newHeight + 'px');
            }

    }

    @if(isset($tasks))
    @foreach($tasks as $task)
    $("#birthday_datepicker_ch_{{ $task->id }}").kendoDateTimePicker({
        timeFormat: "HH:mm",
        format: "dd/MM/yyyy HH:mm",
        value: new Date()
    });
    @endforeach
    @endif

    $("#birthday_datepicker_child").kendoDatePicker({
        culture:"ru-RU",
        value: new Date()
    });

    <?php

    if(Route::is('admin.myTasksByDate') || Route::is('admin.trainerTasksByDate') || Route::is('admin.managerTasksByDate') )
    {
        $str = last(request()->segments());
        $name = explode('-',$str);
        $year = $name[0];
        $month = $name[1];
        $day = $name[2];
        $date = $year.", ".$month.", ".$day;
    }

    ?>


    $("#tasks_calendar").kendoCalendar({
        format: "dd/MM/yyyy",

        @if(isset($date))
            value: new Date("{{ $date }}"),
        @else
            value: new Date(),
        @endif

        change: function() {
            var value = this.value();
            var month = value.getMonth() + 1;
            var date = value.getFullYear()+"-"+month+"-"+value.getDate();
            var who = "{{ Request::segment(3) }}";

            document.location.href = '/admin/tasks/'+who+'/'+date;
        }
    });

    $("#kUI_datetimepicker_task").kendoDateTimePicker({
        timeFormat: "HH:mm",
        format: "dd/MM/yyyy HH:mm",
        value: new Date()
    });


    $("#kUI_datetimepicker_task_client").kendoDateTimePicker({
        timeFormat: "HH:mm",
        format: "dd/MM/yyyy HH:mm",
        value: new Date()
    });

    $("#next_day_time_call").kendoDateTimePicker({
        timeFormat: "HH:mm",
        format: "dd/MM/yyyy HH:mm",
        value: new Date()
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function checkTasksField()
    {
        if(!$.trim($("#title").val()))
        {
            toastr.warning('Заполните поле Заголовок', 'Внимание', {timeOut: 5000});
            return;
        }

        // if(!$.trim($("#description").val()))
        // {
        //     toastr.warning('Заполните поле Описание', 'Внимание', {timeOut: 5000});
        //     return;
        // }

        $('form#form').submit();
    }

    function checkTasksFieldUpdate()
    {
        if(!$.trim($("#titleUpdate").val()))
        {
            toastr.warning('Заполните поле Заголовок', 'Внимание', {timeOut: 5000});
            return;
        }

        if(!$.trim($("#descriptionUpdate").val()))
        {
            toastr.warning('Заполните поле Описание', 'Внимание', {timeOut: 5000});
            return;
        }

        $('form#formUpdate').submit();
    }
</script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script type="text/javascript">
    CKEDITOR.replace('textarea1', {
        filebrowserUploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

<script>
    CKEDITOR.replace('textarea1');
    CKEDITOR.replace('textarea2');
    CKEDITOR.replace('textarea3');
    CKEDITOR.replace('info')
    CKEDITOR.replace('career');
    CKEDITOR.replace('description');
    CKEDITOR.replace('descriptionUpdate');
    CKEDITOR.replace('request');
    CKEDITOR.replace('comment');
</script>

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


@if(isset($tasks))
@foreach($tasks as $task)
$("#deadline{{ $task->id }}").kendoDateTimePicker({
    timeFormat: "HH:mm",
    format: "yyyy/MM/dd HH:mm",
});
    @endforeach
    @endif


    $("#date_taskst").kendoDatePicker({
        format: "yyyy-MM-dd"
    });

    $("#date_range_start").kendoDatePicker({
        format: "dd-MM-yyyy"
    });

    $("#date_range_end").kendoDatePicker({
        format: "dd-MM-yyyy"
    });
</script>

</body>
</html>
