$(document).ready(function() {
   
    function findFlagPilih(){
        var result = 0;
        $('input[type=radio]').each(
            function(){
                if (this.checked && this.value == 2) {
                    result = 1;
                }
            }
        );
        return result;
    }
      
    $('.pm1-form-sktm').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.siup-form').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.siup-form').find('.pager .next').hide();
                $('.siup-form').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.siup-form').find('.pager .next').show();
                $('.siup-form').find('.pager .previous').hide();
                $('.siup-form').find('.pager .finish').hide();
            } else {
		$('.siup-form').find('.pager .next').show();
		$('.siup-form').find('.pager .previous').show();
                $('.siup-form').find('.pager .finish').hide();
	    }

        },
        'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                if(!$('#izinpm1-nik').val()) {
                    alert('NIK tidak boleh kosong');
                    $('#izinpm1-nik').focus();
                    return false;
                }

                if(!$('#izinpm1-no_kk').val()) {
                    alert('No.KK tidak boleh kosong');
                    $('#izinpm1-no_kk').focus();
                    return false;
                }

                if(!$('#izinpm1-nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izinpm1-nama').focus();
                    return false;
                }

                if(!$('#izinpm1-agama').val()) {
                    alert('Agama tidak boleh kosong');
                    $('#izinpm1-agama').focus();
                    return false;
                }
                
                if(!$('#izinpm1-alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izinpm1-alamat').focus();
                    return false;
                }

                if(!$('#izinpm1-tempat_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izinpm1-tempat_lahir').focus();
                    return false;
                }
                
                if(!$('#izinpm1-tanggal_lahir-disp').val()) {
                    alert('Tanggal lahir tidak boleh kosong');
                    $('#izinpm1-tanggal_lahir-disp').focus();
                    return false;
                }

                if(!$('#izinpm1-kodepos').val()) {
                    alert('Kodepos tidak boleh kosong');
                    $('#izinpm1-kodepos').focus();
                    return false;
                }

                if(!$('#izinpm1-pekerjaan').val()) {
                    alert('Pekerjaan tidak boleh kosong');
                    $('#izinpm1-pekerjaan').focus();
                    return false;
                }
                
