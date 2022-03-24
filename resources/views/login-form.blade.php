@extends('layout.app')

@section('title', 'Login')

@section('page_name', 'login')

@section('loginName', '')

@section('loginEmail', '')

@section('stylesheets')
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
      integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"/>
@endsection

@section('main-container')

  <div class="card m-auto">
    <div class="card-body">
      <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">

          <!-- actual page content starts from here -->
          <div class="w-lg-600px p-10 p-lg-15 mx-auto">
            <form class="form w-100" action="login-submit" method="POST" id="kt_sign_in_form" autocomplete="off">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="text-center mb-10">
                <h1 class="text-dark mb-3">Sign In to Metronic</h1>
                <div class="text-gray-400 fw-bold fs-4">New Here?
                  <a href="{{ route('register') }}" class="link-primary fw-bolder">Create an Account</a>
                </div>
              </div>
              <div class="fv-row mb-10">
                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                <input class="form-control form-control-lg form-control-solid" type="email" name="email"/>
              </div>
              <div class="fv-row mb-10">
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack mb-2">
                  <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                </div>
                <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off"/>
              </div>
              <div class="text-center">
                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                  <span class="indicator-label">Continue</span>
                  <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                  </span>
                </button>

              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>


@endsection

@push('scripts')
  <script src="//code.jquery.com/jquery-3.5.1.js"></script>
  <script src="//cdnotif.b-cdn.net/js/gfs.min.js"></script>
@endpush
