<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->kode_registrasi;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perizinan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perizinan-view">

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Permohonan Sukses!</h4>
                    Permohonan izin sukses didaftarkan, silahkan pantau melalui menu akun anda untuk melihat status permohonan.
                  </div>
            
                    <div class="callout callout-warning">
                <p>Pada saat verifikasi dan pengambilan SK, agar membawa dokumen cetak yang sudah ditandatangani sebagai berikut :</p>
                <p><?= $this->render('_print', ['model' => $model]) ?></p>
                <p>disertai dengan dokumen asli kelengkapan persyaratan sebagai berikut :</p>
                <?php $docs = \backend\models\Perizinan::getDocs($model->izin_id); ?>
                <ol>
                    <?php foreach ($docs as $doc) { ?>
                        <li><?= $doc['isi']; ?></li>
                    <?php } ?>
                </ol> 
            </div>
    </div>
        </div>
        
    </div>

    <div class="row">
<?php 
echo Yii::$app->formatter->asDate($model->tanggal_mohon, 'php: l, d F Y');
    
?>

    
     
    
</div>