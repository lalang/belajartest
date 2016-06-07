<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinKesehatan;

/**
 * backend\models\IzinKesehatanSearch represents the model behind the search form about `backend\models\IzinKesehatan`.
 */
 class IzinKesehatanSearch extends IzinKesehatan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'propinsi_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'kewarganegaraan_id', 'jumlah_sip_offline', 'kepegawaian_id', 'wilayah_id_tempat_praktik', 'kecamatan_id_tempat_praktik', 'kelurahan_id_tempat_praktik', 'propinsi_id_tempat_praktik_i', 'wilayah_id_tempat_praktik_i', 'kecamatan_id_tempat_praktik_i', 'kelurahan_id_tempat_praktik_i', 'propinsi_id_tempat_praktik_ii', 'wilayah_id_tempat_praktik_ii', 'kecamatan_id_tempat_praktik_ii', 'kelurahan_id_tempat_praktik_ii'], 'integer'],
            [['tipe', 'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenkel', 'agama', 'alamat', 'rt', 'rw', 'kodepos', 'telepon', 'email', 'kitas', 'status_sip_offline', 'nomor_str', 'tanggal_berlaku_str', 'perguruan_tinggi', 'tanggal_lulus', 'nomor_rekomendasi', 'nomor_fasilitas_kesehatan', 'tanggal_fasilitas_kesehatan', 'nomor_pimpinan', 'tanggal_pimpinan', 'npwp_tempat_praktik', 'nama_tempat_praktik', 'titik_koordinat', 'latitude', 'longtitude', 'nama_gedung_praktik', 'blok_tempat_praktik', 'alamat_tempat_praktik', 'rt_tempat_praktik', 'rw_tempat_praktik', 'kodepos_tempat_praktik', 'telpon_tempat_praktik', 'fax_tempat_praktik', 'email_tempat_praktik', 'nomor_izin_kesehatan', 'jenis_praktik_i', 'nama_tempat_praktik_i', 'nomor_sip_i', 'tanggal_berlaku_sip_i', 'nama_gedung_praktik_i', 'blok_tempat_praktik_i', 'alamat_tempat_praktik_i', 'rt_tempat_praktik_i', 'rw_tempat_praktik_i', 'telpon_tempat_praktik_i', 'jenis_praktik_ii', 'nama_tempat_praktik_ii', 'nomor_sip_ii', 'tanggal_berlaku_sip_ii', 'nama_gedung_praktik_ii', 'blok_tempat_praktik_ii', 'alamat_tempat_praktik_ii', 'rt_tempat_praktik_ii', 'rw_tempat_praktik_ii', 'telpon_tempat_praktik_ii'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = IzinKesehatan::find();

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
            'perizinan_id' => $this->perizinan_id,
            'izin_id' => $this->izin_id,
            'user_id' => $this->user_id,
            'status_id' => $this->status_id,
            'lokasi_id' => $this->lokasi_id,
            'tanggal_lahir' => $this->tanggal_lahir,
            'propinsi_id' => $this->propinsi_id,
            'wilayah_id' => $this->wilayah_id,
            'kecamatan_id' => $this->kecamatan_id,
            'kelurahan_id' => $this->kelurahan_id,
            'kewarganegaraan_id' => $this->kewarganegaraan_id,
            'jumlah_sip_offline' => $this->jumlah_sip_offline,
            'tanggal_berlaku_str' => $this->tanggal_berlaku_str,
            'tanggal_lulus' => $this->tanggal_lulus,
            'kepegawaian_id' => $this->kepegawaian_id,
            'tanggal_fasilitas_kesehatan' => $this->tanggal_fasilitas_kesehatan,
            'tanggal_pimpinan' => $this->tanggal_pimpinan,
            'wilayah_id_tempat_praktik' => $this->wilayah_id_tempat_praktik,
            'kecamatan_id_tempat_praktik' => $this->kecamatan_id_tempat_praktik,
            'kelurahan_id_tempat_praktik' => $this->kelurahan_id_tempat_praktik,
            'tanggal_berlaku_sip_i' => $this->tanggal_berlaku_sip_i,
            'propinsi_id_tempat_praktik_i' => $this->propinsi_id_tempat_praktik_i,
            'wilayah_id_tempat_praktik_i' => $this->wilayah_id_tempat_praktik_i,
            'kecamatan_id_tempat_praktik_i' => $this->kecamatan_id_tempat_praktik_i,
            'kelurahan_id_tempat_praktik_i' => $this->kelurahan_id_tempat_praktik_i,
            'tanggal_berlaku_sip_ii' => $this->tanggal_berlaku_sip_ii,
            'propinsi_id_tempat_praktik_ii' => $this->propinsi_id_tempat_praktik_ii,
            'wilayah_id_tempat_praktik_ii' => $this->wilayah_id_tempat_praktik_ii,
            'kecamatan_id_tempat_praktik_ii' => $this->kecamatan_id_tempat_praktik_ii,
            'kelurahan_id_tempat_praktik_ii' => $this->kelurahan_id_tempat_praktik_ii,
        ]);

        $query->andFilterWhere(['like', 'tipe', $this->tipe])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenkel', $this->jenkel])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'kodepos', $this->kodepos])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'kitas', $this->kitas])
            ->andFilterWhere(['like', 'status_sip_offline', $this->status_sip_offline])
            ->andFilterWhere(['like', 'nomor_str', $this->nomor_str])
            ->andFilterWhere(['like', 'perguruan_tinggi', $this->perguruan_tinggi])
            ->andFilterWhere(['like', 'nomor_rekomendasi', $this->nomor_rekomendasi])
            ->andFilterWhere(['like', 'nomor_fasilitas_kesehatan', $this->nomor_fasilitas_kesehatan])
            ->andFilterWhere(['like', 'nomor_pimpinan', $this->nomor_pimpinan])
            ->andFilterWhere(['like', 'npwp_tempat_praktik', $this->npwp_tempat_praktik])
            ->andFilterWhere(['like', 'nama_tempat_praktik', $this->nama_tempat_praktik])
            ->andFilterWhere(['like', 'titik_koordinat', $this->titik_koordinat])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longtitude', $this->longtitude])
            ->andFilterWhere(['like', 'nama_gedung_praktik', $this->nama_gedung_praktik])
            ->andFilterWhere(['like', 'blok_tempat_praktik', $this->blok_tempat_praktik])
            ->andFilterWhere(['like', 'alamat_tempat_praktik', $this->alamat_tempat_praktik])
            ->andFilterWhere(['like', 'rt_tempat_praktik', $this->rt_tempat_praktik])
            ->andFilterWhere(['like', 'rw_tempat_praktik', $this->rw_tempat_praktik])
            ->andFilterWhere(['like', 'kodepos_tempat_praktik', $this->kodepos_tempat_praktik])
            ->andFilterWhere(['like', 'telpon_tempat_praktik', $this->telpon_tempat_praktik])
            ->andFilterWhere(['like', 'fax_tempat_praktik', $this->fax_tempat_praktik])
            ->andFilterWhere(['like', 'email_tempat_praktik', $this->email_tempat_praktik])
            ->andFilterWhere(['like', 'nomor_izin_kesehatan', $this->nomor_izin_kesehatan])
            ->andFilterWhere(['like', 'jenis_praktik_i', $this->jenis_praktik_i])
            ->andFilterWhere(['like', 'nama_tempat_praktik_i', $this->nama_tempat_praktik_i])
            ->andFilterWhere(['like', 'nomor_sip_i', $this->nomor_sip_i])
            ->andFilterWhere(['like', 'nama_gedung_praktik_i', $this->nama_gedung_praktik_i])
            ->andFilterWhere(['like', 'blok_tempat_praktik_i', $this->blok_tempat_praktik_i])
            ->andFilterWhere(['like', 'alamat_tempat_praktik_i', $this->alamat_tempat_praktik_i])
            ->andFilterWhere(['like', 'rt_tempat_praktik_i', $this->rt_tempat_praktik_i])
            ->andFilterWhere(['like', 'rw_tempat_praktik_i', $this->rw_tempat_praktik_i])
            ->andFilterWhere(['like', 'telpon_tempat_praktik_i', $this->telpon_tempat_praktik_i])
            ->andFilterWhere(['like', 'jenis_praktik_ii', $this->jenis_praktik_ii])
            ->andFilterWhere(['like', 'nama_tempat_praktik_ii', $this->nama_tempat_praktik_ii])
            ->andFilterWhere(['like', 'nomor_sip_ii', $this->nomor_sip_ii])
            ->andFilterWhere(['like', 'nama_gedung_praktik_ii', $this->nama_gedung_praktik_ii])
            ->andFilterWhere(['like', 'blok_tempat_praktik_ii', $this->blok_tempat_praktik_ii])
            ->andFilterWhere(['like', 'alamat_tempat_praktik_ii', $this->alamat_tempat_praktik_ii])
            ->andFilterWhere(['like', 'rt_tempat_praktik_ii', $this->rt_tempat_praktik_ii])
            ->andFilterWhere(['like', 'rw_tempat_praktik_ii', $this->rw_tempat_praktik_ii])
            ->andFilterWhere(['like', 'telpon_tempat_praktik_ii', $this->telpon_tempat_praktik_ii]);

        return $dataProvider;
    }
}
