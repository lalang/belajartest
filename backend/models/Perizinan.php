<?php

namespace backend\models;

use Yii;
use backend\models\base\Perizinan as BasePerizinan;

/**
 * This is the model class for table "perizinan".
 */
class Perizinan extends BasePerizinan {

    public $current_no;
    public $current_id;
    public $current_process;
    public $current_action;
    public $kabupaten_kota;
    public $kecamatan;
    public $processes;
    public $steps;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'pemohon_id', 'id_groupizin', 'izin_id', 'no_urut', 'petugas_daftar_id', 'lokasi_id', 'jumlah_tahap', 'referrer_id'], 'integer'],
            [['pemohon_id', 'izin_id', 'no_urut', 'tanggal_mohon'], 'required'],
            [['tanggal_mohon', 'tanggal_izin', 'tanggal_expired', 'tanggal_sp_rt_rw', 'tanggal_cek_lapangan', 'tanggal_pertemuan', 'pengambilan_tanggal', 'pengambilan_sesi', 'currentProcess'], 'safe'],
            [['status', 'aktif', 'registrasi_urutan', 'status_daftar', 'keterangan'], 'string'],
            [['no_izin', 'berkas_noizin', 'petugas_cek'], 'string', 'max' => 100],
            [['nomor_sp_rt_rw'], 'string', 'max' => 30],
            [['peruntukan'], 'string', 'max' => 150],
            [['nama_perusahaan'], 'string', 'max' => 255],
            [['qr_code'], 'string', 'max' => 50],
            [['kode_registrasi'], 'string', 'max' => 6]
        ];
    }

    public static function addNew($pid) {
        $model = new \backend\models\base\Perizinan;
        $model->pemohon_id = Yii::$app->user->id;
        $model->izin_id = $pid;
//        $model->no_identitas = '123';
        $model->no_urut = 1;
        $model->tanggal_mohon = new \yii\db\Expression('NOW()');
        $model->status = 'Daftar';

        $flows = self::getFlows($pid);

        $docs = self::getDocs($pid);

        $model->jumlah_tahap = count($flows);
        $model->save();

        self::addProcess($model->id, $flows);
        self::addDocuments($model->id, $docs);
        return $model->id;
    }

    public static function getFlows($pid) {
        $connection = \Yii::$app->db;
        $query = $connection->createCommand("select 
	s.id, 
	s.urutan, 
	s.nama_sop,
	s.deskripsi_sop, 
	d.isi as dokumen,
	s.pelaksana_id, 
	s.action
        from sop s
        left join izin i on i.id = s.izin_id
        left join dokumen_izin d on d.izin_id = i.id and posisi_dokumen = 'Perizinan'
        left join pelaksana p on p.id = s.pelaksana_id
        where s.izin_id = :pid and s.aktif = 'Y'
        order by urutan");
        $query->bindValue(':pid', $pid);
        return $query->queryAll();
    }

    public static function addProcess($id, $flows) {

//            $transaction = $connection->beginTransaction();
//            try {
        $first = 1;
        foreach ($flows as $value) {
            $proses = new \backend\models\base\PerizinanProses;
            $proses->perizinan_id = $id;
            $proses->sop_id = $value['id'];
            $proses->urutan = $value['urutan'];
            $proses->pelaksana_id = $value['pelaksana_id'];
            $proses->nama_sop = $value['nama_sop'];
            $proses->deskripsi_sop = $value['deskripsi_sop'];
            $proses->action = $value['action'];
            if ($first) {
                $proses->active = $first;
                $proses->status = 'Daftar';
            } else {
                $proses->status = null;
            }
            $proses->dokumen = $value['dokumen'];
            $first = 0;
            $proses->save();
        }
//                $transaction->commit();
//            } catch (\Exception $e) {
//                $transaction->rollBack();
//                throw $e;
//            }
    }

    public static function getDocs($pid) {
        $connection = \Yii::$app->db;
        $query = $connection->createCommand("select 
                    d.id, 
                    d.urutan, 
                    d.isi,
                    d.tipe
                from dokumen_pendukung d
                left join izin i on i.id = d.izin_id
                where d.izin_id = :pid and d.aktif = 'Y' and d.kategori = 'Persyaratan Izin'
                order by urutan, d.id");
        $query->bindValue(':pid', $pid);
        $docs = $query->queryAll();
        return $docs;
    }

    public static function addDocuments($id, $docs) {
//            $transaction = $connection->beginTransaction();
//            try {
        foreach ($docs as $value) {
            $dok = new \backend\models\base\PerizinanDokumen;
            $dok->perizinan_id = $id;
            $dok->dokumen_pendukung_id = $value['id'];
            $dok->urutan = $value['urutan'];
            $dok->isi = $value['isi'];
            $dok->save();
        }
//                $transaction->commit();
//            } catch (\Exception $e) {
//                $transaction->rollBack();
//                throw $e;
//            }
    }

    public function afterFind() {
        $this->current_no = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->urutan;
        $this->current_id = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->id;
        $this->current_action = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->action;
        $this->current_process = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->nama_sop;
        $processes = $this->perizinanProses;
        foreach ($processes as $value) {
            $this->processes .= $value->nama_sop . ',';
            $this->steps .= $value->urutan . ',';
        }
        $this->processes = rtrim($this->processes, ",");
        $this->steps = rtrim($this->steps, ",");
    }

    public static function getTotal() {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')->count();
    }

    public static function getFinish() {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Selesai"')->count();
    }

    public static function getNew() {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Daftar"')->count();
    }

    public function getNewPerUser($id) {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Daftar" and pemohon_id=' . $id)->count();
    }

    public static function getRejected() {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Total"')->count();
    }

    public function getKuota($tanggal, $lokasi, $sesi) {
        $connection = \Yii::$app->db;
        $query = $connection->createCommand("select count(id) from perizinan
            where date(tanggal_mohon) = :tanggal and lokasi_id = :lokasi and pengambilan_sesi = :sesi");
        $query->bindValue(':tanggal', $tanggal);
        $query->bindValue(':lokasi', $lokasi);
        $query->bindValue(':sesi', $sesi);
        return $query->queryScalar();
    }

    public function getNoIzin($izin, $lokasi) {
        $connection = \Yii::$app->db;
        $query = $connection->createCommand("select count(id) + 1 from perizinan
            where lokasi_id = :lokasi and izin_id = :izin");
        $query->bindValue(':lokasi', $lokasi);
        $query->bindValue(':izin', $izin);
        return $query->queryScalar();
    }

    public function beforeSave($insert) {
        if (parent::beforeSave($insert)) {
            $rand = Yii::$app->getSecurity()->generateRandomString(6);
            while (Perizinan::findOne(['kode_registrasi' => $rand]) != null) {
                $rand = Yii::$app->getSecurity()->generateRandomString(6);
            }
            $this->kode_registrasi = $rand;
            return true;
        } else {
            return false;
        }
    }

}
