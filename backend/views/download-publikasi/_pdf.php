<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\DownloadPublikasi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Download Publikasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="download-publikasi-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Download Publikasi'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'publikasi.id',
            'label' => 'Publikasi',
        ],
        'judul',
        'judul_eng',
        'deskripsi:ntext',
        'deskripsi_eng:ntext',
        'nama_file',
        'jenis_file',
        'tanggal',
        'diunduh',
        'publish',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>