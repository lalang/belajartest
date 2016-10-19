<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use dektrium\user\models\User;
use yii\bootstrap\Nav;
use yii\web\View;
//use app\assets\admin\CoreAsset;
//
//CoreAsset::register($this);

/**
 * @var View 	$this
 * @var User 	$user
 * @var string 	$content
 */

$this->title = Yii::t('user', 'Update user account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('user', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//$this->context->layout = 'lay-admin';
?>

<?php // $this->render('/_alert', [
//    'module' => Yii::$app->getModule('user'),
//]) ?>

<?= $this->render('_menu-cabang') ?>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <?= Nav::widget([
                    'options' => [
                        'class' => 'nav-pills nav-stacked',
                    ],
                    'items' => [
                        ['label' => Yii::t('user', 'Account details'), 'url' => ['update-cabang', 'id' => $user->id]],
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>
