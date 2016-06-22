$(document).ready(function() {
	$('#form-laporan').on('submit', function() {
		if(!$('#laporan-id_laporan').val()) {
			alert('laporan perusahaan tidak boleh kosong');
			$('#laporan-id_laporan').focus();
			return false;
		}
	});
});