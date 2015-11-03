<?php

namespace backend\controllers;

use Yii;
use backend\models\Popup;
use backend\models\PopupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PopupController implements the CRUD actions for Popup model.
 */
class PopupController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Popup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PopupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Popup model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Popup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Popup();

        if ($model->loadAll(Yii::$app->request->post())) {
		
            $imageName = $this->random();
            $model->file = UploadedFile::getInstance($model, 'file');
			$model->file->saveAs('images/popup/'.$imageName.'.'.$model->file->extension);
			
			//save path
            $model->image= $imageName.'.'.$model->file->extension;
            $model->saveAll();
		
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function random(){
	  $the_char = array(
     "A","B","C","D","E","F","G","H","I","J",
     "K","L","M","N","O","P","Q","R","S","T",
     "U","V","W","X","Y","Z","1","2","3","4","5","6","7","8",
     "9","0"
	  );
	  $max_elements = count($the_char) - 1;
	  srand((double)microtime()*1000000);
	  $c1 = $the_char[rand(0,$max_elements)];
	  $c2 = $the_char[rand(0,$max_elements)];
	  $c3 = $the_char[rand(0,$max_elements)];
	  $c4 = $the_char[rand(0,$max_elements)];
	  $c5 = $the_char[rand(0,$max_elements)];
	  $c6 = $the_char[rand(0,$max_elements)];
	  $c7 = $the_char[rand(0,$max_elements)];
	  $c8 = $the_char[rand(0,$max_elements)];
	  $c9 = $the_char[rand(0,$max_elements)];
	  $c10 = $the_char[rand(0,$max_elements)];
	  $ranc = "$c1$c2$c3$c4$c5$c6$c7$c8$c9$c10";
	  return $ranc;
	}

    /**
     * Updates an existing Popup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
		
			$cek_image = UploadedFile::getInstance($model, 'file');
            if($cek_image){

                if($model->image){unlink('images/popup/'.$model->image);}
				$imageName = $this->random();
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs('images/popup/'.$imageName.'.'.$model->file->extension);

                //save path
                $model->image= $imageName.'.'.$model->file->extension;

            }

            $model->saveAll();
		
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Popup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {	
		$model = $this->findModel($id);
		if($model->image){
			unlink('images/popup/'.$model->image);
		}
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * Finds the Popup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Popup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Popup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
