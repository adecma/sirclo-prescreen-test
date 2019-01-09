$(function() {
    let destroyConfirm

    destroyConfirm = function(formId) {
        text = 'Anda yakin akan menghapus data ini?';
		
		if(confirm(text)) {
			document.getElementById(formId).submit();
		}
    }

    window.destroyConfirm = destroyConfirm
})