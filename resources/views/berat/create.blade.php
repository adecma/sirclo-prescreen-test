@extends('template.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Tambah Data

                </div>

                <div class="panel-body">
                    @include('berat.partial._form', [
                        'urlForm' => route('berat.store'),
                        'methodField' => null,
                        'data' => [
                            'tanggal' => null, 'max' => null, 'min' => null
                        ],
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection