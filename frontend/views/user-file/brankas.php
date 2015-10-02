<?php
/**
 * Created by PhpStorm.
 * User: rio
 * Date: 02/10/15
 * Time: 9:55
 */


    foreach($model as $key => $value){

?>
<div class="col-lg-3 col-md-4 col-xs-6 thumb">
    <div class="thumbnail">
        <?= \yii\helpers\Html::img('@web/uploads/'.$value->filename, ['class' => 'img-responsive']); ?>
    </div>
</div>
<?php } ?>