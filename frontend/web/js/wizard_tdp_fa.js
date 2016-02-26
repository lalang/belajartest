$(document).ready(function() {
	
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
    
    function findDuplicateParent() {
        var result = 0;
        $(".kbli_input").each(function () {
            if(this.value == $('#izintdp-vi_a_kegiatan_utama').val()){
                result = 1;
            }
            
        });
        return result;
    }
      
    function findEmptyInput() {
        var result = 0;
        var i=0;
        $(".kbli_input").each(function () {
            if (!this.value) {
                result = 1;
            }
        });
        return result;
    }
	
	$('#izintdp-vii_c1_dasar').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$('#izintdp-vii_c4_saham').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$('#izintdp-vii_c2_ditempatkan').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$('#izintdp-vii_c5_nominal').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$('#izintdp-vii_c3_disetor').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

	$('#izintdp-vii_d_totalaset').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$('#izintdp-vii_e_wni').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$('#izintdp-vii_e_wna').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$('#izintdp-vii_fa_jumlah').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$('#izintdp-vii_fb_jumlah').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$('#izintdp-vii_fc_lokal').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
	
	$('#izintdp-vii_fc_impor').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
		
	$('#izintdp-iii_4_jumlah_bank').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });	
    // IZIN TDP

    $('.tdp-form-fa').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            //return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('.tdp-form-fa').find('.bar').css({width: $percent + '%'});

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $('.tdp-form-fa').find('.pager .next').hide();
                $('.tdp-form-fa').find('.pager .finish').hide();

            } else if (index == 0) {
                $('.tdp-form-fa').find('.pager .next').show();
                $('.tdp-form-fa').find('.pager .previous').hide();
                $('.tdp-form-fa').find('.pager .finish').hide();
            } else {
                $('.tdp-form-fa').find('.pager .next').show();
                $('.tdp-form-fa').find('.pager .previous').show();
                $('.tdp-form-fa').find('.pager .finish').hide();
            }

        },
        'onNext': function(tab, navigation, index) {
            if (index == 1) {

                if (!$('#izintdp-i_1_pemilik_nama').val()) {
                    alert('Nama pengurus tidak boleh kosong');
                    $('#izintdp-i_1_pemilik_nama').focus();
                    return false;
                }

                if (!$('#izintdp-i_2_pemilik_tpt_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izintdp-i_2_pemilik_tpt_lahir').focus();
                    return false;
                }

                if (!$('#izintdp-i_2_pemilik_tgl_lahir').val()) {
                    alert('Tanggal lahir tidak boleh kosong');
                    $('#izintdp-i_2_pemilik_tgl_lahir').focus();
                    return false;
                }

                if (!$('#izintdp-i_3_pemilik_alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izintdp-i_3_pemilik_alamat').focus();
                    return false;
                }

                if (!$('#izintdp-i_3_pemilik_kelurahan').val()) {
                    alert('Kelurahan tidak boleh kosong');
                    $('#izintdp-i_3_pemilik_kelurahan').focus();
                    return false;
                }

                if (!$('#izintdp-i_5_pemilik_no_ktp').val()) {
                    alert('KTP tidak boleh kosong');
                    $('#izintdp-i_5_pemilik_no_ktp').focus();
                    return false;
                }

                if (!$('#izintdp-i_6_pemilik_kewarganegaraan').val()) {
                    alert('Kewarganegaraan tidak boleh kosong');
                    $('#izintdp-i_6_pemilik_kewarganegaraan').focus();
                    return false;
                }
            }

            if (index == 2) {
                // Make sure we entered the name
                /*    if(!$('#izintdp-ii_1_perusahaan_nama').val()) {
                 alert('Nama Perusahaan tidak boleh kosong');
                 $('#izintdp-ii_1_perusahaan_nama').focus();
                 return false;
                 }
                 
                 if(!$('#izintdp-ii_2_perusahaan_alamat').val()) {
                 alert('Alamat Perusahaan tidak boleh kosong');
                 $('#izintdp-ii_2_perusahaan_alamat').focus();
                 return false;
                 }
                 
                 if(!$('#izintdp-ii_2_perusahaan_kelurahan').val()) {
                 alert('Kelurahan tidak boleh kosong');
                 $('#izintdp-ii_2_perusahaan_kelurahan').focus();
                 return false;
                 }
                 
                 if(!$('#izintdp-ii_2_perusahaan_kodepos').val()) {
                 alert('Kodepos Perusahaan tidak boleh kosong');
                 $('#izintdp-ii_2_perusahaan_kodepos').focus();
                 return false;
                 }
                 
                 if(!$('#izintdp-ii_2_perusahaan_no_telp').val()) {
                 alert('Telephone Perusahaan tidak boleh kosong');
                 $('#izintdp-ii_2_perusahaan_no_telp').focus();
                 return false;
                 }
                 
                 if(!$('#izintdp-ii_2_perusahaan_no_fax').val()) {
                 alert('Fax Perusahaan tidak boleh kosong');
                 $('#izintdp-ii_2_perusahaan_no_fax').focus();
                 return false;
                 }
                 */
                if (!$('#izintdp-ii_2_perusahaan_email').val()) {
                    alert('Email Perusahaan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_email').focus();
                    return false;
                }
            }

            if (index == 3) {

                if ($('#field_cpp').val() == 'Kantor Cabang' || $('#field_cpp').val() == 'Kantor Pembantu' || $('#field_cpp').val() == 'Perwakilan') {

                    if (!$('#izintdp-iii_2_induk_nama_prsh').val()) {
                        alert('Nama Perusahaan Induk tidak boleh kosong');
                        $('#izintdp-iii_2_induk_nama_prsh').focus();
                        return false;
                    }

                    if (!$('#izintdp-iii_2_induk_nomor_tdp').val()) {
                        alert('No. TDP tidak boleh kosong');
                        $('#izintdp-iii_2_induk_nomor_tdp').focus();
                        return false;
                    }

                    if (!$('#izintdp-iii_2_induk_alamat').val()) {
                        alert('Alamat tidak boleh kosong');
                        $('#izintdp-iii_2_induk_alamat').focus();
                        return false;
                    }

//                    if(!$('#izintdp-iii_2_induk_propinsi').val()) {
//                        alert('Propinsi tidak boleh kosong');
//                        $('#izintdp-iii_2_induk_propinsi').focus();
//                        return false;
//                    }

                    if (!$('#izintdp-iii_2_induk_kelurahan').val()) {
                        alert('Kelurahan tidak boleh kosong');
                        $('#izintdp-iii_2_induk_kelurahan').focus();
                        return false;
                    }

                }

                if (!$('#izintdp-iii_4_jumlah_bank').val()) {
                    alert('Jumlah bank tidak boleh kosong');
                    $('#izintdp-iii_4_jumlah_bank').focus();
                    return false;
                }

                if (!$('#izintdp-iii_5_npwp').val()) {
                    alert('NPWP tidak boleh kosong');
                    $('#izintdp-iii_5_npwp').focus();
                    return false;
                }

                if (!$('#izintdp-iii_6_status_perusahaan_id').val()) {
                    alert('Bentuk penanaman modal tidak boleh kosong');
                    $('#izintdp-iii_6_status_perusahaan_id').focus();
                    return false;
                }

                if (!$('#izintdp-iii_7a_tgl_pendirian').val()) {
                    alert('Tanggal pendirian tidak boleh kosong');
                    $('#izintdp-iii_7a_tgl_pendirian').focus();
                    return false;
                }

                if (!$('#izintdp-iii_7b_tgl_mulai_kegiatan').val()) {
                    alert('Tanggal mulai kegiatan tidak boleh kosong');
                    $('#izintdp-iii_7b_tgl_mulai_kegiatan').focus();
                    return false;
                }

            }

            if (index == 4) {
                // Make sure we entered the name

                if (!$('#izintdp-iv_a1_tanggal').val()) {
                    alert('Tanggal akta pendirian tidak boleh kosong');
                    $('#izintdp-iv_a1_tanggal').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a1_notaris_nama').val()) {
                    alert('Nama notaris akta pendirian tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_nama').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a1_notaris_alamat').val()) {
                    alert('Alamat notaris akta pendirian tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_alamat').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a1_telpon').val()) {
                    alert('Telephone tidak boleh kosong');
                    $('#izintdp-iv_a1_telpon').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a2_tanggal').val()) {
                    alert('Tanggal akta perubahan terakhir tidak boleh kosong');
                    $('#izintdp-iv_a2_tanggal').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a2_notaris').val()) {
                    alert('Nama notaris akta perubahan terakhir tidak boleh kosong');
                    $('#izintdp-iv_a2_notaris').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a3_nomor').val()) {
                    alert('Nomor pengesahan tidak boleh kosong');
                    $('#izintdp-iv_a3_nomor').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a3_tanggal').val()) {
                    alert('Tanggal pengesahan tidak boleh kosong');
                    $('#izintdp-iv_a3_tanggal').focus();
                    return false;
                }
            }

            if (index == 5) {
                if (!$('#izintdp-v_jumlah_dirut').val()) {
                    alert('Jumlah Dirut tidak boleh kosong');
                    $('#izintdp-v_jumlah_dirut').focus();
                    return false;
                }

                if (!$('#izintdp-v_jumlah_sekutu_aktif').val()) {
                    alert('Jumlah sekutu tidak boleh kosong');
                    $('#izintdp-v_jumlah_sekutu_aktif').focus();
                    return false;
                }
            }

            if (index == 6) {
                
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

                if (!$('#izintdp-vii_b_terbilang').val()) {
                    alert('Omset Perusahaan terbilang tidak boleh kosong');
                    $('#izintdp-vii_b_terbilang').focus();
                    return false;
                }

                if (!$('#izintdp-vii_c1_dasar').val()) {
                    alert('Modal dasar tidak boleh kosong');
                    $('#izintdp-vii_c1_dasar').focus();
                    return false;
                }

                if (!$('#izintdp-vii_c2_ditempatkan').val()) {
                    alert('Modal ditempatkan tidak boleh kosong');
                    $('#izintdp-vii_c2_ditempatkan').focus();
                    return false;
                }

                if (!$('#izintdp-vii_c3_disetor').val()) {
                    alert('Modal disetor tidak boleh kosong');
                    $('#izintdp-vii_c3_disetor').focus();
                    return false;
                }

                if (!$('#izintdp-vii_c4_saham').val()) {
                    alert('Banyaknya saham tidak boleh kosong');
                    $('#izintdp-vii_c4_saham').focus();
                    return false;
                }

                if (!$('#izintdp-vii_c5_nominal').val()) {
                    alert('Nilai Nominal per Saham tidak boleh kosong');
                    $('#izintdp-vii_c5_nominal').focus();
                    return false;
                }

                if (!$('#izintdp-vii_d_totalaset').val()) {
                    alert('Total asset tidak boleh kosong');
                    $('#izintdp-vii_d_totalaset').focus();
                    return false;
                }

                if (!$('#izintdp-vii_e_wni').val()) {
                    alert('Jumlah WNI tidak boleh kosong');
                    $('#izintdp-vii_e_wni').focus();
                    return false;
                }

                if (!$('#izintdp-vii_e_wna').val()) {
                    alert('Jumlah WNA tidak boleh kosong');
                    $('#izintdp-vii_e_wna').focus();
                    return false;
                }

                if (!$('#izintdp-vii_f_matarantai').val()) {
                    alert('Mata Rantai Kegiatan Usaha tidak boleh kosong');
                    $('#izintdp-vii_f_matarantai').focus();
                    return false;
                }
    
                if($('#izintdp-vii_f_matarantai').val() == '1') {
                    
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
        }
    });

    //---------------------

    var max_number = 100;

    $('#izintdp-vii_fc_lokal').keyup(function() {
        if ($('#izintdp-vii_fc_lokal').val() > max_number) {
            alert('angka yang di input melebihi' + max_number + '%')
            $('#izintdp-vii_fc_lokal').val('0')
        }

        if ($('#izintdp-vii_fc_lokal').val() < max_number) {
            val2 = max_number - $('#izintdp-vii_fc_lokal').val()
        }

        if ($('#izintdp-vii_fc_lokal').val() == max_number) {
            val2 = max_number - $('#izintdp-vii_fc_lokal').val()
        }

        $('#izintdp-vii_fc_impor').val(val2)
    });

    $('.number').number(true, null, ',', '.');

});
