<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Perizinan;
use \yii\db\Query;

/**
 * backend\models\PerizinanSearch represents the model behind the search form about `backend\models\Perizinan`.
 */
class PerizinanSearch extends Perizinan {

    public $cari;
    public $action;
    public $status;
    public $id_child;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'parent_id', 'pemohon_id', 'id_groupizin', 'izin_id', 'petugas_daftar_id', 'lokasi_pengambilan_id', 'lokasi_izin_id', 'create_by', 'update_by'], 'integer'],
            [['cari', 'tanggal_mohon', 'no_izin', 'berkas_noizin', 'tanggal_izin', 'tanggal_expired', 'status', 'aktif', 'registrasi_urutan', 'nomor_sp_rt_rw', 'tanggal_sp_rt_rw', 'peruntukan', 'nama_perusahaan', 'tanggal_cek_lapangan', 'petugas_cek', 'status_daftar', 'keterangan', 'qr_code', 'tanggal_pertemuan', 'pengambilan_tanggal', 'pengambilan_sesi', 'create_date', 'update_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $this->load($params);

        $query = Perizinan::find();

        $query->joinWith('currentProcess')->andWhere('perizinan_proses.pelaksana_id = ' . Yii::$app->user->identity->pelaksana_id)->orderBy('id asc');

        if ($this->status != null) {

            switch ($this->status) {
                case 'registrasi':
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "registrasi"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)
                            ->andWhere('lokasi_pengambilan_id <> ""')
                            ->andWhere('pengambilan_tanggal <> ""');
                    break;
                case 'verifikasi':
                    $query->select('
                    perizinan.kode_registrasi, perizinan.pemohon_id,
                    perizinan.status_id, perizinan.izin_id,
                    perizinan.pengambilan_tanggal, perizinan.pengambilan_sesi,
                    perizinan.tanggal_mohon, perizinan.lokasi_pengambilan_id,
                    perizinan.id, perizinan.status');
//                    $query->andWhere('perizinan_proses.action = "verifikasi"');
//                    $query->andWhere('perizinan.status <> "Selesai"');
//                    $query->andWhere('perizinan.status <> "Batal"');
//                    $query->andWhere('perizinan.status <> "Tolak Selesai"');
//                    $query->andWhere('perizinan.status <> "Berkas Tolak Siap"');
//                    $query->andWhere('perizinan.status <> "Verifikasi Tolak"');
                    $query->andWhere('perizinan.status in ("Verifikasi", "Berkas Siap")');
                    $query->andWhere('perizinan.lokasi_pengambilan_id = ' . Yii::$app->user->identity->lokasi_id);
                    break;
                case 'verifikasi-tolak':
//                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "verifikasi"');
//                    $query->andWhere('perizinan.status <> "Selesai"');
//                    $query->andWhere('perizinan.status <> "Batal"');
//                    $query->andWhere('perizinan.status <> "Tolak Selesai"');
//                    $query->andWhere('perizinan.status <> "Berkas Siap"');
//                    $query->andWhere('perizinan.status <> "Verifikasi"');
                    $query->select('
                    perizinan.kode_registrasi, perizinan.pemohon_id,
                    perizinan.status_id, perizinan.izin_id,
                    perizinan.pengambilan_tanggal, perizinan.pengambilan_sesi,
                    perizinan.tanggal_mohon, perizinan.lokasi_pengambilan_id,
                    perizinan.id, perizinan.status');
                    $query->andWhere('perizinan.status in ("Verifikasi Tolak", "Berkas Tolak Siap")');
                    $query->andWhere('perizinan.lokasi_pengambilan_id = ' . Yii::$app->user->identity->lokasi_id);
                    break;
                case 'cetak':
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    $query->andWhere('perizinan.status <> "Tolak"');

                    break;
                case 'tolak':
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "cetak"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    $query->andWhere('perizinan.status <> "Lanjut"');
                    break;
                case 'batal':
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "verifikasi"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    $query->andWhere('perizinan.status = "Batal"');
                    break;
                default:
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    break;
            }
        } else {
            $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);

            $query->joinWith('izin')->andWhere('izin.wewenang_id = ' . Yii::$app->user->identity->wewenang_id);
        }

//        $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
//        $query->joinWith('izin')->andWhere('izin.wewenang_id = ' . Yii::$app->user->identity->wewenang_id);
        if (Yii::$app->user->can('viewer')) {
            $query->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                    ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                    ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');
        } else {
            $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                    ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                    ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                    ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }



        return $dataProvider;
    }

    public function searchApprove($params) {

        $connection = \Yii::$app->db;
        $query = $connection->createCommand("select id from history_plh hp
                                            where user_id = :pid 
                                            AND (CURDATE() between hp.tanggal_mulai and hp.tanggal_akhir)
                                            AND hp.`status` = 'Y'");
        $query->bindValue(':pid', Yii::$app->user->identity->id);
        $result = $query->queryAll();

        foreach ($result as $key) {
            $plh = $key['id'];
        }

        $this->load($params);

        $query = Perizinan::find();

        if ($plh != '') {
            $query->where('perizinan.id=""');
        }

        $query->joinWith('currentProcess')
                ->andWhere('perizinan_proses.pelaksana_id = ' . Yii::$app->user->identity->pelaksana_id);

        if ($this->action != null && $this->status != null) {

            switch ($this->action) {
                case 'approval':
                    if ($this->status == 'Tolak') {
                        $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                        $query->andWhere('perizinan.status = "Tolak"');
                    } elseif ($this->status == 'Lanjut') {
                        $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                        $query->andWhere('perizinan.status = "Lanjut"');
                    }
                    break;
                default:
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    $query->andWhere('perizinan.status = "Tolak" or perizinan.status = "Lanjut"');
                    break;
            }
        } else {
            $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
            $query->andWhere('perizinan.status = "Tolak" or perizinan.status = "Lanjut"');
        }

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }

    public function searchApprovePLH($params, $user_lokasi) {
        $this->load($params);

        $query = Perizinan::find();

        $query->joinWith('currentProcess')->andWhere('perizinan_proses.pelaksana_id = ' . Yii::$app->user->identity->pelaksana_id);

        if ($this->action != null && $this->status != null) {

            switch ($this->action) {
                case 'approval':
                    if ($this->status == 'Tolak') {
                        //$query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
                        $query->andWhere('perizinan.lokasi_izin_id = ' . $user_lokasi);
                        $query->andWhere('perizinan.status = "Tolak"');
                    } elseif ($this->status == 'Lanjut') {
                        //$query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
                        $query->andWhere('perizinan.lokasi_izin_id = ' . $user_lokasi);
                        $query->andWhere('perizinan.status = "Lanjut"');
                    }
                    break;
                default:
                    //$query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . $user_lokasi);
                    $query->andWhere('perizinan.status = "Tolak" or perizinan.status = "Lanjut"');
                    break;
            }
        } else {
            //$query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
            $query->andWhere('perizinan.lokasi_izin_id = ' . $user_lokasi);
            $query->andWhere('perizinan.status = "Tolak" or perizinan.status = "Lanjut"');
        }

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }

    public function searchPerizinanDataByLokasi($params) {
        $this->load($params);

        $lokasi = \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);


        switch (Yii::$app->user->identity->wewenang_id) {
            case 1:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->orWhere(['lokasi_pengambilan_id' => Yii::$app->user->identity->lokasi_id]);
                break;
            case 2 :
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->orWhere(['lokasi_pengambilan_id' => Yii::$app->user->identity->lokasi_id]);
                break;
            case 3:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                        ->orWhere(['lokasi_pengambilan_id' => Yii::$app->user->identity->lokasi_id]);
                break;
            case 4:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                        ->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan])
                        ->orWhere(['lokasi_pengambilan_id' => Yii::$app->user->identity->lokasi_id]);
                break;
            case null:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Null"')
                ;
                break;
        }

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }


        return $dataProvider;
    }

    public function searchPerizinanByLokasi($params, $id) {
        $this->load($params);

        //$query = Perizinan::find()->joinWith('izin')
		$query = Perizinan::find()
//                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                // ->andWhere('perizinan.status <> "Tolak" ')
				->andWhere('lokasi_pengambilan_id <> ""')
				->andWhere('pengambilan_tanggal <> ""')
				->andWhere('tanggal_mohon > "2016-01-01"')
                ->andWhere(['lokasi_izin_id' => $id]);

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }


        return $dataProvider;
    }
	
	public function searchPerizinanByStatus($params, $id, $status) {
        $this->load($params);

        $query = Perizinan::find()
//                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                ->where('lokasi_pengambilan_id is not NULL AND pengambilan_tanggal is not NULL '
                        . 'AND tanggal_mohon > "2016-01-01" AND status in('.$status.') '
                        . 'AND lokasi_izin_id = '.$id.'');
