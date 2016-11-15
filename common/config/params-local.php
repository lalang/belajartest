<?php
$root='http://admin-ptsp.local';
$root2='http://portal-ptsp.local';
$digital=  realpath(dirname(__FILE__).'/../../').'/frontend/web';

Yii::setAlias('@test',$root);
Yii::setAlias('@front',$root2);
Yii::setAlias('@digital',$digital);

return [
];
