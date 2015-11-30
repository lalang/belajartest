<?php

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DocUserManSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Document User Manual';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="doc-user-man-index">


<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>


    <div class="search-form" style="display:none">
<?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <?php

    
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        ['attribute' => 'id_access',
           'value' => 'id_access',
            'label'=>Yii::t('app', 'Title'),
        ],
        'nama',
        [
            'attribute' => 'File',
            'format' => 'raw',
            'value' => function ($model) {
                        if($model->aktivasi == 'Y'){
                         $path = $model->docs;
                         $ext = pathinfo($path, PATHINFO_EXTENSION); 
                          return Html::a(Yii::t('user', '<i class="fa fa-download"></i> Download'), ['/dokumen/'.strtolower($model->nama).'.'.$ext], 
                            [
                               'class' => 'btn btn-xs btn-primary',
                               'onclick'=>"window.open(this.href,'_blank');return false;",
                            ]
//                        return Html::a(
//                                        Yii::t('user', '<i class="fa fa-download"></i> Download'), 
//                                       
//                                        [Yii::$app->urlManager->createUrl('/dokumen/'. $model->nama .'.'.$ext)],
//                                        [ 'class' => 'btn btn-xs btn-primary',
//                                        'onclick'=>"window.open(this.href,'_blank');return false;",
//
//                                        ]
                        );}
           },
            ],
        ];
         
            ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumn,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i>  ' . Html::encode($this->title) . ' </h3>',
                ],
                // set a label for default menu
                'export' => [
                    'label' => 'Page',
                    'fontAwesome' => true,
                ],
                // your toolbar can include the additional full export menu
                'toolbar' => [
                    '{export}',
                    ExportMenu::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => $gridColumn,
                        'target' => ExportMenu::TARGET_BLANK,
                        'fontAwesome' => true,
                        'dropdownOptions' => [
                            'label' => 'Full',
                            'class' => 'btn btn-default',
                            'itemsBefore' => [
                                '<li class="dropdown-header">Export All Data</li>',
                            ],
                        ],
                    ]),
                ],
            ]);
            ?>

</div>
