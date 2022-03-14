@extends('layout.app')

@section('title', 'Datatables')
@section('page_name', 'practice | change | overrite css')

<!-- jQuery datatable stylesheets -->
@section('stylesheets')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

<!-- main container starts -->
@section('main-container')

  <div class="card m-auto">
    <div class="card-body">
      <div class="row gy-5 g-xl-8">
        <div class="col-xl-10">
          <div class="card-px pt-15 pb-15">
            <!-- datatable::start -->
            <table id="example" class="display" style="width:100%">

              <!-- table heading -->
              <thead>
              <tr>
                <th>id</th>
                <th>name</th>
                <th>position</th>
                <th>office</th>
                <th>age</th>
                <th>actions</th>
              </tr>
              </thead>

              <!-- table body -->
              <tbody>
              @foreach ($users as $record)
                <tr>
                  <td>{{ $record['id'] }}</td>
                  <td>{{ $record['name'] }}</td>
                  <td>{{ $record['position'] }}</td>
                  <td>{{ $record['office'] }}</td>
                  <td>{{ $record['age'] }}</td>
                  <td>
                    <a href="#">(Edit)</a>
                    <a href="#">(Delete)</a>
                  </td>
                </tr>
              @endforeach
              </tbody>

              <!-- table footer -->
              <tfoot>
              <tr>
                <th>id</th>
                <th>name</th>
                <th>positon</th>
                <th>office</th>
                <th>age</th>
                <th>actions</th>
              </tr>
              </tfoot>

            </table>
            <!-- datatable::ends -->

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
          { "width": "20%", "targets": 5 }
        ]
      });
    });
  </script>

@endpush
<!-- end::push - scripts -->
