<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisataTujuanWisata */

$this->title = Yii::t('app', 'Create Izin Pariwisata Tujuan Wisata');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pariwisata Tujuan Wisata'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pariwisata-tujuan-wisata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
