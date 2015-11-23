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

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'parent_id', 'pemohon_id', 'id_groupizin', 'izin_id', 'petugas_daftar_id', 'lokasi_pengambilan_id', 'lokasi_izin_id'], 'integer'],
            [['cari', 'tanggal_mohon', 'no_izin', 'berkas_noizin', 'tanggal_izin', 'tanggal_expired', 'status', 'aktif', 'registrasi_urutan', 'nomor_sp_rt_rw', 'tanggal_sp_rt_rw', 'peruntukan', 'nama_perusahaan', 'tanggal_cek_lapangan', 'petugas_cek', 'status_daftar', 'keterangan', 'qr_code', 'tanggal_pertemuan', 'pengambilan_tanggal', 'pengambilan_sesi'], 'safe'],
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
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "cetak"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    $query->andWhere('perizinan.status = "Lanjut"');
                    
                    break;
                case 'tolak':
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "cetak"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    $query->andWhere('perizinan.status = "Tolak"');
                    break;
                default:
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    break;
            }
        }
        
//        $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);

//        $query->joinWith('izin')->andWhere('izin.wewenang_id = ' . Yii::$app->user->identity->wewenang_id);

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

//        $query->andFilterWhere([
//            'id' => $this->id,
//            'parent_id' => $this->parent_id,
//            'pemohon_id' => $this->pemohon_id,
//            'id_groupizin' => $this->id_groupizin,
//            'izin_id' => $this->izin_id,
//            'no_urut' => $this->no_urut,
//            'tanggal_mohon' => $this->tanggal_mohon,
//            'tanggal_izin' => $this->tanggal_izin,
//            'tanggal_expired' => $this->tanggal_expired,
//            'tanggal_sp_rt_rw' => $this->tanggal_sp_rt_rw,
//            'tanggal_cek_lapangan' => $this->tanggal_cek_lapangan,
//            'petugas_daftar_id' => $this->petugas_daftar_id,
//            'lokasi_izin_id' => $this->lokasi_izin_id,
//            'lokasi_pengambilan_id' => $this->lokasi_pengambilan_id,
//            'tanggal_pertemuan' => $this->tanggal_pertemuan,
//            'pengambilan_tanggal' => $this->pengambilan_tanggal,
//            'pengambilan_sesi' => $this->pengambilan_sesi,
//        ]);
//
//        $query->andFilterWhere(['like', 'no_izin', $this->no_izin])
//                ->andFilterWhere(['like', 'berkas_noizin', $this->berkas_noizin])
//                ->andFilterWhere(['like', 'perizinan.status', $this->status])
//                ->andFilterWhere(['like', 'aktif', $this->aktif])
//                ->andFilterWhere(['like', 'registrasi_urutan', $this->registrasi_urutan])
//                ->andFilterWhere(['like', 'nomor_sp_rt_rw', $this->nomor_sp_rt_rw])
//                ->andFilterWhere(['like', 'peruntukan', $this->peruntukan])
//                ->andFilterWhere(['like', 'nama_perusahaan', $this->nama_perusahaan])
//                ->andFilterWhere(['like', 'petugas_cek', $this->petugas_cek])
//                ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
//                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
//                ->andFilterWhere(['like', 'qr_code', $this->qr_code]);

        return $dataProvider;
    }
    
    public function searchApprove($params) {
        $this->load($params);

        $query = Perizinan::find();

        $query->joinWith('currentProcess')->andWhere('perizinan_proses.pelaksana_id = ' . Yii::$app->user->identity->pelaksana_id);

        if ($this->action != null && $this->status != null) {
            
            switch ($this->action) {
                case 'approval':
                    if($this->status == 'Tolak'){
                        $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
                        $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                        $query->andWhere('perizinan.status = "Tolak"');
                    }  elseif ($this->status == 'Lanjut') {
                        $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "approval"');
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
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

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
        
        $lokasi= \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);
        
        switch (Yii::$app->user->identity->wewenang_id) {
            case 1:
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                    ->orWhere(['lokasi_pengambilan_id' => Yii::$app->user->identity->lokasi_id]);
                break;
            case 2 :
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                    ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                    ->orWhere(['lokasi_pengambilan_id' => Yii::$app->user->identity->lokasi_id]);
                break;
            case 3:
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                    ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                    ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                    ->orWhere(['lokasi_pengambilan_id' => Yii::$app->user->identity->lokasi_id]);
                break;
            case 4:
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                    ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                    ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                    ->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan])
                    ->orWhere(['lokasi_pengambilan_id' => Yii::$app->user->identity->lokasi_id]);
                break;
        }
        
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            
            return $dataProvider;
        }


        return $dataProvider;
    }
    
    public function searchPerizinanByLokasi($params,$id) {
        $this->load($params);

        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                                ->andWhere('perizinan.status <> "Tolak" ')
                                ->andWhere(['lokasi_izin_id' => $id]);
        
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            
            return $dataProvider;
        }


        return $dataProvider;
    }
    
    public function searchPerizinanByID($params,$id) {
        $this->load($params);

        $query = Perizinan::find()->joinWith('izin')
                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                ->andWhere(['pemohon_id' => $id]);
        
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

        
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

        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Daftar" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
     
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

        
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

        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                                ->andWhere('perizinan.status <> "Selesai" ')
                                ->andWhere('perizinan.status <> "Daftar" ')
                                ->andWhere('perizinan.status <> "Tolak" ')
                                ->andWhere('perizinan.status <> "Revisi" ')
                                ->andWhere('perizinan.status <> "Batal" ')
                                ->andWhere('perizinan.status <> "Tolak Selesai" ')
                                ->andWhere('izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id )
                                ->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
     
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

        
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

        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Revisi" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
     
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

        
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

        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Selesai" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id.' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
     
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

        
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

        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Tolak Selesai" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id .' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
     
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');
        
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

        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Tolak" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id .' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
     
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

        $query = Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Batal" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id .' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
     
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');
        
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
        
        $lokasi= \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);
        
        $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id');
        
        switch (Yii::$app->user->identity->wewenang_id) {
            case 1 :
                    $query->andWhere('perizinan.status <> "Selesai"');
                    $query->andWhere('perizinan.status <> "Batal"');
                    $query->andWhere('perizinan.status <> "Tolak Selesai"');
                    $query->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0');
                    $query->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                break;
            case 2 :
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
        }
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

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
        
        $lokasi= \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);
        
        switch (Yii::$app->user->identity->wewenang_id) {
            case 1:
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere('perizinan.status <> "Selesai"')
                    ->andWhere('perizinan.status <> "Batal"')
                    ->andWhere('perizinan.status <> "Tolak Selesai"')
                    ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                break;
            case 2 :
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere('perizinan.status <> "Selesai"')
                    ->andWhere('perizinan.status <> "Batal"')
                    ->andWhere('perizinan.status <> "Tolak Selesai"')
                    ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                    ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota]);
                break;
            case 3:
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere('perizinan.status <> "Selesai"')
                    ->andWhere('perizinan.status <> "Batal"')
                    ->andWhere('perizinan.status <> "Tolak Selesai"')
                    ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                    ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                    ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan]);
                break;
            case 4:
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere('perizinan.status <> "Selesai"')
                    ->andWhere('perizinan.status <> "Batal"')
                    ->andWhere('perizinan.status <> "Tolak Selesai"')
                    ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                    ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                    ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                    ->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan]);
                break;
        }
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

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
        
        $lokasi= \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);
        
        switch (Yii::$app->user->identity->wewenang_id) {
            case 1:
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere('perizinan.status <> "Selesai"')
                    ->andWhere('perizinan.status <> "Batal"')
                    ->andWhere('perizinan.status <> "Tolak Selesai"')
                    ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi]);
                break;
            case 2 :
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere('perizinan.status <> "Selesai"')
                    ->andWhere('perizinan.status <> "Batal"')
                    ->andWhere('perizinan.status <> "Tolak Selesai"')
                    ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                    ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota]);
                break;
            case 3:
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere('perizinan.status <> "Selesai"')
                    ->andWhere('perizinan.status <> "Batal"')
                    ->andWhere('perizinan.status <> "Tolak Selesai"')
                    ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                    ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                    ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan]);
                break;
            case 4:
                $query = Perizinan::find()->innerJoin('lokasi','perizinan.lokasi_izin_id = lokasi.id')
                    ->andWhere('perizinan.status <> "Selesai"')
                    ->andWhere('perizinan.status <> "Batal"')
                    ->andWhere('perizinan.status <> "Tolak Selesai"')
                    ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                    ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                    ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                    ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                    ->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan]);
                break;
        }
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')
                ->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')
                ->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '" or l.nama like "%' . $this->cari . '%" or tanggal_mohon like "%' . $this->cari .'%" or perizinan.status like "%'. $this->cari .'%" ');

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

        $query = Perizinan::find()->andWhere(['lokasi_izin_id' => $lokasi_id])->andFilterWhere(['or',
            ['=','status','Berkas Siap'],
            ['=','status','Berkas Tolak Siap']]);
     
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        return $dataProvider;
        
    }
	
	public function searchCetakUlangSk($params, $lokasi_id)
    {	
	
		foreach($params as $value){
			$cari = $value[cari];
		}
	
        $query = Perizinan::find()->where(['lokasi_izin_id'=>$lokasi_id])->andFilterWhere(['like', 'kode_registrasi', $cari]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

}
