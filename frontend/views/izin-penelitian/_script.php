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
    <?php if($class=="AnggotaPenelitian"){?>
	function addRowAnggotaPenelitian() {
            $("#izinpenelitian-anggota").change(function() {
           var i= this.value;
        });
        console.log($('#add-anggota-penelitian tr').length);
//        if($('#add-anggota-penelitian tr').length > 3){
//			alert("Telah melebihi Jumlah anggota");
//            return false;
//        }

        var data = $('#add-anggota-penelitian :input').serializeArray();
        data.push({name: 'action', value: 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-anggota-penelitian']); ?>',
            data: data,
            success: function (data) {
                $('#add-anggota-penelitian').html(data);
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
