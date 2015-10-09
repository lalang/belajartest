<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\IzinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Izins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Izin'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'jenis',
            [
            'attribute' => 'bidang_id',
            'value' => 'bidang.nama',
            'label' => Yii::t('app', 'Bidang'),
            ],
            'nama',
            'kode',
            // 'fno_surat',
            // 'aktif',
            // 'wewenang_id',
            // 'cek_lapangan',
            // 'cek_sprtrw',
            // 'cek_obyek',
            // 'durasi',
            // 'durasi_satuan',
            // 'cek_perusahaan',
            // 'masa_berlaku',
            // 'masa_berlaku_satuan',
            // 'latar_belakang:ntext',
            // 'persyaratan:ntext',
            // 'mekanisme:ntext',
            // 'pengaduan:ntext',
            // 'dasar_hukum:ntext',
            // 'definisi:ntext',
            // 'biaya',
            // 'brosur:ntext',
            // 'arsip_id',
            // 'type',
            // 'template_sk:ntext',
            // 'template_penolakan:ntext',
            // 'template_valid:ntext',
            // 'template_ba_lapangan:ntext',
            // 'template_ba_teknis:ntext',
            // 'action',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
