<form class="form-horizontal" method="post" action="{{ $urlForm }}" enctype="multipart/form-data">
    {{ csrf_field() }} {!! $methodField !!}

    <div class="box-body">
        <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : null }}">
            <label for="tanggal" class="col-sm-4 col-md-3 col-lg-2 control-label">Tanggal (*)</label>
            <div class="col-sm-8 col-md-9 col-lg-7">
                <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" autocomplete="off" required
                value="{{ old('tanggal', $data['tanggal']) }}">
                {!! inputAlert('tanggal', $errors) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('max') ? 'has-error' : null }}">
            <label for="max" class="col-sm-4 col-md-3 col-lg-2 control-label">Max (*)</label>
            <div class="col-sm-8 col-md-9 col-lg-7">
                <input type="text" class="form-control" id="max" name="max" placeholder="max" required autocomplete="off"
                    value="{{ old('max', $data['max']) }}">
                {!! inputAlert('max', $errors) !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('min') ? 'has-error' : null }}">
            <label for="min" class="col-sm-4 col-md-3 col-lg-2 control-label">Min (*)</label>
            <div class="col-sm-8 col-md-9 col-lg-7">
                <input type="text" class="form-control" id="min" name="min" placeholder="min" required autocomplete="off"
                    value="{{ old('min', $data['min']) }}">
                {!! inputAlert('min', $errors) !!}
            </div>
        </div>
    </div>
    <div class="box-footer">
        <a href="{{ route('berat.index') }}" class="btn btn-default btn-xs col-sm-offset-4 col-md-offset-3 col-lg-offset-2">
            Batal
        </a>
        <button type="submit" class="btn btn-success btn-xs">Simpan</button>
    </div>
</form>

@push('add_css')
<link rel="stylesheet" href="{{ asset('vendor/datepicker/datepicker3.css') }}"> 
@endpush 

@push('add_js')
<script src="{{ asset('vendor/datepicker/bootstrap-datepicker.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>

@endpush