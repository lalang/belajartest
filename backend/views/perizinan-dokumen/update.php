<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanDokumen */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Perizinan Dokumen',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Perizinan Dokumen'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update <i class="fa fa-edit"></i>');
?>
<div class="perizinan-dokumen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
