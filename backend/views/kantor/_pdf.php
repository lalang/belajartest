<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kantor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kantor'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kantor-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Kantor').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        [
            'attribute' => 'lokasi.id',
            'label' => Yii::t('app', 'Lokasi'),
        ],
        'nama',
        'kepala',
        'alamat',
        'kodepos',
        'telepon',
        'fax',
        'latitude',
        'longitude',
        'email_jak_go_id:email',
        'email_kelurahan:email',
        'email_ptsp:email',
        'twitter',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>