<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class MobileController extends Controller {

    public $layout = 'mobile';
	
	public function actionIndex() {
		return $this->render('index');
    }
}	
?>