$(document).ready(function() {
    
    //Bul
    
     $('#tdp-form-bul-i_4_pemilik_telepon').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-bul-i_5_pemilik_no_ktp').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-bul-kode_pos').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-bul-telpon_perusahaan').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-bul-fax_perusahaan').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-bul-iii_4_jumlah_bank').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('.tdp-form-bul').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
           // return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.tdp-form-bul').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.tdp-form-bul').find('.pager .next').hide();
                $('.tdp-form-bul').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.tdp-form-bul').find('.pager .next').show();
                $('.tdp-form-bul').find('.pager .previous').hide();
                $('.tdp-form-bul').find('.pager .finish').hide();
            } else {
		$('.tdp-form-bul').find('.pager .next').show();
		$('.tdp-form-bul').find('.pager .previous').show();
                $('.tdp-form-bul').find('.pager .finish').hide();
	    }

        },
        
        'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                
                if(!$('#izintdp-i_2_pemilik_tpt_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izintdp-i_2_pemilik_tpt_lahir').focus();
                    return false;
                }

                if(!$('#izintdp-i_3_pemilik_alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izintdp-i_3_pemilik_alamat').focus();
                    return false;
                }

                if(!$('#izintdp-i_4_pemilik_telepon').val()) {
                    alert('No Telepon tidak boleh kosong');
                    $('#izintdp-i_4_pemilik_telepon').focus();
                    return false;
                }

                if(!$('#izintdp-i_5_pemilik_no_ktp').val()) {
                    alert('No KTP tidak boleh kosong');
                    $('#izintdp-i_5_pemilik_no_ktp').focus();
                    return false;
                }
                
                if(!$('#izintdp-i_2_pemilik_tgl_lahir').val()) {
                    alert('Tanggal lahir tidak boleh kosong');
                    $('#izintdp-i_2_pemilik_tgl_lahir').focus();
                    return false;
                }

                if(!$('#izintdp-i_6_pemilik_kewarganegaraan').val()) {
                    alert('Kewarganegaraan tidak boleh kosong');
                    $('#izintdp-i_6_pemilik_kewarganegaraan').focus();
                    return false;
                }

                
            }
            if(index==2) {
                // Make sure we entered the name
           /*     if(!$('#izintdp-ii_1_perusahaan_nama').val()) {
                    alert('Nama Perusahaan tidak boleh kosong');
                    $('#izintdp-ii_1_perusahaan_nama').focus();
                    return false;
                }
                if(!$('#izintdp-ii_2_perusahaan_alamat').val()) {
                    alert('Alamat Perusahaan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_alamat').focus();
                    return false;
                }
                
                if(!$('#izintdp-ii_2_perusahaan_kodepos').val()) {
                    alert('Kode Pos tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_kodepos').focus();
                    return false;
                }
                if(!$('#izintdp-ii_2_perusahaan_no_telp').val()) {
                    alert('No Telp Perusahaan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_no_telp').focus();
                    return false;
                }

                if(!$('#izintdp-ii_2_perusahaan_no_fax').val()) {
                    alert('No Fax tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_no_fax').focus();
                    return false;
                }
                if(!$('#izintdp-ii_2_perusahaan_email').val()) {
                    alert('Kolom email Perusahaan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_email').focus();
                    return false;
                }
                */
               
            } 
            if(index==3) {
                 
                if(!$('#izintdp-iii_4_bank_utama_1').val()) {
                    alert('Bank Utama tidak boleh kosong');
                    $('#izintdp-iii_4_bank_utama_1').focus();
                    return false;
                }
                
                if(!$('#izintdp-iii_4_jumlah_bank').val()) {
                    alert('Jumlah Bank tidak boleh kosong');
                    $('#izintdp-iii_4_jumlah_bank').focus();
                    return false;
                }
                if(!$('#izintdp-iii_7a_tgl_pendirian').val()) {
                    alert('Tanggal Pendirian tidak boleh kosong');
                    $('#izintdp-iii_7a_tgl_pendirian').focus();
                    return false;
                }
               if(!$('#izintdp-iii_7b_tgl_mulai_kegiatan').val()) {
                    alert('Tanggal Mulai kegiatan tidak boleh kosong');
                    $('#izintdp-iii_7b_tgl_mulai_kegiatan').focus();
                    return false;
                }
            }
            if(index==4) {
                 if(!$('#izintdp-iv_a1_nomor').val()) {
                    alert('Nomor Akta tidak boleh kosong');
                    $('#izintdp-iv_a1_nomor').focus();
                    return false;
                }
                if(!$('#izintdp-iv_a1_tanggal').val()) {
                    alert('Tanggal Akta tidak boleh kosong');
                    $('#tizintdp-iv_a1_tanggal').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_notaris_nama').val()) {
                    alert('Nama Notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_nama').focus();
                    return false;
                }
                if(!$('#izintdp-iv_a1_notaris_alamat').val()) {
                    alert('Alamat Notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_alamat').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_telpon').val()) {
                    alert('No Tlp Notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_telpon').focus();
                    return false;
                }
               
            }