//                if(!$('#izinpm1-telepon').val()) {
//                    alert('Telepon tidak boleh kosong');
//                    $('#izinpm1-telepon').focus();
//                    return false;
//                }
                
                $('#kabkota-id-org-lain').val($('#kabkota-id').val());
                $('#kec-id-org-lain').val($('#kec-id').val());
                $('#kel-id-org-lain').val($('#izinpm1-kelurahan_id').val());
            }
            if(index==2) {
                // Make sure we entered the name
                if(!$('#izinpm1-no_surat_pengantar').val()) {
                    alert('Nomor Surat Pengantar tidak boleh kosong');
                    $('#izinpm1-no_surat_pengantar').focus();
                    return false;
                }

                if(!$('#izinpm1-tanggal_surat-disp').val()) {
                    alert('Tanggal Surat Pengantar tidak boleh kosong');
                    $('#izinpm1-tanggal_surat-disp').focus();
                    return false;
                }

                if(!$('#izinpm1-instansi_tujuan').val()) {
                    alert('Instansi Tujuan tidak boleh kosong');
                    $('#izinpm1-instansi_tujuan').focus();
                    return false;
                }
                
                if(findFlagPilih() == 1){
                    
                    if(!$('#izinpm1-nik_orang_lain').val()) {
                        alert('NIK Orang Lain tidak boleh kosong');
                        $('#izinpm1-nik_orang_lain').focus();
                        return false;
                    }
                    
                    if(!$('#izinpm1-no_kk_orang_lain').val()) {
                        alert('No.KK Orang Lain tidak boleh kosong');
                        $('#izinpm1-no_kk_orang_lain').focus();
                        return false;
                    }
                    
                    if(!$('#izinpm1-nama_orang_lain').val()) {
                        alert('Nama Orang Lain tidak boleh kosong');
                        $('#izinpm1-nama_orang_lain').focus();
                        return false;
                    }
                    
                    if(!$('#izinpm1-tempat_lahir_orang_lain').val()) {
                        alert('Tempat Lahir Orang Lain tidak boleh kosong');
                        $('#izinpm1-tempat_lahir_orang_lain').focus();
                        return false;
                    }
                    
                    if(!$('#izinpm1-tanggal_lahir_orang_lain-disp').val()) {
                        alert('Tanggal Lahir Orang Lain tidak boleh kosong');
                        $('#izinpm1-tanggal_lahir_orang_lain-disp').focus();
                        return false;
                    }
                    
                    if(!$('#izinpm1-jenkel_orang_lain').val()) {
                        alert('Jenis Kelamin Orang Lain tidak boleh kosong');
                        $('#izinpm1-jenkel_orang_lain').focus();
                        return false;
                    }
                    if(!$('#izinpm1-alamat_orang_lain').val()) {
                        alert('Alamat Orang Lain tidak boleh kosong');
                        $('#izinpm1-alamat_orang_lain').focus();
                        return false;
                    }
                    if(!$('#kabkota-id-org-lain').val()) {
                        alert('Kabupaten/Kota Orang Lain tidak boleh kosong');
                        $('#kabkota-id-org-lain').focus();
                        return false;
                    }
                    if(!$('#kec-id-org-lain').val()) {
                        alert('Kecamatan Orang Lain tidak boleh kosong');
                        $('#kec-id-org-lain').focus();
                        return false;
                    }
                    if(!$('#kel-id-org-lain').val()) {
                        alert('Kelurahan Orang Lain tidak boleh kosong');
                        $('#izinpm1-kelurahan_id_orang_lain').focus();
                        return false;
                    }
                    if(!$('#izinpm1-kodepos_orang_lain').val()) {
                        alert('Kodepos Orang Lain tidak boleh kosong');
                        $('#izinpm1-kodepos_orang_lain').focus();
                        return false;
                    }
                    if(!$('#izinpm1-pekerjaan_orang_lain').val()) {
                        alert('Pekerjaan Orang Lain tidak boleh kosong');
                        $('#izinpm1-pekerjaan_orang_lain').focus();
                        return false;
                    }
                    
//                    if(!$('#izinpm1-telepon_orang_lain').val()) {
//                        alert('Telepon Orang Lain tidak boleh kosong');
//                        $('#izinpm1-telepon_orang_lain').focus();
//                        return false;
//                    }
                }
            } 
        }
    });
    
    $('.pm1-form-skbmr').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.siup-form').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.siup-form').find('.pager .next').hide();
                $('.siup-form').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.siup-form').find('.pager .next').show();
                $('.siup-form').find('.pager .previous').hide();
                $('.siup-form').find('.pager .finish').hide();
            } else {
		$('.siup-form').find('.pager .next').show();
		$('.siup-form').find('.pager .previous').show();
                $('.siup-form').find('.pager .finish').hide();
	    }

        },
        'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                if(!$('#izinpm1-nik').val()) {
                    alert('NIK tidak boleh kosong');
                    $('#izinpm1-nik').focus();
                    return false;
                }

                if(!$('#izinpm1-no_kk').val()) {
                    alert('No.KK tidak boleh kosong');
                    $('#izinpm1-no_kk').focus();
                    return false;
                }

                if(!$('#izinpm1-nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izinpm1-nama').focus();
                    return false;
                }

                if(!$('#izinpm1-agama').val()) {
                    alert('Agama tidak boleh kosong');
                    $('#izinpm1-agama').focus();
                    return false;
                }

                if(!$('#izinpm1-alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izinpm1-alamat').focus();
                    return false;
                }

                if(!$('#izinpm1-tempat_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izinpm1-tempat_lahir').focus();
                    return false;
                }
                
                if(!$('#izinpm1-tanggal_lahir-disp').val()) {
                    alert('Tanggal lahir tidak boleh kosong');
                    $('#izinpm1-tanggal_lahir-disp').focus();
                    return false;
                }

                if(!$('#izinpm1-kodepos').val()) {
                    alert('Kodepos tidak boleh kosong');
                    $('#izinpm1-kodepos').focus();
                    return false;
                }

                if(!$('#izinpm1-pekerjaan').val()) {
                    alert('Pekerjaan tidak boleh kosong');
                    $('#izinpm1-pekerjaan').focus();
                    return false;
                }
                
