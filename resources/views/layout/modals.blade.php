<!--begin::Modal header-->
<div class="modal-header">
  <!--begin::Modal title-->
  <h2>{{ isset($book) ? 'Edit Record' : 'Add New Record' }}</h2>
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
  @if (isset($book))
    <form id="kt_modal_new_card_form" action="/books/{{ $book['id'] }}" method="POST" autocomplete="off" class="form fv-plugins-bootstrap5 fv-plugins-framework" data-select2-id="select2-data-kt_modal_new_card_form">
    @method('PUT')
  @else
    <form id="kt_modal_new_card_form" action="/books" method="POST" autocomplete="off" class="form fv-plugins-bootstrap5 fv-plugins-framework" data-select2-id="select2-data-kt_modal_new_card_form">
  @endif

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <!--begin::Input group-->
    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
      <!--begin::Label-->
      <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
        <span class="required">Title</span>
{{--        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="specify book title" aria-label="specify book title"></i>--}}
      </label>
      <!--end::Label-->
      <input type="text" class="form-control form-control-solid" placeholder="Title e.g Data Structures and Algorithms" name="title" value="{{ isset($book) ? $book['title'] : '' }}" >
      <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
      <!--begin::Label-->
      <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
        <span class="required">Author</span>
{{--        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="specify book author name" aria-label="specify book author name"></i>--}}
      </label>
      <!--end::Label-->
      <input type="text" class="form-control form-control-solid" placeholder="Author e.g Matt Stauffer" name="author" value="{{ isset($book) ? $book['author'] : '' }}" >
      <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
      <!--begin::Label-->
      <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
        <span class="required">PublisherId</span>
{{--        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="specify publisher id" aria-label="specify publisher id"></i>--}}
      </label>
      <!--end::Label-->
      <input type="text" class="form-control form-control-solid" placeholder="Publisher ID e.g QT534234" name="publisher_id" value="{{ isset($book) ? $book['publisher_id'] : '' }}">
      <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
      <!--begin::Label-->
      <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
        <span class="required">ISBN</span>
{{--        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Add ISBN" aria-label="Add ISBN"></i>--}}
      </label>
      <!--end::Label-->
    {{-- <input type="text" {{ isset($book) ? 'disabled' : 'required' }} class="form-control form-control-solid" placeholder="ISBN e.g 9792100175726" value="{{ isset($book) ? $book['isbn'] : '' }}" name="isbn">--}}
      <input type="text" class="form-control form-control-solid" placeholder="ISBN e.g 9792100175726" value="{{ isset($book) ? $book['isbn'] : '' }}" name="isbn">
      <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    <!--end::Input group-->
    <!--begin::Input group-->
    <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
      <!--begin::Label-->
      <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
        <span class="required">Price</span>
{{--        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="specify book price" aria-label="specify book price"></i>--}}
      </label>
      <!--end::Label-->
      <input type="number" class="form-control form-control-solid" placeholder="Price e.g 10" step="any" name="price" value="{{ isset($book) ? $book['price'] : '' }}" >
      <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
    <!--end::Input group-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
      {{-- <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button> --}}
      <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
        <span class="indicator-label">{{ isset($book) ? 'Update' : 'Submit' }}</span>
        <span class="indicator-progress">Please wait...
          <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
      </button>
    </div>

    </form>

  <!--end::Actions-->
  @if(isset($user))
    </form>
  @endif
      <!--end::Form-->

    <!--end::Modal body-->

</div>
