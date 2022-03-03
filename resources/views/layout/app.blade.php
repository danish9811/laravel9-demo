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
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="toolbar" id="kt_toolbar">
                <!--begin::Container-->
                <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                    <!--begin::Page title-->
                    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                        <!--begin::Title-->
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--end::Title-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    
                    <!--end::Actions-->
                </div>
                <!--end::Container-->
            </div>
        </div>



        </div>

    </div>
</div>

@include('layout.footer')
@include('layout.js')

</body>
</html>