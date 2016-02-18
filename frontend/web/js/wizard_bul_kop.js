$(document).ready(function() {
    
    //Bul
    
     $('#tdp-form-bul-i_4_pemilik_telepon').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-bul-i_5_pemilik_no_ktp').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-bul-ii_2_perusahaan_kodepos').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-bul-ii_2_perusahaan_no_telp').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-bul-ii_2_perusahaan_no_fax').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#tdp-form-bul-iii_4_jumlah_bank').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    function findEmptyInput() {
        var result = 0;
        $(".kbli_input").each(function () {
            if (!this.value) {
                result = 1;
            }
        });
        return result;
    }
    function findDuplicate() {
        var result = 0;
        var i = 0;
        var isiSatu;
        $(".kbli_input").each(function () {
            i++;
            //alert('i='+i);
            var y = 0;
            isiSatu = this.value;
            $(".kbli_input1").each(function () {
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
*/
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
                
                if($('#kantor').val() == 'Kantor Cabang' || $('#kantor').val() == 'Kantor Pembantu' || $('#kantor').val() == 'Perwakilan' ) {
                    
                    if(!$('#izintdp-iii_2_induk_nama_prsh').val()) {
                        alert('Nama Perusahaan Induk tidak boleh kosong');
                        $('#izintdp-iii_2_induk_nama_prsh').focus();
                        return false;
                    }
                    
                    if(!$('#izintdp-iii_2_induk_nomor_tdp').val()) {
                        alert('No. TDP tidak boleh kosong');
                        $('#izintdp-iii_2_induk_nomor_tdp').focus();
                        return false;
                    }
                    
                    if(!$('#izintdp-iii_2_induk_alamat').val()) {
                        alert('Alamat tidak boleh kosong');
                        $('#izintdp-iii_2_induk_alamat').focus();
                        return false;
                    }
                    
//                    if(!$('#izintdp-iii_2_induk_propinsi').val()) {
//                        alert('Propinsi tidak boleh kosong');
//                        $('#izintdp-iii_2_induk_propinsi').focus();
//                        return false;
//                    }
                    
                    if(!$('#izintdp-iii_2_induk_kelurahan').val()) {
                        alert('Kelurahan tidak boleh kosong');
                        $('#izintdp-iii_2_induk_kelurahan').focus();
                        return false;
                    }
                    
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
              /*   if(findDuplicate() == 1){
                        alert('terdapat lebih dari satu inputan kbli yang sama');
                        return false;
                    }
                    if(findEmptyInput() == 1){
                        alert('Kbli tidak boleh kosong');
                        return false;
                    }*/
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
				
				if(!$('#matarantai').val()) {
                    alert('Matarantai tidak boleh kosong');
                    $('#matarantai').focus();
                    return false;
                }
                
                if($('#matarantai').val() == '1') {
                    
                    if(!$('#izintdp-vii_fa_jumlah').val()) {
                        alert('Kapasitas Terpasang tidak boleh kosong');
                        $('#izintdp-vii_fa_jumlah').focus();
                        return false;
                    }
                    
                    if(!$('#izintdp-vii_fa_satuan').val()) {
                        alert('Satuan Kapasitas tidak boleh kosong');
                        $('#izintdp-vii_fa_satuan').focus();
                        return false;
                    }
                    
                    if(!$('#izintdp-vii_fb_jumlah').val()) {
                        alert('Kapasitas Produksi tidak boleh kosong');
                        $('#izintdp-vii_fb_jumlah').focus();
                        return false;
                    }
                    
                    if(!$('#izintdp-vii_fb_satuan').val()) {
                        alert('Satuan Prodiksi tidak boleh kosong');
                        $('#izintdp-vii_fb_satuan').focus();
                        return false;
                    }
                    
                    if(!$('#izintdp-vii_fc_lokal').val()) {
                        alert('Kandungan Komponen Lokal tidak boleh kosong');
                        $('#izintdp-vii_fc_lokal').focus();
                        return false;
                    }
                    
                    if(!$('#izintdp-vii_fc_impor').val()) {
                        alert('Kandungan Komponen Impor tidak boleh kosong');
                        $('#izintdp-vii_fc_impor').focus();
                        return false;
                    }
                    
                } else if($('#izintdp-vii_f_matarantai').val() == '6') {
                    
                    if(!$('#izintdp-vii_f_pengecer').val()) {
                        alert('Jenis Usaha tidak boleh kosong');
                        $('#izintdp-vii_f_pengecer').focus();
                        return false;
                    }
                    
                }
                                
            }
            if(index==7) {
                 if(!$('#izintdp-vi_a_kegiatan_utama').val()) {
                    alert('Kegiatan Utama tidak boleh kosong');
                    $('#izintdp-vi_a_kegiatan_utama').focus();
                    return false;
                } else {
                    //cek duplikat
                    //alert('Kegiatan Utama');
                    if(findEmptyInput() == 1){
                        //alert('Kbli tidak boleh kosong');
//                        return false;
                    } else {
                        //cek Duplikat sesama fild anak
                        if(findDuplicate() == 1){
                            alert('terdapat lebih dari satu inputan kbli yang sama');
                            return false;
                        } else {
                            //cek duplikat anak dengan parent
                            if(findDuplicateParent() == 1){
                                alert('terdapat inputan kegiatan lainnya yang sama dengan kegiatan pokok');
                                return false;
                            }
                        }
                    }
                    
                }
                
                if(!$('#kbli_ket_utama').val()) {
                    alert('Produk Utama tidak boleh kosong');
                    $('#kbli_ket_utama').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_b_omset').val()) {
                    alert('Omset tidak boleh kosong');
                    $('#izintdp-vii_b_omset').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_b_terbilang').val()) {
                    alert('Teribilang tidak boleh kosong');
                    $('#izintdp-vii_b_terbilang').focus();
                    return false;
                }
               
            }
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
            
        }
    });
    
    var max_number = 100;

    $('#izintdp-vii_fc_lokal').keyup(function(){
        if($('#izintdp-vii_fc_lokal').val() > max_number){
            alert('angka yang di input melebihi'+max_number+'%')
            $('#izintdp-vii_fc_lokal').val('0')
        }

        if($('#izintdp-vii_fc_lokal').val() < max_number){
            val2 = max_number - $('#izintdp-vii_fc_lokal').val()
        }

        if($('#izintdp-vii_fc_lokal').val() == max_number){
            val2 = max_number - $('#izintdp-vii_fc_lokal').val()
        }

        $('#izintdp-vii_fc_impor').val(val2)
    });
	
   
    
    $('.number').number(true, null, ',', '.');
    $('.no').number(true, null, ',' , '');
       
});
