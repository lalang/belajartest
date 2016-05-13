<?php

use yii\helpers\Html;
?>
<p>
    <?=
    Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak Form Pendaftaran '), ['print-pendaftaran-siup', 'id' => $model->id], [
        'target' => '_blank',
        'data-toggle' => 'tooltip',
        'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
            ]
    )
    ?>       
</p>
<p>
    <?=
    Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak Surat Kuasa Pengurusan'), ['print-kuasa-pengurusan', 'id' => $model->id], [
        'target' => '_blank',
        'data-toggle' => 'tooltip',
        'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
            ]
    )
    ?>     
</p>
<p>
    <?=
    Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak Surat Pernyataan Keabsahan'), ['print-kuasa-ttd', 'id' => $model->id], [
        'target' => '_blank',
        'data-toggle' => 'tooltip',
        'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
            ]
    )
    ?>   
</p>
<p>
    <?=
    Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak Tanda Registrasi'), ['print-tanda-terima', 'id' => $model->id], [
        'target' => '_blank',
        'data-toggle' => 'tooltip',
        'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
            ]
    )
    ?>   
</p>