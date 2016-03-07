<?php

namespace backend\models;

use Yii;
use backend\models\base\Perizinan as BasePerizinan;
use backend\models\PerizinanProses;

/**
 * This is the model class for table "perizinan".
 */
class Perizinan extends BasePerizinan {

    public $current_no;
    public $current_id;
    public $current_process;
    public $mulai_process;
    public $current_action;
    public $kabupaten_kota;
    public $kecamatan;
    public $processes;
    public $steps;
    public $lokasi_pengambilan_id_baru;
    public $opsi_pengambilan;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['parent_id', 'pengesah_id', 'plh_id', 'status_id', 'pemohon_id', 'id_groupizin', 'izin_id', 'petugas_daftar_id', 'lokasi_izin_id', 'lokasi_pengambilan_id', 'jumlah_tahap', 'referrer_id'], 'integer'],
            [['pemohon_id', 'izin_id', 'tanggal_mohon'], 'required'],
            [['tanggal_mohon', 'tanggal_izin', 'tanggal_expired', 'tanggal_sp_rt_rw', 'tanggal_cek_lapangan', 'tanggal_pertemuan', 'pengambilan_tanggal', 'pengambilan_sesi', 'currentProcess'], 'safe'],
            [['status', 'aktif', 'registrasi_urutan', 'status_daftar', 'keterangan', 'opsi_pengambilan'], 'string'],
            [['no_izin', 'berkas_noizin', 'petugas_cek'], 'string', 'max' => 100],
            [['nomor_sp_rt_rw'], 'string', 'max' => 30],
            [['peruntukan'], 'string', 'max' => 150],
            [['nama_perusahaan'], 'string', 'max' => 255],
            [['qr_code'], 'string', 'max' => 50],
            [['kode_registrasi'], 'string', 'max' => 6]
        ];
    }

    public static function addNew($pid, $status, $lokasi) {
        $model = new \backend\models\base\Perizinan;
        $model->pemohon_id = Yii::$app->user->id;
        $model->izin_id = $pid;
        $model->lokasi_izin_id = $lokasi;
        $model->status_id = $status;

        $rand = self::generate(6);
        while (Perizinan::findOne(['kode_registrasi' => $rand]) != null) {
            $rand = self::generate(6);
        }

        $model->kode_registrasi = $rand;

//        $model->no_urut = 1;
//        $model->tanggal_mohon = new \yii\db\Expression('NOW()');
        $model->tanggal_mohon = date("Y-m-d H:i:s");
        $model->status = 'Daftar';

        $flows = self::getFlows($pid);

        $files = self::getFiles($pid);

        $docs = self::getDocs($pid);

        $model->jumlah_tahap = count($flows);
        $model->save();

        self::addProcess($model->id, $flows);
        self::addDocuments($model->id, $docs);
        self::addFiles($model->id, $files);
        return $model->id;
    }

    public static function getFlows($pid) {
        $connection = \Yii::$app->db;
        $query = $connection->createCommand("select 
	s.id, 
	s.urutan, 
	s.nama_sop,
	s.deskripsi_sop, 
	s.pelaksana_id, 
	a.nama as action,
	i.template_sk as dokumen
        from sop s
        left join izin i on i.id = s.izin_id
        left join sop_action a on a.id = s.action_id
        left join pelaksana p on p.id = s.pelaksana_id
        where s.izin_id = :pid and s.aktif = 'Y'
        order by urutan");
        $query->bindValue(':pid', $pid);
//        $query->bindValue(':status', $status);
        return $query->queryAll();
    }

    public static function addProcess($id, $flows) {

//            $transaction = $connection->beginTransaction();
//            try {
        $first = 1;
//        $perizinan = Perizinan::findOne($id);
        //$template_sk = self::getTemplateSK($perizinan->izin_id, $perizinan->referrer_id);
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

    public static function getFiles($pid) {
        $connection = \Yii::$app->db;
        $query = $connection->createCommand("select
                    d.id,
                    d.urutan
                from berkas_izin d
                left join izin i on i.id = d.izin_id
                where d.izin_id = :pid and d.aktif = 'Y'
                order by urutan, d.id");
        $query->bindValue(':pid', $pid);
        $files = $query->queryAll();
        return $files;
    }

    public static function addFiles($id, $files) {
        foreach ($files as $value) {
            $file = new \backend\models\base\PerizinanBerkas;
            $file->perizinan_id = $id;
            $file->berkas_izin_id = $value['id'];
            $file->urutan = $value['urutan'];
            $file->save();
        }
    }

    public function afterFind() {
        $this->current_no = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->urutan;
        $this->current_id = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->id;
        $this->current_action = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->action;
        $this->current_process = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->nama_sop;
        $this->mulai_process = \backend\models\PerizinanProses::findOne(['active' => 1, 'perizinan_id' => $this->id])->mulai;
        $processes = $this->perizinanProses;
        foreach ($processes as $value) {
            $this->processes .= $value->nama_sop . '<br>(' . $value->pelaksana->nama . '),';
            $this->steps .= $value->urutan . ',';
        }
        $this->processes = rtrim($this->processes, ",");
        $this->steps = rtrim($this->steps, ",");
    }

    public static function getTemplateSK($izin, $id) {
        $izin = Izin::findOne($izin);
        $statusIzin = Perizinan::findOne($id)->status;
        switch ($izin->action) {
            case 'izin-siup':
                if ($statusIzin == 'Berkas Tolak Siap') {
                    $teks_sk = IzinSiup::findOne($id)->teks_penolakan;
                } elseif ($statusIzin == 'Berkas Siap') {
                    $teks_sk = IzinSiup::findOne($id)->teks_sk;
                } else {
                    $teks_sk = IzinSiup::findOne($id)->teks_sk;
                }

                break;
            case 'tdp':
                $teks_sk = IzinSiup::findOne($id)->teks_sk;
                break;
        }
        return $teks_sk;
    }

    public static function getTotal() {
        return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
    }

    public static function getBatal() {
       if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer'))
       {
           return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Batal"')->count();
       }
       else 
       {
           return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Batal" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
       }
        
    }

    public static function getFinish() {
      if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer'))
      {
        return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Selesai"')->count();  
      }
      else
      {
          return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Selesai" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
      }
        
    }

    public static function getFinishTolak() {
         if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer'))
         {
          return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Tolak Selesai"')->count();   
         }
        else 
        {
            return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Tolak Selesai" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
        }
        
    }

    public static function getTolakAll() {
         if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer'))
         {
             return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Tolak"')->count(); 
         }
        else 
        {
              return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Tolak" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
        }
      
    }

    public static function getNew() {
        return Perizinan::find()->joinWith(['izin', 'currentProcess'])
                        ->andWhere('perizinan_proses.action = "registrasi"')
                        ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)
                        ->andWhere('lokasi_pengambilan_id <> ""')
                        ->andWhere('pengambilan_tanggal <> ""')
                        ->count();
    }

    public static function getTechnical() {
        if (Yii::$app->user->identity->pelaksana_id) {
            
        } elseif (Yii::$app->user->identity->pelaksana_id) {
            
        }
        return Perizinan::find()->joinWith(['izin', 'currentProcess'])
                        ->andWhere('perizinan_proses.action = "cek-form"')
                        ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)
                        ->andWhere('perizinan_proses.pelaksana_id = ' . Yii::$app->user->identity->pelaksana_id)->count();
    }

    public static function getApproval($plh_id) {
        
        if($plh_id == ''){
            return Perizinan::find()->joinWith(['izin', 'currentProcess'])->andWhere('perizinan_proses.action = "approval"')->andWhere('perizinan.status = "lanjut"')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
        } else {
            return 0;
        }
        
    }
    
    public static function getApprovalPLH($user_lokasi) {
      
        return Perizinan::find()->joinWith(['izin', 'currentProcess'])
                ->andWhere('perizinan_proses.action = "approval"')
                ->andWhere('perizinan.status = "lanjut"')
                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . $user_lokasi)
                ->count();
         
//        return Perizinan::find()->joinWith(['izin', 'currentProcess'])->andWhere('perizinan_proses.action = "approval"')->andWhere('perizinan.status = "lanjut"')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
    }

    public static function getTolak($plh_id) {
        if($plh_id == ''){
            return Perizinan::find()->joinWith(['izin', 'currentProcess'])->andWhere('perizinan_proses.action = "approval"')->andWhere('perizinan.status = "tolak"')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
        } else {
            return 0;
        }
        
    }
    
    public static function getTolakPLH($user_lokasi) {
        
        return Perizinan::find()->joinWith(['izin', 'currentProcess'])
                ->andWhere('perizinan_proses.action = "approval"')
                ->andWhere('perizinan.status = "tolak"')
                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . $user_lokasi)
                ->count();
        
