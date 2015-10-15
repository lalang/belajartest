<?php

use yii\helpers\Url;
?>
<script>
    $(function () {
        var data = <?= $value ?>;
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-' . $relID]); ?>',
            data: {'<?= $class ?>': data, action: 'load', isNewRecord: <?= $isNewRecord ?>},
            success: function (data) {
                $('#add-<?= $relID ?>').html(data);
            }
        });
    });

    function addRowIzinSiupAkta() {
        var data = $('#add-izin-siup-akta :input').serializeArray();
        data.push({name: 'action', value: 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-izin-siup-akta']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-siup-akta').html(data);
            }
        });

    }

    function addRowIzinSiupKbli() {
        console.log($('#add-izin-siup-kbli tr').length);
        if($('#add-izin-siup-kbli tr').length > 5){
            $('.kv-batch-create').prop('disabled', true);
            return false;
        }

        var data = $('#add-izin-siup-kbli :input').serializeArray();
        data.push({name: 'action', value: 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-izin-siup-kbli']); ?>',
            data: data,
            success: function (data) {
                $('#add-izin-siup-kbli').html(data);
            }
        });

    }
    function delRow<?= $class ?>(id) {
        $('.kv-batch-create').prop('disabled', false);
        $('#add-<?= $relID ?> tr[data-key=' + id + ']').remove();
    }
</script>
