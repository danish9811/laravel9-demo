
<!-- CREATE NEW RECORD MODAL -->
<div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-modal="true" role="dialog">
  <!--begin::Modal dialog-->
  <div class="modal-dialog modal-dialog-centered mw-650px" data-select2-id="select2-data-127-5x0h">
    <!--begin::Modal content-->
    <div class="modal-content">
      <!--begin::Modal header-->
      <div class="modal-header">
        <!--begin::Modal title-->
        <h2>Add New Record</h2>
        <!--end::Modal title-->

        <!--begin::Close-->
        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
          <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
          <span class="svg-icon svg-icon-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
              <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black"></rect>
            </svg>
          </span>
          <!--end::Svg Icon-->
        </div>
        <!--end::Close-->
      </div>
      <!--end::Modal header-->
      <!--begin::Modal body-->
      <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">

        <!--begin::Form-->
        <form id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#" data-select2-id="select2-data-kt_modal_new_card_form">

          <!--begin::Input group-->
          <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
              <span class="required">Name</span>
              <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a card holder's name" aria-label="Specify a card holder's name"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="Your Name" name="name" value="">
          <div class="fv-plugins-message-container invalid-feedback"></div></div>
          <!--end::Input group-->


          <!--begin::Input group-->
          <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
              <span class="required">Position</span>
              <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a card holder's name" aria-label="Specify a card holder's name"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="position" name="position" value="">
          <div class="fv-plugins-message-container invalid-feedback"></div></div>
          <!--end::Input group-->


          <!--begin::Input group-->
          <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
              <span class="required">Country</span>
              <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a card holder's name" aria-label="Specify a card holder's name"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="country" name="country" value="">
          <div class="fv-plugins-message-container invalid-feedback"></div></div>
          <!--end::Input group-->


          <!--begin::Input group-->
          <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
              <span class="required">Age</span>
              <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a card holder's name" aria-label="Specify a card holder's name"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="age" name="age" value="">
          <div class="fv-plugins-message-container invalid-feedback"></div></div>
          <!--end::Input group-->

          <!--begin::Actions-->
          <div class="text-center pt-15">
            {{-- <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button> --}}
            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
              <span class="indicator-label">Submit</span>
              <span class="indicator-progress">Please wait... 
              <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
          </div>
          <!--end::Actions-->
        <div></div></form>
        <!--end::Form-->
      </div>
      <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
  </div>
  <!--end::Modal dialog-->
</div>