//        return Perizinan::find()->joinWith(['izin', 'currentProcess'])->andWhere('perizinan_proses.action = "approval"')->andWhere('perizinan.status = "tolak"')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
    }

    public static function getRevisi() {
         if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer'))
         {
             return Perizinan::find()->joinWith('izin')
                ->andWhere('lokasi_pengambilan_id <> ""')
                ->andWhere('pengambilan_tanggal <> ""')
                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Revisi"')->count();
         }
         else{
                return Perizinan::find()->joinWith('izin')
                ->andWhere('lokasi_pengambilan_id <> ""')
                ->andWhere('pengambilan_tanggal <> ""')
                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Revisi" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
            }
    
         }

    public static function getInNew() {
        if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer'))
        {
            return Perizinan::find()->joinWith('izin')
                ->andWhere('lokasi_pengambilan_id <> ""')
                ->andWhere('pengambilan_tanggal <> ""')
                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Daftar"')->count();

        } else {
                return Perizinan::find()->joinWith('izin')
                ->andWhere('lokasi_pengambilan_id <> ""')
                ->andWhere('pengambilan_tanggal <> ""')
                ->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Daftar" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
        }
    }

    public static function getInProses() {
        if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer'))
        {
             return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                        ->andWhere('status <> "Selesai" ')
                        ->andWhere('status <> "Daftar" ')
                        ->andWhere('status <> "Tolak" ')
                        ->andWhere('status <> "Revisi" ')
                        ->andWhere('status <> "Batal" ')
                        ->andWhere('status <> "Tolak Selesai" ')
                        ->andWhere('lokasi_pengambilan_id <> ""')
                        ->andWhere('pengambilan_tanggal <> ""')
                        ->count();
        }else{
        return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                        ->andWhere('status <> "Selesai" ')
                        ->andWhere('status <> "Daftar" ')
                        ->andWhere('status <> "Tolak" ')
                        ->andWhere('status <> "Revisi" ')
                        ->andWhere('status <> "Batal" ')
                        ->andWhere('status <> "Tolak Selesai" ')
                        ->andWhere('lokasi_pengambilan_id <> ""')
                        ->andWhere('pengambilan_tanggal <> ""')
                        ->andWhere('izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id)
                        ->andWhere('perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
        }
    }

    public static function getVerified() {
        return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                        ->andWhere('status = "Verifikasi" or status = "Berkas Siap"')
//                        ->andWhere('izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id )
                        ->andWhere('perizinan.lokasi_pengambilan_id = ' . Yii::$app->user->identity->lokasi_id)->count();
    }

    public static function getVerifiedTolak() {
        return Perizinan::find()->joinWith('izin')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month)')
                        ->andWhere('status = "Verifikasi Tolak" or status = "Berkas Tolak Siap"')
                        ->andWhere('perizinan.lokasi_pengambilan_id = ' . Yii::$app->user->identity->lokasi_id)->count();
    }

    //Get Count Jika Perijinan Daftar
    public static function getNewPerUser($id) {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Daftar" and pemohon_id=' . $id)->count();
    }

    //Get Count Jika Perijinan Verifikasi
    public static function getVerifikasiPerUser($id) {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Verifikasi" and pemohon_id=' . $id)->count();
    }

    //Get Count Jika Perijinan Selesai
    public static function getSelesaiPerUser($id) {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and (status = "Selesai" or status = "Tolak Selesai" or status = "Batal") and pemohon_id=' . $id)->count();
    }

    //Get Count Jika Perijinan Selesai
    public static function getTolakPerUser($id) {
        return Perizinan::find()->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and status = "Tolak" and pemohon_id=' . $id)->count();
    }

    //Get Count Jika Perijinan Aktif
    public static function getAktifPerUser($id) {
        return Perizinan::find()->andWhere('tanggal_expired >= DATE_SUB(now(), INTERVAL 1 month) and status = "Selesai" and pemohon_id=' . $id)->count();
    }

    //Get Count Jika Perijinan NonAktif
    public static function getNonAktifPerUser($id) {

        return Perizinan::find()->andWhere('tanggal_expired < DATE_SUB(now(), INTERVAL 1 month) and status = "Selesai" and pemohon_id=' . $id)->count();
    }

    public static function getDeclined() {
        return Perizinan::find()->joinWith(['izin', 'currentProcess'])->andWhere('perizinan_proses.action = "cetak"')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Tolak" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
    }

    public static function getApproved() {
        return Perizinan::find()->joinWith(['izin', 'currentProcess'])->andWhere('perizinan_proses.action = "cetak"')->andWhere('tanggal_mohon > DATE_SUB(now(), INTERVAL 1 month) and perizinan.status = "Lanjut" and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
    }

    public static function getETA($tanggal, $durasi, $lokasi) {
        // mengambil indeks hari (0=Minggu, 6=Sabtu)
        $hari_izin = date('w', strtotime($tanggal));
        $start_date = new \DateTime($tanggal);
        $total_durasi = $durasi + $lokasi + \backend\models\HariLibur::find()->where("tanggal between '" . date('Y-m-d', strtotime($tanggal)) . "' and DATE_ADD('" . date('Y-m-d', strtotime($tanggal)) . "', INTERVAL " . $durasi . " DAY)")->count();
//        echo $total_durasi;
        if (strtotime(date('H:i:s', strtotime($tanggal))) > strtotime('12:00:00') && ($hari_izin > 0 && $hari_izin < 6)) {
            // Jika di atas jam 12 dan di hari kerja, maka tambahkan 1 hari kerja
            date_add($start_date, date_interval_create_from_date_string(($total_durasi + 1) . " days"));
        } else if ($hari_izin == 0) {
            // Jika hari minggu, maka tambahkan 1 hari kerja
            date_add($start_date, date_interval_create_from_date_string(($total_durasi + 1) . " days"));
        } else if ($hari_izin == 6) {
            // Jika hari sabtu, maka tambahkan 2 hari kerja
            date_add($start_date, date_interval_create_from_date_string(($total_durasi + 2) . " days"));
        } else {
            // jika tidak, cukup tambah durasi saja
            date_add($start_date, date_interval_create_from_date_string(($total_durasi) . " days"));
        }

        $hari_pengambilan = date_format($start_date, "w");
        // jika melewati hari sabtu minggu atau pas sabtu minggu, tambah 2 hari
        if (($hari_pengambilan < $hari_izin) || ($hari_pengambilan == 6) || ($hari_pengambilan == 0)) {
            date_add($start_date, date_interval_create_from_date_string("2 days"));
        }
        date_format($start_date, "d-m-Y");
        return $start_date;
    }

    public static function getExpired($tanggal, $durasi, $satuan) {
        // mengambil indeks hari (0=Minggu, 6=Sabtu)
        switch ($satuan) {
            case 'Tahun':
                $interval = ' years';
                break;
            case 'Bulan':
                $interval = ' months';
                break;
            default:
                $interval = ' days';
                break;
        }
        $expired = new \DateTime($tanggal);
        date_add($expired, date_interval_create_from_date_string($durasi . $interval));
//        date_format($expired, "d-m-Y");
        return $expired;
    }

    public static function getKuota($tanggal, $lokasi, $sesi) {
        $connection = \Yii::$app->db;
        $query = $connection->createCommand("select count(id) from perizinan
            where date(tanggal_mohon) = :tanggal and lokasi_izin_id = :lokasi and pengambilan_sesi = :sesi");
        $query->bindValue(':tanggal', $tanggal);
        $query->bindValue(':lokasi', $lokasi);
        $query->bindValue(':sesi', $sesi);
        return $query->queryScalar();
    }

    public static function getNoIzin($izin, $lokasi, $status) {
        $connection = \Yii::$app->db;
        switch ($status) {
            case 'Lanjut':
                $query = $connection->createCommand("select no_izin + 1 from no_izin
            where lokasi_id = :lokasi and izin_id = :izin order by id desc");
                $query->bindValue(':izin', $izin);
                break;
            case 'Tolak':
                $query = $connection->createCommand("select no_izin + 1 from no_penolakan
            where lokasi_id = :lokasi order by id desc");
                break;
        }
        $query->bindValue(':lokasi', $lokasi);
        return $query->queryScalar();
    }

    public static function generate($length) {
        $sets = [
            'ABCDEFGHJKMNPQRSTUVWXYZ',
            '1234567890',
        ];
        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++) {
            $password .= $all[array_rand($all)];
        }
        $password = str_shuffle($password);
        return $password;
    }
//-------------- dashboard admin---
    public static function getDataPerizinanAdmin() {
        $lokasi = Lokasi::findOne(Yii::$app->user->identity->lokasi_id);
        $connection = \Yii::$app->db;
        
                  $sql = "SELECT CONCAT(l.nama, (CASE l.kecamatan WHEN '00' THEN '' ELSE 
	(CASE LEFT(l.kelurahan,1) WHEN '0' THEN '- KECAMATAN' WHEN '1' THEN '- KELURAHAN' ELSE '' END) END)
	) as nama, l.id
, (SELECT COUNT(*) FROM perizinan p WHERE p.status = 'daftar' AND lokasi_pengambilan_id <> '' AND pengambilan_tanggal <> '' AND p.lokasi_izin_id = l.id) AS baru 
, (SELECT COUNT(*) FROM perizinan p WHERE p.status in ('proses','lanjut','berkas siap', 'verifikasi', 'verifikasi tolak', 'berkas tolak siap' ) AND p.lokasi_izin_id = l.id) AS proses 
, (SELECT COUNT(*) FROM perizinan p WHERE p.status = 'revisi' AND p.lokasi_izin_id = l.id) AS revisi 
, (SELECT COUNT(*) FROM perizinan p WHERE (p.status = 'selesai' OR p.status = 'batal' OR p.status = 'tolak selesai') AND p.lokasi_izin_id = l.id) AS selesai 
 FROM lokasi l WHERE l.propinsi = '31'
        ";
                
//        echo $sql;
//        die();
        $query = $connection->createCommand($sql);
        return $query->queryAll();
    }
//-------------- dashboard kepala---
    public static function getDataPerizinan() {
        $lokasi = Lokasi::findOne(Yii::$app->user->identity->lokasi_id);
        $connection = \Yii::$app->db;
        switch (Yii::$app->user->identity->wewenang_id) {
            case 1:
                $sql = "SELECT CONCAT(l.nama, (CASE l.kecamatan WHEN '00' THEN '' ELSE 
	(CASE LEFT(l.kelurahan,1) WHEN '0' THEN '- KECAMATAN' WHEN '1' THEN '- KELURAHAN' ELSE '' END) END)
	) as nama, l.id
, (SELECT COUNT(*) FROM perizinan p WHERE p.status = 'daftar' AND lokasi_pengambilan_id <> '' AND pengambilan_tanggal <> '' AND p.lokasi_izin_id = l.id) AS baru 
, (SELECT COUNT(*) FROM perizinan p WHERE p.status in ('proses','lanjut','berkas siap', 'verifikasi', 'verifikasi tolak', 'berkas tolak siap' ) AND p.lokasi_izin_id = l.id) AS proses 
, (SELECT COUNT(*) FROM perizinan p WHERE p.status = 'revisi' AND p.lokasi_izin_id = l.id) AS revisi 
, (SELECT COUNT(*) FROM perizinan p WHERE (p.status = 'selesai' OR p.status = 'batal' OR p.status = 'tolak selesai') AND p.lokasi_izin_id = l.id) AS selesai 
 FROM lokasi l WHERE l.propinsi = " . $lokasi->propinsi . "
        ";
                break;

            case 2:
                $sql = "SELECT CONCAT(l.nama, (CASE l.kecamatan WHEN '00' THEN '' ELSE 
	(CASE LEFT(l.kelurahan,1) WHEN '0' THEN '- KECAMATAN' WHEN '1' THEN '- KELURAHAN' ELSE '' END) END)
	) as nama, l.id
