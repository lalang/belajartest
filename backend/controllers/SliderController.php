<?php

namespace backend\controllers;

use Yii;
use backend\models\Slider;
use backend\models\SliderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
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
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slider model.
     * @param integer $id
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slider();

        if ($model->loadAll(Yii::$app->request->post())) {
			
			//$imageName = preg_replace('/[^a-z0-9-]+/', '-', strtolower($model->title));
			$imageName = $this->random();
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('images/slider/'.$imageName.'.'.$model->file->extension);
			
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

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
		
			$cek_image = UploadedFile::getInstance($model, 'file');
            if($cek_image){

                unlink('images/slider/'.$model->image);
				$imageName = $this->random();
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs('images/slider/'.$imageName.'.'.$model->file->extension);

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
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {	
		$model = $this->findModel($id);
		unlink('images/slider/'.$model->image);
		
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * for export pdf at actionView
     *  
     * @param type $id
     * @return type
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }
    
    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
