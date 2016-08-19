<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\IzinSearch;
use frontend\models\BidangSearch;
use \yii\db\Query;
use frontend\models\Berita;
use yii\data\Pagination;
use backend\models\SliderSearch;
use backend\models\PageSearch;
use backend\models\Faq;
use backend\models\FaqSearch;
use backend\models\MenuKatalog;
use backend\models\MenuKatalogSearch;
use backend\models\KantorSearch;
use frontend\models\AllSearch;
use frontend\models\PerizinanSearch;
use frontend\models\DetailPerizinanSearch;
use backend\models\Perizinan;
use backend\models\Izin;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SubLanding1Search;
use backend\models\SubLanding2Search;
use backend\models\SubLanding3Search;
use backend\models\TitleSubLandingSearch;
use backend\models\RegulasiSearch;
use backend\models\Download;
use backend\models\PublikasiSearch;
use backend\models\DownloadPublikasi;
use backend\models\PopupSearch;
use yii\web\Session;

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