<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KbliIzin */

$this->title = 'Update Kbli Izin: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kbli Izin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<p><?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/kbli-izin/index','id'=>$model->kbli_id], ['class' => 'btn btn-warning']) ?></p>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
