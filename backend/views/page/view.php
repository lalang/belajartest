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
<div class="col-md-12">
    <div class="col-md-12">
        <div class="box">
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="box-header with-border">
              <h3 class="box-title">Detail permohonan</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-sm-9">
                    <h2><?= Yii::t('app', 'Bahasa Indonesia:').' '. Html::encode($model->page_title) ?></h2>
                </div>
                <div class="col-sm-3" style="margin-top: 15px">               
                    <?= Html::a(Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a(Yii::t('app', 'Delete <i class="fa fa-trash"></i>'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ])
                    ?>
                </div>
            </div>

            <div class="col-md-12">
        <?php 
            $gridColumn = [
                [
                    'attribute' => 'page_image',
                    'format' => 'html', 
                    'value' => Html::img(Yii::getAlias('@web').'/images/pages/'.$model->page_image,
                    ['width' => '200px'])
                 ],
                'page_title',
                'page_description:Html',
                'page_date',
                'meta_title',
                'meta_description:ntext',
                'meta_keyword',
                'page_urutan',
            ];
            echo DetailView::widget([
                'model' => $model,
                'attributes' => $gridColumn
            ]); 
        ?>
            </div>
        </div>
        
        
        
        <div class="page-view">

            <div class="col-md-12">
                <div class="col-sm-12">
                    <h2><?= Yii::t('app', 'Bahasa Inggris: ').' '. Html::encode($model->page_title_en) ?></h2>
                </div>
            </div>

            <div class="col-md-12">
        <?php 
            $gridColumn = [
                'page_title_en',
                'page_description_en:Html',
                'meta_title_en',
                'meta_description_en:ntext',
                'meta_keyword_en',
            ];
            echo DetailView::widget([
                'model' => $model,
                'attributes' => $gridColumn
            ]); 
        ?>
            </div>
        </div>
        
        
        
        
    </div><!-- /.body-content -->
</section><!-- /#page-content -->
       