//            if(index==5) {
//                 if(!$('#tdp-form-bul-iii_3_lokasi_unit_produksi').val()) {
//                    alert('Lokasi Unit tidak boleh kosong');
//                    $('#tdp-form-bul-iii_3_lokasi_unit_produksi').focus();
//                    return false;
//                }
//                if(!$('#tdp-form-bul-iii_4_bank_utama_1').val()) {
//                    alert('Bank Utama tidak boleh kosong');
//                    $('#tdp-form-bul-iii_4_bank_utama_1').focus();
//                    return false;
//                }
//                
//                if(!$('#tdp-form-bul-iii_4_jumlah_bank').val()) {
//                    alert('Jumlah Bank tidak boleh kosong');
//                    $('#tdp-form-bul-iii_4_jumlah_bank').focus();
//                    return false;
//                }
//               
//            }
            if(index==6) {
                 if(!$('#izintdp-vii_b_omset').val()) {
                    alert('Omset tidak boleh kosong');
                    $('#izintdp-vii_b_omset').focus();
                    return false;
                }
                if(!$('#izintdp-vii_b_terbilang').val()) {
                    alert('Omset terbilang tidak boleh kosong');
                    $('#izintdp-vii_b_terbilang').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_c1_dasar').val()) {
                    alert('Modal Dasar tidak boleh kosong');
                    $('#izintdp-vii_c1_dasar').focus();
                    return false;
                }
                if(!$('#izintdp-vii_c2_ditempatkan').val()) {
                    alert('Modal yang ditempatkan tidak boleh kosong');
                    $('#izintdp-vii_c2_ditempatkan').focus();
                    return false;
                }
                if(!$('#izintdp-vii_c3_disetor').val()) {
                    alert('Modal yang disetor terbilang tidak boleh kosong');
                    $('#izintdp-vii_c3_disetor').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_c4_saham').val()) {
                    alert('Saham tidak boleh kosong');
                    $('#izintdp-vii_c4_saham').focus();
                    return false;
                }
                if(!$('#izintdp-vii_c5_nominal').val()) {
                    alert('Nilai Saham tidak boleh kosong');
                    $('#izintdp-vii_c5_nominal').focus();
                    return false;
                }
                if(!$('#izintdp-vii_d_totalaset').val()) {
                    alert('Total Aset tidak boleh kosong');
                    $('#izintdp-vii_d_totalaset').focus();
                    return false;
                }
                if(!$('#izintdp-vii_e_wna').val()) {
                    alert('Pekerja WNA tidak boleh kosong');
                    $('#izintdp-vii_e_wna').focus();
                    return false;
                }
                if(!$('#izintdp-vii_e_wni').val()) {
                    alert('Pekerja WNI tidak boleh kosong');
                    $('#izintdp-vii_e_wni').focus();
                    return false;
                }
                                
            }
