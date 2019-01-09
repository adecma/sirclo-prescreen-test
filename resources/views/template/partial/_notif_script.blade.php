<script>
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.timeOut = 0;
    toastr.{{ $type }}('{{ $message }}', '{{ $title }}')
</script>