, (SELECT COUNT(*) FROM perizinan p WHERE p.status = 'daftar' AND lokasi_pengambilan_id <> '' AND pengambilan_tanggal <> '' AND p.lokasi_izin_id = l.id) AS baru 
, (SELECT COUNT(*) FROM perizinan p WHERE p.status in ('proses','lanjut','berkas siap', 'verifikasi', 'verifikasi tolak', 'berkas tolak siap' ) AND p.lokasi_izin_id = l.id) AS proses 
, (SELECT COUNT(*) FROM perizinan p WHERE p.status = 'revisi' AND p.lokasi_izin_id = l.id) AS revisi 
, (SELECT COUNT(*) FROM perizinan p WHERE (p.status = 'selesai' OR p.status = 'batal' OR p.status = 'tolak selesai') AND p.lokasi_izin_id = l.id) AS selesai 
 FROM lokasi l WHERE l.propinsi = " . $lokasi->propinsi . " and kabupaten_kota=" . $lokasi->kabupaten_kota . "
        ";
                break;
            case 3:
                $sql = "SELECT CONCAT(l.nama, (CASE l.kecamatan WHEN '00' THEN '' ELSE 
	(CASE LEFT(l.kelurahan,1) WHEN '0' THEN '- KECAMATAN' WHEN '1' THEN '- KELURAHAN' ELSE '' END) END)
	) as nama, l.id
