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
<div class="berita-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Berita').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'hidden' => true],
        'username',
        'judul',
        'judul_seo',
        'headline',
        'isi_berita:ntext',
        'gambar',
        'publish',
        'hari',
        'tanggal',
        'jam',
        'dibaca',
        'tag',
        'judul_en',
        'isi_berita_en:ntext',
        'meta_title',
        'meta_description:ntext',
        'meta_keyword',
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