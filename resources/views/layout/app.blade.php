<!doctype html>
<html lang="en">

@include('layout.head')

<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

<div class="d-flex flex-column flex-root">
  <div class="page d-flex flex-row flex-column-fluid">

    @include('layout.sidebar')
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

      @include('layout.header')

      @yield('main-container')

      <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
          <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
              <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard</h1>
              <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layout.footer')
@include('layout.js')

</body>
</html>