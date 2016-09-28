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
use yii\helpers\Url;

//use app\assets\admin\CoreAsset;
//
//CoreAsset::register($this);

/**
 * @var View $this
 * @var ActiveDataProvider $dataProvider
 * @var UserSearch $searchModel
 */
$this->title = Yii::t('user', 'Create Kantor Cabang');
$this->params['breadcrumbs'][] = $this->title;
//$this->context->layout = 'lay-admin';
?>

<?=

$this->render('/_alert', [
    'module' => Yii::$app->getModule('user'),
])
?>

<?php Pjax::begin() ?>

<?= $this->render('_searchPemohon', ['model' => $searchModel, 'varLink' => $varKey]
); //,['id'=>'cari','onclick'=>'getval(this)']
?>

<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'layout' => "{items}\n{pager}",
    'columns' => [
        'username',
        [
            'attribute' => 'profile_nama',
            'header' => 'Nama',
            'value' => 'profile.name',
        ],
        'email:email',
        'status',
        [
            'attribute' => 'profile_tipe',
            'header' => 'Tipe',
            'value' => 'profile.tipe',
        ],
        [
            'header' => Yii::t('user', 'Confirmation'),
            'value' => function ($model) {
                if ($model->isConfirmed) {
                    return '<div class="text-center bg-success"><span class="text-success">' . Yii::t('user', 'Confirmed') . '</span></div>';
                } else {
                    return '<div class="text-center bg-danger"><span class="text-danger">' . Yii::t('user', 'Unconfirmed') . '</span></div>';
                }
            },
            'format' => 'raw',
            'visible' => Yii::$app->getModule('user')->enableConfirmation,
        ],
        [
            'header' => Yii::t('user', 'Block status'),
            'value' => function ($model) {
                if ($model->isBlocked) {
                    return '<div class="text-center bg-danger"><span class="text-danger">' . Yii::t('user', 'Blocked') . '</span></div>';
                } else {
                    return '<div class="text-center bg-success"><span class="text-success">' . Yii::t('user', 'Active') . '</span></div>';
                }
            },
            'format' => 'raw',
        ],
        [
            'header' => Yii::t('user', 'Register Kantor Cabang'),
            'value' => function ($model) {
                if ($model->status == 'Kantor Cabang') {
                    return '<div class="text-center bg-warning"><span class="text-warning">' . Yii::t('user', 'Bukan User Induk/Pusat') . '</span></div>';
                } else {
                    return Html::a(Yii::t('user', 'Daftar'), ['create-cabang', 'id' => $model->id], [
                                'class' => 'btn btn-xs btn-success btn-block',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('user', 'Anda yakin untuk mendaftarkan kantor cabang pada akun ini?'),
                    ]);
                }
            },
            'format' => 'raw',
            'visible' => Yii::$app->getModule('user')->enableConfirmation,
        ],
    ],
]);
?>

<?php Pjax::end() ?>