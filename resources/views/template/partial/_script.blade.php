<script src="{{ asset('vendor/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/toastr/build/toastr.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

@if(session()->has('alert_type'))
    {!! notifScript(session('alert_type'), session('alert_title'), session('alert_message')) !!}
@endif

@stack('add_js')