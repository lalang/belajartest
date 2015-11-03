<?php

namespace frontend\models;

use Yii;
use yii\helpers;
use \yii\db\Query;

class DetailPerizinanSearch extends \yii\db\ActiveRecord {
	
	public function active_izin($izin_id){
        $query = new Query;
        $query->select(['nama'])
                ->where([
                    'id' => $izin_id,
					'aktif' => 'Y',
                ])
                ->from('izin');
        $rows_izin = $query->all();
        foreach ($rows_izin as $data_izin) {
            $nm_izin = $data_izin['nama'];
        }
		
		return $nm_izin;
    }
	
    public function active_persyaratan($izin_id) {
		$query = new Query;
        $query->select(['isi','file'])
                ->where([
                    'izin_id' => $izin_id,
                    'kategori' => 'Persyaratan Izin',
					'aktif' => 'Y',
                ])
                ->from('dokumen_pendukung');
        $rows_persyaratan = $query->all();
		
		return $rows_persyaratan;
    }	
	
	public function active_pelayanan($izin_id){
		$query = new Query;
        $query->select(['sop.deskripsi_sop', 'pelaksana.nama'])
                ->where([
                    'sop.izin_id' => $izin_id,
					'sop.aktif' => 'Y',
                ])
                ->leftJoin('pelaksana', 'pelaksana.id = sop.pelaksana_id')
                ->from('sop');
        $rows_pelayanan = $query->all();
		
		return $rows_pelayanan;
    }	
	
	public function active_pengaduan($izin_id){
		$query = new Query;
        $query->select(['isi'])
                ->where([
                    'izin_id' => $izin_id,
                    'kategori' => 'Mekanisme Pengaduan',
					'aktif' => 'Y',
                ])
                ->from('dokumen_pendukung');
        $rows_pengaduan = $query->all();
		
		return $rows_pengaduan;
    }
	
	public function active_hukum($izin_id){
		$query = new Query;
		$query->select(['isi'])
				->where([
					'izin_id' => $izin_id,
					'kategori' => 'Dasarhukum Izin',
					'aktif' => 'Y',
				])
				->from('dokumen_pendukung');
        $rows_dasar_hukum = $query->all();
		return $rows_dasar_hukum;
    }
	
	public function active_definisi($izin_id){
		$query = new Query;
		$query->select(['isi'])
                ->where([
                    'izin_id' => $izin_id,
                    'kategori' => 'Definisi',
					'aktif' => 'Y',
                ])
                ->from('dokumen_pendukung');
        $rows_definisi = $query->all();
		return $rows_definisi;
    }

}

?>