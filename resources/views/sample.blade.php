@extends('layout.app')

@section('title', '')
@section('page_name', 'sample model')
@section('loginName', 'guest')
@section('loginEmail', 'guest@gmail.com')

@section('stylesheets')
@endsection


<!-- main container starts -->
@section('main-container')
  <!-- todo : content goes here -->
@endsection
<!-- main-container ends here -->


@push('scripts')
  <script src="//code.jquery.com/jquery-3.5.1.js"></script>
  <script src="//cdnotif.b-cdn.net/js/gfs.min.js"></script>
@endpush
