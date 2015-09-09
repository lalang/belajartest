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
<section id="page-content">
    <!-- Start page header -->
    <div class="header-content">
        <h2><i class="fa fa-list"></i> Page Statis</h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?= Yii::$app->getUrlManager()->createUrl('page/index') ?>">Data Page Statis</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">View</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
    </div><!-- /.header-content -->
    <!--/ End page header -->
    <div class="body-content animated fadeIn">
        <div class="page-view">

            <div class="row">
                <div class="col-sm-9">
                    <h2><?= Yii::t('app', 'Bahasa Indonesia:').' '. Html::encode($model->page_title) ?></h2>
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

            <div class="row">
                <div class="col-sm-12">
                    <h2><?= Yii::t('app', 'Bahasa Inggris: ').' '. Html::encode($model->page_title_en) ?></h2>
                </div>
            </div>

            <div class="row">
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
<?php echo $this->render('/shares/_footer_admin'); ?>       