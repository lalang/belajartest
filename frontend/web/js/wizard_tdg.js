$(document).ready(function() {

	// IZIN TDG

	$('.tdg-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.tdg-form').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.tdg-form').find('.pager .next').hide();
                $('.tdg-form').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.tdg-form').find('.pager .next').show();
                $('.tdg-form').find('.pager .previous').hide();
                $('.tdg-form').find('.pager .finish').hide();
            } else {
		$('.tdg-form').find('.pager .next').show();
		$('.tdg-form').find('.pager .previous').show();
                $('.tdg-form').find('.pager .finish').hide();
	    }

        },
        'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                if(!$('#izintdg-pemilik_nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izintdg-pemilik_nama').focus();
                    return false;
                }
				
				if(!$('#izintdg-pemilik_alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izintdg-pemilik_alamat').focus();
                    return false;
                }
				
			/*	if(!$('#izintdg-pemilik_kabupaten').val()) {
                    alert('Kota tidak boleh kosong');
                    $('#izintdg-pemilik_kabupaten').focus();
                    return false;
                }
				
				if(!$('#izintdg-pemilik_kecamatan').val()) {
                    alert('Kecamatan tidak boleh kosong');
                    $('#izintdg-pemilik_kecamatan').focus();
                    return false;
                }
				
				if(!$('#izintdg-pemilik_kelurahan').val()) {
                    alert('Kelurahan tidak boleh kosong');
                    $('#izintdg-pemilik_kelurahan').focus();
                    return false;
                }*/
				
				if(!$('#izintdg-pemilik_email').val()) {
                    alert('Email tidak boleh kosong');
                    $('#izintdg-pemilik_email').focus();
                    return false;
                }
            }
			
			if(index==2) {
                // Make sure we entered the name

             /*   if(!$('#izintdg-perusahaan_namagedung').val()) {
                    alert('Nama gedung tidak boleh kosong');
                    $('#izintdg-perusahaan_namagedung').focus();
                    return false;
                }
				
				if(!$('#izintdg-perusahaan_blok_lantai').val()) {
                    alert('Nama blok tidak boleh kosong');
                    $('#izintdg-perusahaan_blok_lantai').focus();
                    return false;
                }
				
				if(!$('#izintdg-perusahaan_namajalan').val()) {
                    alert('Nama jalan tidak boleh kosong');
                    $('#izintdg-perusahaan_namajalan').focus();
                    return false;
                }
				
				if(!$('#izintdg-perusahaan_kodepos').val()) {
                    alert('Nama kodepos tidak boleh kosong');
                    $('#izintdg-perusahaan_kodepos').focus();
                    return false;
                }*/

			}
			
			if(index==3) {
					// Make sure we entered the name
					if(!$('#izintdg-gudang_namagedung').val()) {
						alert('Nama gedung tidak boleh kosong');
						$('#izintdg-gudang_namagedung').focus();
						return false;
					}	
					
					if(!$('#izintdg-gudang_blok_lantai').val()) {
						alert('Nama blok/ lantai tidak boleh kosong');
						$('#izintdg-gudang_blok_lantai').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_namajalan').val()) {
						alert('Nama jalan tidak boleh kosong');
						$('#izintdg-gudang_namajalan').focus();
						return false;
					}
					
					
					if(!$('#izintdg-gudang_rt').val()) {
						alert('RT tidak boleh kosong');
						$('#izintdg-gudang_rt').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_rw').val()) {
						alert('RW tidak boleh kosong');
						$('#izintdg-gudang_rw').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_kodepos').val()) {
						alert('Kodepos tidak boleh kosong');
						$('#izintdg-gudang_kodepos').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_luas').val()) {
						alert('Luas gudang tidak boleh kosong');
						$('#izintdg-gudang_luas').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_kapasitas').val()) {
						alert('Kapasitas gudang tidak boleh kosong');
						$('#izintdg-gudang_kapasitas').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_nilai').val()) {
						alert('Nilai gudang tidak boleh kosong');
						$('#izintdg-gudang_nilai').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_komposisi_nasional').val()) {
						alert('Komposisi nasional tidak boleh kosong');
						$('#izintdg-gudang_komposisi_nasional').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_komposisi_asing').val()) {
						alert('Komposisi asing tidak boleh kosong');
						$('#izintdg-gudang_komposisi_asing').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_sarana_listrik').val()) {
						alert('Kwk listrik tidak boleh kosong');
						$('#izintdg-gudang_sarana_listrik').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_sarana_pendingin').val()) {
						alert('Fasilitas pendingin tidak boleh kosong');
						$('#izintdg-gudang_sarana_pendingin').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_sarana_forklif').val()) {
						alert('Jumlah forklif tidak boleh kosong');
						$('#izintdg-gudang_sarana_forklif').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_sarana_komputer').val()) {
						alert('Jumlah komputer tidak boleh kosong');
						$('#izintdg-gudang_sarana_komputer').focus();
						return false;
					}

				}
					
				if(index==4) {
					// Make sure we entered the name
					if(!$('#izintdg-gudang_imb_nomor').val()) {
						alert('Nomor IMB tidak boleh kosong');
						$('#izintdg-gudang_imb_nomor').focus();
						return false;
					}	
					
					if(!$('#izintdg-gudang_imb_tanggal').val()) {
						alert('Tanggal IMB tidak boleh kosong');
						$('#izintdg-gudang_imb_tanggal').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_uug_nomor').val()) {
						alert('Nomor UUG tidak boleh kosong');
						$('#izintdg-gudang_uug_nomor').focus();
						return false;
					}	
					
					if(!$('#izintdg-gudang_uug_tanggal').val()) {
						alert('Tanggal UUG tidak boleh kosong');
						$('#izintdg-gudang_uug_tanggal').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_uug_berlaku').val()) {
						alert('Tanggal Masa Berlaku UUG tidak boleh kosong');
						$('#izintdg-gudang_uug_berlaku').focus();
						return false;
					}
					
					if(!$('#izintdg-gudang_isi').val()) {
						alert('Macam dan jenis isi Gudang tidak boleh kosong');
						$('#izintdg-gudang_isi').focus();
						return false;
					}
				}
        }
	});
	
	//---------------------
    
    var max_number = 100;

    $('#izintdg-gudang_komposisi_nasional').keyup(function(){
        if($('#izintdg-gudang_komposisi_nasional').val() > max_number){
            alert('angka yang di input melebihi'+max_number+'%')
            $('#izintdg-gudang_komposisi_nasional').val('0')
        }

        if($('#izintdg-gudang_komposisi_nasional').val() < max_number){
            val2 = max_number - $('#izintdg-gudang_komposisi_nasional').val()
        }

        if($('#izintdg-gudang_komposisi_nasional').val() == max_number){
            val2 = max_number - $('#izintdg-gudang_komposisi_nasional').val()
        }

        $('#izintdg-gudang_komposisi_asing').val(val2)
    });
	
    $('.number').number(true, null, ',', '.');
  
});
