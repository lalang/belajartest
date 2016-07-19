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
        echo print_r($_POST['from_date']);
        $jenisizin = print_r(Yii::$app->request->post('jenisizin'));
        $from_date = Yii::$app->request->post('from_date');
        echo 'jenisizin='.$jenisizin;
        echo '<br>';
        echo 'from_date='.$from_date; //.print_r(Yii::$app->request->post('w0'));
    }
}
