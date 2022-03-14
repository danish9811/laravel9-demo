@extends('layout.app')

@section('title', 'Datatables')
@section('page_name', 'practice | change | overrite css')

<!-- jQuery datatable stylesheets -->
@section('stylesheets')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection


<!-- click to add new member -->
{{-- <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-/bs-target="#kt_modal_new_card">Add New Card</a> --}}


<!-- main container starts -->
@section('main-container')

  <div class="card m-auto">
    <div class="card-body">
      <div class="row gy-5 g-xl-8" >
        <div class="col-xl-12">
            
              <div class="card card-xl-stretch mb-5 mb-xl-8"  style="width: 80%;">
              
                <!--begin::Header-->
                <div class="card-header border-0 pt-5">
                  <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Users Statistics</span>
                    <span class="text-muted mt-1 fw-bold fs-7">{{ count($users) ?? 'No' }} records found</span>
                  </h3>
                  <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="" data-bs-original-title="Click to add a user">
                    <a href="#" class="btn btn-sm btn-light btn-active-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                      {{-- <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Add New Card</a> --}}
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                    <span class="svg-icon svg-icon-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                      </svg>
                    </span>
                    <!--end::Svg Icon-->New Member</a>
                  </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body py-3">
                  <!--begin::Table container-->
                  <div class="table-responsive">



                    <!--begin::Table-->
                    <table id="example" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                      <!--begin::Table head-->
                      <thead>
                        <tr class="fw-bolder text-muted">
                          <th class="min-w-100px">Id</th>
                          <th class="min-w-150px">Name</th>
                          <th class="min-w-150px">Position</th>
                          <th class="min-w-140px">Country</th>
                          <th class="min-w-140px">Age</th>
                          <th class="min-w-120px text-end">Actions</th>
                          {{-- <th class="min-w-100px text-end">Actions</th> --}}
                        </tr>
                      </thead>
                      <!--end::Table head-->
                      <!--begin::Table body-->
                      <tbody>

                        @foreach($users as $user)
                          <tr>
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="d-flex justify-content-start flex-column">
                                <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $user['id'] }}</span>
                              </div>
                            </div>
                          </td>
                          
                          <td>
                            <div class="d-flex align-items-center">
                              <div class="d-flex justify-content-start flex-column">
                                <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $user['name'] }}</span>
                              </div>
                            </div>
                          </td>

                          <td>
                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $user['position'] }}</span>
                          </td>

                          <td>
                            <span class="text-dark fw-bolder text-hover-primary d-block fs-6">v{{ $user['office'] }}</span>
                          </td>
                          
                          <td class="text-end">
                            <div class="d-flex flex-column w-100 me-2">
                              <div class="d-flex flex-stack mb-2">
                                <span class="text-muted me-2 fs-7 fw-bold">{{ $user['age'] }}</span>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="d-flex justify-content-end flex-shrink-0">
                              <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" style="display: none;">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                <span class="svg-icon svg-icon-3" style="display: none;">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" style="display: none;">
                                    <path fill="black"></path>
                                    <path opacity="0.3" fill="black" style="display: none;"></path>
                                  </svg>
                                </span>
                                <!--end::Svg Icon-->
                              </a>
                              <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                  </svg>
                                </span>
                                <!--end::Svg Icon-->
                              </a>
                              <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                <span class="svg-icon svg-icon-3">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                    <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                    <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                  </svg>
                                </span>
                                <!--end::Svg Icon-->
                              </a>
                            </div>
                          </td>
                        </tr>  
                        @endforeach


                        
                      </tbody>
                      <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                  </div>
                  <!--end::Table container-->
                </div>
                <!--begin::Body-->
            

              </div>
        </div>
      </div>
    </div>
  </div>


@endsection
<!-- main::container ends -->


<!-- scripts -->
@push('scripts')

  <!-- these datatable scripts comes before the plugin scripts load -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#example').DataTable({
        "columnDefs": [
          // { "width": "5%", "targets": 0 }
        ]
      });
    });
  </script>

@endpush
<!-- end::push - scripts -->















{{-- <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Add New Card</a> --}}







