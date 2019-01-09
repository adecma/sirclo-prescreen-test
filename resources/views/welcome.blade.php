@extends('template.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-body text-center">
                    <a href="{{ route('berat.index') }}" class="btn btn-primary">Goto Dashboard</a>
                </div>
            </div>
        </div>
    </div>
@endsection