<?php

use yii\helpers\Html;
?>
<p>
    <?=
    Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak Surat Pernyataan ( '.$model->izin->nama.' )'), ['print-pendaftaran-siup', 'id' => $model->id], [
        'target' => '_blank',
        'data-toggle' => 'tooltip',
        'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
            ]
    )
    ?>       
</p>