, (SELECT COUNT(*) FROM perizinan p WHERE p.status = 'daftar' AND lokasi_pengambilan_id <> '' AND pengambilan_tanggal <> '' AND p.lokasi_izin_id = l.id) AS baru 
, (SELECT COUNT(*) FROM perizinan p WHERE p.status in ('proses','lanjut','berkas siap', 'verifikasi', 'verifikasi tolak', 'berkas tolak siap' ) AND p.lokasi_izin_id = l.id) AS proses 
, (SELECT COUNT(*) FROM perizinan p WHERE p.status = 'revisi' AND p.lokasi_izin_id = l.id) AS revisi 
, (SELECT COUNT(*) FROM perizinan p WHERE (p.status = 'selesai' OR p.status = 'batal' OR p.status = 'tolak selesai') AND p.lokasi_izin_id = l.id) AS selesai 
FROM lokasi l WHERE l.propinsi = " . $lokasi->propinsi . " and kabupaten_kota=" . $lokasi->kabupaten_kota . "
        and kecamatan=" . $lokasi->kecamatan . " ";
                break;
            case 4:
                $sql = "SELECT CONCAT(l.nama, (CASE l.kecamatan WHEN '00' THEN '' ELSE 
	(CASE LEFT(l.kelurahan,1) WHEN '0' THEN '- KECAMATAN' WHEN '1' THEN '- KELURAHAN' ELSE '' END) END)
	) as nama, l.id
