<?php
use yii\helpers\Url;

?>
<script>
    $(function () {
        var data = <?= $value ?>;
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['/izin-pariwisata/add-'.$relID]); ?>',
            data: {'<?= $class?>' : data, action : 'load', isNewRecord : <?= $isNewRecord ?>},
            success: function (data) {
                $('#add-<?= $relID?>').html(data);
            }
        });
    });
	
	
	function addRowIzinPariwisataKbli() {
		
		console.log($('#add-izin-pariwisata-kbli tr').length);
        if($('#add-izin-pariwisata-kbli tr').length > 3){
            $('.kv-batch-create-kbli').prop('disabled', true);
            return false;
        }
		
        var data = $('#add-izin-pariwisata-kbli :input').serializeArray();
        data.push({name: 'action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['/izin-pariwisata/add-izin-pariwisata-kbli']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-pariwisata-kbli').html(data);
            }
        });
    }

	function addRowIzinPariwisataTeknis() {
		
        var data = $('#add-izin-pariwisata-teknis :input').serializeArray();
        data.push({name: 'action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['/izin-pariwisata/add-izin-pariwisata-teknis']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-pariwisata-teknis').html(data);
            }
        });
    }
	
	function addRowIzinPariwisataTujuanWisata() {
		
        var data = $('#add-izin-pariwisata-tujuan-wisata :input').serializeArray();
        data.push({name: 'action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['/izin-pariwisata/add-izin-pariwisata-tujuan-wisata']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-pariwisata-tujuan-wisata').html(data);
            }
        });
    }
	
	function addRowIzinPariwisataAkta() {
		
        var data = $('#add-izin-pariwisata-akta :input').serializeArray();
        data.push({name: 'action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['/izin-pariwisata/add-izin-pariwisata-akta']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-pariwisata-akta').html(data);
            }
        });
    }
	
	function addRowIzinPariwisataFasilitas() {
		
        var data = $('#add-izin-pariwisata-fasilitas :input').serializeArray();
        data.push({name: 'action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['/izin-pariwisata/add-izin-pariwisata-fasilitas']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-pariwisata-fasilitas').html(data);
            }
        });
    }
	
	function addRowIzinPariwisataJenisManum() {
		
        var data = $('#add-izin-pariwisata-jenis-manum :input').serializeArray();
        data.push({name: 'action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['/izin-pariwisata/add-izin-pariwisata-jenis-manum']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-pariwisata-jenis-manum').html(data);
            }
        });
    }
	
	function addRowIzinPariwisataKapasitasAkomodasi() {
		
        var data = $('#add-izin-pariwisata-kapasitas-akomodasi :input').serializeArray();
        data.push({name: 'action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['/izin-pariwisata/add-izin-pariwisata-kapasitas-akomodasi']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-pariwisata-kapasitas-akomodasi').html(data);
            }
        });
    }
	
	function addRowIzinPariwisataKapasitasTransport() {
		
        var data = $('#add-izin-pariwisata-kapasitas-transport :input').serializeArray();
        data.push({name: 'action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['/izin-pariwisata/add-izin-pariwisata-kapasitas-transport']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-pariwisata-kapasitas-transport').html(data);
            }
        });
    }	
	
    function delRow<?= $class ?>(id) {
        $('.kv-batch-create-kbli').prop('disabled', false);
        $('#add-<?= $relID ?> tr[data-key=' + id + ']').remove();
    }
</script>
