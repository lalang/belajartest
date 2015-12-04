<?php

use yii\helpers\Html;
use backend\models\IzinKbliSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinKbli */

$this->title = 'Create Izin Kbli';
$this->params['breadcrumbs'][] = ['label' => 'Izin Kbli', 'url' => ['index', 'id'=>$_SESSION['id_induk']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if($flag=="1"){?>
<div class="callout callout-success">
<h4>Info</h4>
<p>Create izin kbli sukses!</p>
</div>
<?php }elseif($flag=="2"){ ?>
<div class="callout callout-danger">
<h4>Info</h4>
<p>Create izin kbli gagal dikarenakan ada nama Kbli yang sama pada nama Izin yang sama!</p>
</div>
<?php } ?>
<div class="box" style="padding:10px 4px;">

    <?= $this->render('_form', [
        'model' => $model,
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
