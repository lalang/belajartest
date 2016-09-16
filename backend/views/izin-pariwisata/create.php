<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\IzinPariwisata */

$this->title = Yii::t('app', 'Create Izin Pariwisata');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Pariwisata'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-pariwisata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
