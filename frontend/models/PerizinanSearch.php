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
            [['cari','tanggal_mohon', 'no_izin', 'berkas_noizin', 'tanggal_izin', 'tanggal_expired', 'status', 'aktif', 'registrasi_urutan', 'nomor_sp_rt_rw', 'tanggal_sp_rt_rw', 'peruntukan', 'nama_perusahaan', 'tanggal_cek_lapangan', 'petugas_cek', 'status_daftar', 'keterangan', 'qr_code', 'tanggal_pertemuan', 'pengambilan_tanggal', 'pengambilan_sesi'], 'safe'],
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

        if ($active)
            $query->andWhere('perizinan.status <> "Selesai"');
        else
            $query->andWhere('perizinan.status = "Selesai"');
        
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '"');
        
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
    //Query perizinan baru
     public function searchBaru($params, $active = true) {
        $query = Perizinan::find();
        
        $this->load($params);

        $query->andWhere('pemohon_id = ' . Yii::$app->user->id);

        if ($active)
            $query->andWhere('perizinan.status <> "Daftar"');
        else
            $query->andWhere('perizinan.status = "Daftar"');
        
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '"');
        
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
    
    //Query perizinan verifikasi
     public function searchVerifikasi($params, $active = true) {
        $query = Perizinan::find();
        
        $this->load($params);

        $query->andWhere('pemohon_id = ' . Yii::$app->user->id);

        if ($active)
            $query->andWhere('perizinan.status <> "verifikasi"');
        else
            $query->andWhere('perizinan.status = "verifikasi"');
        
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '"');
        
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
    
    //Query perizinan baru
     public function searchTolak($params, $active = true) {
        $query = Perizinan::find();
        
        $this->load($params);

        $query->andWhere('pemohon_id = ' . Yii::$app->user->id);

        if ($active)
            $query->andWhere('perizinan.status <> "Tolak"');
        else
            $query->andWhere('perizinan.status = "Tolak"');
        
        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '"');
        
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
    
    //Get Data Jika Perijinan Aktif
    public function searchPerizinanAktif($params, $id) {
        $query = Perizinan::find()->andWhere('tanggal_expired >= DATE_SUB(now(), INTERVAL 1 month) and status = "Selesai" and pemohon_id=' . $id);
        
        $this->load($params);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }
    //Get Data Jika Perijinan NonAktif
    public function searchPerizinanNonAktif($params, $id) {
        $query = Perizinan::find()->andWhere('tanggal_expired < DATE_SUB(now(), INTERVAL 1 month) and status = "Selesai" and pemohon_id=' . $id);
        
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
            'tanggal_sp_rt_rw' => $this->tanggal_sp_rt_rw,
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
