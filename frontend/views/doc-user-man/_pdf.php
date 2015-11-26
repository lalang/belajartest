<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\DocUserMan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Doc User Man', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-user-man-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Doc User Man'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'id_access',
        'nama',
        'docs:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>