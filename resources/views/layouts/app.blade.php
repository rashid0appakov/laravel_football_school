<!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="ru"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="ru"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="/altair/assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/altair/assets/img/favicon-32x32.png" sizes="32x32">

    <title>Altair Admin v2.20.1 - Login Page</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500' rel='stylesheet' type='text/css'>
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

    <!-- altair admin login page -->
    <link rel="stylesheet" href="/altair/assets/css/login_page.min.css" />

</head>
<body class="login_page">

<div class="login_page_wrapper">
    @yield('content')
</div>

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

<!-- altair login page functions -->
<script src="/altair/assets/js/pages/login.min.js"></script>


<script>
    // check for theme
    if (typeof(Storage) !== "undefined") {
        var root = document.getElementsByTagName( 'html' )[0],
            theme = localStorage.getItem("altair_theme");
        if(theme == 'app_theme_dark' || root.classList.contains('app_theme_dark')) {
            root.className += ' app_theme_dark';
        }
    }
</script>
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
    $("#kUI_datepicker_a").kendoDatePicker({
        format: "dd-MM-yyyy"
    });
</script>
</body>
</html>
