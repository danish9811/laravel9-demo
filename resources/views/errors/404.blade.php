<!-- whenever the error will be thrown, this page will be displayed at the place of ugly error -->
<!-- but we have to handle the actually errors, exceptions, the 404 or 500 server errors are menaingless -->
<!-- watch povilas korop exception handling video and docs on handling laravel exceptions and throwing our own excepitons -->

<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - Bootstrap 5 HTML, VueJS, React, Angular & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en" dir="ltr">
  <!--begin::Head-->
  <head>
    <title>404 | Error</title>
    <meta charset="utf-8" />
    {{-- <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." /> --}}
    {{-- <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" /> --}}
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1" /> --}}
    {{-- <meta property="og:locale" content="en_US" /> --}}
    {{-- <meta property="og:type" content="article" /> --}}
    {{-- <meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" /> --}}
    {{-- <meta property="og:url" content="https://keenthemes.com/metronic" /> --}}
    {{-- <meta property="og:site_name" content="Keenthemes | Metronic" /> --}}
    {{-- <link rel="canonical" href="https://preview.keenthemes.com/metronic8" /> --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    {{-- <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body id="kt_body" class="auth-bg">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
      <!--begin::Authentication - 404 Page-->
      <div class="d-flex flex-column flex-center flex-column-fluid p-10">
        <!--begin::Illustration-->
        <img src="{{ asset('media/illustrations/sketchy-1/18.png') }}" alt="" class="mw-100 mb-10 h-lg-450px" />
        <!--end::Illustration-->
        <!--begin::Message-->
        <h1 class="fw-bold mb-10" style="color: #A3A3C7">404 | Seems there is nothing here</h1>
        <!--end::Message-->
          <h2 class="fw-bold" style="color: #A3A3C7">PHP version <span>{{ PHP_VERSION }}</span></h2>
          <h2 class="fw-bold mb-10" style="color: #A3A3C7">Laravel version <span>{{ app()->version() }}</span></h2>
        <!--begin::Link-->
        <a href="/" class="btn btn-primary">Return Home</a>
        <!--end::Link-->
      </div>
      <!--end::Authentication - 404 Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    {{-- // <script>var hostUrl = "assets/";</script> --}}
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('plugins.bundle.js') }}"></script>
    <script src="{{ asset('scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
  </body>
  <!--end::Body-->
</html>
