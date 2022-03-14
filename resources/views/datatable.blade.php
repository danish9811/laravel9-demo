@extends('layout.app')

@section('title', 'Datatables')
@section('page_name', 'Datatables')

<!-- jQuery datatable stylesheets -->
@section('stylesheets')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

<!-- main container starts -->
@section('main-container')

  <div id="kt_post" class="post d-flex flex-column-fluid">

    <div class="card">
      <div class="card-body">
        <div class="card-px text-center pt-15 pb-15">

          <!-- datatable::start -->
          <table id="example" class="display" style="width:80%">

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


@endsection
<!-- main::container ends -->


<!-- scripts -->
@push('scripts')

  <!-- these datatable scripts comes before the plugin scripts load -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
  </script>

@endpush
<!-- end::push - scripts -->
