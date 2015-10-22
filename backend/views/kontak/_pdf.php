<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kontak */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kontak'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontak-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Kontak').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'judul',
        'judul_en',
        'info_main:ntext',
        'info_main_en:ntext',
        'info_sub:ntext',
        'info_sub_en:ntext',
        'alamat:ntext',
        'alamat_en:ntext',
        'tlp',
        'email:email',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>