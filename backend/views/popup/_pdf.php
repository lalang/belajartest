<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Popup */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Popup', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="popup-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Popup'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'image',
        'url:url',
        'urutan',
        'publish',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>