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
				if(!$('#izinkesehatan-nomor_str').val()) {
                    alert('Nomor STR tidak boleh kosong');
                    $('#izinkesehatan-nomor_str').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-tanggal_berlaku_str').val()) {
                    alert('Tanggal berlaku STR tidak boleh kosong');
                    $('#izinkesehatan-tanggal_berlaku_str').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-perguruan_tinggi').val()) {
                    alert('Pergutuan tinggi tidak boleh kosong');
                    $('#izinkesehatan-perguruan_tinggi').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-tanggal_lulus').val()) {
                    alert('Tanggal lulus tidak boleh kosong');
                    $('#izinkesehatan-tanggal_lulus').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-nomor_rekomendasi').val()) {
                    alert('Nomor rekomendasi tidak boleh kosong');
                    $('#izinkesehatan-nomor_rekomendasi').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-kepegawaian_id').val()) {
                    alert('Status kepegawaian tidak boleh kosong');
                    $('#izinkesehatan-kepegawaian_id').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-npwp_tempat_praktik').val()) {
                    alert('NPWP tempat praktik tidak boleh kosong');
                    $('#izinkesehatan-npwp_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-nama_tempat_praktik').val()) {
                    alert('Nama tempat praktik tidak boleh kosong');
                    $('#izinkesehatan-nama_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-latitude').val()) {
					alert('Latitude tidak boleh kosong');
                    $('#izinkesehatan-latitude').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-longitude').val()) {
					alert('Longitude tidak boleh kosong');
                    $('#izinkesehatan-longitude').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-nama_gedung_praktik').val()) {
					alert('Nama gedung praktik tidak boleh kosong');
                    $('#izinkesehatan-nama_gedung_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-blok_tempat_praktik').val()) {
					alert('Blok/ Lantai tidak boleh kosong');
                    $('#izinkesehatan-blok_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-alamat_tempat_praktik').val()) {
					alert('Nama jalan tidak boleh kosong');
                    $('#izinkesehatan-alamat_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-rt_tempat_praktik').val()) {
					alert('RT tidak boleh kosong');
                    $('#izinkesehatan-rt_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-rw_tempat_praktik').val()) {
					alert('RW tidak boleh kosong');
                    $('#izinkesehatan-rw_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-wilayah_id_tempat_praktik').val()) {
					alert('Kota/ Kabupaten tidak boleh kosong');
                    $('#izinkesehatan-wilayah_id_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-kecamatan_id_tempat_praktik').val()) {
					alert('Kecematan tidak boleh kosong');
                    $('#izinkesehatan-kecamatan_id_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-kelurahan_id_tempat_praktik').val()) {
					alert('Kelurahan tidak boleh kosong');
                    $('#izinkesehatan-kelurahan_id_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-kodepos_tempat_praktik').val()) {
					alert('Kodepos tidak boleh kosong');
                    $('#izinkesehatan-kodepos_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-telpon_tempat_praktik').val()) {
					alert('Telepon tidak boleh kosong');
                    $('#izinkesehatan-telpon_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-fax_tempat_praktik').val()) {
					alert('Fax tidak boleh kosong');
                    $('#izinkesehatan-fax_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-email_tempat_praktik').val()) {
					alert('Email tidak boleh kosong');
                    $('#izinkesehatan-email_tempat_praktik').focus();
                    return false;
                }
				
				if(!$('#izinkesehatan-nomor_izin_kesehatan').val()) {
					alert('Nomor izin usaha/ Operasional fasilitas kesehatan tidak boleh kosong');
                    $('#izinkesehatan-nomor_izin_kesehatan').focus();
                    return false;
                }
			}
			
			if(index==3) {
				
					if(!$('#izinkesehatan-jenis_praktik_i').val()) {
						alert('Jenis Praktik tidak boleh kosong');
						$('#izinkesehatan-jenis_praktik_i').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-nama_tempat_praktik_i').val()) {
						alert('Nama tempat praktik/ fasilitas kesehatan tidak boleh kosong');
						$('#izinkesehatan-nama_tempat_praktik_i').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-nomor_sip_i').val()) {
						alert('Nomor SIP tidak boleh kosong');
						$('#izinkesehatan-nomor_sip_i').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-tanggal_berlaku_sip_i').val()) {
						alert('Tanggal berlaku SIP tidak boleh kosong');
						$('#izinkesehatan-tanggal_berlaku_sip_i').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-nama_gedung_praktik_i').val()) {
						alert('Nama gedung/ komplek tidak boleh kosong');
						$('#izinkesehatan-nama_gedung_praktik_i').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-blok_tempat_praktik_i').val()) {
						alert('Blok/ Lantai tidak boleh kosong');
						$('#izinkesehatan-blok_tempat_praktik_i').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-alamat_tempat_praktik_i').val()) {
						alert('Nama jalan tidak boleh kosong');
						$('#izinkesehatan-alamat_tempat_praktik_i').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-rt_tempat_praktik_i').val()) {
						alert('RT tidak boleh kosong');
						$('#izinkesehatan-rt_tempat_praktik_i').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-rw_tempat_praktik_i').val()) {
						alert('RW tidak boleh kosong');
						$('#izinkesehatan-rw_tempat_praktik_i').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-telpon_tempat_praktik_i').val()) {
						alert('Telepon tidak boleh kosong');
						$('#izinkesehatan-telpon_tempat_praktik_i').focus();
						return false;
					}
					
					if(!$('#izinkesehatan-kelurahan_id_tempat_praktik_i').val()) {
						alert('Kelurahan tidak boleh kosong');
						$('#izinkesehatan-kelurahan_id_tempat_praktik_i').focus();
						return false;
					}
					
					//tambahan dokter
					if($('#izinkesehatan-izin_id').val()!=80) {
						
						if(!$('#izinkesehatan-jenis_praktik_ii').val()) {
							alert('Jenis Praktik tidak boleh kosong');
							$('#izinkesehatan-jenis_praktik_ii').focus();
							return false;
						}
						
						if(!$('#izinkesehatan-nama_tempat_praktik_ii').val()) {
							alert('Nama tempat praktik/ fasilitas kesehatan tidak boleh kosong');
							$('#izinkesehatan-nama_tempat_praktik_ii').focus();
							return false;
						}
						
						if(!$('#izinkesehatan-nomor_sip_ii').val()) {
							alert('Nomor SIP tidak boleh kosong');
							$('#izinkesehatan-nomor_sip_ii').focus();
							return false;
						}
						
						if(!$('#izinkesehatan-tanggal_berlaku_sip_ii').val()) {
							alert('Tanggal berlaku SIP tidak boleh kosong');
							$('#izinkesehatan-tanggal_berlaku_sip_ii').focus();
							return false;
						}
						
						if(!$('#izinkesehatan-nama_gedung_praktik_ii').val()) {
							alert('Nama gedung/ komplek tidak boleh kosong');
							$('#izinkesehatan-nama_gedung_praktik_ii').focus();
							return false;
						}
						
						if(!$('#izinkesehatan-blok_tempat_praktik_ii').val()) {
							alert('Blok/ Lantai tidak boleh kosong');
							$('#izinkesehatan-blok_tempat_praktik_ii').focus();
							return false;
						}
						
						if(!$('#izinkesehatan-alamat_tempat_praktik_ii').val()) {
							alert('Nama jalan tidak boleh kosong');
							$('#izinkesehatan-alamat_tempat_praktik_ii').focus();
							return false;
						}
						
						if(!$('#izinkesehatan-rt_tempat_praktik_ii').val()) {
							alert('RT tidak boleh kosong');
							$('#izinkesehatan-rt_tempat_praktik_ii').focus();
							return false;
						}
						
						if(!$('#izinkesehatan-rw_tempat_praktik_ii').val()) {
							alert('RW tidak boleh kosong');
							$('#izinkesehatan-rw_tempat_praktik_ii').focus();
							return false;
						}
						
						if(!$('#izinkesehatan-telpon_tempat_praktik_ii').val()) {
							alert('Telepon tidak boleh kosong');
							$('#izinkesehatan-telpon_tempat_praktik_ii').focus();
							return false;
						}
						
						if(!$('#izinkesehatan-kelurahan_id_tempat_praktik_ii').val()) {
							alert('Kelurahan tidak boleh kosong');
							$('#izinkesehatan-kelurahan_id_tempat_praktik_ii').focus();
							return false;
						}
						
					}

				}
					
				
        }
	});
	


});
