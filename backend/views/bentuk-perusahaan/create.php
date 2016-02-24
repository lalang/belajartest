<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\BentukPerusahaan */

$this->title = Yii::t('app', 'Create Bentuk Perusahaan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bentuk Perusahaan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bentuk-perusahaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
