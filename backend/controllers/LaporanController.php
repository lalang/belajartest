<?php
namespace backend\controllers;
use Yii;
use yii\data\ArrayDataProvider;
use yii\db\Expression;
use yii\db\Query;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\Perizinan;

class LaporanController extends Controller {
	
	public function actionIndex()
    {
        return $this->render('/perizinan/dashboard');
    }
	
	public function actionDetail() {
		
		$model = new Perizinan();
		if (Yii::$app->request->post()) {
			$data = Yii::$app->request->post();
			$id_laporan = $data['Perizinan']['id_laporan'];
			$getBlnAwal = $data['Perizinan']['bln_awal_laporan'];
			$getBlnAkhir = $data['Perizinan']['bln_akhir_laporan'];
			$blnAwal = $this->bulan($data['Perizinan']['bln_awal_laporan']);
			$blnAkhir = $this->bulan($data['Perizinan']['bln_akhir_laporan']);
			$thnAwal = $data['Perizinan']['thn_awal_laporan'];
			$thnAkhir = $data['Perizinan']['thn_akhir_laporan'];
			
			$pKesehatan = $data['Perizinan']['pilih_kesehatan'];
			
			$connection = Yii::$app->db;
			
			if($id_laporan==6){
				$command = $connection->createCommand("CALL sp_laporan_detail_skdp(".$getBlnAwal.",".$thnAwal.",".$getBlnAkhir.",".$thnAkhir.")");  
				$result = $command->queryAll();	
				$this->SKDPToExcel($result,$id_laporan,$blnAwal,$blnAkhir,$thnAwal,$thnAkhir);
			}elseif ($id_laporan == 7) {
                $command = $connection->createCommand("CALL sp_laporan_detail_penelitian(" . $getBlnAwal . "," . $thnAwal . "," . $getBlnAkhir . "," . $thnAkhir . ")");
                $result = $command->queryAll();				
                $this->PenelitianToExcel($result, $id_laporan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir);
            }elseif ($id_laporan == 8) {
                $command = $connection->createCommand("CALL sp_laporan_detail_kesehatan(".$pKesehatan."," . $getBlnAwal . "," . $thnAwal . "," . $getBlnAkhir . "," . $thnAkhir . ")");
                $result = $command->queryAll();			
				
                $this->KesehatanToExcel($result, $id_laporan, $pKesehatan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir);
            }else{
			
				$command = $connection->createCommand("CALL sp_laporan_siup_tdp_online(".$id_laporan.",".$getBlnAwal.",".$thnAwal.",".$getBlnAkhir.",".$thnAkhir.")");  
				$result = $command->queryAll();	
				if($id_laporan==1){
					$this->SiupToExcel($result,$blnAwal,$blnAkhir,$thnAwal,$thnAkhir);
				}elseif($id_laporan==2){
					$this->TDPToExcel($result,$blnAwal,$blnAkhir,$thnAwal,$thnAkhir);
				}elseif($id_laporan==3){
					$this->TDGToExcel($result,$blnAwal,$blnAkhir,$thnAwal,$thnAkhir);
				}elseif($id_laporan==4 || $id_laporan==5){
					$this->PMToExcel($result,$id_laporan,$blnAwal,$blnAkhir,$thnAwal,$thnAkhir);
				}
			}
			
        }else{
			return $this->render('form_laporan', ['model' => $model]);
		}
	}
	
	public function bulan($bulan) {
		if($bulan==1){
			$bln = "Januari";
		}elseif($bulan==2){
			$bln = "Februari";
		}elseif($bulan==3){
			$bln = "Maret";
		}elseif($bulan==4){
			$bln = "April";
		}elseif($bulan==5){
			$bln = "Mei";
		}elseif($bulan==6){
			$bln = "Juni";
		}elseif($bulan==7){
			$bln = "Juli";
		}elseif($bulan==8){
			$bln = "Agustus";
		}elseif($bulan==9){
			$bln = "September";
		}elseif($bulan==10){
			$bln = "Oktober";
		}elseif($bulan==11){
			$bln = "November";
		}elseif($bulan==12){
			$bln = "Desember";
		}
		
		return $bln;
	}
	
