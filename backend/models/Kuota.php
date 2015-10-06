<?php

namespace backend\models;

use Yii;
use \backend\models\base\Kuota as BaseKuota;
use \backend\models\Lokasi;

/**
 * This is the model class for table "kuota".
 */
class Kuota extends BaseKuota
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lokasi_id'], 'required'],
            [['lokasi_id', 'sesi_1_kuota', 'sesi_2_kuota', 'sesi_3_kuota'], 'integer'],
            [['sesi_1_mulai', 'sesi_1_selesai', 'sesi_2_mulai', 'sesi_2_selesai', 'sesi_3_mulai', 'sesi_3_selesai'], 'safe']
        ];
    }
    
    public static function getKuotaList($lokasi_id, $wewenang_id, $tanggal) {
        $lokasi = Lokasi::findOne($lokasi_id);
        switch ($wewenang_id) {
            case 1:
                $sql = "select k.lokasi_id, l.nama, k.sesi_1_kuota, k.sesi_1_mulai, k.sesi_1_selesai,k.sesi_2_kuota, k.sesi_2_mulai, k.sesi_2_selesai, p1.jumlah as sesi_1_terpakai, p2.jumlah as sesi_2_terpakai  from kuota k
left join lokasi l on l.id = k.lokasi_id
left join vw_jumlah_reservasi p1 on p1.lokasi_pengambilan_id = k.lokasi_id and p1.pengambilan_sesi = 'Sesi I' and p1.pengambilan_tanggal = '".$tanggal."'
left join vw_jumlah_reservasi p2 on p2.lokasi_pengambilan_id = k.lokasi_id and p2.pengambilan_sesi = 'Sesi II' and p2.pengambilan_tanggal = '".$tanggal."'
                        where lokasi_id in (
                            select id from lokasi where propinsi = 31 and kecamatan = 00
                        )";
                break;
            case 2:
                $sql = "select k.lokasi_id, l.nama, k.sesi_1_kuota, k.sesi_1_mulai, k.sesi_1_selesai,k.sesi_2_kuota, k.sesi_2_mulai, k.sesi_2_selesai, p1.jumlah as sesi_1_terpakai, p2.jumlah as sesi_2_terpakai  from kuota k
left join lokasi l on l.id = k.lokasi_id
left join vw_jumlah_reservasi p1 on p1.lokasi_pengambilan_id = k.lokasi_id and p1.pengambilan_sesi = 'Sesi I' and p1.pengambilan_tanggal = '".$tanggal."'
left join vw_jumlah_reservasi p2 on p2.lokasi_pengambilan_id = k.lokasi_id and p2.pengambilan_sesi = 'Sesi II' and p2.pengambilan_tanggal = '".$tanggal."'
                        where lokasi_id in (
                            select id from lokasi where propinsi = 31 and kabupaten_kota = ".$lokasi->kabupaten_kota." and kelurahan = 00
                        )";
                break;
            case 3:
                $sql = "select k.lokasi_id, l.nama, k.sesi_1_kuota, k.sesi_1_mulai, k.sesi_1_selesai,k.sesi_2_kuota, k.sesi_2_mulai, k.sesi_2_selesai, p1.jumlah as sesi_1_terpakai, p2.jumlah as sesi_2_terpakai  from kuota k
left join lokasi l on l.id = k.lokasi_id
left join vw_jumlah_reservasi p1 on p1.lokasi_pengambilan_id = k.lokasi_id and p1.pengambilan_sesi = 'Sesi I' and p1.pengambilan_tanggal = '".$tanggal."'
left join vw_jumlah_reservasi p2 on p2.lokasi_pengambilan_id = k.lokasi_id and p2.pengambilan_sesi = 'Sesi II' and p2.pengambilan_tanggal = '".$tanggal."'
                        where lokasi_id in (
                            select id from lokasi where propinsi = 31 and kabupaten_kota = ".$lokasi->kabupaten_kota." and kecamatan = ".$lokasi->kecamatan."
                        )";
                break;
            default:
                $sql = "select k.lokasi_id, l.nama, k.sesi_1_kuota, k.sesi_1_mulai, k.sesi_1_selesai,k.sesi_2_kuota, k.sesi_2_mulai, k.sesi_2_selesai, p1.jumlah as sesi_1_terpakai, p2.jumlah as sesi_2_terpakai  from kuota k
left join lokasi l on l.id = k.lokasi_id
left join vw_jumlah_reservasi p1 on p1.lokasi_pengambilan_id = k.lokasi_id and p1.pengambilan_sesi = 'Sesi I' and p1.pengambilan_tanggal = '".$tanggal."'
left join vw_jumlah_reservasi p2 on p2.lokasi_pengambilan_id = k.lokasi_id and p2.pengambilan_sesi = 'Sesi II' and p2.pengambilan_tanggal = '".$tanggal."'
                        where lokasi_id  = ".$lokasi_id.")";
                break;
        }
        $connection = \Yii::$app->db;
        $query = $connection->createCommand($sql);
        return $query->queryAll();
    }
	
}
