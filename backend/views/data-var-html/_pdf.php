<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\DataVarHtml */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Data Var Html'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="data-var-html-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Data Var Html').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'var:ntext',
        'ket',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>