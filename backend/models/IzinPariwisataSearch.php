<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\IzinPariwisata;

/**
 * backend\models\IzinPariwisataSearch represents the model behind the search form about `backend\models\IzinPariwisata`.
 */
 class IzinPariwisataSearch extends IzinPariwisata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'propinsi_id', 'wilayah_id', 'kecamatan_id', 'kelurahan_id', 'kewarganegaraan_id', 'propinsi_id_perusahaan', 'wilayah_id_perusahaan', 'kecamatan_id_perusahaan', 'kelurahan_id_perusahaan', 'propinsi_id_penanggung_jawab', 'wilayah_id_penanggung_jawab', 'kecamatan_id_penanggung_jawab', 'kelurahan_id_penanggung_jawab', 'kewarganegaraan_id_penanggung_jawab', 'wilayah_id_usaha', 'kecamatan_id_usaha', 'kelurahan_id_usaha', 'jumlah_karyawan', 'intensitas_jasa_perjalanan', 'kapasitas_penyedia_akomodasi', 'jum_kursi_jasa_manum', 'jum_stand_jasa_manum', 'jum_pack_jasa_manum'], 'integer'],
            [['tipe', 'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenkel', 'alamat', 'rt', 'rw', 'kodepos', 'email', 'telepon', 'kitas', 'passport', 'npwp_perusahaan', 'nama_perusahaan', 'nama_gedung_perusahaan', 'blok_perusahaan', 'alamat_perusahaan', 'kodepos_perusahaan', 'telpon_perusahaan', 'fax_perusahaan', 'email_perusahaan', 'nomor_akta_pendirian', 'tanggal_pendirian', 'nama_notaris_pendirian', 'nomor_sk_pengesahan', 'tanggal_pengesahan', 'nomor_akta_cabang', 'tanggal_cabang', 'nama_notaris_cabang', 'keputusan_cabang', 'tanggal_keputusan_cabang', 'identitas_sama', 'nik_penanggung_jawab', 'nama_penanggung_jawab', 'tempat_lahir_penanggung_jawab', 'tanggal_lahir_penanggung_jawab', 'jenkel_penanggung_jawab', 'alamat_penanggung_jawab', 'rt_penanggung_jawab', 'rw_penanggung_jawab', 'kodepos_penanggung_jawab', 'telepon_penanggung_jawab', 'kitas_penanggung_jawab', 'passport_penanggung_jawab', 'no_tdup', 'tanggal_tdup', 'merk_nama_usaha', 'titik_koordinat', 'latitude', 'longtitude', 'nama_gedung_usaha', 'blok_usaha', 'alamat_usaha', 'rt_usaha', 'rw_usaha', 'kodepos_usaha', 'telpon_usaha', 'fax_usaha', 'nomor_objek_pajak_usaha', 'npwpd'], 'safe'],
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
        $query = IzinPariwisata::find();

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
            'propinsi_id_perusahaan' => $this->propinsi_id_perusahaan,
            'wilayah_id_perusahaan' => $this->wilayah_id_perusahaan,
            'kecamatan_id_perusahaan' => $this->kecamatan_id_perusahaan,
            'kelurahan_id_perusahaan' => $this->kelurahan_id_perusahaan,
            'tanggal_pendirian' => $this->tanggal_pendirian,
            'tanggal_pengesahan' => $this->tanggal_pengesahan,
            'tanggal_cabang' => $this->tanggal_cabang,
            'tanggal_keputusan_cabang' => $this->tanggal_keputusan_cabang,
            'tanggal_lahir_penanggung_jawab' => $this->tanggal_lahir_penanggung_jawab,
            'propinsi_id_penanggung_jawab' => $this->propinsi_id_penanggung_jawab,
            'wilayah_id_penanggung_jawab' => $this->wilayah_id_penanggung_jawab,
            'kecamatan_id_penanggung_jawab' => $this->kecamatan_id_penanggung_jawab,
            'kelurahan_id_penanggung_jawab' => $this->kelurahan_id_penanggung_jawab,
            'kewarganegaraan_id_penanggung_jawab' => $this->kewarganegaraan_id_penanggung_jawab,
            'tanggal_tdup' => $this->tanggal_tdup,
            'wilayah_id_usaha' => $this->wilayah_id_usaha,
            'kecamatan_id_usaha' => $this->kecamatan_id_usaha,
            'kelurahan_id_usaha' => $this->kelurahan_id_usaha,
            'jumlah_karyawan' => $this->jumlah_karyawan,
            'intensitas_jasa_perjalanan' => $this->intensitas_jasa_perjalanan,
            'kapasitas_penyedia_akomodasi' => $this->kapasitas_penyedia_akomodasi,
            'jum_kursi_jasa_manum' => $this->jum_kursi_jasa_manum,
            'jum_stand_jasa_manum' => $this->jum_stand_jasa_manum,
            'jum_pack_jasa_manum' => $this->jum_pack_jasa_manum,
        ]);

        $query->andFilterWhere(['like', 'tipe', $this->tipe])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenkel', $this->jenkel])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'kodepos', $this->kodepos])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'kitas', $this->kitas])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'npwp_perusahaan', $this->npwp_perusahaan])
            ->andFilterWhere(['like', 'nama_perusahaan', $this->nama_perusahaan])
            ->andFilterWhere(['like', 'nama_gedung_perusahaan', $this->nama_gedung_perusahaan])
            ->andFilterWhere(['like', 'blok_perusahaan', $this->blok_perusahaan])
            ->andFilterWhere(['like', 'alamat_perusahaan', $this->alamat_perusahaan])
            ->andFilterWhere(['like', 'kodepos_perusahaan', $this->kodepos_perusahaan])
            ->andFilterWhere(['like', 'telpon_perusahaan', $this->telpon_perusahaan])
            ->andFilterWhere(['like', 'fax_perusahaan', $this->fax_perusahaan])
            ->andFilterWhere(['like', 'email_perusahaan', $this->email_perusahaan])
            ->andFilterWhere(['like', 'nomor_akta_pendirian', $this->nomor_akta_pendirian])
            ->andFilterWhere(['like', 'nama_notaris_pendirian', $this->nama_notaris_pendirian])
            ->andFilterWhere(['like', 'nomor_sk_pengesahan', $this->nomor_sk_pengesahan])
            ->andFilterWhere(['like', 'nomor_akta_cabang', $this->nomor_akta_cabang])
            ->andFilterWhere(['like', 'nama_notaris_cabang', $this->nama_notaris_cabang])
            ->andFilterWhere(['like', 'keputusan_cabang', $this->keputusan_cabang])
            ->andFilterWhere(['like', 'identitas_sama', $this->identitas_sama])
            ->andFilterWhere(['like', 'nik_penanggung_jawab', $this->nik_penanggung_jawab])
            ->andFilterWhere(['like', 'nama_penanggung_jawab', $this->nama_penanggung_jawab])
            ->andFilterWhere(['like', 'tempat_lahir_penanggung_jawab', $this->tempat_lahir_penanggung_jawab])
            ->andFilterWhere(['like', 'jenkel_penanggung_jawab', $this->jenkel_penanggung_jawab])
            ->andFilterWhere(['like', 'alamat_penanggung_jawab', $this->alamat_penanggung_jawab])
            ->andFilterWhere(['like', 'rt_penanggung_jawab', $this->rt_penanggung_jawab])
            ->andFilterWhere(['like', 'rw_penanggung_jawab', $this->rw_penanggung_jawab])
            ->andFilterWhere(['like', 'kodepos_penanggung_jawab', $this->kodepos_penanggung_jawab])
            ->andFilterWhere(['like', 'telepon_penanggung_jawab', $this->telepon_penanggung_jawab])
            ->andFilterWhere(['like', 'kitas_penanggung_jawab', $this->kitas_penanggung_jawab])
            ->andFilterWhere(['like', 'passport_penanggung_jawab', $this->passport_penanggung_jawab])
            ->andFilterWhere(['like', 'no_tdup', $this->no_tdup])
            ->andFilterWhere(['like', 'merk_nama_usaha', $this->merk_nama_usaha])
            ->andFilterWhere(['like', 'titik_koordinat', $this->titik_koordinat])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'longtitude', $this->longtitude])
            ->andFilterWhere(['like', 'nama_gedung_usaha', $this->nama_gedung_usaha])
            ->andFilterWhere(['like', 'blok_usaha', $this->blok_usaha])
            ->andFilterWhere(['like', 'alamat_usaha', $this->alamat_usaha])
            ->andFilterWhere(['like', 'rt_usaha', $this->rt_usaha])
            ->andFilterWhere(['like', 'rw_usaha', $this->rw_usaha])
            ->andFilterWhere(['like', 'kodepos_usaha', $this->kodepos_usaha])
            ->andFilterWhere(['like', 'telpon_usaha', $this->telpon_usaha])
            ->andFilterWhere(['like', 'fax_usaha', $this->fax_usaha])
            ->andFilterWhere(['like', 'nomor_objek_pajak_usaha', $this->nomor_objek_pajak_usaha])
            ->andFilterWhere(['like', 'npwpd', $this->npwpd]);

        return $dataProvider;
    }
}
