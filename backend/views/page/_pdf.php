<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Page */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Page'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Page').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'page_title',
        'page_title_en',
        'page_description:ntext',
        'page_description_en:ntext',
        'page_image',
        'page_date',
        'meta_title',
        'meta_title_en',
        'meta_description:ntext',
        'meta_description_en:ntext',
        'meta_keyword',
        'meta_keyword_en',
        'page_urutan',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>