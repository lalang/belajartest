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
<section id="page-content">

    <div class="body-content animated fadeIn">
    
        <div class="berita-view">

            <div class="col-md-12">
                <div class="col-sm-9">
                    <h2><?= Yii::t('app', 'Bahasa Indonesia') ?></h2>
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

            <div class="col-md-12">
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
            </div>


            <div class="col-md-12">
                <div class="col-sm-12">
                    <h2><?= Yii::t('app', 'Bahasa Inggris') ?></h2>
                </div>
            </div>

            <div class="col-md-12">
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
        </div>
        
    </div><!-- /.body-content -->
</section><!-- /#page-content -->

   