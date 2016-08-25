<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\PerizinanSearch;
use backend\models\Perizinan;
/**
 * Site controller
 */
class MobileBackendController extends Controller {

    public $layout = 'mobile-backend';
	
	function asset_sidebar(){
		$active['dashboard']=null;
		$active['pencabutan']=null;
		$active['perpanjangan']=null;
		
		return $active;
	}
	
	public function actionIndex(){
		$active = $this->asset_sidebar();
		$active['dashboard']='active';
		return $this->render('index',['active' => $active]);
    }
	
/*	public function actionPencabutan(){
		$active = $this->asset_sidebar();
		$active['pencabutan']='active';
		return $this->render('pencabutan',['active' => $active]);
    }
	*/
/*	public function actionPerpanjangan(){
		$active = $this->asset_sidebar();
		$active['perpanjangan']='active';
		return $this->render('perpanjangan',['active' => $active]);
    }
	*/
	public function actionPencabutan() {
		$active = $this->asset_sidebar();
		$active['pencabutan']='active';
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->searchPerizinanPencabutan(Yii::$app->request->queryParams, Yii::$app->user->id);

        return $this->render('pencabutan', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar' => 'expired',
					'active' => $active
        ]);
    }
	
	public function actionPerpanjangan() {
		$active = $this->asset_sidebar();
		$active['perpanjangan']='active';
		
        $searchModel = new PerizinanSearch();
        $dataProvider = $searchModel->searchPerizinanNonAktif(Yii::$app->request->queryParams, Yii::$app->user->id);

        return $this->render('perizinan/index-expired', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'keyVar' => 'expired',
					'active' => $active,
        ]);
    }
	
}	
?>