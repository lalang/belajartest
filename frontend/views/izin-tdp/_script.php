<?php
use yii\helpers\Url;

?>
<script>
    $(function () {
        var data = <?= $value ?>;
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-'.$relID]); ?>',
            data: {'<?= $class?>' : data, action : 'load', isNewRecord : <?= $isNewRecord ?>},
            success: function (data) {
                $('#add-<?= $relID?>').html(data);
            }
        });
    });
	<?php if($class=="IzinTdpKegiatan"){?>
	function addRowIzinTdpKegiatan() {
        console.log($('#add-izin-tdp-kegiatan tr').length);
        if($('#add-izin-tdp-kegiatan tr').length > 3){
			alert("Kegiatan usaha tidak boleh lebih dari 3");
            return false;
        }

        var data = $('#add-izin-tdp-kegiatan :input').serializeArray();
        data.push({name: 'action', value: 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-izin-tdp-kegiatan']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-tdp-kegiatan').html(data);
            }
        });

    }
	<?php }else{ ?>
    function addRow<?= $class ?>() {
        var data = $('#add-<?= $relID?> :input').serializeArray();
        data.push({name: 'action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-'.$relID]); ?>',
            data: data,
            success: function (data) {
                $('#add-<?= $relID?>').html(data);
            }
        });
    }
	<?php } ?>
    function delRow<?= $class ?>(id) {
        $('#add-<?= $relID?> tr[data-key=' + id + ']').remove();
    }
</script>
