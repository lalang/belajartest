<?php
function tanggal($tanggal)
{
	$get_date=explode("-",$tanggal);
	$tanggal="$get_date[2]";
	$bulan="$get_date[1]";
	$tahun="$get_date[0]";

	if($bulan=="01"){
		$bulan="Januari";
	}elseif($bulan=="02"){
		$bulan="Februari";
	}elseif($bulan=="03"){
		$bulan="Maret";
	}elseif($bulan=="04"){
		$bulan="April";
	}elseif($bulan=="05"){
		$bulan="Mei";
	}elseif($bulan=="06"){
		$bulan="Juni";
	}elseif($bulan=="07"){
		$bulan="Juli";
	}elseif($bulan=="08"){
		$bulan="Agustus";
	}elseif($bulan=="09"){
		$bulan="September";
	}elseif($bulan=="10"){
		$bulan="Oktober";
	}elseif($bulan=="11"){
		$bulan="November";
	}elseif($bulan=="12"){
		$bulan="Desember";
	}	
	return "$tanggal $bulan $tahun";
}

function FormatCurrency($money)
{
	if($money){
	return number_format($money,0,',','.');
	}else{
	$money="0";
	return $money; 
	}
}