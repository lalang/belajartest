<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\models\UserSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\web\View;
use yii\widgets\Pjax;

//use app\assets\admin\CoreAsset;
//
//CoreAsset::register($this);

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 * @var UserSearch $searchModel
 */
$this->title = Yii::t('user', 'Lacak Status Permohonan');
$this->params['breadcrumbs'][] = $this->title;
//$this->context->layout = 'lay-admin';
?>
<?php Pjax::begin() ?>

<?= $this->render('_searchEIS', ['model' => $searchModel, 'varLink'=>$varKey]
         ); //,['id'=>'cari','onclick'=>'getval(this)']?>

<?=

GridView::widget([
    'dataProvider' => $dataProvider,
//    'filterModel' => $searchModel,
    'layout' => "{items}\n{pager}",
    'columns' => [
        [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{lihat}',
                'header' => 'Kode Registrasi',
                'buttons' => [
                    'lihat' => function ($url, $model) {
                            return Html::a($model->kode_registrasi.'<br> <span class="label label-danger">Lihat</span>', ['lihat', 'id' => $model->id], [
                                        'data-toggle' => "modal",
                                        'data-target' => "#lihat-data",
                                        'data-title' => "Data Pemohon",
                                        'title' => Yii::t('yii', 'Lihat Data'),
                            ]);
                        },
            ],
          ],
        [
                'attribute' => 'pemohon.id',
                'label' => Yii::t('app', 'Pemohon'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return "<strong>{$model->pemohon->profile->name}</strong><br>NIK: {$model->pemohon->username}";
                },
            ],
       [
                'attribute' => 'izin.id',
                'label' => Yii::t('app', 'Perihal'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return "{$model->izin->nama} {$model->status->nama} <br>Bidang: {$model->izin->bidang->nama}";
                },
            ],
        [
                'attribute' => 'tanggal_mohon',
                'format'=>['DateTime','php:d-m-Y H:i:s']
            ],
                [
                'attribute' => 'eta',
                'label' => Yii::t('app', 'ETA'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return Yii::$app->formatter->asDate($model->pengambilan_tanggal, 'php: l, d F Y') . '<br><strong>' . $model->pengambilan_sesi . '</strong>';
                },
            ],
            [
                'attribute' => 'lokasi_pengambilan_id',
                'label' => Yii::t('app', 'Lokasi Pengambilan'),
                'format' => 'html',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->lokasiPengambilan->nama;
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{status}',
                'header' => 'Status',
                'buttons' => [
                     'status' => function ($url, $model) {
                            return Html::a($model->status.'<br> <span class="label label-danger">Lihat</span>', ['status', 'id' => $model->id], [
                                        'data-toggle' => "modal",
                                        'data-target' => "#modal-status",
                                        'data-title' => "Status Pemrosesan Izin",
                                        'title' => Yii::t('yii', 'Status Pemrosesan'),
                            ]);
                    },
            ],
          ],

                            ],
                        ]);
                        ?>



                        <?php Pjax::end() ?>