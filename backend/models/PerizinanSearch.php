<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Perizinan;

/**
 * backend\models\PerizinanSearch represents the model behind the search form about `backend\models\Perizinan`.
 */
class PerizinanSearch extends Perizinan {

    public $cari;
    public $status;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'parent_id', 'pemohon_id', 'id_groupizin', 'izin_id', 'no_urut', 'petugas_daftar_id', 'lokasi_pengambilan_id', 'lokasi_izin_id'], 'integer'],
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

        $query->joinWith('currentProcess')->andWhere('perizinan_proses.pelaksana_id = ' . Yii::$app->user->identity->pelaksana_id);

        if ($this->status != null) {
            
            switch ($this->status) {
                case 'registrasi':
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "registrasi"');
                    $query->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id);
                    break;
                case 'verifikasi':
                    $query->joinWith('currentProcess')->andWhere('perizinan_proses.action = "verifikasi"');
                    $query->andWhere('perizinan.status <> "Selesai"');
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

        $query->joinWith('izin')->andWhere('izin.wewenang_id = ' . Yii::$app->user->identity->wewenang_id);

        $query->join('LEFT JOIN', 'user', 'user.id = pemohon_id')->join('LEFT JOIN', 'profile', 'user.id = profile.user_id')->andWhere('profile.name like "%' . $this->cari . '%" or kode_registrasi = "' . $this->cari . '"');

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

}
