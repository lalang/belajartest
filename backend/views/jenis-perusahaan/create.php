<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JenisPerusahaan */

$this->title = Yii::t('app', 'Create Jenis Perusahaan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Perusahaan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-perusahaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
