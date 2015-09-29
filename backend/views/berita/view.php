<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Berita */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Berita'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box"  style="padding:10px 4px;">
    <div class="col-md-12">
                <div class="col-sm-9">
                    <h2><?= Yii::t('app', 'Bahasa Indonesia') ?></h2>
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

           
                <?php 
                    $gridColumn = [
                        ['attribute' => 'id', 'hidden' => true],
                        [
                            'attribute' => 'gambar',
                            'format' => 'html', 
                            'value' => Html::img(Yii::getAlias('@web').'/images/news/'.$model->gambar,
                            ['width' => '200px'])
                         ],

                        'username',
                        'judul',
                        'headline',
                        'isi_berita:Html',                        
                        'publish',
                        'hari',
                        'tanggal',
                        'jam',
                        'dibaca',
                        'tag',
                        'meta_title',
                        'meta_description:ntext',
                        'meta_keyword',
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]); 
                ?>
            


            <div class="col-md-12">
                <div class="col-sm-12">
                    <h2><?= Yii::t('app', 'Bahasa Inggris') ?></h2>
                </div>
            </div>

          
                <?php 
                    $gridColumn = [
                        ['attribute' => 'judul_en', 'label' => 'Judul'],
                        ['attribute' => 'isi_berita_en', 'string'=>'Html', 'label' => 'Isi Berita'],
                        ['attribute' => 'meta_title_en', 'label' => 'Meta Title'],
                        ['attribute' => 'meta_description_en', 'string'=>'Html', 'label' => 'Meta Description'],
                        ['attribute' => 'meta_keyword_en', 'label' => 'Meta Keyword'],
                    ];
                    echo DetailView::widget([
                        'model' => $model,
                        'attributes' => $gridColumn
                    ]); 
                ?>
            
        </div>
        

   