<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Jabatan */

$this->title = Yii::t('app', 'Create Jabatan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jabatan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jabatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
