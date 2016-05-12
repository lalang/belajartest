<?php

namespace backend\models;

use Yii;
use \backend\models\base\IzinPenelitian as BaseIzinPenelitian;

/**
 * This is the model class for table "izin_penelitian".
 */
class IzinPenelitian extends BaseIzinPenelitian
{
    public $kabupaten_kota;
    public $kecamatan;
    public $kelembagaan;
    public $nama_kelurahan;
    public $nama_kecamatan;
    public $nama_kabkota;
    public $id_kelurahan;
    public $id_kecamatan;
    public $id_kabkota;
    public $propinsi = 'DKI Jakarta';
    public $teks_validasi;
    public $teks_sk;
    public $teks_preview;
    public $preview_data;
    public $teks_penolakan;
    public $teks_batal;
    public $total_aktiva;
    public $total_aktiva_tetap;
    public $total_aktiva_lainnya;
    public $total_hutang;
    public $total_kekayaan;
    public $surat_kuasa;
    public $surat_pengurusan;
    public $tanda_register;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perizinan_id', 'izin_id', 'user_id', 'status_id', 'lokasi_id', 'nik','kelurahan_pemohon', 'kecamatan_pemohon', 'kabupaten_pemohon', 'provinsi_pemohon', 'kelurahan_instansi', 'kecamatan_instansi', 'kabupaten_instansi', 'provinsi_instansi', 'kab_penelitian', 'kec_penelitian', 'kel_penelitian', 'anggota'], 'integer'],
            [['tanggal_lahir', 'tgl_mulai_penelitian', 'tgl_akhir_penelitian'], 'safe'],
//            [['nik','nama','kelurahan_pemohon','tgl_mulai_penelitian', 'telepon_instansi','tgl_akhir_penelitian','npwp'
//             ], 'required'],
            ['email_instansi', 'email'],
            [['nama','nik','tempat_lahir', 'email', 'pekerjaan_pemohon', 'email_instansi'], 'string', 'max' => 200],
            [['alamat_pemohon', 'nama_instansi', 'fakultas', 'alamat_instansi', 'tema', 'instansi_penelitian', 'alamat_penelitian', 'bidang_penelitian'], 'string', 'max' => 255],
            [['rt', 'rw', 'kode_pos', 'kodepos_instansi'], 'string', 'max' => 5],
            [['telepon_pemohon', 'telepon_instansi', 'fax_instansi'], 'string', 'max' => 15],
            [['npwp'], 'string', 'max' => 50],
            
        ];
    }
	public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
//            $status = \Yii::$app->session->get('user.status');
            if ($this->isNewRecord) {
                $wewenang = Izin::findOne($this->izin_id)->wewenang_id;

                switch ($wewenang) {
                    case 1:
                        $lokasi = 11;
                        break;
                    case 2:
                        $lokasi = $this->wilayah_id;
                        break;
                    case 3:
                        $lokasi = $this->kecamatan_id;
                        break;
                    case 4:
                        $lokasi = $this->kelurahan_id;
                        break;
                    default:
                        $lokasi = 11;
                }

                $pid = Perizinan::addNew($this->izin_id, $this->status_id, $lokasi);

                $this->perizinan_id = $pid;
                $this->lokasi_id = $lokasi;
            } else {
                $wewenang = Izin::findOne($this->izin_id)->wewenang_id;
                switch ($wewenang) {
                        case 1:
                            $lokasi = 11;
                            break;
                        case 2:
                            $lokasi = $this->wilayah_id;
                            break;
                        case 3:
                            $lokasi = $this->kecamatan_id;
                            break;
                        case 4:
                            $lokasi = $this->kelurahan_id;
                            break;
                        default:
                            $lokasi = 11;
                }
            $this->lokasi_id = $lokasi;
            $perizinan = Perizinan::findOne(['id' => $this->perizinan_id]);
            $perizinan->lokasi_izin_id = $lokasi;
//            $perizinan->tanggal_mohon = date("Y-m-d H:i:s");
            $perizinan->save();
            }
            
            return true;
        } else {
            return false;
        }
    }
    public function afterFind() {
        parent::afterFind();
        $izin = Izin::findOne($this->izin_id);
        $perizinan = Perizinan::findOne($this->perizinan_id);
        
    }
}
