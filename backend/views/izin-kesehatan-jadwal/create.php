<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinKesehatanJadwal */

$this->title = Yii::t('app', 'Create Izin Kesehatan Jadwal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Kesehatan Jadwal'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-kesehatan-jadwal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