<div class="modal fade show" id="kt_modal_new_card" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
      <!--begin::Modal dialog-->
      <div class="modal-dialog modal-dialog-centered mw-650px" data-select2-id="select2-data-127-5x0h">
        <!--begin::Modal content-->
        <div class="modal-content">
          <!--begin::Modal header-->
          <div class="modal-header">
            <!--begin::Modal title-->
            <h2>Add New Card</h2>
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
                  <span class="required">Name On Card</span>
                  <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a card holder's name" aria-label="Specify a card holder's name"></i>
                </label>
                <!--end::Label-->
                <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe">
              <div class="fv-plugins-message-container invalid-feedback"></div></div>
              <!--end::Input group-->
              <!--begin::Input group-->
              <div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
                <!--end::Label-->
                <!--begin::Input wrapper-->
                <div class="position-relative">
                  <!--begin::Input-->
                  <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111">
                  <!--end::Input-->
                  <!--begin::Card logos-->
                  <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                    <img src="/metronic8/demo1/assets/media/svg/card-logos/visa.svg" alt="" class="h-25px">
                    <img src="/metronic8/demo1/assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px">
                    <img src="/metronic8/demo1/assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px">
                  </div>
                  <!--end::Card logos-->
                </div>
                <!--end::Input wrapper-->
              <div class="fv-plugins-message-container invalid-feedback"></div></div>
              <!--end::Input group-->
              <!--begin::Input group-->
              <div class="row mb-10">
                <!--begin::Col-->
                <div class="col-md-8 fv-row">
                  <!--begin::Label-->
                  <label class="required fs-6 fw-bold form-label mb-2">Expiration Date</label>
                  <!--end::Label-->
                  <!--begin::Row-->
                  <div class="row fv-row fv-plugins-icon-container fv-plugins-bootstrap5-row-valid" data-select2-id="select2-data-126-bgm5">
                    <!--begin::Col-->
                    <div class="col-6" data-select2-id="select2-data-125-1pjb">
                      <select name="card_expiry_month" class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Month" data-select2-id="select2-data-16-i596" tabindex="-1" aria-hidden="true">
                        <option data-select2-id="select2-data-18-4ijd"></option>
                        <option value="1" data-select2-id="select2-data-129-8z7t">1</option>
                        <option value="2" data-select2-id="select2-data-130-keew">2</option>
                        <option value="3" data-select2-id="select2-data-131-q9bk">3</option>
                        <option value="4" data-select2-id="select2-data-132-s8vd">4</option>
                        <option value="5" data-select2-id="select2-data-133-mon2">5</option>
                        <option value="6" data-select2-id="select2-data-134-8f8r">6</option>
                        <option value="7" data-select2-id="select2-data-135-7ujw">7</option>
                        <option value="8" data-select2-id="select2-data-136-q3yi">8</option>
                        <option value="9" data-select2-id="select2-data-137-t6on">9</option>
                        <option value="10" data-select2-id="select2-data-138-d7ov">10</option>
                        <option value="11" data-select2-id="select2-data-139-t2ic">11</option>
                        <option value="12" data-select2-id="select2-data-140-9a0z">12</option>
                      </select><span class="select2 select2-container select2-container--bootstrap5 select2-container--below" dir="ltr" data-select2-id="select2-data-17-pvt4" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-card_expiry_month-d4-container" aria-controls="select2-card_expiry_month-d4-container"><span class="select2-selection__rendered" id="select2-card_expiry_month-d4-container" role="textbox" aria-readonly="true" title="Month"><span class="select2-selection__placeholder">Month</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-6" data-select2-id="select2-data-142-zvrg">
                      <select name="card_expiry_year" class="form-select form-select-solid select2-hidden-accessible" data-control="select2" data-hide-search="true" data-placeholder="Year" data-select2-id="select2-data-19-fyrb" tabindex="-1" aria-hidden="true">
                        <option data-select2-id="select2-data-21-ymu2"></option>
                        <option value="2022" data-select2-id="select2-data-143-bj1f">2022</option>
                        <option value="2023" data-select2-id="select2-data-144-2kd1">2023</option>
                        <option value="2024" data-select2-id="select2-data-145-8t5j">2024</option>
                        <option value="2025" data-select2-id="select2-data-146-p8kn">2025</option>
                        <option value="2026" data-select2-id="select2-data-147-rupt">2026</option>
                        <option value="2027" data-select2-id="select2-data-148-3pl1">2027</option>
                        <option value="2028" data-select2-id="select2-data-149-wmhd">2028</option>
                        <option value="2029" data-select2-id="select2-data-150-73zg">2029</option>
                        <option value="2030" data-select2-id="select2-data-151-1l31">2030</option>
                        <option value="2031" data-select2-id="select2-data-152-7lei">2031</option>
                        <option value="2032" data-select2-id="select2-data-153-jawq">2032</option>
                      </select><span class="select2 select2-container select2-container--bootstrap5 select2-container--below" dir="ltr" data-select2-id="select2-data-20-ah37" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-card_expiry_year-jn-container" aria-controls="select2-card_expiry_year-jn-container"><span class="select2-selection__rendered" id="select2-card_expiry_year-jn-container" role="textbox" aria-readonly="true" title="2022">2022</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--end::Col-->
                  </div>
                  <!--end::Row-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-4 fv-row fv-plugins-icon-container">
                  <!--begin::Label-->
                  <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                    <span class="required">CVV</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Enter a card CVV code" aria-label="Enter a card CVV code"></i>
                  </label>
                  <!--end::Label-->
                  <!--begin::Input wrapper-->
                  <div class="position-relative">
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv">
                    <!--end::Input-->
                    <!--begin::CVV icon-->
                    <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                      <!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
                      <span class="svg-icon svg-icon-2hx">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path d="M22 7H2V11H22V7Z" fill="black"></path>
                          <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="black"></path>
                        </svg>
                      </span>
                      <!--end::Svg Icon-->
                    </div>
                    <!--end::CVV icon-->
                  </div>
                  <!--end::Input wrapper-->
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Col-->
              </div>
              <!--end::Input group-->
              <!--begin::Input group-->
              <div class="d-flex flex-stack">
                <!--begin::Label-->
                <div class="me-5">
                  <label class="fs-6 fw-bold form-label">Save Card for further billing?</label>
                  <div class="fs-7 fw-bold text-muted">If you need more info, please check budget planning</div>
                </div>
                <!--end::Label-->
                <!--begin::Switch-->
                <label class="form-check form-switch form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" checked="checked">
                  <span class="form-check-label fw-bold text-muted">Save Card</span>
                </label>
                <!--end::Switch-->
              </div>
              <!--end::Input group-->
              <!--begin::Actions-->
              <div class="text-center pt-15">
                <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
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