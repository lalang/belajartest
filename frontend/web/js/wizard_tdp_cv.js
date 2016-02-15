$(document).ready(function() {

    // IZIN TDP

    $('.tdp-form-cv').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            //return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('.tdp-form-cv').find('.bar').css({width: $percent + '%'});

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $('.tdp-form-cv').find('.pager .next').hide();
                $('.tdp-form-cv').find('.pager .finish').hide();

            } else if (index == 0) {
                $('.tdp-form-cv').find('.pager .next').show();
                $('.tdp-form-cv').find('.pager .previous').hide();
                $('.tdp-form-cv').find('.pager .finish').hide();
            } else {
                $('.tdp-form-cv').find('.pager .next').show();
                $('.tdp-form-cv').find('.pager .previous').show();
                $('.tdp-form-cv').find('.pager .finish').hide();
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

                if (!$('#izintdp-i_4_pemilik_telepon').val()) {
                    alert('Telephone tidak boleh kosong');
                    $('#izintdp-i_4_pemilik_telepon').focus();
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
                /* if(!$('#izintdp-ii_1_perusahaan_nama').val()) {
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
                 
                 if(!$('#izintdp-ii_2_perusahaan_email').val()) {
                 alert('Email Perusahaan tidak boleh kosong');
                 $('#izintdp-ii_2_perusahaan_email').focus();
                 return false;
                 }*/
            }

            if (index == 3) {
                
                if($('#field_cpp').val() == 'Kantor Cabang' || $('#field_cpp').val() == 'Kantor Pembantu' || $('#field_cpp').val() == 'Perwakilan' ) {
                    
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


                // Make sure we entered the name
                if (!$('#izintdp-iii_1_nama_kelompok').val()) {
                    alert('Nama kelompok tidak boleh kosong');
                    $('#izintdp-iii_1_nama_kelompok').focus();
                    return false;
                }

                /*		if(!$('#izintdp-iii_2_status_prsh').val()) {
                 alert('Status Perusahaan tidak boleh kosong');
                 $('#izintdp-iii_2_status_prsh').focus();
                 return false;
                 }	
                 */
                if (!$('#izintdp-iii_3_lokasi_unit_produksi').val()) {
                    alert('Lokasi unit produksi tidak boleh kosong');
                    $('#izintdp-iii_3_lokasi_unit_produksi').focus();
                    return false;
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

                if (!$('#izintdp-no_sk_siup').val()) {
                    alert('No. SK Siup tidak boleh kosong');
                    $('#izintdp-no_sk_siup').focus();
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

                if (!$('#izintdp-iii_8_bentuk_kerjasama_pihak3').val()) {
                    alert('Bentuk kerjasama tidak boleh kosong');
                    $('#izintdp-iii_8_bentuk_kerjasama_pihak3').focus();
                    return false;
                }

                if (!$('#izintdp-iii_9a_merek_dagang_nama').val()) {
                    alert('Merek dagang tidak boleh kosong');
                    $('#izintdp-iii_9a_merek_dagang_nama').focus();
                    return false;
                }

                if (!$('#izintdp-iii_9a_merek_dagang_nomor').val()) {
                    alert('Nomor merek dagang tidak boleh kosong');
                    $('#izintdp-iii_9a_merek_dagang_nomor').focus();
                    return false;
                }

                if (!$('#izintdp-iii_9b_hak_paten_nama').val()) {
                    alert('Nama hak paten tidak boleh kosong');
                    $('#izintdp-iii_9b_hak_paten_nama').focus();
                    return false;
                }

                if (!$('#izintdp-iii_9b_hak_paten_nomor').val()) {
                    alert('Nomor hak paten tidak boleh kosong');
                    $('#izintdp-iii_9b_hak_paten_nomor').focus();
                    return false;
                }

                if (!$('#izintdp-iii_9c_hak_cipta_nama').val()) {
                    alert('Nama hak cipta tidak boleh kosong');
                    $('#izintdp-iii_9c_hak_cipta_nama').focus();
                    return false;
                }

                if (!$('#izintdp-iii_9c_hak_cipta_nomor').val()) {
                    alert('Nomor hak cipta tidak boleh kosong');
                    $('#izintdp-iii_9c_hak_cipta_nomor').focus();
                    return false;
                }
            }

            if (index == 4) {
                // Make sure we entered the name
                if (!$('#izintdp-iv_a1_nomor').val()) {
                    alert('Nomor tidak boleh kosong');
                    $('#izintdp-iv_a1_nomor').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a1_tanggal').val()) {
                    alert('Tanggal tidak boleh kosong');
                    $('#izintdp-iv_a1_tanggal').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a1_notaris_nama').val()) {
                    alert('Nama notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_nama').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a1_notaris_alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_alamat').focus();
                    return false;
                }

                if (!$('#izintdp-iv_a1_telpon').val()) {
                    alert('Telephone tidak boleh kosong');
                    $('#izintdp-iv_a1_telpon').focus();
                    return false;
                }
            }

            if (index == 5) {
                if (!$('#izintdp-v_jumlah_pengurus').val()) {
                    alert('Pengurus tidak boleh kosong');
                    $('#izintdp-v_jumlah_pengurus').focus();
                    return false;
                }

                if (!$('#izintdp-v_jumlah_sekutu_aktif').val()) {
                    alert('Jumlah sekutu aktif tidak boleh kosong');
                    $('#izintdp-v_jumlah_sekutu_aktif').focus();
                    return false;
                }

                if (!$('#izintdp-v_jumlah_sekutu_pasif').val()) {
                    alert('Jumlah sekutu pasif tidak boleh kosong');
                    $('#izintdp-v_jumlah_sekutu_pasif').focus();
                    return false;
                }

                if (!$('#izintdp-v_jumlah_sekutu_aktif_baru').val()) {
                    alert('Jumlah sekutu aktif baru tidak boleh kosong');
                    $('#izintdp-v_jumlah_sekutu_aktif_baru').focus();
                    return false;
                }

                if (!$('#izintdp-v_jumlah_sekutu_pasif_baru').val()) {
                    alert('Jumlah sekutu aktif baru tidak boleh kosong');
                    $('#izintdp-v_jumlah_sekutu_pasif_baru').focus();
                    return false;
                }
            }

            if (index == 6) {
                if (!$('#izintdp-vi_jumlah_pemegang_saham').val()) {
                    alert('Jumlah pemegang saham tidak boleh kosong');
                    $('#izintdp-vi_jumlah_pemegang_saham').focus();
                    return false;
                }
            }

            if (index == 7) {
                if (!$('#izintdp-vii_b_omset').val()) {
                    alert('Omset Perusahaan tidak boleh kosong');
                    $('#izintdp-vii_b_omset').focus();
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

                if (!$('#izintdp-vii_c6_aktif').val()) {
                    alert('Distor sekutu aktif tidak boleh kosong');
                    $('#izintdp-vii_c6_aktif').focus();
                    return false;
                }

                if (!$('#izintdp-vii_c7_pasif').val()) {
                    alert('Distor sekutu pasif tidak boleh kosong');
                    $('#izintdp-vii_c7_pasif').focus();
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
                    alert('Kedudukan tidak boleh kosong');
                    $('#izintdp-vii_f_matarantai').focus();
                    return false;
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
