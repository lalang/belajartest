<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\SubLanding2 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sub Landing2', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-landing2-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sub Landing2'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'icon',
        'info:ntext',
        'info_en:ntext',
        'urutan',
        'link',
        'link_en',
        'target',
        'publish',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>