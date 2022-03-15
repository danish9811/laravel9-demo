@extends('layout.app')

@section('title', 'Datatables')
@section('page_name', 'Users Statistics')

@section('stylesheets')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('main-container')
  <div class="card m-auto">
    <div class="card-body">
      <div class="row gy-5 g-xl-8">
        <div class="col-xl-12">
          <div class="card card-xl-stretch mb-5 mb-xl-8" style="width: 80%;">

            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
              <h3 class="card-title align-items-start flex-column">
{{--                <span class="card-label fw-bolder fs-3 mb-1">Users Statistics</span>--}}
                <span class="text-muted mt-1 fw-bold fs-7">Total {{ count($users) ?? "0" }} records found</span>
              </h3>
              <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" title="" data-bs-original-title="Click to add a user">
                <button type="button" class="btn btn-sm btn-light btn-active-primary" data-feed="/users/create" data-toggle="modal-feed" data-target="#kt_modal_new_card">Add member</button>
              </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
              <!--begin::Table container-->
              <div class="table-responsive">
                <table id="example" class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                  <thead>
                  <tr class="fw-bolder text-muted">
                    <th class="min-w-100px">Id</th>
                    <th class="min-w-150px">Name</th>
                    <th class="min-w-150px">Position</th>
                    <th class="min-w-140px">Country</th>
                    <th class="min-w-140px">Age</th>
                    <th class="min-w-120px text-end">Actions</th>
                  </tr>
                  </thead>

                  <tbody>

                  @foreach($users as $user)
                    <tr>

                      <!-- $user['id'] -->
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="d-flex justify-content-start flex-column">
                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $user['id'] }}</span>
                          </div>
                        </div>
                      </td>

                      <!-- $user['name'] -->
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="d-flex justify-content-start flex-column">
                            <span class="text-dark fw-bolder text-hover-primary fs-6">{{ $user['name'] }}</span>
                          </div>
                        </div>
                      </td>

                      <!-- $user['position'] -->
                      <td>
                        <span class="text-dark fw-bolder text-hover-primary d-block fs-6">{{ $user['position'] }}</span>
                      </td>

                      <!-- $user['office'] -->
                      <td>
                        <span class="text-dark fw-bolder text-hover-primary d-block fs-6">v{{ $user['office'] }}</span>
                      </td>

                      <!-- $user['age'] -->
                      <td class="text-end">
                        <div class="d-flex flex-column w-100 me-2">
                          <div class="d-flex flex-stack mb-2">
                            <span class="text-muted me-2 fs-7 fw-bold">{{ $user['age'] }}</span>
                          </div>
                        </div>
                      </td>

                      <!-- edit and delete buttons -->
                      <!-- todo : make these two buttons functional -->
                      <td>
                        <div class="d-flex justify-content-end flex-shrink-0">
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
                  <tfoot>
                  <tr class="fw-bolder text-muted">
                    <th class="min-w-100px">Id</th>
                    <th class="min-w-150px">Name</th>
                    <th class="min-w-150px">Position</th>
                    <th class="min-w-140px">Country</th>
                    <th class="min-w-140px">Age</th>
                    <th class="min-w-120px text-end">Actions</th>
                    {{-- <th class="min-w-100px text-end">Actions</th> --}}
                  </tr>
                  </tfoot>
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


  <!-- "LAYOUT.MODALS.BLADE.PHP" -->
  <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-modal="true" role="dialog">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px" data-select2-id="select2-data-127-5x0h">
      <!--begin::Modal content-->
      <div class="modal-content">

      </div>
    </div>
  </div>


@endsection


@push('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnotif.b-cdn.net/js/mf.min.js"></script>


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
