<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TujuanWisata */

$this->title = Yii::t('app', 'Create Tujuan Wisata');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tujuan Wisata'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tujuan-wisata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
