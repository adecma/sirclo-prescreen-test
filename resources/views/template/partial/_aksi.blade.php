@php
    $formId = 'user-' . $data['id'];
@endphp

<form action="{{ $data['urlForm'] }}" id="{{ $formId }}" method="post">
    {{ csrf_field() }}
    {{ method_field('delete') }}

    <a href="{{ $data['urlEdit'] }}" class="btn btn-info btn-xs btn-flat">
        Edit
    </a>
    <button type="button" class="btn btn-danger btn-xs btn-flat" onclick="destroyConfirm('{{ $formId }}')">
        Hapus
    </button>
</form>