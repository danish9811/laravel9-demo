@extends('layout.app')

@section('title', 'Register')

@section('page_name', 'Register')

@section('loginName', '')

@section('loginEmail', '')

@section('main-container')

  <div class="card m-auto">
    <div class="card-body">
      <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">

          <!-- actual page content starts from here -->
          <div class="w-lg-600px p-10 p-lg-15 mx-auto">
            <form class="form w-100" action="register-submit" method="POST" autocomplete="off" id="kt_sign_up_form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="mb-10 text-center">
                <h1 class="text-dark mb-3">Create an Account</h1>
                <div class="text-gray-400 fw-bold fs-4">Already have an account?
                  <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a>
                </div>
              </div>
              <div class="row fv-row mb-7">
                <div class="fv-row mb-7">
                  <label class="form-label fw-bolder text-dark fs-6">Name</label>
                  <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name"/>
                </div>
              </div>

              <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email"/>
              </div>
              <div class="mb-10 fv-row" data-kt-password-meter="true">
                <div class="mb-1">
                  <label class="form-label fw-bolder text-dark fs-6">Password</label>
                  <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password"/>
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                  </div>

                  <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                  </div>
                </div>
                <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
              </div>
              <div class="fv-row mb-5">
                <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                <input class="form-control form-control-lg form-control-solid" type="password" name="confirm-password"/>
              </div>

              <div class="text-center">
                <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                  <span class="indicator-label">Submit</span>
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
  <script src="{{ asset('js/authentication/sign-up/general.js') }}"></script>
@endpush
