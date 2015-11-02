<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kontak */

$this->title = Yii::t('app', 'View {modelClass}', [
    'modelClass' => 'Kontak',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Kontak'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-10">

        </div>
        <div class="col-sm-2" style="margin-top: 15px">
                        
            <?= Html::a(Yii::t('app', 'Update <i class="fa fa-edit"></i>'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <div class="row">
		<div class="col-md-12">
			<?php 
				$gridColumn = [
					'judul',
					'judul_en',
					'info_main:ntext',
					'info_main_en:ntext',
					'info_sub:ntext',
					'info_sub_en:ntext',
					'alamat:ntext',
					'alamat_en:ntext',
					'tlp',
					'email:email',
					'facebook',
					'twitter',
				];
				echo DetailView::widget([
					'model' => $model,
					'attributes' => $gridColumn
				]); 
			?>
		</div>	
    </div>
</div>