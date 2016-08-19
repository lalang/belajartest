<?php

namespace backend\controllers;

use Yii;
use backend\models\IzinPenelitian;
use backend\models\Perizinan;
use backend\models\PerizinanProses;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * IzinPenelitianController implements the CRUD actions for IzinPenelitian model.
 */
class IzinPenelitianController extends Controller {

    public function behaviors() {
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
     * Lists all IzinPenelitian models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => IzinPenelitian::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }
     public function actionDgs1($kode=false) {
         $model = Perizinan::findOne(['kode_registrasi'=>$kode]);
         $data = Perizinan::getDigital($model->izin_id, $model->referrer_id);
//         header('Content-Type: application/json');
//         echo "test cuy";
         $regex = "(\\\\[rntv]{1})";
//        $data= preg_replace('/\\\\\"/',"\"", json_encode($data));
        $data=  preg_replace($regex, '', json_encode($data));
         print_r(str_replace('\\','',json_encode($data)));
//        return $this->render('digital', [
//                    'data' => $data,
//        ]);
     }
    public function actionDgs($kode=false) {
//        $id = Yii::$app->getRequest()->getQueryParam('id');
//       die($id);
        $select='u.username, ip.instansi_penelitian, p.name, ip.nik, pr.kode_registrasi,'
                        . 'ip.nama, ip.alamat_pemohon, ip.rt, ip.rw, l.nama kelurahan_pemohon, '
                        . 'l1.nama kecamatan_pemohon, l2.nama kabupaten_pemohon, l3.nama provinsi_pemohon, '
                        . 'ip.pekerjaan_pemohon, ip.nama_instansi, ip.alamat_instansi, '
                        . 'li.nama kelurahan_instansi, li1.nama kecamatan_instansi, '
                        . 'li2.nama kabupaten_instansi, li3.nama provinsi_instansi, ip.alamat_instansi, '
                        . 'ip.tema, ip.instansi_penelitian, ip.alamat_penelitian, ip.bidang_penelitian, lp2.nama kab_penelitian,'
                        . 'ip.tgl_mulai_penelitian, ip.tgl_akhir_penelitian, pp.todo_date, pr.tanggal_izin, '
                        . 'u1.no_identitas, u1.nama_jabatan, p1.name nama_petugas, u1.username NRK, p3.name nama_plh, '
                        . 'pr.no_izin no_sk, ' 
                        . '('
                        . 'select lok_1.nama '
                        . 'from izin_penelitian_lokasi ipl_1 '
                        . 'left join lokasi lok_1 on ipl_1.kota_id = lok_1.id '
                        . 'where ipl_1.penelitian_id = ip.id '
                        . 'order by ipl_1.id '
                        . 'limit 1 offset 0 ) '
                        . 'kota_anak_1'
                ;

        $data = (new \yii\db\Query)
                
                ->select($select)
                ->from('izin_penelitian ip ')
                ->join('inner join', 'user u', 'u.id = ip.user_id')
                ->join('inner join', 'perizinan pr', 'pr.id = ip.perizinan_id')
                ->join('inner join', 'profile p', 'p.user_id = ip.user_id')
                
                ->join('left join', 'profile p3', 'p3.user_id = pr.plh_id')
                ->join('inner join', 'lokasi l', 'l.id = ip.kelurahan_pemohon')
                ->join('inner join', 'lokasi l1', 'l1.id = ip.kecamatan_pemohon')
                ->join('inner join', 'lokasi l2', 'l2.id = ip.kabupaten_pemohon')
                ->join('inner join', 'lokasi l3', 'l3.id = ip.provinsi_pemohon')
                ->join('inner join', 'perizinan_proses pp', 'pp.perizinan_id = ip.perizinan_id')
                ->join('inner join', 'profile p1', 'p1.user_id = pp.todo_by')
                ->join('inner join', 'user u1', 'u1.id = pp.todo_by')
                ->join('inner join', 'lokasi li', 'li.id = ip.kelurahan_instansi')
                ->join('inner join', 'lokasi li1', 'li1.id = ip.kecamatan_instansi')
                ->join('inner join', 'lokasi li2', 'li2.id = ip.kabupaten_instansi')
                ->join('inner join', 'lokasi li3', 'li3.id = ip.provinsi_instansi')
                ->join('left join', 'lokasi lp', 'lp.id = ip.kel_penelitian')
                ->join('left join', 'lokasi lp1', 'lp1.id = ip.kec_penelitian')
                ->join('left join', 'lokasi lp2', 'lp2.id = ip.kab_penelitian')
               
                ->where('pr.kode_registrasi="'.$kode.'"')->all();    
//                ->where('ip.perizinan_id='.$id)->all();
//        return $this->render('dgs', [
//                    'datadgs' => $data,
//        ]);
        //header(Yii::getAlias('@test').'/izin-penelitian/dgs');
        $asdf = array('tipe_izin' => 'izin_penelitian');
        $datax[] = array_merge($asdf,$data[0]);
        return json_encode($datax);
    }
    /**
     * Displays a single IzinPenelitian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $providerAnggotaPenelitian = new \yii\data\ArrayDataProvider([
            'allModels' => $model->anggotaPenelitians,
        ]);
        $providerIzinPenelitianLokasi = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPenelitianLokasis,
        ]);
        $providerIzinPenelitianMetode = new \yii\data\ArrayDataProvider([
            'allModels' => $model->izinPenelitianMetodes,
        ]);
        return $this->render('view', [
                    'model' => $this->findModel($id),
                    'providerAnggotaPenelitian' => $providerAnggotaPenelitian,
                    'providerIzinPenelitianLokasi' => $providerIzinPenelitianLokasi,
                    'providerIzinPenelitianMetode' => $providerIzinPenelitianMetode,
        ]);
    }

    /**
     * Creates a new IzinPenelitian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new IzinPenelitian();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing IzinPenelitian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    public function actionPrintBapl() {


        $id = Yii::$app->getRequest()->getQueryParam('id');

        $model = $this->findModel($id);

        return $this->render('_formBAPL', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IzinPenelitian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IzinPenelitian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IzinPenelitian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = IzinPenelitian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for AnggotaPenelitian
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddAnggotaPenelitian() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('AnggotaPenelitian');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formAnggotaPenelitian', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinPenelitianLokasi
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinPenelitianLokasi() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPenelitianLokasi');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPenelitianLokasi', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for IzinPenelitianMetode
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddIzinPenelitianMetode() {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('IzinPenelitianMetode');
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIzinPenelitianMetode', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    //Petugas Melakukan Revisi
    public function actionRevisi() {
        $get_data = Yii::$app->request->post();
        $perizinan_proses_id = $get_data['IzinPenelitian']['perizinan_proses_id'];
        $kode_registrasi = $get_data['IzinPenelitian']['kode_registrasi'];
        $id = $get_data['IzinPenelitian']['id'];
        $url_back = $get_data['IzinPenelitian']['url_back'];

        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post())) {
            $session = Yii::$app->session;
            $session->set('UpdatePetugas', 1);
            $idCurPros = PerizinanProses::findOne(['perizinan_id' => $model->perizinan_id, 'active' => 1, 'pelaksana_id' => Yii::$app->user->identity->pelaksana_id])->id;
            $model->saveAll();
            //update Update_by dan Upate_date
            Perizinan::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $model->perizinan_id]);
            PerizinanProses::updateAll(['update_by' => Yii::$app->user->identity->id, 'update_date' => date("Y-m-d")], ['id' => $idCurPros]);
            $perizinan = Perizinan::findOne(['id' => $model->perizinan_id]);
            $perizinan->tanggal_expired = date($model->tgl_akhir_penelitian);
            $perizinan->save();

            return $this->redirect(['/perizinan/' . $url_back . '/', 'id' => $perizinan_proses_id, 'alert' => '1']);
        } else {
            return $this->redirect(['/perizinan/' . $url_back . '/', 'id' => $perizinan_proses_id]);
        }
    }

    public function actionSubkot() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $kot_id = $parents[0];
                $out = \backend\models\Lokasi::getAllKotOptions($kot_id);
                if (!empty($_POST['depdrop_params'])) {
                    $params = $_POST['depdrop_params'];
                    $selected = $params[0];
                } else {
                    $selected = '';
                }
                echo Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionSubkec() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null) {
                $data = \backend\models\Lokasi::getAllKecOptions($cat_id, $subcat_id);
                if (!empty($_POST['depdrop_params'])) {
                    $params = $_POST['depdrop_params'];
                    $selected = $params[0];
                } else {
                    $selected = '';
                }
                echo Json::encode(['output' => $data, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionSubkel() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $prov_id = empty($ids[0]) ? null : $ids[0];
            $subkot_id = empty($ids[1]) ? null : $ids[1];
            $subkec_id = empty($ids[2]) ? null : $ids[2];
            if ($prov_id != null) {
                $data = \backend\models\Lokasi::getAllKelOptions($prov_id, $subkot_id, $subkec_id);
                if (!empty($_POST['depdrop_params'])) {
                    $params = $_POST['depdrop_params'];
                    $selected = $params[0];
                } else {
                    $selected = '';
                }
                echo Json::encode(['output' => $data, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionSubcat() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = \backend\models\Lokasi::getKecOptions($cat_id);
                if (!empty($_POST['depdrop_params'])) {
                    $params = $_POST['depdrop_params'];
                    $selected = $params[0];
                } else {
                    $selected = '';
                }
                echo Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

}