//                ->where('pengambilan_tanggal <> ""')
//                ->where('tanggal_mohon > "2016-01-01"')
//                ->where('status in('.$status.')')
//                ->where(['lokasi_izin_id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }


        return $dataProvider;
    }

    public function searchPerizinanByID($params, $id) {
        $this->load($params);

        $query = Perizinan::find()->joinWith('izin')
//                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                ->andWhere(['pemohon_id' => $id]);

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }


        return $dataProvider;
    }

    public function getDataInBaru($params) {
        $this->load($params);

        $query = Perizinan::find()->joinWith('izin')
                ->andWhere('lokasi_pengambilan_id <> ""')
                ->andWhere('pengambilan_tanggal <> ""')
//                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Daftar" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                ->andWhere('perizinan.status = "Daftar" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    //samuel
    public function getDataInBaruAdmin($params) {
        $this->load($params);

        $query = Perizinan::find()->joinWith('izin')
                ->andWhere('lokasi_pengambilan_id <> ""')
                ->andWhere('pengambilan_tanggal <> ""')
               // ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Daftar" ');
				->andWhere('tanggal_mohon >= DATE("2016-01-01") and perizinan.status = "Daftar"');

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataInProses($params) {
        $this->load($params);

        $query = Perizinan::find()->joinWith('izin')
//                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                ->andWhere('perizinan.status <> "Selesai" ')
                ->andWhere('perizinan.status <> "Daftar" ')
//                                ->andWhere('perizinan.status <> "Tolak" ')
                ->andWhere('perizinan.status <> "Revisi" ')
                ->andWhere('perizinan.status <> "Batal" ')
                ->andWhere('perizinan.status <> "Tolak Selesai" ')
                ->andWhere('lokasi_pengambilan_id <> ""')
                ->andWhere('pengambilan_tanggal <> ""')
                ->andWhere('izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id)
                ->andWhere('pengambilan_tanggal <> "NULL"')
                ->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    //samuel
    public function getDataInProsesAdmin($params) {
        $this->load($params);

        $query = Perizinan::find()->joinWith('izin')
//                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
//                ->andWhere('perizinan.status <> "Selesai" ')
//                ->andWhere('perizinan.status <> "Daftar" ')
//                // ->andWhere('perizinan.status <> "Tolak" ')
//                ->andWhere('perizinan.status <> "Revisi" ')
//                ->andWhere('perizinan.status <> "Batal" ')
//                ->andWhere('perizinan.status <> "Tolak Selesai" ')
                ->andWhere('tanggal_mohon > DATE("2016-01-01")')
                ->andFilterWhere(['OR', 
                    ['=','perizinan.status','Proses'],
                   // ['=','status','Selesai'],
                    ['=','perizinan.status','Tolak'],
                    ['=','perizinan.status','lanjut'],
                    ['=','perizinan.status','Berkas Tolak Siap'],
                    ['=','perizinan.status','Berkas Siap'],
                    ['=','perizinan.status','verifikasi tolak'],
                    ['=','perizinan.status','verifikasi'],])
                ->andWhere('lokasi_pengambilan_id <> ""')
                ->andWhere('pengambilan_tanggal <> ""')
        ;

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataInRevisi($params) {
        $this->load($params);

        $query = Perizinan::find()->joinWith('izin')
                ->andWhere('lokasi_pengambilan_id <> ""')
                ->andWhere('pengambilan_tanggal <> ""')
//                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Revisi" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                ->andWhere('perizinan.status = "Revisi" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    //samuel
    public function getDataInRevisiAdmin($params) {
        $this->load($params);

        $query = Perizinan::find()->joinWith('izin')
                ->andWhere('lokasi_pengambilan_id <> ""')
                ->andWhere('pengambilan_tanggal <> ""')
//                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Revisi" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                ->andWhere('perizinan.status = "Revisi" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataInSelesaiAdmin($params) {
        $this->load($params);

//        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Selesai"');
        $query = Perizinan::find()->joinWith('izin')->andWhere('perizinan.status = "Selesai"');

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataInSelesai($params) {
        $this->load($params);

//        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Selesai" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id.' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
        $query = Perizinan::find()->joinWith('izin')->andWhere('perizinan.status = "Selesai" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    //Samuel
    public function getDataInTolakSelesaiAdmin($params) {
        $this->load($params);

//        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Tolak Selesai"');
        $query = Perizinan::find()->joinWith('izin')->andWhere('perizinan.status = "Tolak Selesai"');

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataInTolakSelesai($params) {
        $this->load($params);

//        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Tolak Selesai" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id .' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
        $query = Perizinan::find()->joinWith('izin')->andWhere('perizinan.status = "Tolak Selesai" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataInTolak($params) {
        $this->load($params);

//        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Tolak" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id .' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
        $query = Perizinan::find()->joinWith('izin')->andWhere('status = "Tolak" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    //Samuel
    public function getDataInBatalAdmin($params) {
        $this->load($params);

//        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Batal"');
        $query = Perizinan::find()->joinWith('izin')->andWhere('perizinan.status = "Batal"');
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataInBatal($params) {
        $this->load($params);

//        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Batal" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id .' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
        $query = Perizinan::find()->joinWith('izin')->andWhere('perizinan.status = "Batal" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataEtaRed($params) {

        $this->load($params);

        $lokasi = \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);

        $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id');

        switch (Yii::$app->user->identity->wewenang_id) {
            case 1 :
                $query->andWhere('perizinan.status <> "Selesai"');
                $query->andWhere('perizinan.status <> "Batal"');
                $query->andWhere('perizinan.status <> "Tolak Selesai"');
                $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');
                $query->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                break;
            case 2 :
                $query->andWhere('perizinan.status <> "Verifikasi" AND perizinan.status <> "Verifikasi Tolak"');
                $query->andWhere('perizinan.status <> "Selesai"');
                $query->andWhere('perizinan.status <> "Batal"');
                $query->andWhere('perizinan.status <> "Tolak Selesai"');
                $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');
                $query->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                $query->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota]);
                break;
            case 3:
                $query->andWhere('perizinan.status <> "Selesai"');
                $query->andWhere('perizinan.status <> "Batal"');
                $query->andWhere('perizinan.status <> "Tolak Selesai"');
                $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');
                $query->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                $query->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota]);
                $query->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan]);
                break;
            case 4:
                $query->andWhere('perizinan.status <> "Selesai"');
                $query->andWhere('perizinan.status <> "Batal"');
                $query->andWhere('perizinan.status <> "Tolak Selesai"');
                $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');
                $query->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                $query->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota]);
                $query->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan]);
                $query->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan]);
                break;
            default :
                $query->andWhere('perizinan.status <> "Selesai"');
                $query->andWhere('perizinan.status <> "Batal"');
                $query->andWhere('perizinan.status <> "Tolak Selesai"');
                $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');

                break;
        }
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataEtaRed2($params) {

        $this->load($params);

        $lokasi = \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);

        $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id');

        switch (Yii::$app->user->identity->wewenang_id) {
            case 1 :
                $query->andWhere('perizinan.status <> "Selesai"');
                $query->andWhere('perizinan.status <> "Batal"');
                $query->andWhere('perizinan.status <> "Tolak Selesai"');
                $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');
                $query->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                break;
            case 2 :
                $query->andWhere('perizinan.status = "Verifikasi" OR perizinan.status = "Verifikasi Tolak"');
                $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');
                $query->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                $query->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota]);
                break;
            case 3:
                $query->andWhere('perizinan.status <> "Selesai"');
                $query->andWhere('perizinan.status <> "Batal"');
                $query->andWhere('perizinan.status <> "Tolak Selesai"');
                $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');
                $query->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                $query->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota]);
                $query->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan]);
                break;
            case 4:
                $query->andWhere('perizinan.status <> "Selesai"');
                $query->andWhere('perizinan.status <> "Batal"');
                $query->andWhere('perizinan.status <> "Tolak Selesai"');
                $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');
                $query->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                $query->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota]);
                $query->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan]);
                $query->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan]);
                break;
            default :
                $query->andWhere('perizinan.status <> "Selesai"');
                $query->andWhere('perizinan.status <> "Batal"');
                $query->andWhere('perizinan.status <> "Tolak Selesai"');
                $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');

                break;
        }
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataEtaYellow($params) {

        $this->load($params);

        $lokasi = \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);

        switch (Yii::$app->user->identity->wewenang_id) {
            case 1:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                break;
            case 2 :
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota]);
                break;
            case 3:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan]);
                break;
            case 4:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                        ->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan]);
                break;

            default :
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )');

                break;
        }
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function getDataEtaGreen($params) {

        $this->load($params);

        $lokasi = \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);

        switch (Yii::$app->user->identity->wewenang_id) {
            case 1:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                break;
            case 2 :
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota]);
                break;
            case 3:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan]);
                break;
            case 4:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                        ->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan]);
                break;
            default :
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('perizinan.status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                ;
                break;
        }
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {

            return $dataProvider;
        }

        return $dataProvider;
    }

    public function PerizinanSearchExp($params) {
        $query = new Query;
        $query->select(['tanggal_expired'])
                ->where([
                    'id' => $params,
                ])
                ->from('perizinan');
        $rows = $query->all();

        return $rows;
    }

    public function getCetakUlangSk($lokasi_id) {

        $query = Perizinan::find()
                ->joinWith('sop')
                ->where(['lokasi_izin_id' => Yii::$app->user->identity->lokasi_id])
                ->andWhere(['sop.pelaksana_id' => Yii::$app->user->identity->pelaksana_id])
                ->andWhere('sop.action_id = 4')
                ->andFilterWhere(['or',
            ['=', 'perizinan.status', 'Berkas Siap'],
            ['=', 'perizinan.status', 'Selesai'],
            ['=', 'perizinan.status', 'Tolak Selesai'],
            ['=', 'perizinan.status', 'Verifikasi'],
            ['=', 'perizinan.status', 'Verifikasi Tolak'],
            ['=', 'perizinan.status', 'Berkas Tolak Siap']]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchCetakUlangSk($params, $lokasi_id) {

        foreach ($params as $value) {
            $cari = $value[cari];
        }

        $query = Perizinan::find()
                ->joinWith('sop')
                ->where(['lokasi_izin_id' => Yii::$app->user->identity->lokasi_id])
                ->andWhere(['sop.pelaksana_id' => Yii::$app->user->identity->pelaksana_id])
                ->andWhere('sop.action_id = 4')
                ->andFilterWhere(['or',
                    ['=', 'perizinan.status', 'Berkas Siap'],
                    ['=', 'perizinan.status', 'Selesai'],
                    ['=', 'perizinan.status', 'Tolak Selesai'],
                    ['=', 'perizinan.status', 'Verifikasi'],
                    ['=', 'perizinan.status', 'Verifikasi Tolak'],
                    ['=', 'perizinan.status', 'Berkas Tolak Siap']])
                ->andFilterWhere(['like', 'kode_registrasi', $cari]);

        //$query = Perizinan::find()->where(['lokasi_izin_id' => Yii::$app->user->identity->lokasi_id])->andFilterWhere(['like', 'kode_registrasi', $cari]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

    //===========
    public function getCetakBatal($lokasi_id) {

        $query = Perizinan::find()->andWhere(['lokasi_izin_id' => $lokasi_id])->andFilterWhere(['or',
            ['=', 'status', 'Batal'],]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchCetakBatal($params, $lokasi_id) {

        foreach ($params as $value) {
            $cari = $value[cari];
        }

        $query = Perizinan::find()->where(['lokasi_izin_id' => $lokasi_id])->andFilterWhere(['like', 'kode_registrasi', $cari]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function searchSimultan($params) {
        $this->load($params);

        $query = Perizinan::find();

        $query->joinWith('currentProcess')
                ->andWhere('perizinan_proses.pelaksana_id = ' . Yii::$app->user->identity->pelaksana_id)
                ->andWhere('perizinan_proses.perizinan_id = ' . $this->id_child)
                ->orderBy('id asc');

        if ($this->status != null) {

            switch ($this->status) {
                case 'registrasi':
                    $query->andWhere('perizinan_proses.action = "registrasi"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)
                            ->andWhere('lokasi_pengambilan_id <> ""')
                            ->andWhere('pengambilan_tanggal <> ""');
                    break;
                case 'verifikasi':
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "verifikasi"');
                    $query->andWhere('perizinan.status <> "Selesai"');
                    $query->andWhere('perizinan.status <> "Batal"');
                    $query->andWhere('perizinan.status <> "Tolak Selesai"');
                    $query->andWhere('perizinan.status <> "Berkas Tolak Siap"');
                    $query->andWhere('perizinan.status <> "Verifikasi Tolak"');
                    $query->andWhere('perizinan.lokasi_pengambilan_id = ' . Yii::$app->user->identity->lokasi_id);
                    break;
                case 'verifikasi-tolak':
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "verifikasi"');
                    $query->andWhere('perizinan.status <> "Selesai"');
                    $query->andWhere('perizinan.status <> "Batal"');
                    $query->andWhere('perizinan.status <> "Tolak Selesai"');
                    $query->andWhere('perizinan.status <> "Berkas Siap"');
                    $query->andWhere('perizinan.status <> "Verifikasi"');
                    $query->andWhere('perizinan.lokasi_pengambilan_id = ' . Yii::$app->user->identity->lokasi_id);
                    break;
                case 'cetak':
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);

                    break;
                case 'tolak':
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "cetak"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    $query->andWhere('perizinan.status = "Tolak"');
                    break;
                case 'batal':
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "verifikasi"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    $query->andWhere('perizinan.status = "Batal"');
                    break;
                default:
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    break;
            }
        } else {
            $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);

            $query->joinWith('izin')->andWhere('izin.wewenang_id = ' . Yii::$app->user->identity->wewenang_id);
        }

//        $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
//        $query->joinWith('izin')->andWhere('izin.wewenang_id = ' . Yii::$app->user->identity->wewenang_id);
        if (Yii::$app->user->can('viewer')) {
            $query->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                    ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                    ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');
        } else {
            $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                    ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                    ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                    ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }

    public function searchApproveSimultan($params) {

        $connection = \Yii::$app->db;
        $query = $connection->createCommand("select id from history_plh hp
                                            where user_id = :pid 
                                            AND (CURDATE() between hp.tanggal_mulai and hp.tanggal_akhir)
                                            AND hp.`status` = 'Y'");
        $query->bindValue(':pid', Yii::$app->user->identity->id);
        $result = $query->queryAll();

        foreach ($result as $key) {
            $plh = $key['id'];
        }

        $this->load($params);

        $query = Perizinan::find();

        if ($plh != '') {
            $query->where('perizinan.id=""');
        }

        $query->joinWith('currentProcess')
                ->andWhere('perizinan_proses.pelaksana_id = ' . Yii::$app->user->identity->pelaksana_id)
                ->andWhere('perizinan_proses.perizinan_id = ' . $this->id_child)
                ->orderBy('id asc');

        if ($this->action != null && $this->status != null) {

            switch ($this->action) {
                case 'approval':
                    if ($this->status == 'Tolak') {
                        $query->andWhere('perizinan_proses.action = "approval"');
                        $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                        $query->andWhere('perizinan.status = "Tolak"');
                    } elseif ($this->status == 'Lanjut') {
                        $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                        $query->andWhere('perizinan.status = "Lanjut"');
                    }
                    break;
                default:
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    $query->andWhere('perizinan.status = "Tolak" or perizinan.status = "Lanjut"');
                    break;
            }
        } else {
            $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
            $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
            $query->andWhere('perizinan.status = "Tolak" or perizinan.status = "Lanjut"');
        }

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }

    public function searchApprovePLHsimultan($params, $user_lokasi) {
        $this->load($params);

        $query = Perizinan::find();

        $query->joinWith('currentProcess')
                ->andWhere('perizinan_proses.pelaksana_id = ' . Yii::$app->user->identity->pelaksana_id)
                ->andWhere('perizinan_proses.perizinan_id = ' . $this->id_child)
                ->orderBy('id asc');
//        $query->joinWith('currentProcess')->andWhere('perizinan_proses.pelaksana_id = ' . Yii::$app->user->identity->pelaksana_id);

        if ($this->action != null && $this->status != null) {

            switch ($this->action) {
                case 'approval':
                    if ($this->status == 'Tolak') {
                        //$query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
                        $query->andWhere('perizinan.lokasi_izin_id = ' . $user_lokasi);
                        $query->andWhere('perizinan.status = "Tolak"');
                    } elseif ($this->status == 'Lanjut') {
                        //$query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
                        $query->andWhere('perizinan.lokasi_izin_id = ' . $user_lokasi);
                        $query->andWhere('perizinan.status = "Lanjut"');
                    }
                    break;
                default:
                    //$query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . $user_lokasi);
                    $query->andWhere('perizinan.status = "Tolak" or perizinan.status = "Lanjut"');
                    break;
            }
        } else {
            //$query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
            $query->andWhere('perizinan.lokasi_izin_id = ' . $user_lokasi);
            $query->andWhere('perizinan.status = "Tolak" or perizinan.status = "Lanjut"');
        }

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        return $dataProvider;
    }

    public function searchPending($params, $active = true) {
        $query = Perizinan::find();

        $this->load($params);


        $queryIN = \backend\models\User::find()
                ->where(['lokasi_id' => Yii::$app->user->identity->lokasi_id])
                ->select('id');
        //'profile.name like "%' . $this->cari .
        $query->Where('perizinan.status = "Daftar"')
                ->andWhere(['in', 'perizinan.create_by', $queryIN])
                ->andWhere('perizinan.pengambilan_tanggal is NULL');
        $query->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->join('LEFT JOIN', 'izin', 'izin_id = izin.id')
                ->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->andWhere('kode_registrasi like "%' . $this->cari . '%" or izin.nama like "%' . $this->cari . '%" or l.nama like "%' . $this->cari . '%" or perizinan.status like "%' . $this->cari . '%" or profile.name like "%' . $this->cari . '%" or user.username like "%' . $this->cari . '%"');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);



        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
//            'pemohon_id' => $this->pemohon_id,
            'id_groupizin' => $this->id_groupizin,
            'izin_id' => $this->izin_id,
            'jumlah_tahap' => $this->jumlah_tahap,
            'tanggal_mohon' => $this->tanggal_mohon,
            'tanggal_izin' => $this->tanggal_izin,
            'tanggal_expired' => $this->tanggal_expired,
            'tanggal_sp_rt_rw' => $this->tanggal_sp_rt_rw,
            'tanggal_cek_lapangan' => $this->tanggal_cek_lapangan,
            'petugas_daftar_id' => $this->petugas_daftar_id,
            'lokasi_izin_id' => $this->lokasi_izin_id,
            'tanggal_pertemuan' => $this->tanggal_pertemuan,
            'pengambilan_tanggal' => $this->pengambilan_tanggal,
            'pengambilan_sesi' => $this->pengambilan_sesi,
        ]);

        $query->andFilterWhere(['like', 'no_izin', $this->no_izin])
                ->andFilterWhere(['like', 'berkas_noizin', $this->berkas_noizin])
                ->andFilterWhere(['like', 'status', $this->status])
                ->andFilterWhere(['like', 'aktif', $this->aktif])
                ->andFilterWhere(['like', 'registrasi_urutan', $this->registrasi_urutan])
                ->andFilterWhere(['like', 'nomor_sp_rt_rw', $this->nomor_sp_rt_rw])
                ->andFilterWhere(['like', 'peruntukan', $this->peruntukan])
                ->andFilterWhere(['like', 'nama_perusahaan', $this->nama_perusahaan])
                ->andFilterWhere(['like', 'petugas_cek', $this->petugas_cek])
                ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
                ->andFilterWhere(['like', 'qr_code', $this->qr_code]);

        return $dataProvider;
    }

}
