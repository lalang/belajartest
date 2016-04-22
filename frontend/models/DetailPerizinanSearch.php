<?php

namespace frontend\models;

use Yii;
use yii\helpers;
use \yii\db\Query;

class DetailPerizinanSearch extends \yii\db\ActiveRecord {
	
	public function active_izin($izin_id){
        $query = new Query;
        $query->select(['nama','durasi','durasi_satuan'])
                ->where([
                    'id' => $izin_id,
					'aktif' => 'Y',
                ])
                ->from('izin')
				->orderBy('id asc');
        $rows_izin = $query->all();
		return $rows_izin;
    }
	
    public function active_persyaratan($izin_id) {
		$query = new Query;
        $query->select(['isi','file'])
                ->where([
                    'izin_id' => $izin_id,
                    'kategori' => 'Persyaratan Izin',
					'aktif' => 'Y',
                ])
                ->from('dokumen_pendukung')
				->orderBy('urutan asc');
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
                ->from('sop')
				->orderBy('urutan asc');
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
	
	public function active_biaya($izin_id){
		$query = new Query;
		$query->select(['isi','file'])
                ->where([
                    'izin_id' => $izin_id,
                    'kategori' => 'Biaya',
					'aktif' => 'Y',
                ])
                ->from('dokumen_pendukung');
        $rows_biaya = $query->all();
		return $rows_biaya;
    }

}

?>