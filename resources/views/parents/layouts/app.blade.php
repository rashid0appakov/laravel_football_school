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

    <!-- matchMedia polyfill for testing media queries in JS -->
    <!--[if lte IE 9]>
    <script type="text/javascript" src="/altair/bower_components/matchMedia/matchMedia.js"></script>
    <script type="text/javascript" src="/altair/bower_components/matchMedia/matchMedia.addListener.js"></script>
    <link rel="stylesheet" href="/altair/assets/css/ie.css" media="all">
    <![endif]-->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css">
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css">
    <link rel="stylesheet" type="text/css" href="/calendar/dist/tui-calendar.css">
    <link rel="stylesheet" type="text/css" href="/calendar/css/default.css">
    <link rel="stylesheet" type="text/css" href="/calendar/css/icons.css">
    <link rel="stylesheet" href="/altair/bower_components/fullcalendar/dist/fullcalendar.min.css">
</head>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    <div id="app">
<!-- main header -->
<header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar">

            <!-- main sidebar switch -->
            <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>
            </a>

            <!-- secondary sidebar switch -->
            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">
                    <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">fullscreen</i></a></li>
                    <li><a href="#" id="main_search_btn" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE8B6;</i></a></li>
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge">16</span></a>
                        <div class="uk-dropdown uk-dropdown-xlarge">
                            <div class="md-card-content">
                                <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                    <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (12)</a></li>
                                    <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (4)</a></li>
                                </ul>
                                <ul id="header_alerts" class="uk-switcher uk-margin">
                                    <li>
                                        <ul class="md-list md-list-addon">
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <span class="md-user-letters md-bg-cyan">is</span>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="page_mailbox.html">Maxime doloremque.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Placeat aut voluptatem asperiores praesentium.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <img class="md-user-image md-list-addon-avatar" src="/altair/assets/img/avatars/avatar_07_tn.png" alt=""/>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="page_mailbox.html">Consequatur delectus.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Deserunt accusamus placeat porro consequatur atque quam incidunt esse recusandae iste.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <span class="md-user-letters md-bg-light-green">uf</span>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="page_mailbox.html">Et excepturi.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Corrupti tempora qui incidunt eaque sed qui voluptatem maxime et.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <img class="md-user-image md-list-addon-avatar" src="/altair/assets/img/avatars/avatar_02_tn.png" alt=""/>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="page_mailbox.html">Natus deserunt dolor.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Maiores consequatur est sit voluptatum et ea rerum in temporibus.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <img class="md-user-image md-list-addon-avatar" src="/altair/assets/img/avatars/avatar_09_tn.png" alt=""/>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="page_mailbox.html">Explicabo nihil.</a></span>
                                                    <span class="uk-text-small uk-text-muted">Et voluptatum ducimus ut ut dolorem voluptates quis.</span>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                            <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                        </div>
                                    </li>
                                    <li>
                                        <ul class="md-list md-list-addon">
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Quibusdam harum rerum.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Quidem error fuga nulla perspiciatis.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Dolor ducimus.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Eius voluptates provident doloribus hic.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Odio quis.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Molestiae sint dolor qui ad nam iste.</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="md-list-addon-element">
                                                    <i class="md-list-addon-icon material-icons uk-text-primary">&#xE8FD;</i>
                                                </div>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading">Eos repellendus molestiae.</span>
                                                    <span class="uk-text-small uk-text-muted uk-text-truncate">Et id ea vel.</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
        <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
            <input type="text" class="header_main_search_input" />
            <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
        </form>
    </div>
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
            <li class="current_section" title="Dashboard">
                <a href="/parents/children">
                    <span class="menu_icon"><i class="material-icons">&#xE87C;</i></span>
                    <span class="menu_title">Дети</span>
                </a>
            </li>
            <li title="Pages">
                <a href="/parents/calendar">
                    <span class="menu_icon"><i class="material-icons">&#xE1BD;</i></span>
                    <span class="menu_title">Расписание</span>
                </a>
                <ul>
                    <li><a href="/parents/calendar">Стандартное отображение</a></li>
                </ul>
            </li>
            <li title="Pages">
                <a href="/parents/products">
                    <span class="menu_icon"><i class="material-icons"><img src="/img/zadachi.svg"></i></span>
                    <span class="menu_title">Услуги</span>
                </a>
                <ul>
                    <li><a href="/parents/products">Магазин</a></li>
                    <li><a href="/parents/abonements">Абонементы</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside><!-- main sidebar end -->

<div id="page_content">
    @yield('content')
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
</div>
<script src="/js/app.js"></script>

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
<!-- fullcalendar -->
<script src="/altair/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src='/altair/bower_components/fullcalendar/dist/locale/ru.js'></script>
<!--  calendar functions -->
<script src="/altair/assets/js/pages/plugins_fullcalendar.min.js"></script>
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
<script>
    $("#deadline").kendoDateTimePicker({
        culture:"ru-RU",
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

    $("#birthday").kendoDatePicker({
        format: "dd-MM-yyyy",
        change: function(){
            var value = this.value()
            const age = moment().diff(value, 'years')
            $('#age').val(age)
        }
    });

    $("#select_club").mouseup(function() {
        alert('asd');
    });
</script>

@yield('calendarscripts')
</body>
</html>
