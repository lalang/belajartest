<?php
use backend\models\Perizinan;
//$this->title = $model->perizinan->no_izin;

//echo $model->dokumen;
echo Perizinan::getTemplateSK_tolak($model->perizinan->izin_id, $model->perizinan->referrer_id);
?>