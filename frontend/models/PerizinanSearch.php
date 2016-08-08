<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Perizinan;

/**
 * frontend\models\PerizinanSearch represents the model behind the search form about `backend\models\Perizinan`.
 */
class PerizinanSearch extends Perizinan {
    
    public $cari;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'parent_id', 'pemohon_id', 'id_groupizin', 'izin_id', 'jumlah_tahap', 'petugas_daftar_id', 'lokasi_izin_id'], 'integer'],
            [['cari','tanggal_mohon', 'no_izin', 'berkas_noizin', 'tanggal_izin', 'tanggal_expired', 'status', 'aktif', 'registrasi_urutan', 'action', 'pelaksana_id', 'peruntukan', 'nourut_proses', 'tanggal_cek_lapangan', 'petugas_cek', 'status_daftar', 'keterangan', 'qr_code', 'tanggal_pertemuan', 'pengambilan_tanggal', 'pengambilan_sesi'], 'safe'],
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
    //Query perizinan selesai
    public function search($params, $active = true) {
        $query = Perizinan::find();
        
        $this->load($params);

        $query->andWhere('pemohon_id = ' . Yii::$app->user->id);
        //$query->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)');
//        $query->andWhere('tanggal_mohon > DATE("2016-01-01")');
        if ($active){
            $query->andWhere('perizinan.status <> "Selesai"');
            $query->andWhere('perizinan.status <> "Tolak Selesai"');
            $query->andWhere('perizinan.status <> "Batal"');
        } 
        else{
            $query->andWhere('perizinan.status = "Selesai" or perizinan.status = "Tolak Selesai" or perizinan.status = "Batal"');
        }
            
        
        $query->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->join('LEFT JOIN', 'izin', 'izin_id = izin.id')
                ->andWhere('kode_registrasi = "' . $this->cari . '" or izin.nama like "%' . $this->cari . '%" or l.nama like "%' . $this->cari . '%" or perizinan.status like "%'. $this->cari .'%" ');

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
            'pelaksana_id' => $this->pelaksana_id,
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
                ->andFilterWhere(['like', 'action', $this->action])
                ->andFilterWhere(['like', 'peruntukan', $this->peruntukan])
                ->andFilterWhere(['like', 'nourut_proses', $this->nourut_proses])
                ->andFilterWhere(['like', 'petugas_cek', $this->petugas_cek])
                ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
                ->andFilterWhere(['like', 'qr_code', $this->qr_code]);

        return $dataProvider;
    }
    // Query aktif Samuel
     public function searchAktif($params, $active = true) {
        $query = Perizinan::find();
        
        $this->load($params);

        $query->andWhere('pemohon_id = ' . Yii::$app->user->id);
//        $query->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)');

        if ($active){
            $query->andWhere('perizinan.status <> "Selesai"');
            $query->andWhere('perizinan.status <> "Tolak Selesai"');
            
            $query->andWhere('perizinan.status <> "Batal"');
        } 
        else{
            $query->andWhere('perizinan.status = "Tolak" or '
                    . 'perizinan.status = "Proses" or '
                    . 'perizinan.status = "Verifikasi Tolak" or '
                    . 'perizinan.status = "Verifikasi" or '
                    . 'perizinan.status = "Revisi" or '
                    . 'perizinan.status = "Lanjut" or '
                    . 'perizinan.status = "Berkas Tolak" or '
                    . 'perizinan.status = "Daftar"');
        }
            
        
        $query->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->join('LEFT JOIN', 'izin', 'izin_id = izin.id')
                ->andWhere('kode_registrasi = "' . $this->cari . '" or izin.nama like "%' . $this->cari . '%" or l.nama like "%' . $this->cari . '%" or perizinan.status like "%'. $this->cari .'%" ');

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
            'pelaksana_id' => $this->pelaksana_id,
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
                ->andFilterWhere(['like', 'action', $this->action])
                ->andFilterWhere(['like', 'peruntukan', $this->peruntukan])
                ->andFilterWhere(['like', 'nourut_proses', $this->nourut_proses])
                ->andFilterWhere(['like', 'petugas_cek', $this->petugas_cek])
                ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
                ->andFilterWhere(['like', 'qr_code', $this->qr_code]);

        return $dataProvider;
    } 
    
    //Query perizinan baru
     public function searchBaru($params, $active = true) {
        $query = Perizinan::find();
        
        $this->load($params);

        $query->andWhere('pemohon_id = ' . Yii::$app->user->id);

        if ($active)
            $query->andWhere('perizinan.status <> "Daftar"');
        else
            $query->andWhere('perizinan.status = "Daftar"');
        
        $query->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->join('LEFT JOIN', 'izin', 'izin_id = izin.id')
                ->andWhere('kode_registrasi = "' . $this->cari . '" or izin.nama like "%' . $this->cari . '%" or l.nama like "%' . $this->cari . '%" or perizinan.status like "%'. $this->cari .'%" ');

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
            'pelaksana_id' => $this->pelaksana_id,
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
                ->andFilterWhere(['like', 'action', $this->action])
                ->andFilterWhere(['like', 'peruntukan', $this->peruntukan])
                ->andFilterWhere(['like', 'nourut_proses', $this->nourut_proses])
                ->andFilterWhere(['like', 'petugas_cek', $this->petugas_cek])
                ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
                ->andFilterWhere(['like', 'qr_code', $this->qr_code]);

        return $dataProvider;
    }
    
    //Query perizinan verifikasi
     public function searchVerifikasi($params, $active = true) {
        $query = Perizinan::find();
        
        $this->load($params);

        $query->andWhere('pemohon_id = ' . Yii::$app->user->id);

        if ($active)
            $query->andWhere('perizinan.status <> "verifikasi"');
        else
            $query->andWhere('perizinan.status = "verifikasi"');
        
        $query->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->join('LEFT JOIN', 'izin', 'izin_id = izin.id')
                ->andWhere('kode_registrasi = "' . $this->cari . '" or izin.nama like "%' . $this->cari . '%" or l.nama like "%' . $this->cari . '%" or perizinan.status like "%'. $this->cari .'%" ');

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
            'pelaksana_id' => $this->pelaksana_id,
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
                ->andFilterWhere(['like', 'action', $this->action])
                ->andFilterWhere(['like', 'peruntukan', $this->peruntukan])
                ->andFilterWhere(['like', 'nourut_proses', $this->nourut_proses])
                ->andFilterWhere(['like', 'petugas_cek', $this->petugas_cek])
                ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
                ->andFilterWhere(['like', 'qr_code', $this->qr_code]);

        return $dataProvider;
    }
    
    //Query perizinan baru
     public function searchTolak($params, $active = true) {
        $query = Perizinan::find();
        
        $this->load($params);

        $query->andWhere('pemohon_id = ' . Yii::$app->user->id);

        if ($active)
            $query->andWhere('perizinan.status <> "Tolak"');
        else
            $query->andWhere('perizinan.status = "Tolak"');
        
        $query->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->join('LEFT JOIN', 'izin', 'izin_id = izin.id')
                ->andWhere('kode_registrasi = "' . $this->cari . '" or izin.nama like "%' . $this->cari . '%" or l.nama like "%' . $this->cari . '%" or perizinan.status like "%'. $this->cari .'%" ');

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
            'pelaksana_id' => $this->pelaksana_id,
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
                ->andFilterWhere(['like', 'action', $this->action])
                ->andFilterWhere(['like', 'peruntukan', $this->peruntukan])
                ->andFilterWhere(['like', 'nourut_proses', $this->nourut_proses])
                ->andFilterWhere(['like', 'petugas_cek', $this->petugas_cek])
                ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
                ->andFilterWhere(['like', 'qr_code', $this->qr_code]);

        return $dataProvider;
    }
    
    //Get Data Jika Perijinan Aktif 
    public function searchPerizinanAktif($params, $id) {
//        $query = Perizinan::find()->andWhere('tanggal_expired >= DATE_SUB(now(), INTERVAL 1 month) and status = "Selesai" and pemohon_id=' . $id);
          $query = Perizinan::find()->andWhere('tanggal_expired >=  DATE(now()) and status = "Selesai" and pemohon_id=' . $id .' and status_id <> 4 and aktif = "Y"');
//        $query = Perizinan::find()->andWhere('status = "Selesai" and pemohon_id=' . $id);
        $query->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->join('LEFT JOIN', 'izin', 'izin_id = izin.id')
                ->andWhere('kode_registrasi = "' . $this->cari . '" or izin.nama like "%' . $this->cari . '%" or l.nama like "%' . $this->cari . '%" or perizinan.status like "%'. $this->cari .'%" ');

        $this->load($params);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
    //Get Data Jika Perijinan NonAktif 
    public function searchPerizinanNonAktif($params, $id) {
        $query = Perizinan::find()->andWhere('tanggal_expired < DATE(now()) and status = "Selesai" and pemohon_id=' . $id);
//        $query = Perizinan::find()->andWhere('tanggal_expired < DATE("2016-01-01") and status = "Selesai" and pemohon_id=' . $id);
                $query->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->join('LEFT JOIN', 'izin', 'izin_id = izin.id')
                ->andWhere('kode_registrasi = "' . $this->cari . '" or izin.nama like "%' . $this->cari . '%" or l.nama like "%' . $this->cari . '%" or perizinan.status like "%'. $this->cari .'%" ');

        $this->load($params);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
    
    public function searchPerizinanPencabutan($params, $id) {
        $query = Perizinan::find()->andWhere('status = "Selesai" and pemohon_id=' . $id .' and perizinan.status_id = 4');
//        $query = Perizinan::find()->andWhere('tanggal_expired < DATE("2016-01-01") and status = "Selesai" and pemohon_id=' . $id);
                $query->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->join('LEFT JOIN', 'izin', 'izin_id = izin.id')
                ->andWhere('kode_registrasi = "' . $this->cari . '" or izin.nama like "%' . $this->cari . '%" or l.nama like "%' . $this->cari . '%" or perizinan.status like "%'. $this->cari .'%" ');

        $this->load($params);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
    
    public function searchPerizinanInvalid($params, $id) {
        $query = Perizinan::find()->andWhere('perizinan.aktif= "N" and pemohon_id=' . $id);
//        $query = Perizinan::find()->andWhere('tanggal_expired < DATE("2016-01-01") and status = "Selesai" and pemohon_id=' . $id);
                $query->join('LEFT JOIN', 'lokasi l', 'lokasi_pengambilan_id = l.id')
                ->join('LEFT JOIN', 'izin', 'izin_id = izin.id')
                ->andWhere('kode_registrasi = "' . $this->cari . '" or izin.nama like "%' . $this->cari . '%" or l.nama like "%' . $this->cari . '%" or perizinan.status like "%'. $this->cari .'%" ');

        $this->load($params);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

    public function active($params) {
        $query = Perizinan::find();

        $query->andWhere('pemohon_id = ' . Yii::$app->user->id);



        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

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
            'pelaksana_id' => $this->pelaksana_id,
            'tanggal_cek_lapangan' => $this->tanggal_cek_lapangan,
            'petugas_daftar_id' => $this->petugas_daftar_id,
            'lokasi_id' => $this->lokasi_id,
            'tanggal_pertemuan' => $this->tanggal_pertemuan,
            'pengambilan_tanggal' => $this->pengambilan_tanggal,
            'pengambilan_sesi' => $this->pengambilan_sesi,
        ]);

        $query->andFilterWhere(['like', 'no_izin', $this->no_izin])
                ->andFilterWhere(['like', 'berkas_noizin', $this->berkas_noizin])
                ->andFilterWhere(['like', 'status', $this->status])
                ->andFilterWhere(['like', 'aktif', $this->aktif])
                ->andFilterWhere(['like', 'registrasi_urutan', $this->registrasi_urutan])
                ->andFilterWhere(['like', 'action', $this->action])
                ->andFilterWhere(['like', 'peruntukan', $this->peruntukan])
                ->andFilterWhere(['like', 'nourut_proses', $this->nourut_proses])
                ->andFilterWhere(['like', 'petugas_cek', $this->petugas_cek])
                ->andFilterWhere(['like', 'status_daftar', $this->status_daftar])
                ->andFilterWhere(['like', 'keterangan', $this->keterangan])
                ->andFilterWhere(['like', 'qr_code', $this->qr_code]);

        return $dataProvider;
    }

}
