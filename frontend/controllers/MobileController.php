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
	
	public function actionInfo() {
		$alert="Maaf username dan password yang Anda masukan tidak valid. Silakan dicoba kembali.";
		return $this->render('index',['alert'=>$alert]);
    }
	
}	
?>