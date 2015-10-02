<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserFile */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User File'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-file-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'User File').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
                        
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php
    $file = explode(".", $model->filename);
    if($file[1] == 'png' || $file[1] == 'jpg' || $file[1] == 'jpeg'){
        $file = '/uploads/'. $model->filename;
    }elseif($file[1] == 'pdf'){
        $file = '/images/pdf-icon.png';
    }
    echo  Html::img(Yii::getAlias('@web').$file,
        ['width' => '500px']);

?>
    </div>


</div>