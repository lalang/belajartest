<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserFile */

$this->title = Yii::t('app', 'Create User File');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User File'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
