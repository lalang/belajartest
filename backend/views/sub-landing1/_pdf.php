<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\SubLanding1 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sub Landing1', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-landing1-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Sub Landing1'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'no_urut',
        'nama',
        'nama_en',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>