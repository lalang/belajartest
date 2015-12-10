<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Brankas Pribadi');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Brankas Pribadi</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Tambah'), null, ['id'=>'upload_file','class' => 'btn btn-success']) ?>

            </p>
            <div class="search-form" style="display:none">
                <?=  $this->render('_search', ['model' => $searchModel]); ?>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($model as $value):
                            $file = explode(".", $value['filename']);
                            if($file[1] == 'png' || $file[1] == 'jpg' || $file[1] == 'jpeg'){
                                $file = '/uploads/'.$value['user_id'].'/'. $value['filename'];
                            }elseif($file[1] == 'pdf'){
                                $file = '/images/pdf-icon.png';
                            }

                    ?>
                        <tr>
                            <td><?= Html::a(Html::img(Yii::getAlias('@web').$file, ['width' => '70px']),  ['user-file/download?files='.$value['filename'].'&user_id='.$value['user_id']], [ 'alt'=>'some', 'class'=>'thing', 'height'=>'100px', 'width'=>'100px']); ?></td>
                            <td><?= $value['description'] ?></td>
                            <?php
                            $flagPakai = 0;
                            foreach ($flag as $flagValue) {
                                if($flagValue['id']==$value['id']){
                                    $flagPakai = 1;
                                    break;
                                }
                            }
                            ?>
                            <?php
                                if($flagPakai == 1){
                            ?>
                            <td>
                            </td>
                            <td>
                            </td>
                            <?php
                                } else {
                            ?>
                            <td>
                            
                            <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['user-file/update','id'=>$value['id']], [
                                    'data' => [
                                        'method' => 'post',
                                    ]
                                ]) ?></td>
                            <td><?= Html::a('<i class="glyphicon glyphicon-trash"></i>', ['user-file/delete','id'=>$value['id']], [
                                    'data' => [
                                        'confirm' => 'Apakah anda ingin menghapus data ini?',
                                        'method' => 'post',
                                    ]
                                ]) ?></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<?php
$js = <<< JS
    $('#upload_file').click(function(){
        $('#m_upload').html('');
        $('#m_upload').load('/user-file/create?id=index&ref=index');
        $('#m_upload').modal('show');
    });
JS;

$this->registerJs($js);

Modal::begin([
    'id' => 'm_upload',
    'header' => '<h7>Upload Berkas</h7>'
]);
Modal::end();
?>
