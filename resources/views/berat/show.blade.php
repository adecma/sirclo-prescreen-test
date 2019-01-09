@extends('template.app')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Detail Data

                    <div class="pull-right">
                        <a href="{{ route('berat.create') }}" class="btn btn-xs btn-success">Tambah</a>
                    </div>
                </div>

                <div class="panel-body">
                    @php
                        $url['urlForm'] = route('berat.destroy', $berat->id);
                        $url['urlEdit'] = route('berat.edit', $berat->id);
                        $url['id'] = $berat->id;
                    @endphp
                
                    <dl class="dl-horizontal">
                        <dt>Tanggal</dt>
                        <dd>{{ $berat->tanggal }}</dd>
                        <dt>Max</dt>
                        <dd>{{ $berat->max }}</dd>
                        <dt>Min</dt>
                        <dd>{{ $berat->min }}</dd>
                        <dt>Perbedaan</dt>
                        <dd>{{ ($berat->max - $berat->min) }}</dd>
                        <dt>Aksi</dt>
                        <dd>
                            @include('template.partial._aksi', [
                                'data' => $url
                            ])
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection