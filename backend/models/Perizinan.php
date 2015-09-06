<?php

namespace backend\models;

use Yii;
use backend\models\base\Perizinan as BasePerizinan;

/**
 * This is the model class for table "perizinan".
 */
class Perizinan extends BasePerizinan {

    public $current;
    public $current_id;
    public $kabupaten_kota;
    public $kecamatan;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'pemohon_id', 'id_groupizin', 'izin_id', 'no_urut', 'petugas_daftar_id', 'lokasi_id', 'jumlah_tahap', 'referrer_id'], 'integer'],
            [['pemohon_id', 'izin_id', 'no_urut', 'tanggal_mohon'], 'required'],
            [['tanggal_mohon', 'tanggal_izin', 'tanggal_expired', 'tanggal_sp_rt_rw', 'tanggal_cek_lapangan', 'tanggal_pertemuan', 'pengambilan_tanggal', 'pengambilan_jam', 'currentProcess'], 'safe'],
            [['status', 'aktif', 'registrasi_urutan', 'status_daftar', 'keterangan'], 'string'],
            [['no_izin', 'berkas_noizin', 'petugas_cek'], 'string', 'max' => 100],
            [['nomor_sp_rt_rw'], 'string', 'max' => 30],
            [['peruntukan'], 'string', 'max' => 150],
            [['nama_perusahaan'], 'string', 'max' => 255],
            [['qr_code'], 'string', 'max' => 50]
        ];
    }

    public function addNew($pid) {
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

    public function getFlows($pid) {
        $connection = \Yii::$app->db;
        $query = $connection->createCommand("select 
	m.id, 
	m.urutan, 
	m.isi as proses, 
	d.isi as dokumen,
	m.pelaksana_id, 
	s.nama as pelaksana 
        from mekanisme_pelayanan m
        left join dokumen_izin d on d.id = m.dokumen_izin_id
        left join pelaksana s on s.id = m.pelaksana_id
        where m.izin_id = :pid and m.aktif = 'Y'
        order by urutan");
        $query->bindValue(':pid', $pid);
        return $query->queryAll();
    }

    public function addProcess($id, $flows) {

//            $transaction = $connection->beginTransaction();
//            try {
        $first = 1;
        foreach ($flows as $value) {
            $proses = new \backend\models\base\PerizinanProses;
            $proses->perizinan_id = $id;
            $proses->mekanisme_pelayanan_id = $value['id'];
            $proses->pelaksana_id = $value['pelaksana_id'];
            $proses->urutan = $value['urutan'];
            if ($first) {
                $proses->active = $first;
                $proses->status = 'Daftar';
//                $proses->tanggal_proses = new \yii\db\Expression('NOW()');
                $proses->isi_dokumen = $value['dokumen'];
            }
            $first = 0;
            $proses->save();
        }
//                $transaction->commit();
//            } catch (\Exception $e) {
//                $transaction->rollBack();
//                throw $e;
//            }
    }
    
    public function getDocs($pid) {
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

    public function addDocuments($id, $docs) {
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
        $this->current = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->urutan;
        $this->current_id = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->id;
       
    }

    public function getTotal() {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')->count();
    }

    public function getFinish() {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Selesai"')->count();
    }

    public function getNew() {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Daftar"')->count();
    }

    public function getRejected() {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Total"')->count();
    }

}