, (SELECT COUNT(*) FROM perizinan p WHERE p.status = 'daftar' AND lokasi_pengambilan_id <> '' AND pengambilan_tanggal <> '' AND p.lokasi_izin_id = l.id) AS baru 
, (SELECT COUNT(*) FROM perizinan p WHERE p.status in ('proses','lanjut','berkas siap', 'verifikasi', 'verifikasi tolak', 'berkas tolak siap' ) AND p.lokasi_izin_id = l.id) AS proses 
, (SELECT COUNT(*) FROM perizinan p WHERE p.status = 'revisi' AND p.lokasi_izin_id = l.id) AS revisi 
, (SELECT COUNT(*) FROM perizinan p WHERE (p.status = 'selesai' OR p.status = 'batal' OR p.status = 'tolak selesai') AND p.lokasi_izin_id = l.id) AS selesai 
  FROM lokasi l WHERE l.propinsi = " . $lokasi->propinsi . " and kabupaten_kota=" . $lokasi->kabupaten_kota . "
        and kecamatan=" . $lokasi->kecamatan . " and kelurahan=" . $lokasi->kelurahan . "";
                break;
        }
        $query = $connection->createCommand($sql);
        return $query->queryAll();
    }

    public static function getEtaRed() {

        $lokasi = \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);
    if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer')){
        
         $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0')
                       
                        ->count();
    }else{
        switch (Yii::$app->user->identity->wewenang_id) {
            case 1:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->count();
                break;
            case 2 :
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->count();
                break;
            case 3:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                        ->count();
                break;
            case 4:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) < 0')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                        ->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan])
                        ->count();
                break;
        }
    }
