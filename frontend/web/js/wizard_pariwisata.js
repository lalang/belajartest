$(document).ready(function() {

	function load_js()
    {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = '/google_map/jquery-gmaps-latlon-picker.js';
        head.appendChild(script).remove();
    }

	function findEmptyPariwisataTeknis() {
        var result = 0;
        $(".input_pariwisata_teknis").each(function () {
            if (!this.value) {
                result = 1;
            }
        });
        return result;
    }
	
	function findEmptyKbli() {
        var result = 0;
        $(".kbli_input").each(function () {
            if (!this.value) {
                result = 1;
            }
        });
        return result;
    }
	
	function findDuplicateKbli() {
        var result = 0;
        var i = 0;
        var isiSatu;
        $(".kbli_input").each(function () {
            i++;
            //alert('i='+i);
            var y = 0;
            isiSatu = this.value;
            $(".kbli_input2").each(function () {
                y++;
                //alert('y='+y);
                if (isiSatu == this.value) {
                    if(i != y){
                        //alert('ketemu');
                        result = 1;
                    }
                }  
            });
        });
        return result;
    }
	
	function findEmptyTujuanWisata() {
        var result = 0;
        $(".input_tujuan_wisata").each(function() {
            if (!this.value) {
                result = 1;
            }
        });
        return result;
    }
	
	function findDuplicateTujuanWisata() {
        var result = 0;
        var i = 0;
        var isiSatu;
        $(".input_tujuan_wisata").each(function() {
            i++;
            //alert('i='+i);
            var y = 0;
            isiSatu = this.value;
            $(".input_tujuan_wisata2").each(function() {
                y++;
                //alert('y='+y);
                if (isiSatu == this.value) {
                    if (i != y) {
                        //alert('ketemu');
                        result = 1;
                    }
                }
            });
        });

        return result;
    }
	
	function findEmptyPariwisataFasilitas() {
        var result = 0;
        $(".input_pariwisata_fasilitas").each(function() {
            if (!this.value) {
                result = 1;
            }
        });
        return result;
    }
	
	function findDuplicatePariwisataFasilitas() {
        var result = 0;
        var i = 0;
        var isiSatu;
        $(".input_pariwisata_fasilitas").each(function() {
            i++;
            //alert('i='+i);
            var y = 0;
            isiSatu = this.value;
            $(".input_pariwisata_fasilitas2").each(function() {
                y++;
                //alert('y='+y);
                if (isiSatu == this.value) {
                    if (i != y) {
                        //alert('ketemu');
                        result = 1;
                    }
                }
            });
        });

        return result;
    }
	
    var max_number = 100;


    $('.pariwisata-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            //return false;
			load_js();
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.pariwisata-form').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.pariwisata-form').find('.pager .next').hide();
                $('.pariwisata-form').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.pariwisata-form').find('.pager .next').show();
                $('.pariwisata-form').find('.pager .previous').hide();
                $('.pariwisata-form').find('.pager .finish').hide();
            } else {
				$('.pariwisata-form').find('.pager .next').show();
				$('.pariwisata-form').find('.pager .previous').show();
                $('.pariwisata-form').find('.pager .finish').hide();
	    }

        },
        'onNext': function(tab, navigation, index) {
			load_js();	
            if(index==1) {
                // Make sure we entered the name
				if(!$('#izinpariwisata-nik').val()) {
                    alert('NIK tidak boleh kosong');
                    $('#izinpariwisata-nik').focus();
                    return false;
                }
				
                if(!$('#izinpariwisata-nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izinpariwisata-nama').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-tempat_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izinpariwisata-tempat_lahir').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-tanggal_lahir').val()) {
                    alert('Tanggal lahir tidak boleh kosong');
                    $('#izinpariwisata-tanggal_lahir').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izinpariwisata-alamat').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-rt').val()) {
                    alert('RT tidak boleh kosong');
                    $('#izinpariwisata-rt').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-rw').val()) {
                    alert('RW tidak boleh kosong');
                    $('#izinpariwisata-rw').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-kelurahan_id').val()) {
                    alert('Kelurahan tidak boleh kosong');
                    $('#izinpariwisata-kelurahan_id').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-kodepos').val()) {
                    alert('Kodepos tidak boleh kosong');
                    $('#izinpariwisata-kodepos').focus();
                    return false;
                }
				
				if ($('#izinpariwisata-kewarganegaraan_id option:selected').text() != 'INDONESIA') {
					if(!$('#izinpariwisata-passport').val()) {
						alert('Passport tidak boleh kosong');
						$('#izinpariwisata-passport').focus();
						return false;
					}
				}
				
				if(!$('#izinpariwisata-kewarganegaraan_id').val()) {
                    alert('Kewarganegaraan tidak boleh kosong');
                    $('#izinpariwisata-kewarganegaraan_id').focus();
                    return false;
                }
				
				if (!$('#izinpariwisata-kewarganegaraan_id').val()) {
					alert('Kewarganegaraan tidak boleh kosong');
					$('#izinpariwisata-kewarganegaraan_id').focus();
					return false;
				} else {
					if ($('#izinpariwisata-kewarganegaraan_id option:selected').text() != 'INDONESIA') {
						if (!$('#izinpariwisata-kitas').val()) {
							alert('Kitas tidak boleh kosong');
							$('#izinpariwisata-kitas').focus();
							return false;
						}
					} 
				}
				
				
             
            }
            if(index==2) {
                // Make sure we entered the name
                if(!$('#izinpariwisata-npwp_perusahaan').val() && $('#izinpariwisata-tipe').val()=="Perusahaan") {
                    alert('NPWP perusahaan tidak boleh kosong');
                    $('#izinpariwisata-npwp_perusahaan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-nama_perusahaan').val()) {
                    alert('Nama perusahaan tidak boleh kosong');
                    $('#izinpariwisata-nama_perusahaan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-nama_gedung_perusahaan').val() && $('#izinpariwisata-tipe').val()=="Perusahaan") {
                    alert('Nama gudang perusahaan tidak boleh kosong');
                    $('#izinpariwisata-nama_gedung_perusahaan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-blok_perusahaan').val() && $('#izinpariwisata-tipe').val()=="Perusahaan") {
                    alert('Blok perusahaan tidak boleh kosong');
                    $('#izinpariwisata-blok_perusahaan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-alamat_perusahaan').val()) {
                    alert('Alamat perusahaan tidak boleh kosong');
                    $('#izinpariwisata-alamat_perusahaan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-kelurahan_id_perusahaan').val()) {
                    alert('Kelurahan perusahaan tidak boleh kosong');
                    $('#izinpariwisata-kelurahan_id_perusahaan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-kodepos_perusahaan').val()) {
                    alert('Kodepos perusahaan tidak boleh kosong');
                    $('#izinpariwisata-kodepos_perusahaan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-telpon_perusahaan').val()) {
                    alert('Telepon perusahaan tidak boleh kosong');
                    $('#izinpariwisata-telpon_perusahaan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-fax_perusahaan').val() && $('#izinpariwisata-tipe').val()=="Perusahaan") {
                    alert('Fax perusahaan tidak boleh kosong');
                    $('#izinpariwisata-fax_perusahaan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-email_perusahaan').val()) {
                    alert('Email perusahaan tidak boleh kosong');
                    $('#izinpariwisata-email_perusahaan').focus();
                    return false;
                }
				
            }
            if(index==3) {
                // Make sure we entered the name
				if(!$('#izinpariwisata-nomor_akta_pendirian').val() && $('#izinpariwisata-tipe').val()=="Perusahaan") {
                    alert('Nomor akta pendirian tidak boleh kosong');
                    $('#izinpariwisata-nomor_akta_pendirian').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-tanggal_pendirian').val() && $('#izinpariwisata-tipe').val()=="Perusahaan") {
                    alert('Tanggal pendirian tidak boleh kosong');
                    $('#izinpariwisata-tanggal_pendirian').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-nama_notaris_pendirian').val() && $('#izinpariwisata-tipe').val()=="Perusahaan") {
                    alert('Nama notaris pendirian tidak boleh kosong');
                    $('#izinpariwisata-nama_notaris_pendirian').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-nomor_sk_pengesahan').val() && $('#izinpariwisata-tipe').val()=="Perusahaan") {
                    alert('Nomor sk pengesahan tidak boleh kosong');
                    $('#izinpariwisata-nomor_sk_pengesahan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-tanggal_pengesahan').val() && $('#izinpariwisata-tipe').val()=="Perusahaan") {
                    alert('Tanggal pengesahan tidak boleh kosong');
                    $('#izinpariwisata-tanggal_pengesahan').focus();
                    return false;
                }
               
            }

            if(index==4) {
                // Make sure we entered the name
				if(!$('#izinpariwisata-identitas_sama').val()) {
                    alert('Identitas sama tidak boleh kosong');
                    $('#izinpariwisata-identitas_sama').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-nik_penanggung_jawab').val()) {
                    alert('NIK penanggung jawab tidak boleh kosong');
                    $('#izinpariwisata-nik_penanggung_jawab').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-nama_penanggung_jawab').val()) {
                    alert('Nama penanggung jawab tidak boleh kosong');
                    $('#izinpariwisata-nama_penanggung_jawab').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-tempat_lahir_penanggung_jawab').val()) {
                    alert('Tempat lahir penanggung jawab tidak boleh kosong');
                    $('#izinpariwisata-tempat_lahir_penanggung_jawab').focus();
                    return false;
                }
				
				if ($('#izinpariwisata-identitas_sama option:selected').val() == 'N') {
					if(!$('#izinpariwisata-tanggal_lahir_penanggung_jawab').val()) {
						alert('Tanggal lahir penanggung jawab tidak boleh kosong');
						$('#izinpariwisata-tanggal_lahir_penanggung_jawab').focus();
						return false;
					}
				}
				
				if(!$('#izinpariwisata-alamat_penanggung_jawab').val()) {
                    alert('Alamat penanggung jawab tidak boleh kosong');
                    $('#izinpariwisata-alamat_penanggung_jawab').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-rt_penanggung_jawab').val()) {
                    alert('RT penanggung jawab tidak boleh kosong');
                    $('#izinpariwisata-rt_penanggung_jawab').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-rw_penanggung_jawab').val()) {
                    alert('RW penanggung jawab tidak boleh kosong');
                    $('#izinpariwisata-rw_penanggung_jawab').focus();
                    return false;
                }
				if ($('#izinpariwisata-identitas_sama option:selected').val() == 'N') {
					if(!$('#izinpariwisata-kelurahan_id_penanggung_jawab').val()) {
						alert('Kelurahan penanggung jawab tidak boleh kosong');
						$('#izinpariwisata-kelurahan_id_penanggung_jawab').focus();
						return false;
					}
					
					
					if(!$('#izinpariwisata-kewarganegaraan_id_penanggung_jawab').val()) {
						alert('Kewarganegaraan penanggung jawab tidak boleh kosong');
						$('#izinpariwisata-kewarganegaraan_id_penanggung_jawab').focus();
						return false;
					}
					
					if (!$('#izinpariwisata-kewarganegaraan_id_penanggung_jawab').val()) {
						alert('Kewarganegaraan penanggung jawab tidak boleh kosong');
						$('#izinpariwisata-kewarganegaraan_id_penanggung_jawab').focus();
						return false;
					} else {
						if ($('#izinpariwisata-kewarganegaraan_id_penanggung_jawab option:selected').text() != 'INDONESIA') {
							if (!$('#izinpariwisata-kitas_penanggung_jawab').val()) {
								alert('Kitas penanggung jawab tidak boleh kosong');
								$('#izinpariwisata-kitas_penanggung_jawab').focus();
								return false;
							}
						} 
					}
					
				}
				if(!$('#izinpariwisata-kodepos_penanggung_jawab').val()) {
                    alert('Kodepos penanggung jawab tidak boleh kosong');
                    $('#izinpariwisata-kodepos_penanggung_jawab').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-telepon_penanggung_jawab').val()) {
                    alert('Telepon penanggung jawab tidak boleh kosong');
                    $('#izinpariwisata-telepon_penanggung_jawab').focus();
                    return false;
                }

            }

            if(index==5){
                
				if($('#izinpariwisata-status_id').val()=='1') {
					if(!$('#izinpariwisata-no_tdup').val()) {
						alert('No. TDUP tidak boleh kosong');
						$('#izinpariwisata-no_tdup').focus();
						return false;
					}
				}
				if(!$('#izinpariwisata-tanggal_tdup').val()) {
                    alert('Tanggal TDUP tidak boleh kosong');
                    $('#izinpariwisata-tanggal_tdup').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-merk_nama_usaha').val()) {
                    alert('Merk nama usaha tidak boleh kosong');
                    $('#izinpariwisata-merk_nama_usaha').focus();
                    return false;
                }
				
			/*	if(!$('#izinpariwisata-nama_gedung_usaha').val()) {
                    alert('Nama gedung usaha tidak boleh kosong');
                    $('#izinpariwisata-nama_gedung_usaha').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-blok_usaha').val()) {
                    alert('Blok usaha tidak boleh kosong');
                    $('#izinpariwisata-blok_usaha').focus();
                    return false;
                }*/
				
				if(!$('#izinpariwisata-alamat_usaha').val()) {
                    alert('Alamat usaha tidak boleh kosong');
                    $('#izinpariwisata-alamat_usaha').focus();
                    return false;
                }
				
				/*if(!$('#izinpariwisata-rt_usaha').val()) {
                    alert('RT usaha tidak boleh kosong');
                    $('#izinpariwisata-rt_usaha').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-rw_usaha').val()) {
                    alert('RW usaha tidak boleh kosong');
                    $('#izinpariwisata-rw_usaha').focus();
                    return false;
                }*/
				
				if(!$('#izinpariwisata-kelurahan_id_usaha').val()) {
                    alert('Kelurahan tidak boleh kosong');
                    $('#izinpariwisata-kelurahan_id_usaha').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-kodepos_usaha').val()) {
                    alert('Kodepos usaha tidak boleh kosong');
                    $('#izinpariwisata-kodepos_usaha').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-telpon_usaha').val()) {
                    alert('Telepon usaha tidak boleh kosong');
                    $('#izinpariwisata-telpon_usaha').focus();
                    return false;
                }
				/*
				if(!$('#izinpariwisata-fax_usaha').val()) {
                    alert('Fex usaha tidak boleh kosong');
                    $('#izinpariwisata-fax_usaha').focus();
                    return false;
                }*/
				
				if(!$('#izinpariwisata-nomor_objek_pajak_usaha').val()) {
                    alert('Nomor objek pajak usaha tidak boleh kosong');
                    $('#izinpariwisata-nomor_objek_pajak_usaha').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-jumlah_karyawan').val()) {
                    alert('Jumlah karyawan tidak boleh kosong');
                    $('#izinpariwisata-jumlah_karyawan').focus();
                    return false;
                }
				
				if(!$('#izinpariwisata-npwpd').val()) {
                    alert('NPWPD tidak boleh kosong');
                    $('#izinpariwisata-npwpd').focus();
                    return false;
                }
				
				if(findEmptyPariwisataTeknis() == 1){
					alert('Pariwisata teknis tidak boleh kosong');
					return false;
				}
				
				if(findDuplicateKbli() == 1){
					alert('Terdapat lebih dari satu inputan kbli yang sama');
					return false;
				}
				
				if(findEmptyKbli() == 1){
					alert('Kbli tidak boleh kosong');
					return false;
				}
				
				if ($('#kode').val() == "JPW") {
				
					if (findEmptyTujuanWisata() == 1) {
						alert('Tujuan wisata tidak boleh kosong');
						return false;
					}
					
					if (findDuplicateTujuanWisata() == 1) {
						alert('Terdapat lebih dari satu inputan tujuan wisata yang sama');
						return false;
					}
					
					if(!$('#izinpariwisata-intensitas_jasa_perjalanan').val()) {
						alert('Jumlah perjalanan tidak boleh kosong');
						$('#izinpariwisata-intensitas_jasa_perjalanan').focus();
						return false;
					}

				}
				
				if ($('#kode').val() == "PA") {
				
					if(!$('#izinpariwisata-kapasitas_penyedia_akomodasi').val()) {
						alert('Jumlah kapasitas penyedia akomodasi tidak boleh kosong');
						$('#izinpariwisata-kapasitas_penyedia_akomodasi').focus();
						return false;
					}
				
					if (findEmptyPariwisataFasilitas() == 1) {
						alert('Fasilitas tidak boleh kosong');
						return false;
					}
					
					if (findDuplicatePariwisataFasilitas() == 1) {
						alert('Terdapat lebih dari satu inputan fasilitas yang sama');
						return false;
					}

				}
				
				
            }

            if(index==6) {
                
            }
        }
    });
});
