<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Izin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'jenis',
            'bidang_id',
            'nama',
            'kode',
            'fno_surat',
            'aktif',
            'wewenang_id',
            'cek_lapangan',
            'cek_sprtrw',
            'cek_obyek',
            'durasi',
            'durasi_satuan',
            'cek_perusahaan',
            'masa_berlaku',
            'masa_berlaku_satuan',
            'latar_belakang:ntext',
            'persyaratan:ntext',
            'mekanisme:ntext',
            'pengaduan:ntext',
            'dasar_hukum:ntext',
            'definisi:ntext',
            'biaya',
            'brosur:ntext',
            'arsip_id',
            'type',
            'template_sk:ntext',
            'template_penolakan:ntext',
            'template_valid:ntext',
            'template_ba_lapangan:ntext',
            'template_ba_teknis:ntext',
            'action',
        ],
    ]) ?>

</div>
