<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisataAkta */

$this->title = Yii::t('app', 'Create Izin Pariwisata Akta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pariwisata Akta'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pariwisata-akta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
