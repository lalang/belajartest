<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Page */

$this->title = Yii::t('app', 'View {modelClass}: ', [
    'modelClass' => 'Page',
]) . ' ' . $model->judul;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Page'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="box" style="padding:10px 4px;">

    <div class="row">
        <div class="col-sm-9">
			<?= Html::a(Yii::t('app', '<i class="fa fa-angle-double-left"></i> Kembali'), ['/page/index'], ['class' => 'btn btn-warning']) ?>
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

    <div class="row">
		<div class="col-md-12">
<?php 
    $gridColumn = [
       // ['attribute' => 'id', 'hidden' => true],
		[
			'attribute' => 'gambar',
			'format' => 'html', 
			'value' => Html::img(Yii::getAlias('@web').'/images/pages/'.$model->gambar,
			['width' => '300px'])
		 ],
        'judul',
        'judul_seo',
        'judul_en',
        'judul_seo_en',
        'description:Html',
        'description_en:Html',
        'tanggal',
        'urutan',
        'landing',
        'publish',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
		</div>
    </div>
</div>
<script>
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}
</script>