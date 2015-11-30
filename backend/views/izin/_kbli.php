<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\KbliIzinSearch;

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izins'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box" style="padding:10px 4px;">
	<div class="row">
		<div class="col-sm-12">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/izin/index'], ['class' => 'btn btn-warning']) ?>
		</div>
	
	</div>
	<div class="row" style="margin-top: 15px">
		<div class="col-md-12">
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				//'id',
				'jenis',
				['attribute' => 'bidang.nama', 'label' => 'Nama Bidang'],
                            ['attribute' => 'rumpun.nama', 'label' => 'Nama Rumpun'],
                            'tipe',
                            ['attribute' => 'status.nama', 'label' => 'Nama Status'],
				'nama',
			],
		]) ?>
		</div>
	</div>
</div>
<?php
$searchModel = new KbliIzinSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

?>
<?= $this->render('_formAddKbli', [
//	'model' => $model2,
	'searchModel' => $searchModel,
	'dataProvider' => $dataProvider,
])
?>
