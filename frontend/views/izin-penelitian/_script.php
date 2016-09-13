<?php

use yii\helpers\Url;

//
?>
<script>
    $(function() {
        var data = <?= $value ?>;
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-' . $relID]); ?>',
            data: {'<?= $class ?>': data, action: 'load', isNewRecord: <?= $isNewRecord ?>},
            success: function(data) {
                $('#add-<?= $relID ?>').html(data);
            }
        });
    });
<?php if ($class == "AnggotaPenelitian") { ?>
        function addRowAnggotaPenelitian() {

            console.log($('#add-anggota-penelitian tr').length);
            if ($('#add-anggota-penelitian tr').length > 10) {

                alert("Anggota maximal 10 orang");
                return false;
            }
            $("#izinpenelitian-anggota").val($('#add-anggota-penelitian tr').length);

            var data = $('#add-anggota-penelitian :input').serializeArray();
            data.push({name: 'action', value: 'add'});
            $.ajax({
                type: 'POST',
                url: '<?php echo Url::to(['add-anggota-penelitian']); ?>',
                data: data,
                success: function(data) {
                    $('#add-anggota-penelitian').html(data);
                }
            });

        }
<?php } else {
    ?>
        function addRowIzinPenelitianMetode() {
            <?php 
            $lim = backend\models\MetodePenelitian::find()
                    ->count('id');
            ?>
            var limit = <?= $lim ?>;

            console.log($('#add-izin-penelitian-metode tr').length);
            if ($('#add-izin-penelitian-metode tr').length > limit) {

                alert("Metode Penelitian maximal "+limit+" Metode");
                return false;
            }
            
            var data = $('#add-izin-penelitian-metode :input').serializeArray();
            data.push({name: 'action', value: 'add'});
            $.ajax({
                type: 'POST',
                url: '<?php echo Url::to(['add-izin-penelitian-metode']); ?>',
                data: data,
                success: function(data) {
                    $('#add-izin-penelitian-metode').html(data);
                }
            });

        }
        
<?php } ?>
    function addRowIzinPenelitianLokasi() {
        var wi = $('#wewenang_id').val();
        var jumlim;
        if (wi == 1) {
            jumlim = 5;
        }
        else {
            jumlim = 1;
        }
        console.log($('#add-izin-penelitian-lokasi tr').length);

        if ($('#add-izin-penelitian-lokasi tr').length > jumlim) {
            $('.kv-batch-create1').prop('disabled', true);
//                if( wi==1 && $('#add-izin-penelitian-lokasi tr').length < 2)
//            {alert("Lokasi");
//                
//            }
            return false;
        }

        var data = $('#add-izin-penelitian-lokasi :input').serializeArray();
        data.push({name: 'action', value: 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-izin-penelitian-lokasi']); ?>',
            data: data,
            success: function(data) {
                $('#add-izin-penelitian-lokasi').html(data);
            }
        });

    }

<?php if ($class == "AnggotaPenelitian") { ?>
        function delRow<?= $class ?>(id) {
            $('#add-<?= $relID ?> tr[data-key=' + id + ']').remove();
            $("#izinpenelitian-anggota").val(id);
        }
<?php } else { ?>
        function delRow<?= $class ?>(id) {
            $('#add-<?= $relID ?> tr[data-key=' + id + ']').remove();
        }
<?php } ?>


</script>
