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
    function addRow<?= $class ?>() {
        console.log($('.kv-tabform-row').length);
        if($('.kv-tabform-row').length > 5){
            $('.kv-batch-create').prop('disabled', true);
            return false;
        }

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
    function delRow<?= $class ?>(id) {
        $('.kv-batch-create').prop('disabled', false);
        $('#add-<?= $relID?> tr[data-key=' + id + ']').remove();
    }
</script>
