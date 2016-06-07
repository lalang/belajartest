<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinKesehatanJadwalDua */

$this->title = Yii::t('app', 'Create Izin Kesehatan Jadwal Dua');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Kesehatan Jadwal Dua'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-kesehatan-jadwal-dua-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
