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
$this->title = Yii::t('user', 'Manage Pemohon');
$this->params['breadcrumbs'][] = $this->title;
//$this->context->layout = 'lay-admin';
?>

<?=

$this->render('/_alert', [
    'module' => Yii::$app->getModule('user'),
])
?>
<?= Html::a(Yii::t('app', 'Create User'), ['create-validasi'], ['class' => 'btn btn-success']) ?>

<?php // $this->render('/admin/_menu') ?>

<?php Pjax::begin() ?>


<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layout' => "{items}\n{pager}",
    'columns' => [
        'username',
        [
            'attribute' => 'profile_nama',
            'header' => 'Nama',
            'value' => 'profile.name',
        ],
        'email:email',
        [
            'attribute' => 'profile_tipe',
            'header' => 'Tipe',
            'value' => 'profile.tipe',
        ],
        
        [
            'header' => Yii::t('user', 'Daftar Perizinan'),
            'value' => function ($model) {
                    
                    return Html::a(Yii::t('user', 'Daftar'), ['/perizinan/search', 'id' => $model->id], [
                                'class' => 'btn btn-xs btn-success btn-block',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('user', 'Are you sure you want to confirm this user?'),
                    ]);
            },
            'format' => 'raw',
            'visible' => Yii::$app->getModule('user')->enableConfirmation,
        ],
        [
            'header' => Yii::t('user', 'Block status'),
            'value' => function ($model) {
                if ($model->isBlocked) {
                    return Html::a(Yii::t('user', 'Unblock'), ['block', 'id' => $model->id], [
                                'class' => 'btn btn-xs btn-success btn-block',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('user', 'Are you sure you want to unblock this user?'),
                    ]);
                } else {
                    return Html::a(Yii::t('user', 'Block'), ['block', 'id' => $model->id], [
                                'class' => 'btn btn-xs btn-danger btn-block',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('user', 'Are you sure you want to block this user?'),
                    ]);
                }
            },
            'format' => 'raw',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
        ],
    ],
]);
?>

<?php Pjax::end() ?>