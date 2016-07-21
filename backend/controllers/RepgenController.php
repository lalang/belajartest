<?php

namespace backend\controllers;

use Yii;
use backend\models;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class RepgenController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new models\Repgen();
        $dataProvider = $searchModel->getFields('siup');

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
 
    }

    public function actionApply()
    {
        $jenisizin = Yii::$app->request->post('jenisizin');
        $from_date = Yii::$app->request->post('from_date');
        $to_date = Yii::$app->request->post('to_date');
        echo 'jenisizin='.$jenisizin;
        echo '<br>';
        echo 'from_date='.$from_date;
        echo '<br>';
        echo 'to_date='.$to_date;
    }
}
