<script src="{{ asset('js/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<script src="{{ asset('js/widgets.bundle.js') }}"></script>

@stack('scripts')

<!-- use modals for displaying edit and delete in blade crud, web logic ('not the api logic') -->
<!-- use push here to use librararies, if we need a certain js on particular page, we only have 
	to include, i mean push to this page, which will display the modals, the modal JS -->