//    die($query);
        return $query;

        //return Perizinan::find()->joinWith('izin')->andWhere('status <> "Selesai" and DATEDIFF(pengambilan_tanggal,DATE(now())) < 1 and izin.wewenang_id=' . Yii::$app->user->identity->wewenang_id . ' and perizinan.lokasi_izin_id = ' . Yii::$app->user->identity->lokasi_id)->count();
    }

    public static function getEtaYellow() {

        $lokasi = \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);
if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer')){
     $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                        
                        ->count();
}else{
        switch (Yii::$app->user->identity->wewenang_id) {
            case 1:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->count();
                break;
            case 2 :
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->count();
                break;
            case 3:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                        ->count();
                break;
            case 4:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('(DATEDIFF(pengambilan_tanggal,DATE(now())) = 1 or DATEDIFF(pengambilan_tanggal,DATE(now())) = 0 )')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                        ->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan])
                        ->count();
                break;
        }
}
        return $query;
    }

    public static function getEtaGreen() {

        $lokasi = \backend\models\Lokasi::findOne(Yii::$app->user->identity->lokasi_id);

     if(Yii::$app->user->can('Administrator') || Yii::$app->user->can('webmaster') || Yii::$app->user->can('Viewer')){
     $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                        
                        ->count();
}else{
        switch (Yii::$app->user->identity->wewenang_id) {
            case 1:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->count();
                break;
            case 2 :
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->count();
                break;
            case 3:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                        ->count();
                break;
            case 4:
                $query = Perizinan::find()->innerJoin('lokasi', 'perizinan.lokasi_izin_id = lokasi.id')
                        ->andWhere('status <> "Selesai"')
                        ->andWhere('perizinan.status <> "Batal"')
                        ->andWhere('perizinan.status <> "Tolak Selesai"')
                        ->andWhere('DATEDIFF(pengambilan_tanggal,DATE(now())) > 1')
                        ->andWhere(['lokasi.propinsi' => $lokasi->propinsi])
                        ->andWhere(['lokasi.kabupaten_kota' => $lokasi->kabupaten_kota])
                        ->andWhere(['lokasi.kecamatan' => $lokasi->kecamatan])
                        ->andWhere(['lokasi.kelurahan' => $lokasi->kelurahan])
                        ->count();
                break;
        }
}
        return $query;
    }

}