	public function SiupToExcel($result, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        $title_file = "LAPORAN_SIUP_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN SIUP ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
				->setCellValue('B4', 'NO REGISTRASI SIMULTAN')
                ->setCellValue('C4', 'NAMA IZIN')
                ->setCellValue('D4', 'JENIS IZIN')
                ->setCellValue('E4', 'NO SK')
                ->setCellValue('F4', 'TANGGAL SK')
                ->setCellValue('G4', 'MASA BERLAKU SK')
                ->setCellValue('H4', 'NPWP')
                ->setCellValue('I4', 'NAMA PERUSAHAAN/PERORANGAN')
                ->setCellValue('J4', 'NAMA PENANGGUNG JAWAB')
                ->setCellValue('K4', 'JABATAN')
                ->setCellValue('L4', 'ALAMAT PERUSAHAAN')
                ->setCellValue('M4', 'BENTUK PERUSAHAAN')
                ->setCellValue('N4', 'NO TLP PERUSAHAAN')
                ->setCellValue('O4', 'NO. FAX')
                ->setCellValue('P4', 'NILAI KEKAYAAN BERSIH')
                ->setCellValue('Q4', 'KELEMBAGAAN')
                ->setCellValue('R4', 'KBLI 1')
                ->setCellValue('S4', 'KBLI 2')
                ->setCellValue('T4', 'KBLI 3')
                ->setCellValue('U4', 'KBLI 4')
                ->setCellValue('V4', 'KBLI 5')
                ->setCellValue('W4', 'STATUS PERUSAHAAN')
                ->setCellValue('X4', 'ZONASI')
                ->setCellValue('Y4', 'MODAL DISETOR')
                ->setCellValue('Z4', 'INVESTASI')
                ->setCellValue('AA4', 'PERALATAN DLM MESIN')
                ->setCellValue('AB4', 'KEWENANGAN')
                ->setCellValue('AC4', 'STATUS');

        $row = 5;
        foreach ($result as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['noreg_simultan']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['jenis_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['npwp']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['perusahaan_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['pimpinan_penanggung_jawab']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['pimpinan_jabatan']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['perusahaan_alamat']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['bentuk_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['perusahaan_telepon']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['perusahaan_fax']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['perusahaan_kekayaan_bersih']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['kelembagaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['kbli1']);
            $objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $data['kbli2']);
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $data['kbli3']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $data['kbli4']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $data['kbli5']);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $data['status_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $data['zonasi']);
            $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $data['modal']);
            $objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $data['aktiva_tetap_investasi']);
            $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $data['aktiva_tetap_peralatan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $data['kewewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
	
	public function TDPToExcel($result, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        $title_file = "LAPORAN_TDP_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN TDP ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
				->setCellValue('B4', 'NO REGISTRASI SIMULTAN')
                ->setCellValue('C4', 'NAMA IZIN')
                ->setCellValue('D4', 'JENIS IZIN')
                ->setCellValue('E4', 'NO SK')
                ->setCellValue('F4', 'TANGGAL SK')
                ->setCellValue('G4', 'MASA BERLAKU SK')
                ->setCellValue('H4', 'NO TDP')
                ->setCellValue('I4', 'PERPANJANG KE')
                ->setCellValue('J4', 'NPWP')
                ->setCellValue('K4', 'NAMA PERUSAHAAN/PERORANGAN')
                ->setCellValue('L4', 'NAMA PENANGGUNG JAWAB')
                ->setCellValue('M4', 'ALAMAT PERUSAHAAN')
                ->setCellValue('N4', 'STATUS')
                ->setCellValue('O4', 'KBLI')
                ->setCellValue('P4', 'NO TELEPON PERUSAHAAN')
                ->setCellValue('Q4', 'NO FAX PERUSAHAAN')
                ->setCellValue('R4', 'KEWENANGAN')
                ->setCellValue('S4', 'STATUS IZIN');

        $row = 5;
        foreach ($result as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['noreg_simultan']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['jenis_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['notdp']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['perpanjangan_ke']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['npwp']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['perusahaan_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['pimpinan_penanggung_jawab']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['perusahaan_alamat']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['status_prsh']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['kbli']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['perusahaan_telepon']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['perusahaan_fax']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['kewewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
	
	public function TDGToExcel($result, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        $title_file = "LAPORAN_TDG_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN TDG ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
                ->setCellValue('B4', 'NAMA IZIN')
                ->setCellValue('C4', 'NO SK')
                ->setCellValue('D4', 'TANGGAL SK')
                ->setCellValue('E4', 'MASA BERLAKU SK')
                ->setCellValue('F4', 'NAMA PEMILIK/PENANGGUNG JAWAB')
                ->setCellValue('G4', 'NIK')
                ->setCellValue('H4', 'ALAMAT PEMILIK/PENANGGUNG JAWAB')
                ->setCellValue('I4', 'TELEPON, FAX, EMAIL')
                ->setCellValue('J4', 'ALAMAT GUDANG')
                ->setCellValue('K4', 'LATITUDE')
				->setCellValue('L4', 'LONGITUDE')
				->setCellValue('M4', 'TITIK KOORDINAT')
                ->setCellValue('N4', 'TELEPON, FAX, EMAIL')
                ->setCellValue('O4', 'LUAS DAN KAPASITAS GUDANG')
                ->setCellValue('P4', 'GOLONGAN GUDANG')
                ->setCellValue('Q4', 'KEWENANGAN')
                ->setCellValue('R4', 'STATUS');

        $row = 5;
        foreach ($result as $data) {
			
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['pemilik_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['pemilik_nik']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['pemilik_alamat']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['pemilik_tfe']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['gudang_alamat']);
			$objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['latitude']);
			$objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['longitude']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['koordinat']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['gudang_tfe']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['luaskapasitas']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['golongan_gudang']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['kewewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
	
	public function PMToExcel($result,$id_laporan,$blnAwal,$blnAkhir,$thnAwal,$thnAkhir) {
		$objPHPExcel = new \PHPExcel();
			
			if($id_laporan==4){
				$sub_title = "SKCK";
			}else{
				$sub_title = "SKTM";
			}
			
			$title_file = "LAPORAN_PM1_".$sub_title."_ONLINE";
			
			$sheet=0;
			$objPHPExcel->setActiveSheetIndex($sheet);  
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
                
            $objPHPExcel->getActiveSheet()->setTitle('xxx')                     
             ->setCellValue('A4', 'NO REGISTRASI')
			 ->setCellValue('A1', 'LAPORAN PM1 '.$sub_title.' ONLINE')
			 ->setCellValue('A2', 'PER : '.$blnAwal.' '.$thnAwal.' S/D '.$blnAkhir.' '.$thnAkhir.'')
             ->setCellValue('B4', 'NAMA IZIN')
			 ->setCellValue('C4', 'NO SK')
			 ->setCellValue('D4', 'TANGGAL SK')
			 ->setCellValue('E4', 'MASA BERLAKU SK')
			 ->setCellValue('F4', 'NAMA PEMOHON')
			 ->setCellValue('G4', 'NIK')
			 ->setCellValue('H4', 'ALAMAT PEMOHON')
			 ->setCellValue('I4', 'PEKERJAAN')
			 ->setCellValue('J4', 'SKCK PADA')
			 ->setCellValue('K4', 'KEPERLUAN')
			 ->setCellValue('L4', 'KEWENANGAN')
			 ->setCellValue('M4', 'STATUS');
             
		$row=5;
		foreach ($result as $data) {  
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$data['noreg']);  
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$data['nama_non_izin']); 
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$data['nosk']);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$data['tglsk']); 
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$data['tglexpired']); 
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$row,$data['nama_pemohon']); 
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$row,$data['nik']);
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$row,$data['alamat_pemohon']); 
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$row,$data['pekerjaan']); 
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$row,$data['skck_pada']); 
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$row,$data['keperluan']);
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$row,$data['kewewenangan']); 
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$row,$data['status_izin']); 
		
			$row++;
		}	
	
        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file."_".date("d-m-Y-His").".xls";
        header('Content-Disposition: attachment;filename='.$filename .' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');              
	}
	
	public function SKDPToExcel($result, $id_laporan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        if ($id_laporan == 6) {
            $sub_title = "SKDU";
        }

        $title_file = "LAPORAN_" . $sub_title . "_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN ' . $sub_title . ' ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
                ->setCellValue('B4', 'JENIS SURAT KETERANGAN')
                ->setCellValue('C4', 'NO SK')
                ->setCellValue('D4', 'TANGGAL SK')
                ->setCellValue('E4', 'MASA BERLAKU SK')
                ->setCellValue('F4', 'NAMA')
                ->setCellValue('G4', 'NIK')
                ->setCellValue('H4', 'PASSPORT')
                ->setCellValue('I4', 'KEWARGA NEGARAAN')
                ->setCellValue('J4', 'ALAMAT')
                ->setCellValue('K4', 'NAMA PERUSAHAAN/ ORGANISASI/ YAYASAN')
                ->setCellValue('L4', 'NPWP')
                ->setCellValue('M4', 'KLASIFIKASI USAHA')
                ->setCellValue('N4', 'ALAMAT PERUSAHAAN/ ORGANISASI/ YAYASAN')
                ->setCellValue('O4', 'NO. TELP')
                ->setCellValue('P4', 'JUMLAH KARYAWAN')
                ->setCellValue('Q4', 'STATUS KEPEMILIKAN BANGUNAN')
                ->setCellValue('R4', 'STATUS KANTOR')
				->setCellValue('S4', 'LATITUDE')
				->setCellValue('T4', 'LONGITUDE')
                ->setCellValue('U4', 'KOORDINAT')
                ->setCellValue('V4', 'ZONASI')
                ->setCellValue('W4', 'AKTA PENDIRIAN NAMA NOTARIS')
                ->setCellValue('X4', 'AKTA PERUBAHAN NO & TGL AKTA')
                ->setCellValue('Y4', 'AKTA PERUBAHAN NO & TGL SK PENGESAHAN')
                ->setCellValue('Z4', 'AKTA PENDIRIAN NAMA NOTARIS')
                ->setCellValue('AA4', 'AKTA PERUBAHAN NO & TGL AKTA')
                ->setCellValue('AB4', 'AKTA PERUBAHAN NO & TGL SK PENGESAHAN')
                ->setCellValue('AC4', 'KEWENANGAN')
                ->setCellValue('AD4', 'STATUS');

        $row = 5;
        foreach ($result as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['nama_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['nik']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['passport']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['kewarganegaraan']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['alamat_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['nama_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['npwp_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['klasifikasi_usaha']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['alamat_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['telpon_perusahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['jumlah_karyawan']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['status_kepemilikan']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['status_kantor']);
			$objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $data['latitude']);
			$objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $data['longitude']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $data['koordinat']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $data['zonasi']);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $data['notaris_pendirian']);
            $objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $data['notgl_pendirian']);
            $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $data['pengesahaan_pendirian']);
            $objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $data['notaris_perubahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $data['notgl_perubahan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $data['pengesahaan_perubahaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $data['kewewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
	
	public function PenelitianToExcel($result, $id_laporan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();

        $sub_title = "PENELITIAN";
        $title_file = "LAPORAN_" . $sub_title . "_ONLINE";

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN ' . $sub_title . ' ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
                ->setCellValue('B4', 'NAMA IZIN')
                ->setCellValue('C4', 'NO SK')
                ->setCellValue('D4', 'TANGGAL SK')
                ->setCellValue('E4', 'MASA BERLAKU SK')
                ->setCellValue('F4', 'NAMA')
                ->setCellValue('G4', 'NIK')
                ->setCellValue('H4', 'ALAMAT')
                ->setCellValue('I4', 'PEKERJAAN')
                ->setCellValue('J4', 'NAMA INSTANSI')
                ->setCellValue('K4', 'JUDUL PENELITIAN')
                ->setCellValue('L4', 'LOKASI PENELITIAN')
                ->setCellValue('M4', 'BIDANG PENELITIAN')
                ->setCellValue('N4', 'TANGGAL MULAI')
                ->setCellValue('O4', 'TANGGAL SELESAI')
                ->setCellValue('P4', 'INSTANSI PENELITIAN')
                ->setCellValue('Q4', 'KEWENANGAN')
                ->setCellValue('R4', 'STATUS IZIN');

        $row = 5;
        foreach ($result as $data) {
			
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['tglexpired']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['nama_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['nik']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['alamat_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['pekerjaan']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['nama_instansi']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['judul_penelitian']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['lokasi_penelitian']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['bidang_penelitian']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['tgl_mulai']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['tgl_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['instansi_penelitian']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['kewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['status_izin']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
	
	public function KesehatanToExcel($result, $id_laporan, $pKesehatan, $blnAwal, $blnAkhir, $thnAwal, $thnAkhir) {
        $objPHPExcel = new \PHPExcel();
		
		if($pKesehatan=="1"){
			$wewenang='DOKTER_UMUM';
		}elseif($pKesehatan=="2"){
			$wewenang='DOKTER_GIGI';
		}elseif($pKesehatan=="3"){
			$wewenang='PERAWAT';
		}elseif($pKesehatan=="4"){
			$wewenang='PERAWAT_GIGI';
		}elseif($pKesehatan=="5"){
			$wewenang='BIDAN';
		}
		
        $sub_title = "KESEHATAN";
        $title_file = "LAPORAN_" . $sub_title . "_ONLINE_".$wewenang;

        $sheet = 0;
        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

        $objPHPExcel->getActiveSheet()->setTitle('xxx')
                ->setCellValue('A4', 'NO REGISTRASI')
                ->setCellValue('A1', 'LAPORAN ' . $sub_title . ' ONLINE')
                ->setCellValue('A2', 'PER : ' . $blnAwal . ' ' . $thnAwal . ' S/D ' . $blnAkhir . ' ' . $thnAkhir . '')
                ->setCellValue('B4', 'NAMA IZIN')
                ->setCellValue('C4', 'NO SK')
                ->setCellValue('D4', 'TANGGAL SK')
                ->setCellValue('E4', 'NAMA PEMOHON')
                ->setCellValue('F4', 'NIK')
                ->setCellValue('G4', 'ALAMAT PEMOHON')
                ->setCellValue('H4', 'KEWARGA NEGARAAN')
                ->setCellValue('I4', 'KITAS')
                ->setCellValue('J4', 'STR')
                ->setCellValue('K4', 'TANGGAL BERLAKU STR')
                ->setCellValue('L4', 'NPWP TEMPAT PRAKTIK')
                ->setCellValue('M4', 'NAMA TEMPAT PRAKTIK')
                ->setCellValue('N4', 'ALAMAT TEMPAT PERAKTIK')
				->setCellValue('O4', 'LATITUDE')
				->setCellValue('P4', 'LONGITUDE')
                ->setCellValue('Q4', 'KOORDINAT')
                ->setCellValue('R4', 'JADWAL PRAKTIK')
                ->setCellValue('S4', 'JADWAL PRAKTIK 2')
                ->setCellValue('T4', 'JADWAL PRAKTIK 3')
                ->setCellValue('U4', 'KEWENANGAN')
                ->setCellValue('V4', 'STATUS IZIN');

        $row = 5;
        foreach ($result as $data) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $data['noreg']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $data['nama_izin']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $data['nosk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $data['tglsk']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $data['nama_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $data['nik']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $data['alamat_pemohon']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $data['kewarganegaraan']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $data['kitas']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $data['STR']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $data['tanggal_berlaku_STR']);
            $objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $data['npwp_tempat_praktik']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $data['nama_tempat_praktik']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $data['alamat_tempat_praktik']);
			$objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $data['latitude']);
			$objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $data['longitude']);
            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $data['koordinat']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $data['jadwal_praktik']);
            $objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $data['jadwal_praktik_2']);
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $data['jadwal_praktik_3']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $data['kewenangan']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $data['status_izin']);

            $row++;
        }

        //header('Content-Type: application/vnd.ms-excel');
		header("Content-type: application/vnd.ms-excel; charset=UTF-8; encoding=UTF-8");
        $filename = $title_file . "_" . date("d-m-Y-His") . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
    
    // Add by Panji    
    public function actionSummary() {
        $model = new Perizinan();
        if (Yii::$app->request->post()) {
            $params = $_POST['Perizinan']['params'];
            $data = Yii::$app->db->createCommand("CALL sp_laporan_progres(" . $params . ")")->queryAll();
	
            if ($params == 1) {
                $this->summaryToExcelKantor($data);
            }elseif ($params == 2) {
                $this->summaryToExcelKecamatan($data);
            } else if ($params == 3) {
                $this->summaryToExcelKelurahan($data);
            } else { 
				$this->summaryToExcelBadan($data);
            }
        } else {
            return $this->render('form_summary', ['model' => $model]);
        }
    }

	public function summaryToExcelBadan($data) {
		
        $objPHPExcel = new \PHPExcel();
        $title_file = "Summary Badan";
        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);

        $objPHPExcel->getActiveSheet()->setTitle('Summary Kantor')
                ->setCellValue('A1', 'LAPORAN PERIZINAN ONLINE(Badan)')
                ->setCellValue('A3', 'PERIODE : s/d ' . date('d-m-Y'))
                ->setCellValue('A4', 'Lokasi')->mergeCells('A4:A5')
				->setCellValue('B4', 'Wewenang')->mergeCells('B4:B5')
                ->setCellValue('C4', 'PENELITIAN')->mergeCells('C4:I4')
                ->setCellValue('C5', 'Masuk')
                ->setCellValue('D5', 'Daftar')
				->setCellValue('E5', 'Daftar ETA')
                ->setCellValue('F5', 'Proses')
                ->setCellValue('G5', 'Selesai')
                ->setCellValue('H5', 'Tolak')
                ->setCellValue('I5', 'Batal');

        $row = 6;
        foreach ($data as $newData) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $newData['lokasi_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $newData['wewenang_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $newData['penelitian_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $newData['penelitian_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $newData['penelitian_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $newData['penelitian_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $newData['penelitian_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $newData['penelitian_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $newData['penelitian_batal']);
			
            $row++;
        }
		
		header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
		
	}
	
    public function summaryToExcelKantor($data) {
        $objPHPExcel = new \PHPExcel();
        $title_file = "Summary Kantor";
        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);

        $objPHPExcel->getActiveSheet()->setTitle('Summary Kantor')
                ->setCellValue('A1', 'LAPORAN PERIZINAN ONLINE(KANTOR PTSP)')
                ->setCellValue('A3', 'PERIODE : s/d ' . date('d-m-Y'))
                ->setCellValue('A4', 'Lokasi')->mergeCells('A4:A5')
				->setCellValue('B4', 'Wewenang')->mergeCells('B4:B5')
                ->setCellValue('C4', 'SIUP BESAR REGULER')->mergeCells('C4:I4')
                ->setCellValue('C5', 'Masuk')
				->setCellValue('D5', 'Daftar ETA')
                ->setCellValue('E5', 'Daftar')
                ->setCellValue('F5', 'Proses')
                ->setCellValue('G5', 'Selesai')
                ->setCellValue('H5', 'Tolak')
                ->setCellValue('I5', 'Batal')
                ->setCellValue('J4', 'SIUP MENENGAH REGULER')->mergeCells('J4:P4')
                ->setCellValue('J5', 'Masuk')
                ->setCellValue('K5', 'Daftar')
				->setCellValue('L5', 'Daftar ETA')
                ->setCellValue('M5', 'Proses')
                ->setCellValue('N5', 'Selesai')
                ->setCellValue('O5', 'Tolak')
                ->setCellValue('P5', 'Batal')
                ->setCellValue('Q4', 'TDP REGULER')->mergeCells('Q4:W4')
                ->setCellValue('Q5', 'Masuk')
                ->setCellValue('R5', 'Daftar')
				->setCellValue('S5', 'Daftar ETA')
                ->setCellValue('T5', 'Proses')
                ->setCellValue('U5', 'Selesai')
                ->setCellValue('V5', 'Tolak')
                ->setCellValue('W5', 'Batal')
                ->setCellValue('X4', 'SIUP-TDP SIMULTAN')->mergeCells('X4:AD4')
                ->setCellValue('X5', 'Masuk')
                ->setCellValue('Y5', 'Daftar')
				->setCellValue('Z5', 'Daftar ETA')
                ->setCellValue('AA5', 'Proses')
                ->setCellValue('AB5', 'Selesai')
                ->setCellValue('AC5', 'Tolak')
                ->setCellValue('AD5', 'Batal')
                ->setCellValue('AE4', 'TDG')->mergeCells('AE4:AK4')
                ->setCellValue('AE5', 'Masuk')
                ->setCellValue('AF5', 'Daftar')
				->setCellValue('AG5', 'Daftar ETA')
                ->setCellValue('AH5', 'Proses')
                ->setCellValue('AI5', 'Selesai')
                ->setCellValue('AJ5', 'Tolak')
                ->setCellValue('AK5', 'Batal')
				
				->setCellValue('AL4', 'PENELITIAN')->mergeCells('AL4:AR4')
                ->setCellValue('AL5', 'Masuk')
                ->setCellValue('AM5', 'Daftar')
				->setCellValue('AN5', 'Daftar ETA')
                ->setCellValue('AO5', 'Proses')
                ->setCellValue('AP5', 'Selesai')
                ->setCellValue('AQ5', 'Tolak')
                ->setCellValue('AR5', 'Batal')
				
				->setCellValue('AS4', 'PARIWISATA')->mergeCells('AS4:AS4')
                ->setCellValue('AS5', 'Masuk')
                ->setCellValue('AT5', 'Daftar')
				->setCellValue('AU5', 'Daftar ETA')
                ->setCellValue('AV5', 'Proses')
                ->setCellValue('AW5', 'Selesai')
                ->setCellValue('AX5', 'Tolak')
                ->setCellValue('AY5', 'Batal');

        $row = 6;
        foreach ($data as $newData) {
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $newData['lokasi_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $newData['wewenang_nama']);
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $newData['siup_besar_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $newData['siup_besar_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $newData['siup_besar_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $newData['siup_besar_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $newData['siup_besar_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $newData['siup_besar_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $newData['siup_besar_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $newData['siup_menengah_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $newData['siup_menengah_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $newData['siup_menengah_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $newData['siup_menengah_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $newData['siup_menengah_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $newData['siup_menengah_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $newData['siup_menengah_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $newData['tdp_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $newData['tdp_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $newData['tdp_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $newData['tdp_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $newData['tdp_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $newData['tdp_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $newData['tdp_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $newData['simultan_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $newData['simultan_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $newData['simultan_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $newData['simultan_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $newData['simultan_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $newData['simultan_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, $newData['simultan_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('AE' . $row, $newData['tdg_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('AF' . $row, $newData['tdg_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('AG' . $row, $newData['tdg_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AH' . $row, $newData['tdg_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AI' . $row, $newData['tdg_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AJ' . $row, $newData['tdg_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AK' . $row, $newData['tdg_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('AL' . $row, $newData['penelitian_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('AM' . $row, $newData['penelitian_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('AN' . $row, $newData['penelitian_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AO' . $row, $newData['penelitian_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AP' . $row, $newData['penelitian_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AQ' . $row, $newData['penelitian_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AR' . $row, $newData['penelitian_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('AS' . $row, $newData['pariwisata_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('AT' . $row, $newData['pariwisata_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('AU' . $row, $newData['pariwisata_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AV' . $row, $newData['pariwisata_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AW' . $row, $newData['pariwisata_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AX' . $row, $newData['pariwisata_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AY' . $row, $newData['pariwisata_batal']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function summaryToExcelKecamatan($data) {
        $objPHPExcel = new \PHPExcel();
        $title_file = "Summary Kecamatan";
        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);

        $objPHPExcel->getActiveSheet()->setTitle('Summary Kecamatan')
                ->setCellValue('A1', 'LAPORAN PERIZINAN ONLINE(Kecamatan)')
                ->setCellValue('A3', 'PERIODE : s/d ' . date('d-m-Y'))
                ->setCellValue('A4', 'Lokasi')->mergeCells('A4:A5')
                ->setCellValue('C4', 'SIUP')->mergeCells('C4:I4')
				->setCellValue('B4', 'Wewenang')->mergeCells('B4:B5')
                ->setCellValue('C5', 'Masuk')
                ->setCellValue('D5', 'Daftar')
				->setCellValue('E5', 'Daftar ETA')
                ->setCellValue('F5', 'Proses')
                ->setCellValue('G5', 'Selesai')
                ->setCellValue('H5', 'Tolak')
                ->setCellValue('I5', 'Batal')
				
				->setCellValue('J4', 'TDP')->mergeCells('J4:Q4')
                ->setCellValue('K5', 'Masuk')
                ->setCellValue('L5', 'Daftar')
				->setCellValue('M5', 'Daftar ETA')
                ->setCellValue('N5', 'Proses')
                ->setCellValue('O5', 'Selesai')
                ->setCellValue('P5', 'Tolak')
                ->setCellValue('Q5', 'Batal')
				
				->setCellValue('R4', 'SIMULTAN')->mergeCells('R4:Y4')
                ->setCellValue('S5', 'Masuk')
                ->setCellValue('T5', 'Daftar')
				->setCellValue('U5', 'Daftar ETA')
                ->setCellValue('V5', 'Proses')
                ->setCellValue('W5', 'Selesai')
                ->setCellValue('X5', 'Tolak')
                ->setCellValue('Y5', 'Batal')
        
				->setCellValue('Z4', 'TDG')->mergeCells('Z4:AG4')
                ->setCellValue('AA5', 'Masuk')
                ->setCellValue('AB5', 'Daftar')
				->setCellValue('AC5', 'Daftar ETA')
                ->setCellValue('AD5', 'Proses')
                ->setCellValue('AE5', 'Selesai')
                ->setCellValue('AF5', 'Tolak')
                ->setCellValue('AG5', 'Batal')
				
				->setCellValue('AH4', 'KESEHATAN')->mergeCells('AH4:AO4')
                ->setCellValue('AI5', 'Masuk')
                ->setCellValue('AJ5', 'Daftar')
				->setCellValue('AK5', 'Daftar ETA')
                ->setCellValue('AL5', 'Proses')
                ->setCellValue('AM5', 'Selesai')
                ->setCellValue('AN5', 'Tolak')
                ->setCellValue('AO5', 'Batal')
				
				->setCellValue('AP4', 'PARIWISATA')->mergeCells('AP4:AW4')
                ->setCellValue('AQ5', 'Masuk')
                ->setCellValue('AR5', 'Daftar')
				->setCellValue('AS5', 'Daftar ETA')
                ->setCellValue('AT5', 'Proses')
                ->setCellValue('AU5', 'Selesai')
                ->setCellValue('AV5', 'Tolak')
                ->setCellValue('AW5', 'Batal')
        
                ->setCellValue('AO5', 'Batal');


        $row = 6;
        foreach ($data as $newData) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $newData['lokasi_nama']);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $newData['wewenang_nama']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $newData['siup_masuk']);
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $newData['siup_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $newData['siup_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $newData['siup_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $newData['siup_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $newData['siup_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $newData['siup_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $newData['tdg_masuk']);
			$objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $newData['tdg_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $newData['tdg_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, $newData['tdg_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AE' . $row, $newData['tdg_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AF' . $row, $newData['tdg_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AG' . $row, $newData['tdg_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('AI' . $row, $newData['kesehatan_masuk']);
			$objPHPExcel->getActiveSheet()->setCellValue('AJ' . $row, $newData['kesehatan_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('AK' . $row, $newData['kesehatan_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AL' . $row, $newData['kesehatan_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AM' . $row, $newData['kesehatan_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AN' . $row, $newData['kesehatan_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AO' . $row, $newData['kesehatan_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('AQ' . $row, $newData['pariwisata_masuk']);
			$objPHPExcel->getActiveSheet()->setCellValue('AR' . $row, $newData['pariwisata_daftar']);
            $objPHPExcel->getActiveSheet()->setCellValue('AS' . $row, $newData['pariwisata_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AT' . $row, $newData['pariwisata_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AU' . $row, $newData['pariwisata_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AV' . $row, $newData['pariwisata_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AW' . $row, $newData['pariwisata_batal']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function summaryToExcelKelurahan($data) {
        $objPHPExcel = new \PHPExcel();
        $title_file = "Summary Kelurahan";
        $sheet = 0;

        $objPHPExcel->setActiveSheetIndex($sheet);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);

        $objPHPExcel->getActiveSheet()->setTitle('Summary Kelurahan')
                ->setCellValue('A1', 'LAPORAN PM1')
                ->setCellValue('A3', 'PERIODE : s/d ' . date('d-m-Y'))
                ->setCellValue('A4', 'Lokasi')->mergeCells('A4:A5')
				->setCellValue('B4', 'Wewenang')->mergeCells('B4:B5')
                ->setCellValue('C4', 'SKTM')->mergeCells('C4:I4')
                ->setCellValue('C5', 'Masuk')
                ->setCellValue('D5', 'Daftar')
				->setCellValue('E5', 'Daftar ETA')
                ->setCellValue('F5', 'Proses')
                ->setCellValue('G5', 'Selesai')
                ->setCellValue('H5', 'Tolak')
                ->setCellValue('I5', 'Batal')
                ->setCellValue('J4', 'SKCK')->mergeCells('J4:P4')
                ->setCellValue('J5', 'Masuk')
                ->setCellValue('K5', 'Daftar')
				->setCellValue('L5', 'Daftar ETA')
                ->setCellValue('M5', 'Proses')
                ->setCellValue('N5', 'Selesai')
                ->setCellValue('O5', 'Tolak')
                ->setCellValue('P5', 'Batal')
                ->setCellValue('Q4', 'SKDP')->mergeCells('Q4:W4')
                ->setCellValue('Q5', 'Masuk')
                ->setCellValue('R5', 'Daftar')
				->setCellValue('S5', 'Daftar ETA')
                ->setCellValue('T5', 'Proses')
                ->setCellValue('U5', 'Selesai')
                ->setCellValue('V5', 'Tolak')
                ->setCellValue('W5', 'Batal')
				->setCellValue('X4', 'KESEHATAN')->mergeCells('X4:AD4')
                ->setCellValue('X5', 'Masuk')
                ->setCellValue('Y5', 'Daftar')
				->setCellValue('Z5', 'Daftar ETA')
                ->setCellValue('AA5', 'Proses')
                ->setCellValue('AB5', 'Selesai')
                ->setCellValue('AC5', 'Tolak')
                ->setCellValue('AD5', 'Batal')
				->setCellValue('AE4', 'PARIWISATA')->mergeCells('AP4:AV4')
                ->setCellValue('AE5', 'Masuk')
                ->setCellValue('AF5', 'Daftar')
				->setCellValue('AG5', 'Daftar ETA')
                ->setCellValue('AH5', 'Proses')
                ->setCellValue('AI5', 'Selesai')
                ->setCellValue('AJ5', 'Tolak')
                ->setCellValue('AK5', 'Batal');

        $row = 6;
        foreach ($data as $newData) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $newData['lokasi_nama']);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $newData['wewenang_nama']);
			
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $newData['sktm_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $newData['sktm_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $newData['sktm_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $row, $newData['sktm_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $row, $newData['sktm_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $row, $newData['sktm_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $row, $newData['sktm_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('J' . $row, $newData['skck_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $row, $newData['skck_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('L' . $row, $newData['skck_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('M' . $row, $newData['skck_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('N' . $row, $newData['skck_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('O' . $row, $newData['skck_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('P' . $row, $newData['skck_batal']);

            $objPHPExcel->getActiveSheet()->setCellValue('Q' . $row, $newData['skdp_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('R' . $row, $newData['skdp_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('S' . $row, $newData['skdp_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('T' . $row, $newData['skdp_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('U' . $row, $newData['skdp_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('V' . $row, $newData['skdp_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('W' . $row, $newData['skdp_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('X' . $row, $newData['kesehatan_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('Y' . $row, $newData['kesehatan_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('Z' . $row, $newData['kesehatan_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AA' . $row, $newData['kesehatan_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AB' . $row, $newData['kesehatan_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AC' . $row, $newData['kesehatan_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AD' . $row, $newData['kesehatan_batal']);
			
			$objPHPExcel->getActiveSheet()->setCellValue('AE' . $row, $newData['pariwisata_masuk']);
            $objPHPExcel->getActiveSheet()->setCellValue('AF' . $row, $newData['pariwisata_daftar']);
			$objPHPExcel->getActiveSheet()->setCellValue('AG' . $row, $newData['pariwisata_daftar_eta']);
            $objPHPExcel->getActiveSheet()->setCellValue('AH' . $row, $newData['pariwisata_proses']);
            $objPHPExcel->getActiveSheet()->setCellValue('AI' . $row, $newData['pariwisata_selesai']);
            $objPHPExcel->getActiveSheet()->setCellValue('AJ' . $row, $newData['pariwisata_tolak']);
            $objPHPExcel->getActiveSheet()->setCellValue('AK' . $row, $newData['pariwisata_batal']);

            $row++;
        }

        header('Content-Type: application/vnd.ms-excel');
        $filename = $title_file . ".xls";
        header('Content-Disposition: attachment;filename=' . $filename . ' ');
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
	
}	
?>