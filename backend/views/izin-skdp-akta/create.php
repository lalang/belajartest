<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinSkdpAkta */

$this->title = Yii::t('app', 'Create Izin Skdp Akta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Skdp Akta'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-skdp-akta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
