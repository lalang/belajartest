<?php

use yii\helpers\Html;
use backend\models\IzinKbliSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinKbli */

$this->title = Yii::t('app', 'Update {modelClass}', [
    'modelClass' => $judul,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Izin Kbli'), 'url' => ['index','id'=>$id_induk]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<?php if($flag=="3"){ ?>
<div class="callout callout-danger">
<h4>Info</h4>
<p>Update izin kbli gagal dikarenakan ada nama Kbli yang sama pada nama Izin yang sama!</p>
</div>
<?php } ?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,'old_kbli_id'=>$old_kbli_id,
    ]) ?>

</div>
	<?php
		$data = \backend\models\Izin::find()->where(['id'=>$_SESSION['id_induk']])->orderBy('id')->One();
		$searchModel = new IzinKbliSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams, $_SESSION['id_induk']);
	?>
	<?= $this->render('_list', [
		'model' => $model,
		'searchModel' => $searchModel,
		'dataProvider' => $dataProvider,
		'judul' => $data['nama'],
	]) ?>

