<?php

namespace backend\controllers;

use dektrium\user\Finder;
use dektrium\user\models\Profile;
use dektrium\user\models\User;
use dektrium\user\models\UserSearch;
use dektrium\user\Module;
use Yii;
use yii\base\ExitException;
use yii\base\Model;
use yii\base\Module as Module2;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\Json;

/**
 * PerizinanController implements the CRUD actions for Perizinan model.
 */
class RegistrasiController extends Controller {
//    public $layout = 'lay-admin';

    /** @var Finder */
    protected $finder;

//    public $layout = 'lay-admin';

    /**
     * @param string  $id
     * @param Module2 $module
     * @param Finder  $finder
     * @param array   $config
     */
    public function __construct($id, $module, Finder $finder, $config = []) {
        $this->finder = $finder;
        parent::__construct($id, $module, $config);
    }

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'confirm' => ['post'],
                    'block' => ['post'],
                ],
            ],
        ];
    }

    public function actionIndex() {
        Url::remember('', 'actions-redirect');
        $searchModel = Yii::createObject(UserSearch::className());
        $dataProvider = $searchModel->searchPemohonRegis(Yii::$app->request->get());

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'searchModel' => $searchModel,
        ]);
    }

    public function actionCreateValidasi() {
        /** @var User $user */
        $statVal = 0;
        $user = Yii::createObject([
                    'class' => User::className(),
                    'scenario' => 'create',
        ]);

        $this->performAjaxValidation($user);

        $profile = Yii::createObject(Profile::className());
        $profile->jenkel = 'L';

        if ($profile->load(Yii::$app->request->post())) {
            if ($user->load(Yii::$app->request->post())) {
                if ($profile->tipe == 'Perusahaan') {
                    $service = \common\components\Service::getNpwpInfo($user->username);
                    if ($service['response'] == FALSE) {
                        Yii::$app->getSession()->setFlash('warning', [
                            'type' => 'warning',
                            'duration' => 9000,
                            'icon' => 'fa fa-users',
                            'message' => 'Maaf Koneksi ke DJP Sedang Ada Gangguan',
                            'title' => 'Validasi',
                            'positonY' => 'top',
                            'positonX' => 'center'
                        ]);
                        $user->status = 'Koneksi Error';

                        $session = Yii::$app->session;
                        $session->set('tipe', $profile->tipe);
                        $session->set('username', $user->username);
                        $session->set('no_kk', $profile->no_kk);
                        $session->set('email', $user->email);
                        $session->set('password', $user->password);
                        $session->set('name', $profile->name);
                        $session->set('telepon', $profile->telepon);
                        $session->set('status', $user->status);

                        return $this->redirect('create', [
                                    'user' => $user,
                                    'profile' => $profile,
                        ]);
                    } elseif ($service == null) {
                        Yii::$app->getSession()->setFlash('warning', [
                            'type' => 'warning',
                            'duration' => 9000,
                            'icon' => 'fa fa-users',
                            'message' => 'NPWP tidak terdaftar di DJP',
                            'title' => 'Validasi',
                            'positonY' => 'top',
                            'positonX' => 'center'
                        ]);
                        $user->status = 'NPWP Salah';

                        $session = Yii::$app->session;
                        $session->set('tipe', $profile->tipe);
                        $session->set('username', $user->username);
                        $session->set('no_kk', $profile->no_kk);
                        $session->set('email', $user->email);
                        $session->set('password', $user->password);
                        $session->set('name', $profile->name);
                        $session->set('telepon', $profile->telepon);
                        $session->set('status', $user->status);

                        return $this->redirect('create', [
                                    'user' => $user,
                                    'profile' => $profile,
                        ]);
                    } else {
                        if ($service["jnis_wp"] == "BADAN") {

                            $user->status = "NPWP Badan";
                            $profile->name = $service['nama'];
                            $profile->alamat = $service['alamat'];

                            $user->create();


                            Profile::updateAll([
                                'tipe' => $profile->tipe,
                                'no_kk' => $profile->no_kk,
                                'name' => $profile->name,
                                'telepon' => $profile->telepon,
                                'alamat' => $profile->alamat,
                                'tempat_lahir' => $profile->tempat_lahir,
                                'tgl_lahir' => $profile->tgl_lahir,
                                'jenkel' => $profile->jenkel
                                    ], ['user_id' => $user->id]);

                            \backend\models\User::updateAll(['created_by' => Yii::$app->user->identity->id], ['id' => $user->id]);

//                        Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Validasi berhasil User telah dibuat'));
                            Yii::$app->getSession()->setFlash('success', [
                                'type' => 'success',
                                'duration' => 9000,
                                'icon' => 'fa fa-users',
                                'message' => 'Validasi berhasil User telah tersimpan',
                                'title' => 'Validasi',
                                'positonY' => 'top',
                                'positonX' => 'center'
                            ]);
                            
                            $session = Yii::$app->session;
                            $session->set('tipe', NULL);
                            $session->set('username', NULL);
                            $session->set('no_kk', NULL);
                            $session->set('email', NULL);
                            $session->set('password', NULL);
                            $session->set('name', NULL);
                            $session->set('telepon', NULL);
                            $session->set('status', NULL);

                            return $this->redirect(['update', 'id' => $user->id]);
                        } else {
                            Yii::$app->getSession()->setFlash('danger', [
                                'type' => 'danger',
                                'duration' => 9000,
                                'icon' => 'fa fa-users',
                                'message' => 'Hanya Untuk NPWP Badan Usaha',
                                'title' => 'Validasi',
                                'positonY' => 'top',
                                'positonX' => 'center'
                            ]);
                            return $this->refresh();
                        }
                    }
                } else {
                    $service = \common\components\Service::getPendudukInfo($user->username, $profile->no_kk);
                    if ($service['message'] == 'fault') {
//                        Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Maaf Koneksi ke Disdukcapil Sedang Ada Gangguan'));
                        Yii::$app->getSession()->setFlash('warning', [
                            'type' => 'warning',
                            'duration' => 9000,
                            'icon' => 'fa fa-users',
                            'message' => 'Maaf Koneksi ke Disdukcapil Sedang Ada Gangguan',
                            'title' => 'Validasi',
                            'positonY' => 'top',
                            'positonX' => 'center'
                        ]);
                        $user->status = 'Koneksi Error';

                        $session = Yii::$app->session;
                        $session->set('tipe', $profile->tipe);
                        $session->set('username', $user->username);
                        $session->set('no_kk', $profile->no_kk);
                        $session->set('email', $user->email);
                        $session->set('password', $user->password);
                        $session->set('name', $profile->name);
                        $session->set('telepon', $profile->telepon);
                        $session->set('status', $user->status);

                        return $this->redirect('create', [
                                    'user' => $user,
                                    'profile' => $profile,
                        ]);
                    }
                    if ($service == NULL) {
//                        Yii::$app->getSession()->setFlash('warning', Yii::t('user', 'NIK dan KK tidak terdaftar di Disdukcapil'));
                        Yii::$app->getSession()->setFlash('warning', [
                            'type' => 'warning',
                            'duration' => 9000,
                            'icon' => 'fa fa-users',
                            'message' => 'NIK dan KK tidak terdaftar di Disdukcapil',
                            'title' => 'Validasi',
                            'positonY' => 'top',
                            'positonX' => 'center'
                        ]);

                        $user->status = 'Bukan DKI';

                        $session = Yii::$app->session;
                        $session->set('tipe', $profile->tipe);
                        $session->set('username', $user->username);
                        $session->set('no_kk', $profile->no_kk);
                        $session->set('email', $user->email);
                        $session->set('password', $user->password);
                        $session->set('name', $profile->name);
                        $session->set('telepon', $profile->telepon);
                        $session->set('status', $user->status);

                        return $this->redirect('create', [
                                    'user' => $user,
                                    'profile' => $profile,
                        ]);
                    } else {
                        $user->status = "DKI";
                        $profile->name = $service['nama'];
                        $profile->alamat = $service['alamat'];
                        $profile->tempat_lahir = $service['tmp_lahir'];
                        $profile->tgl_lahir = $service['tgl_lahir'];
                        $profile->jenkel = $service['jk'];

                        $user->create();


                        Profile::updateAll([
                            'tipe' => $profile->tipe,
                            'no_kk' => $profile->no_kk,
                            'name' => $profile->name,
                            'telepon' => $profile->telepon,
                            'alamat' => $profile->alamat,
                            'tempat_lahir' => $profile->tempat_lahir,
                            'tgl_lahir' => $profile->tgl_lahir,
                            'jenkel' => $profile->jenkel
                                ], ['user_id' => $user->id]);

                        \backend\models\User::updateAll(['created_by' => Yii::$app->user->identity->id], ['id' => $user->id]);

//                        Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Validasi berhasil User telah dibuat'));
                        Yii::$app->getSession()->setFlash('success', [
                            'type' => 'success',
                            'duration' => 9000,
                            'icon' => 'fa fa-users',
                            'message' => 'Validasi berhasil User telah tersimpan',
                            'title' => 'Validasi',
                            'positonY' => 'top',
                            'positonX' => 'center'
                        ]);
                        
                        $session = Yii::$app->session;
                        $session->set('tipe', NULL);
                        $session->set('username', NULL);
                        $session->set('no_kk', NULL);
                        $session->set('email', NULL);
                        $session->set('password', NULL);
                        $session->set('name', NULL);
                        $session->set('telepon', NULL);
                        $session->set('status', NULL);

                        return $this->redirect(['update', 'id' => $user->id]);
                    }
                }
            }
        }



        return $this->render('create-validasi', [
                    'user' => $user,
                    'profile' => $profile,
        ]);
    }

    public function actionCreate() {
        /** @var User $user */
        $user = Yii::createObject([
                    'class' => User::className(),
                    'scenario' => 'create',
        ]);

        $this->performAjaxValidation($user);

        $profile = Yii::createObject(Profile::className());
        $profile->jenkel = 'L';

        if ($_SESSION['tipe']) {
            $profile->tipe = $_SESSION['tipe'];
            $user->username = $_SESSION['username'];
            $profile->no_kk = $_SESSION['no_kk'];
            $user->email = $_SESSION['email'];
            $user->password = $_SESSION['password'];
            $profile->name = $_SESSION['name'];
            $profile->telepon = $_SESSION['telepon'];
            $user->status = $_SESSION['status'];
        }

        if ($profile->load(Yii::$app->request->post())) {
            if ($user->load(Yii::$app->request->post())) {
                
                $user->create();
                Yii::$app->getSession()->setFlash('success', [
                            'type' => 'success',
                            'duration' => 9000,
                            'icon' => 'fa fa-users',
                            'message' => 'User telah berhasil dibuat',
                            'title' => 'Validasi',
                            'positonY' => 'top',
                            'positonX' => 'right'
                        ]);
                
                Profile::updateAll([
                    'tipe' => $profile->tipe,
                    'no_kk' => $profile->no_kk,
                    'name' => $profile->name,
                    'telepon' => $profile->telepon,
                    'alamat' => $profile->alamat,
                    'tempat_lahir' => $profile->tempat_lahir,
                    'tgl_lahir' => $profile->tgl_lahir,
                    'jenkel' => $profile->jenkel
                        ], ['user_id' => $user->id]);

                \backend\models\User::updateAll(['created_by' => Yii::$app->user->identity->id], ['id' => $user->id]);
                
                $session = Yii::$app->session;
                $session->set('tipe', NULL);
                $session->set('username', NULL);
                $session->set('no_kk', NULL);
                $session->set('email', NULL);
                $session->set('password', NULL);
                $session->set('name', NULL);
                $session->set('telepon', NULL);
                $session->set('status', NULL);

                return $this->redirect(['update', 'id' => $user->id]);
            }
        }



        return $this->render('create', [
                    'user' => $user,
                    'profile' => $profile,
        ]);
    }

    /**
     * Performs AJAX validation.
     *
     * @param array|Model $model
     *
     * @throws ExitException
     */
    protected function performAjaxValidation($model) {
        if (Yii::$app->request->isAjax && !Yii::$app->request->isPjax) {
            if ($model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                echo json_encode(ActiveForm::validate($model));
                Yii::$app->end();
            }
        }
    }

    /**
     * Updates an existing User model.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdate($id) {
        Url::remember('', 'actions-redirect');
        $user = $this->findModel($id);
        $user->scenario = 'update';
        $profile = $user->profile;

        $this->performAjaxValidation($user);
        $this->performAjaxValidation($profile);

        if ($profile->load(Yii::$app->request->post())) {
            if ($user->load(Yii::$app->request->post())) {
                if ($profile->tipe == 'Perusahaan') {
                    $user->status = 'NPWP Badan';
                } else {
                    $user->status = 'Bukan DKI';
                }
                $user->save();
                Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Account details have been updated'));

                Profile::updateAll([
                    'tipe' => $profile->tipe,
                    'no_kk' => $profile->no_kk,
                    'name' => $profile->name,
                    'telepon' => $profile->telepon,
                    'alamat' => $profile->alamat,
                    'tempat_lahir' => $profile->tempat_lahir,
                    'tgl_lahir' => $profile->tgl_lahir,
                    'jenkel' => $profile->jenkel
                        ], ['user_id' => $id]);

                return $this->refresh();
            }
        }

        return $this->render('_account', [
                    'user' => $user,
                    'profile' => $profile,
        ]);
    }

    /**
     * Updates an existing profile.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionUpdateProfile($id) {
        Url::remember('', 'actions-redirect');
        $user = $this->findModel($id);
        $profile = $user->profile;
        $profile->jenkel = 'L';
        if ($profile == null) {
            $profile = Yii::createObject(Profile::className());
            $profile->link('user', $user);
        }

        $this->performAjaxValidation($profile);

        if ($profile->load(Yii::$app->request->post()) && $profile->save()) {
            Yii::$app->getSession()->setFlash('success', Yii::t('user', 'Profile details have been updated'));

            return $this->refresh();
        }

        return $this->render('_profile', [
                    'user' => $user,
                    'profile' => $profile,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id
     *
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        $user = $this->finder->findUserById($id);
        if ($user === null) {
            throw new NotFoundHttpException('The requested page does not exist');
        }

        return $user;
    }

    /**
     * Shows information about user.
     *
     * @param int $id
     *
     * @return string
     */
    public function actionInfo($id) {
        Url::remember('', 'actions-redirect');
        $user = $this->findModel($id);

        return $this->render('_info', [
                    'user' => $user,
        ]);
    }

    /**
     * Blocks the user.
     *
     * @param int $id
     *
     * @return Response
     */
    public function actionBlock($id) {
        if ($id == Yii::$app->user->getId()) {
            Yii::$app->getSession()->setFlash('danger', Yii::t('user', 'You can not block your own account'));
        } else {
            $user = $this->findModel($id);
            if ($user->getIsBlocked()) {
                $user->unblock();
                Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been unblocked'));
            } else {
                $user->block();
                Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been blocked'));
            }
        }

        return $this->redirect(Url::previous('actions-redirect'));
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function actionDelete($id) {
        if ($id == Yii::$app->user->getId()) {
            Yii::$app->getSession()->setFlash('danger', Yii::t('user', 'You can not remove your own account'));
        } else {
            $this->findModel($id)->delete();
            Yii::$app->getSession()->setFlash('success', Yii::t('user', 'User has been deleted'));
        }

        return $this->redirect(['index']);
    }

}
