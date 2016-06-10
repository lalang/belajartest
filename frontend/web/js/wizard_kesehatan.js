$(document).ready(function() {

	// IZIN KESEHATAN

	$('.kesehatan-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
           // return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.kesehatan-form').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.kesehatan-form').find('.pager .next').hide();
                $('.kesehatan-form').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.kesehatan-form').find('.pager .next').show();
                $('.kesehatan-form').find('.pager .previous').hide();
                $('.kesehatan-form').find('.pager .finish').hide();
            } else {
		$('.kesehatan-form').find('.pager .next').show();
		$('.kesehatan-form').find('.pager .previous').show();
                $('.kesehatan-form').find('.pager .finish').hide();
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
				
            }
			
			if(index==2) {


			}
			
			if(index==3) {
					// Make sure we entered the name						
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
	


});
