@extends('template.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Edit Data
                </div>

                <div class="panel-body">
                    @include('berat.partial._form', [
                        'urlForm' => route('berat.update', $berat->id),
                        'methodField' => method_field('PUT'),
                        'data' => [
                            'tanggal' => $berat->tanggal, 'max' => $berat->max, 'min' => $berat->min
                        ],
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection