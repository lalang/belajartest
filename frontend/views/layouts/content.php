<?php

use dmstr\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\widgets\Breadcrumbs;
?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h2><?= $this->blocks['content-header'] ?></h2>
        <?php } else { ?>
            <h2>
                <?php
                if ($this->title !== null) {
                    echo $this->title;
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                            \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== Yii::$app->id) ? '<small>Module</small>' : '';
                }
                ?>
            </h2>
        <?php } ?>

        <?=
        Breadcrumbs::widget(
                [
                    'homeLink' => [
                        'label' => Html::encode(Yii::t('yii', 'Home')),
                        'url' => Yii::$app->homeUrl,
                        'template' => "<li><i class='fa fa-home'></i> {link}</li>\n"
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]
        )
        ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.1
    </div>
    <strong>Copyright &copy; 2016 <a href="bptsp.jakarta.go.id">BPTSP DKI Jakarta</a>.</strong> All rights
    reserved.
</footer>

