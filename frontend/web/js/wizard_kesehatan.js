$(document).ready(function() {
	
	function load_js()
    {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = '/js/openlayers-2.12/OpenLayers.js';
        head.appendChild(script).remove();
    }
	// IZIN KESEHATAN

	$('.kesehatan-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
           // return false;
		   load_js();
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
			load_js();
            if(index==1) {
                // Make sure we entered the name
                if(!$('#izinkesehatan-nik').val()) {
                    alert('NIK tidak boleh kosong');
                    $('#izinkesehatan-nik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izinkesehatan-nama').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-jenkel').val()) {
                    alert('Jenis kelamin tidak boleh kosong');
                    $('#izinkesehatan-jenkel').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-tempat_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izinkesehatan-tempat_lahir').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-tanggal_lahir').val()) {
                    alert('Tanggal lahir tidak boleh kosong');
                    $('#izinkesehatan-tanggal_lahir').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-agama').val()) {
                    alert('Agama tidak boleh kosong');
                    $('#izinkesehatan-agama').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izinkesehatan-alamat').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-rt').val()) {
                    alert('RT tidak boleh kosong');
                    $('#izinkesehatan-rt').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-rw').val()) {
                    alert('RW tidak boleh kosong');
                    $('#izinkesehatan-rw').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-propinsi_id').val()) {
                    alert('Propinsi tidak boleh kosong');
                    $('#izinkesehatan-propinsi_id').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-wilayah_id').val()) {
                    alert('Kota tidak boleh kosong');
                    $('#izinkesehatan-wilayah_id').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-kecamatan_id').val()) {
                    alert('Kecamatan tidak boleh kosong');
                    $('#izinkesehatan-kecamatan_id').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-kelurahan_id').val()) {
                    alert('Kelurahan tidak boleh kosong');
                    $('#izinkesehatan-kelurahan_id').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-kodepos').val()) {
                    alert('Kodepos tidak boleh kosong');
                    $('#izinkesehatan-kodepos').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-telepon').val()) {
                    alert('Telepon tidak boleh kosong');
                    $('#izinkesehatan-telepon').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-email').val()) {
                    alert('Email tidak boleh kosong');
                    $('#izinkesehatan-email').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-kitas').val()) {
                    alert('Kitas tidak boleh kosong');
                    $('#izinkesehatan-kitas').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-kewarganegaraan_id').val()) {
                    alert('Kewarganegaraan tidak boleh kosong');
                    $('#izinkesehatan-kewarganegaraan_id').focus();
                    return false;
                }
            }
			
			if(index==2) {


			}
			
			if(index==3) {
					// Make sure we entered the name						
					if(!$('#izinkesehatan-gudang_namajalan').val()) {
						alert('Nama jalan tidak boleh kosong');
						$('#izinkesehatan-gudang_namajalan').focus();
						return false;
					}
					
					
					if(!$('#izinkesehatan-gudang_rt').val()) {
						alert('RT tidak boleh kosong');
						$('#izinkesehatan-gudang_rt').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_rw').val()) {
						alert('RW tidak boleh kosong');
						$('#izinkesehatan-gudang_rw').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_kodepos').val()) {
						alert('Kodepos tidak boleh kosong');
						$('#izinkesehatan-gudang_kodepos').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_luas').val()) {
						alert('Luas gudang tidak boleh kosong');
						$('#izinkesehatan-gudang_luas').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_nilai').val()) {
						alert('Nilai gudang tidak boleh kosong');
						$('#izinkesehatan-gudang_nilai').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_komposisi_nasional').val()) {
						alert('Komposisi nasional tidak boleh kosong');
						$('#izinkesehatan-gudang_komposisi_nasional').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_komposisi_asing').val()) {
						alert('Komposisi asing tidak boleh kosong');
						$('#izinkesehatan-gudang_komposisi_asing').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_sarana_listrik').val()) {
						alert('Kwk listrik tidak boleh kosong');
						$('#izinkesehatan-gudang_sarana_listrik').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_sarana_pendingin').val()) {
						alert('Fasilitas pendingin tidak boleh kosong');
						$('#izinkesehatan-gudang_sarana_pendingin').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_sarana_forklif').val()) {
						alert('Jumlah forklif tidak boleh kosong');
						$('#izinkesehatan-gudang_sarana_forklif').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_sarana_komputer').val()) {
						alert('Jumlah komputer tidak boleh kosong');
						$('#izinkesehatan-gudang_sarana_komputer').focus();
						return false;
					}

				}
					
				if(index==4) {
					// Make sure we entered the name
					if(!$('#izinkesehatan-gudang_imb_nomor').val()) {
						alert('Nomor IMB tidak boleh kosong');
						$('#izinkesehatan-gudang_imb_nomor').focus();
						return false;
					}	
					
					if(!$('#izinkesehatan-gudang_imb_tanggal').val()) {
						alert('Tanggal IMB tidak boleh kosong');
						$('#izinkesehatan-gudang_imb_tanggal').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_uug_nomor').val()) {
						alert('Nomor UUG tidak boleh kosong');
						$('#izinkesehatan-gudang_uug_nomor').focus();
						return false;
					}	
					
					if(!$('#izinkesehatan-gudang_uug_tanggal').val()) {
						alert('Tanggal UUG tidak boleh kosong');
						$('#izinkesehatan-gudang_uug_tanggal').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_uug_berlaku').val()) {
						alert('Tanggal Masa Berlaku UUG tidak boleh kosong');
						$('#izinkesehatan-gudang_uug_berlaku').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-gudang_isi').val()) {
						alert('Macam dan jenis isi Gudang tidak boleh kosong');
						$('#izinkesehatan-gudang_isi').focus();
						return false;
					}
				}
        }
	});
	


});
