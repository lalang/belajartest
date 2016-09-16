<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisataTeknis */

$this->title = Yii::t('app', 'Create Izin Pariwisata Teknis');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pariwisata Teknis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pariwisata-teknis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
