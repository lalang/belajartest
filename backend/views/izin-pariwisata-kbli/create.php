<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisataKbli */

$this->title = Yii::t('app', 'Create Izin Pariwisata Kbli');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pariwisata Kbli'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pariwisata-kbli-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
