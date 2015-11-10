<?php
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}

use backend\models\Params;
use backend\models\Kantor;
?>

<?= $model->tanda_register; ?>