//            if(index==7) {
//                 if(!$('#tdp-form-bul-iii_3_lokasi_unit_produksi').val()) {
//                    alert('Lokasi Unit tidak boleh kosong');
//                    $('#tdp-form-bul-iii_3_lokasi_unit_produksi').focus();
//                    return false;
//                }
//                if(!$('#tdp-form-bul-iii_4_bank_utama_1').val()) {
//                    alert('Bank Utama tidak boleh kosong');
//                    $('#tdp-form-bul-iii_4_bank_utama_1').focus();
//                    return false;
//                }
//                
//                if(!$('#tdp-form-bul-iii_4_jumlah_bank').val()) {
//                    alert('Jumlah Bank tidak boleh kosong');
//                    $('#tdp-form-bul-iii_4_jumlah_bank').focus();
//                    return false;
//                }
//               
//            }
        }
    });
    //Koprasi
    
    $('#tdp-form-kop-i_4_pemilik_telepon').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-kop-i_5_pemilik_no_ktp').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-kop-kode_pos').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-kop-telpon_perusahaan').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-kop-fax_perusahaan').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-kop-iii_4_jumlah_bank').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('.tdp-form-kop').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
           // return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.tdp-form-kop').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.tdp-form-kop').find('.pager .next').hide();
                $('.tdp-form-kop').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.tdp-form-kop').find('.pager .next').show();
                $('.tdp-form-kop').find('.pager .previous').hide();
                $('.tdp-form-kop').find('.pager .finish').hide();
            } else {
		$('.tdp-form-kop').find('.pager .next').show();
		$('.tdp-form-kop').find('.pager .previous').show();
                $('.tdp-form-kop').find('.pager .finish').hide();
	    }

        },
        
        'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                
                if(!$('#izintdp-i_2_pemilik_tpt_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izintdp-i_2_pemilik_tpt_lahir').focus();
                    return false;
                }

                if(!$('#izintdp-i_3_pemilik_alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izintdp-i_3_pemilik_alamat').focus();
                    return false;
                }

                if(!$('#izintdp-i_4_pemilik_telepon').val()) {
                    alert('No Telepon tidak boleh kosong');
                    $('#izintdp-i_4_pemilik_telepon').focus();
                    return false;
                }

                if(!$('#izintdp-i_5_pemilik_no_ktp').val()) {
                    alert('No KTP tidak boleh kosong');
                    $('#izintdp-i_5_pemilik_no_ktp').focus();
                    return false;
                }
                
                if(!$('#izintdp-i_2_pemilik_tgl_lahir').val()) {
                    alert('Tanggal lahir tidak boleh kosong');
                    $('#izintdp-i_2_pemilik_tgl_lahir').focus();
                    return false;
                }

                if(!$('#izintdp-i_6_pemilik_kewarganegaraan').val()) {
                    alert('Kewarganegaraan tidak boleh kosong');
                    $('#izintdp-i_6_pemilik_kewarganegaraan').focus();
                    return false;
                }

                
            }
            if(index==2) {
                // Make sure we entered the name
                if(!$('#izintdp-ii_1_perusahaan_nama').val()) {
                    alert('Nama Perusahaan tidak boleh kosong');
                    $('#izintdp-ii_1_perusahaan_nama').focus();
                    return false;
                }
                if(!$('#izintdp-ii_2_perusahaan_alamat').val()) {
                    alert('Alamat Perusahaan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_alamat').focus();
                    return false;
                }
                
                if(!$('#izintdp-ii_2_perusahaan_kodepos').val()) {
                    alert('Kode Pos tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_kodepos').focus();
                    return false;
                }
                if(!$('#izintdp-ii_2_perusahaan_no_telp').val()) {
                    alert('No Telp Perusahaan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_no_telp').focus();
                    return false;
                }

                if(!$('#izintdp-ii_2_perusahaan_no_fax').val()) {
                    alert('No Fax tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_no_fax').focus();
                    return false;
                }
                if(!$('#izintdp-ii_2_perusahaan_email').val()) {
                    alert('Kolom email Perusahaan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_email').focus();
                    return false;
                }
                
               
            } 
            if(index==3) {
               
                if(!$('#izintdp-iii_4_bank_utama_1').val()) {
                    alert('Bank Utama tidak boleh kosong');
                    $('#izintdp-iii_4_bank_utama_1').focus();
                    return false;
                }
                
                if(!$('#izintdp-iii_4_jumlah_bank').val()) {
                    alert('Jumlah Bank tidak boleh kosong');
                    $('#izintdp-iii_4_jumlah_bank').focus();
                    return false;
                }
                if(!$('#izintdp-iii_7a_tgl_pendirian').val()) {
                    alert('Tanggal Pendirian tidak boleh kosong');
                    $('#izintdp-iii_7a_tgl_pendirian').focus();
                    return false;
                }
               if(!$('#izintdp-iii_7b_tgl_mulai_kegiatan').val()) {
                    alert('Tanggal Mulai kegiatan tidak boleh kosong');
                    $('#izintdp-iii_7b_tgl_mulai_kegiatan').focus();
                    return false;
                }
               
            }
            if(index==4) {
                 if(!$('#izintdp-iv_a1_nomor').val()) {
                    alert('Nomor Akta tidak boleh kosong');
                    $('#izintdp-iv_a1_nomor').focus();
                    return false;
                }
                if(!$('#izintdp-iv_a1_tanggal').val()) {
                    alert('Tanggal Akta tidak boleh kosong');
                    $('#tizintdp-iv_a1_tanggal').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_notaris_nama').val()) {
                    alert('Nama Notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_nama').focus();
                    return false;
                }
                if(!$('#izintdp-iv_a1_notaris_alamat').val()) {
                    alert('Alamat Notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_alamat').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_telpon').val()) {
                    alert('No Tlp Notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_telpon').focus();
                    return false;
                }
               
            }
            if(index==5) {
                 if(!$('#izintdp-v_jumlah_pengurus').val()) {
                    alert('Jumlah Pengurus tidak boleh kosong');
                    $('#izintdp-v_jumlah_pengurus').focus();
                    return false;
                }
                if(!$('#izintdp-v_jumlah_pengawas').val()) {
                    alert('Jumlah Pengawas tidak boleh kosong');
                    $('#izintdp-v_jumlah_pengawas').focus();
                    return false;
                }
                            
            }
            if(index==6) {
                 if(!$('#izintdp-vii_b_omset').val()) {
                    alert('Omset tidak boleh kosong');
                    $('#izintdp-vii_b_omset').focus();
                    return false;
                }
                if(!$('#izintdp-vii_b_terbilang').val()) {
                    alert('Omset terbilang tidak boleh kosong');
                    $('#izintdp-vii_b_terbilang').focus();
                    return false;
                }
                //ModalSendiri
                 if(!$('#izintdp-vi_c_modal_1a').val()) {
                    alert('Simpanan Pokok tidak boleh kosong');
                    $('#izintdp-vi_c_modal_1a').focus();
                    return false;
                }
                if(!$('#izintdp-vi_c_modal_1b').val()) {
                    alert('Simpanan Wajib tidak boleh kosong');
                    $('#izintdp-vi_c_modal_1b').focus();
                    return false;
                }
                 if(!$('#izintdp-vi_c_modal_1c').val()) {
                    alert('Dana cadangan tidak boleh kosong');
                    $('#izintdp-vi_c_modal_1c').focus();
                    return false;
                }
                if(!$('#izintdp-vi_c_modal_1d').val()) {
                    alert('Hibah terbilang tidak boleh kosong');
                    $('#izintdp-vi_c_modal_1d').focus();
                    return false;
                }
                //Modal Pinjaman
                if(!$('#izintdp-vi_c_modal_2a').val()) {
                    alert('Anggota tidak boleh kosong');
                    $('#izintdp-vi_c_modal_2a').focus();
                    return false;
                }
                if(!$('#izintdp-vi_c_modal_2b').val()) {
                    alert('Koprasi Lain tidak boleh kosong');
                    $('#izintdp-vi_c_modal_2b').focus();
                    return false;
                }
                 if(!$('#izintdp-vi_c_modal_2c').val()) {
                    alert('Bank tidak boleh kosong');
                    $('#izintdp-vi_c_modal_2c').focus();
                    return false;
                }
              
                if(!$('#izintdp-vii_d_totalaset').val()) {
                    alert('Total Aset tidak boleh kosong');
                    $('#izintdp-vii_d_totalaset').focus();
                    return false;
                }
                if(!$('#izintdp-vii_e_wna').val()) {
                    alert('Pekerja WNA tidak boleh kosong');
                    $('#izintdp-vii_e_wna').focus();
                    return false;
                }
                if(!$('#izintdp-vii_e_wni').val()) {
                    alert('Pekerja WNI tidak boleh kosong');
                    $('#izintdp-vii_e_wni').focus();
                    return false;
                }
                                
            }
            if(index==7) {
                 if(!$('#izintdp-vii_1_koperasi_bentuk').val()) {
                    alert('Bentuk Koprasi tidak boleh kosong');
                    $('#izintdp-vii_1_koperasi_bentuk').focus();
                    return false;
                }
                if(!$('#izintdp-vii_2_koperasi_jenis').val()) {
                    alert('Jenis Koprasi tidak boleh kosong');
                    $('#izintdp-vii_2_koperasi_jenis').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_3_koperasi_anggota').val()) {
                    alert('Jumlah Anggota tidak boleh kosong');
                    $('#izintdp-vii_3_koperasi_anggota').focus();
                    return false;
                }
               
            }
            if(index==8) {
                 if(!$('#izintdp-iii_3_lokasi_unit_produksi').val()) {
                    alert('Lokasi Unit tidak boleh kosong');
                    $('#tdp-form-kop-iii_3_lokasi_unit_produksi').focus();
                    return false;
                }
                if(!$('#izintdp-iii_4_bank_utama_1').val()) {
                    alert('Bank Utama tidak boleh kosong');
                    $('#izintdp-iii_4_bank_utama_1').focus();
                    return false;
                }
                
                if(!$('#izintdp-iii_4_jumlah_bank').val()) {
                    alert('Jumlah Bank tidak boleh kosong');
                    $('#izintdp-iii_4_jumlah_bank').focus();
                    return false;
                }
               
            }
        }
    });
    
   
            
        
    
});
