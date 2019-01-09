@extends('template.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    404
                </div>

                <div class="panel-body text-center">
                    <div class="lead">
                        Oops! <br>
                        Halaman Tidak Ditemukan
                        @if(! empty($exception->getMessage()))
                            <hr>
                            <code>{{ $exception->getMessage() }}</code>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection