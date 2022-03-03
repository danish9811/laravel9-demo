<!doctype html>
<html lang="en">

@include('layout.head')

<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">

<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">

        <!-- sidebar included -->
        @include('layout.sidebar')
        
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!-- header included -->
            @include('layout.header')

            <!-- yielding content here -->
            @yield('main-container')
        </div>

    </div>
</div>

@include('layout.footer')
@include('layout.js')

</body>
</html>