//                if(!$('#izinpm1-telepon').val()) {
//                    alert('Telepon tidak boleh kosong');
//                    $('#izinpm1-telepon').focus();
//                    return false;
//                }
            }
            if(index==2) {
                // Make sure we entered the name
                if(!$('#izinpm1-no_surat_pengantar').val()) {
                    alert('Nomor Surat Pengantar tidak boleh kosong');
                    $('#izinpm1-no_surat_pengantar').focus();
                    return false;
                }

                if(!$('#izinpm1-tanggal_surat-disp').val()) {
                    alert('Tanggal Surat Pengantar tidak boleh kosong');
                    $('#izinpm1-tanggal_surat-disp').focus();
                    return false;
                }

                if(!$('#izinpm1-instansi_tujuan').val()) {
                    alert('Instansi Tujuan tidak boleh kosong');
                    $('#izinpm1-instansi_tujuan').focus();
                    return false;
                }
                
                if(!$('#izinpm1-keperluan_administrasi').val()) {
                    alert('Keperluan Administrasi tidak boleh kosong');
                    $('#izinpm1-keperluan_administrasi').focus();
                    return false;
                }
            }
            if(index==3) {
                if(!$('#izinpm1-nik_saksi1').val()) {
                   alert('NIK Saksi 1 tidak boleh kosong');
                   $('#izinpm1-nik_saksi1').focus();
                   return false;
               }

               if(!$('#izinpm1-no_kk_saksi1').val()) {
                   alert('No.KK Saksi 1 tidak boleh kosong');
                   $('#izinpm1-no_kk_saksi1').focus();
                   return false;
               }

               if(!$('#izinpm1-nama_saksi1').val()) {
                   alert('Nama Saksi 1 tidak boleh kosong');
                   $('#izinpm1-nama_saksi1').focus();
                   return false;
               }

               if(!$('#izinpm1-tempat_lahir_saksi1').val()) {
                   alert('Tempat Lahir Saksi 1 tidak boleh kosong');
                   $('#izinpm1-tempat_lahir_saksi1').focus();
                   return false;
               }

               if(!$('#izinpm1-tanggal_lahir_saksi1-disp').val()) {
                   alert('Tanggal Lahir Saksi 1 tidak boleh kosong');
                   $('#izinpm1-tanggal_lahir_saksi1-disp').focus();
                   return false;
               }

               if(!$('#izinpm1-jenkel_saksi1').val()) {
                   alert('Jenis Kelamin Saksi 1 tidak boleh kosong');
                   $('#izinpm1-jenkel_saksi1').focus();
                   return false;
               }
               if(!$('#izinpm1-alamat_saksi1').val()) {
                   alert('Alamat Saksi 1 tidak boleh kosong');
                   $('#izinpm1-alamat_saksi1').focus();
                   return false;
               }
               if(!$('#kabkota-id_saksi1').val()) {
                   alert('Kabupaten/Kota Saksi 1 tidak boleh kosong');
                   $('#kabkota-id_saksi1').focus();
                   return false;
               }
               if(!$('#kec-id_saksi1').val()) {
                   alert('Kecamatan Saksi 1 tidak boleh kosong');
                   $('#kec-id_saksi1').focus();
                   return false;
               }
               if(!$('#izinpm1-kelurahan_id_saksi1').val()) {
                   alert('Kelurahan Saksi 1 tidak boleh kosong');
                   $('#izinpm1-kelurahan_id_saksi1').focus();
                   return false;
               }
               if(!$('#izinpm1-kodepos_saksi1').val()) {
                   alert('Kodepos Saksi 1 tidak boleh kosong');
                   $('#izinpm1-kodepos_saksi1').focus();
                   return false;
               }
               if(!$('#izinpm1-pekerjaan_saksi1').val()) {
                   alert('Pekerjaan Saksi 1 tidak boleh kosong');
                   $('#izinpm1-pekerjaan_saksi1').focus();
                   return false;
               }
//               if(!$('#izinpm1-telepon_saksi1').val()) {
//                   alert('Telepon Saksi 1 tidak boleh kosong');
//                   $('#izinpm1-telepon_saksi1').focus();
//                   return false;
//               }   
            }
            if(index==4) {
                if(!$('#izinpm1-nik_saksi2').val()) {
                   alert('NIK Saksi 2 tidak boleh kosong');
                   $('#izinpm1-nik_saksi2').focus();
                   return false;
               }

               if(!$('#izinpm1-no_kk_saksi2').val()) {
                   alert('No.KK Saksi 2 tidak boleh kosong');
                   $('#izinpm1-no_kk_saksi2').focus();
                   return false;
               }

               if(!$('#izinpm1-nama_saksi2').val()) {
                   alert('Nama Saksi 2 tidak boleh kosong');
                   $('#izinpm1-nama_saksi2').focus();
                   return false;
               }

               if(!$('#izinpm1-tempat_lahir_saksi2').val()) {
                   alert('Tempat Lahir Saksi 2 tidak boleh kosong');
                   $('#izinpm1-tempat_lahir_saksi2').focus();
                   return false;
               }

               if(!$('#izinpm1-tanggal_lahir_saksi2-disp').val()) {
                   alert('Tanggal Lahir Saksi 2 tidak boleh kosong');
                   $('#izinpm1-tanggal_lahir_saksi2-disp').focus();
                   return false;
               }

               if(!$('#izinpm1-jenkel_saksi2').val()) {
                   alert('Jenis Kelamin Saksi 2 tidak boleh kosong');
                   $('#izinpm1-jenkel_saksi2').focus();
                   return false;
               }
               if(!$('#izinpm1-alamat_saksi2').val()) {
                   alert('Alamat Saksi 2 tidak boleh kosong');
                   $('#izinpm1-alamat_saksi2').focus();
                   return false;
               }
               if(!$('#kabkota-id_saksi2').val()) {
                   alert('Kabupaten/Kota Saksi 2 tidak boleh kosong');
                   $('#kabkota-id_saksi2').focus();
                   return false;
               }
               if(!$('#kec-id_saksi2').val()) {
                   alert('Kecamatan Saksi 2 tidak boleh kosong');
                   $('#kec-id_saksi2').focus();
                   return false;
               }
               if(!$('#izinpm1-kelurahan_id_saksi2').val()) {
                   alert('Kelurahan Saksi 2 tidak boleh kosong');
                   $('#izinpm1-kelurahan_id_saksi2').focus();
                   return false;
               }
               if(!$('#izinpm1-kodepos_saksi2').val()) {
                   alert('Kodepos Saksi 2 tidak boleh kosong');
                   $('#izinpm1-kodepos_saksi2').focus();
                   return false;
               }
               if(!$('#izinpm1-pekerjaan_saksi2').val()) {
                   alert('Pekerjaan Saksi 2 tidak boleh kosong');
                   $('#izinpm1-pekerjaan_saksi2').focus();
                   return false;
               }
//               if(!$('#izinpm1-telepon_saksi2').val()) {
//                   alert('Telepon Saksi 2 tidak boleh kosong');
//                   $('#izinpm1-telepon_saksi2').focus();
//                   return false;
//               }   
            }
        }
    });
    
    $('.pm1-form-skck').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.siup-form').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.siup-form').find('.pager .next').hide();
                $('.siup-form').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.siup-form').find('.pager .next').show();
                $('.siup-form').find('.pager .previous').hide();
                $('.siup-form').find('.pager .finish').hide();
            } else {
		$('.siup-form').find('.pager .next').show();
		$('.siup-form').find('.pager .previous').show();
                $('.siup-form').find('.pager .finish').hide();
	    }

        },
        'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                if(!$('#izinpm1-nik').val()) {
                    alert('NIK tidak boleh kosong');
                    $('#izinpm1-nik').focus();
                    return false;
                }

                if(!$('#izinpm1-no_kk').val()) {
                    alert('No.KK tidak boleh kosong');
                    $('#izinpm1-no_kk').focus();
                    return false;
                }

                if(!$('#izinpm1-nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izinpm1-nama').focus();
                    return false;
                }

                if(!$('#izinpm1-agama').val()) {
                    alert('Agama tidak boleh kosong');
                    $('#izinpm1-agama').focus();
                    return false;
                }

                if(!$('#izinpm1-alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izinpm1-alamat').focus();
                    return false;
                }

                if(!$('#izinpm1-tempat_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izinpm1-tempat_lahir').focus();
                    return false;
                }
                
                if(!$('#izinpm1-tanggal_lahir-disp').val()) {
                    alert('Tanggal lahir tidak boleh kosong');
                    $('#izinpm1-tanggal_lahir-disp').focus();
                    return false;
                }

                if(!$('#izinpm1-kodepos').val()) {
                    alert('Kodepos tidak boleh kosong');
                    $('#izinpm1-kodepos').focus();
                    return false;
                }

                if(!$('#izinpm1-pekerjaan').val()) {
                    alert('Pekerjaan tidak boleh kosong');
                    $('#izinpm1-pekerjaan').focus();
                    return false;
                }
                
//                if(!$('#izinpm1-telepon').val()) {
//                    alert('Telepon tidak boleh kosong');
//                    $('#izinpm1-telepon').focus();
//                    return false;
//                }
            }
            if(index==2) {
                // Make sure we entered the name
                if(!$('#izinpm1-no_surat_pengantar').val()) {
                    alert('Nomor Surat Pengantar tidak boleh kosong');
                    $('#izinpm1-no_surat_pengantar').focus();
                    return false;
                }

                if(!$('#izinpm1-tanggal_surat-disp').val()) {
                    alert('Tanggal Surat Pengantar tidak boleh kosong');
                    $('#izinpm1-tanggal_surat-disp').focus();
                    return false;
                }

                if(!$('#izinpm1-instansi_tujuan').val()) {
                    alert('Instansi Tujuan tidak boleh kosong');
                    $('#izinpm1-instansi_tujuan').focus();
                    return false;
                }
                
                if(!$('#izinpm1-keperluan_administrasi').val()) {
                    alert('Keperluan Administrasi tidak boleh kosong');
                    $('#izinpm1-keperluan_administrasi').focus();
                    return false;
                }
            }
        }
    });
});
