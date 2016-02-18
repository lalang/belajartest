$(document).ready(function() {
    
    //alert('HELLOOO WIZARD');
    
    var max_number = 100;

    $('#izinsiup-saham_nasional').keyup(function(){
        if($('#izinsiup-saham_nasional').val() > max_number){
            alert('angka yang di input melebihi'+max_number+'%')
            $('#izinsiup-saham_nasional').val('0')
        }

        if($('#izinsiup-saham_nasional').val() < max_number){
            val2 = max_number - $('#izinsiup-saham_nasional').val()
        }

        if($('#izinsiup-saham_nasional').val() == max_number){
            val2 = max_number - $('#izinsiup-saham_nasional').val()
        }

        $('#izinsiup-saham_asing').val(val2)
    });
    
//    $('#izinsiup-saham_nasional').keyup(function(){
//        
//    });
    
    $('#izintdp-i_4_pemilik_telepon').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izintdp-i_5_pemilik_no_ktp').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izintdp-ii_2_perusahaan_kodepos').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izintdp-ii_2_perusahaan_no_telp').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izintdp-ii_2_perusahaan_no_fax').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });



    $('#izinsiup-saham_asing').keyup(function(){
        if($('#izinsiup-saham_asing').val() > max_number){
            alert('angka yang di input melebihi'+max_number+'%')
            $('#izinsiup-saham_asing').val('0')
        }

        if($('#izinsiup-saham_asing').val() < max_number){
            val2 = max_number - $('#izinsiup-saham_asing').val()
        }

        if($('#izinsiup-saham_asing').val() == max_number){
            val2 = max_number - $('#izinsiup-saham_asing').val()
        }

        $('#izinsiup-saham_nasional').val(val2)
    });

    //aktiva-pasiva
    $.fn.sumValues = function() {
        var sum = 0;
        this.each(function() {
            if ( $(this).is(':input') ) {
                var val = $(this).val();
            } else {
                var val = $(this).text();
            }
            sum += parseFloat( ('0' + val).replace(/[^0-9-\.]/g, ''), 10 );
        });
        return sum;
    };
    $('.number').number(true, null, ',', '.');
    $('#total_aktiva_lancar').val( $('input.aktiva_lancar').sumValues()).number(true, 2, ',', '.');
    $('#total_aktiva_tetap').val( $('input.aktiva_tetap').sumValues()).number(true, 2, ',', '.');
    $('#total_aktiva').val($('input.aktiva_lancar').sumValues()+$('input.aktiva_tetap').sumValues()+$('input.aktiva_lainnya').sumValues()).number(true, 2, ',', '.');
    //aktiva lancar
    $('input.aktiva_lancar').bind('keyup', function() {
        $('#total_aktiva_lancar').val( $('input.aktiva_lancar').sumValues()).number(true, 2, ',', '.');
        $('#total_aktiva').val($('input.aktiva_lancar').sumValues()+$('input.aktiva_tetap').sumValues()+$('input.aktiva_lainnya').sumValues()).number(true, 2, ',', '.');
    });

    //aktiva tetap
    $('input.aktiva_tetap').bind('keyup', function() {
        $('#total_aktiva_tetap').val( $('input.aktiva_tetap').sumValues() ).number(true, 2, ',', '.');
        $('#total_aktiva').val($('input.aktiva_lancar').sumValues()+$('input.aktiva_tetap').sumValues()+$('input.aktiva_lainnya').sumValues()).number(true, 2, ',', '.');
    });

    //aktiva lainnya
    $('input.aktiva_lainnya').bind('keyup', function() {
        $('#total_aktiva_lainya').val( $('input.aktiva_lainnya').sumValues() ).number(true, 2, ',', '.');
        $('#total_aktiva').val($('input.aktiva_lancar').sumValues()+$('input.aktiva_tetap').sumValues()+$('input.aktiva_lainnya').sumValues()).number(true, 2, ',', '.');
    });

    $('#total_pasiva_hutang_pendek').val( $('input.pasiva_jangka_pendek').sumValues() ).number(true, 2, ',', '.');
    $('#total_pasiva').val($('input.pasiva_jangka_pendek').sumValues()+$('input.pasiva_jangka_panjang').sumValues()+$('input.pasiva_kekayaan_bersih').sumValues()).number(true, 2, ',', '.');

    //pasiva hutang jangka pendek
    $('input.pasiva_jangka_pendek').bind('keyup', function() {
        $('#total_pasiva_hutang_pendek').val( $('input.pasiva_jangka_pendek').sumValues() ).number(true, 2, ',', '.');
        $('#total_pasiva').val($('input.pasiva_jangka_pendek').sumValues()+$('input.pasiva_jangka_panjang').sumValues()+$('input.pasiva_kekayaan_bersih').sumValues()).number(true, 2, ',', '.');
    });

    //pasiva hutang jangka panjang
    $('input.pasiva_jangka_panjang').bind('keyup', function() {
        //$('#total_pasiva_hutang_pendek').val( $('input.pasiva_jangka_pendek').sumValues() );
        $('#total_pasiva').val($('input.pasiva_jangka_pendek').sumValues()+$('input.pasiva_jangka_panjang').sumValues()+$('input.pasiva_kekayaan_bersih').sumValues()).number(true, 2, ',', '.');
    });

    //pasiva kekayaan bersih
    $('input.pasiva_kekayaan_bersih').bind('keyup', function() {
        //$('#total_pasiva_hutang_pendek').val( $('input.pasiva_jangka_pendek').sumValues() );
        $('#total_pasiva').val($('input.pasiva_jangka_pendek').sumValues()+$('input.pasiva_jangka_panjang').sumValues()+$('input.pasiva_kekayaan_bersih').sumValues()).number(true, 2, ',', '.');
    });




    $('#izinsiup-modal').keydown(function (e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                e.preventDefault();
            }
        }
    });

    $('#izinsiup-nilai_saham_pma').keydown(function (e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                e.preventDefault();
            }
        }
    });

    $('.aktiva').keydown(function (e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                e.preventDefault();
            }
        }
    });

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


    $('.tdp-form-pt').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
//            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.tdp-form-pt').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.tdp-form-pt').find('.pager .next').hide();
                $('.tdp-form-pt').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.tdp-form-pt').find('.pager .next').show();
                $('.tdp-form-pt').find('.pager .previous').hide();
                $('.tdp-form-pt').find('.pager .finish').hide();
            } else {
		$('.tdp-form-pt').find('.pager .next').show();
		$('.tdp-form-pt').find('.pager .previous').show();
                $('.tdp-form-pt').find('.pager .finish').hide();
	    }

        },
        'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                if(!$('#izintdp-i_1_pemilik_nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izintdp-i_1_pemilik_nama').focus();
                    return false;
                }

                if(!$('#izintdp-i_2_pemilik_tpt_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izintdp-i_2_pemilik_tpt_lahir').focus();
                    return false;
                }

                if(!$('#izintdp-i_2_pemilik_tgl_lahir').val()) {
                    alert('Tanggal lahir tidak boleh kosong');
                    $('#izintdp-i_2_pemilik_tgl_lahir').focus();
                    return false;
                }

                if(!$('#izintdp-i_3_pemilik_alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izintdp-i_3_pemilik_alamat').focus();
                    return false;
                }
                
//                if(!$('#izintdp-i_3_pemilik_propinsi').val()) {
//                    alert('Propinsi tidak boleh kosong');
//                    $('#izintdp-i_3_pemilik_propinsi').focus();
//                    return false;
//                }

                if(!$('#izintdp-i_3_pemilik_kelurahan').val()) {
                    alert('Kelurahan tidak boleh kosong');
                    $('#izintdp-i_3_pemilik_kelurahan').focus();
                    return false;
                }

                if(!$('#izintdp-i_4_pemilik_telepon').val()) {
                    alert('Telepon tidak boleh kosong');
                    $('#izintdp-i_4_pemilik_telepon').focus();
                    return false;
                }
                
                if(!$('#izintdp-i_5_pemilik_no_ktp').val()) {
                    alert('No. KTP tidak boleh kosong');
                    $('#izintdp-i_5_pemilik_no_ktp').focus();
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
             /*   if(!$('#izintdp-ii_1_perusahaan_nama').val()) {
                    alert('Nama perusahaan tidak boleh kosong');
                    $('#izintdp-ii_1_perusahaan_nama').focus();
                    return false;
                }

                if(!$('#izintdp-ii_2_perusahaan_alamat').val()) {
                    alert('Alamat perusahaan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_alamat').focus();
                    return false;
                }

//                if(!$('#izintdp-ii_2_perusahaan_propinsi').val()) {
//                    alert('Propinsi tidak boleh kosong');
//                    $('#izintdp-ii_2_perusahaan_propinsi').focus();
//                    return false;
//                }

                if(!$('#izintdp-ii_2_perusahaan_kelurahan').val()) {
                    alert('Kelurahan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_kelurahan').focus();
                    return false;
                }
                
                if(!$('#izintdp-ii_2_perusahaan_kodepos').val()) {
                    alert('Kodepos tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_kodepos').focus();
                    return false;
                }
                
                if(!$('#izintdp-ii_2_perusahaan_no_telp').val()) {
                    alert('Telepon tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_no_telp').focus();
                    return false;
                }
                
                if(!$('#izintdp-ii_2_perusahaan_email').val()) {
                    alert('Email tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_email').focus();
                    return false;
                }
                */
            }
            if(index==3) {
                // Make sure we entered the name
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
                    alert('Bank Utama pendirian tidak boleh kosong');
                    $('#izintdp-iii_4_bank_utama_1').focus();
                    return false;
                }

                if(!$('#izintdp-iii_4_jumlah_bank').val()) {
                    alert('Jumlah Bank tidak boleh kosong');
                    $('#izintdp-iii_4_jumlah_bank').focus();
                    return false;
                }

		if(!$('#izintdp-iii_5_npwp').val()) {
                    alert('NPWP tidak boleh kosong');
                    $('#izintdp-iii_5_npwp').focus();
                    return false;
                }
                
                if(!$('#izintdp-iii_7a_tgl_pendirian').val()) {
                    alert('Tanggal Pendirian tidak boleh kosong');
                    $('#izintdp-iii_7a_tgl_pendirian').focus();
                    return false;
                }
                
                if(!$('#izintdp-iii_7b_tgl_mulai_kegiatan').val()) {
                    alert('Tanggal Mulai Kegiatan tidak boleh kosong');
                    $('#izintdp-iii_7a_tgl_pendirian').focus();
                    return false;
                }
                
            }

            if(index==4) {
                // Make sure we entered the name
                if(!$('#izintdp-iv_a1_nomor').val()) {
                    alert('Nomor akta pendirian tidak boleh kosong');
                    $('#izintdp-iv_a1_nomor').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_tanggal').val()) {
                    alert('Tanggal pengesahan akta pendirian tidak boleh kosong');
                    $('#izintdp-iv_a1_tanggal').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_notaris_nama').val()) {
                    alert('Nama Notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_nama').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_notaris_alamat').val()) {
                    alert('Alamat notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_alamat').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_telpon').val()) {
                    alert('No. Telpon tidak boleh kosong');
                    $('#izintdp-iv_a1_telpon').focus();
                    return false;
                }
                
//                if(!$('#izintdp-iv_a2_nomor').val()) {
//                    alert('Nonor tidak boleh kosong');
//                    $('#izintdp-iv_a2_nomor').focus();
//                    return false;
//                }
//                
//                if(!$('#izintdp-iv_a2_tanggal').val()) {
//                    alert('Tanggal pengesahan tidak boleh kosong');
//                    $('#izintdp-iv_a2_tanggal').focus();
//                    return false;
//                }
//                
//                if(!$('#izintdp-iv_a2_notaris').val()) {
//                    alert('Nama notaris tidak boleh kosong');
//                    $('#izintdp-iv_a2_notaris').focus();
//                    return false;
//                }
                
                if(!$('#izintdp-iv_a3_nomor').val()) {
                    alert('Nomor tidak boleh kosong');
                    $('#izintdp-iv_a3_nomor').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a3_tanggal').val()) {
                    alert('Tanggal pengesahan tidak boleh kosong');
                    $('#izintdp-iv_a3_tanggal').focus();
                    return false;
                }
                
//                if(!$('#izintdp-iv_a4_nomor').val()) {
//                    alert('Nomor tidak boleh kosong');
//                    $('#izintdp-iv_a4_nomor').focus();
//                    return false;
//                }
//                
//                if(!$('#izintdp-iv_a4_tanggal').val()) {
//                    alert('Tanggal pengesahan tidak boleh kosong');
//                    $('#izintdp-iv_a4_tanggal').focus();
//                    return false;
//                }
//                
//                if(!$('#izintdp-iv_a5_nomor').val()) {
//                    alert('Nomor tidak boleh kosong');
//                    $('#izintdp-iv_a5_nomor').focus();
//                    return false;
//                }
//                
//                if(!$('#izintdp-iv_a5_tanggal').val()) {
//                    alert('Tanggal pengesahan tidak boleh kosong');
//                    $('#izintdp-iv_a5_tanggal').focus();
//                    return false;
//                }
//                
//                if(!$('#izintdp-iv_a6_nomor').val()) {
//                    alert('Nomor tidak boleh kosong');
//                    $('#izintdp-iv_a6_nomor').focus();
//                    return false;
//                }
//                
//                if(!$('#izintdp-iv_a6_tanggal').val()) {
//                    alert('Tanggal pengesahan tidak boleh kosong');
//                    $('#izintdp-iv_a6_tanggal').focus();
//                    return false;
//                }
                              
                                
                
            }

            if(index==5){
                //$('#coba').click(function () {

            
            }

            if(index==6) {
                
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
                
                if(!$('#izintdp-vii_c1_dasar').val()) {
                    alert('Modal Dasar tidak boleh kosong');
                    $('#izintdp-vii_c1_dasar').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_c2_ditempatkan').val()) {
                    alert('Modal ditempatkan tidak boleh kosong');
                    $('#izintdp-vii_c2_ditempatkan').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_c3_disetor').val()) {
                    alert('Modal disetor tidak boleh kosong');
                    $('#izintdp-vii_c3_disetor').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_c4_saham').val()) {
                    alert('Banyak Saham tidak boleh kosong');
                    $('#izintdp-vii_c4_saham').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_c5_nominal').val()) {
                    alert('Nilai nominal tidak boleh kosong');
                    $('#izintdp-vii_c5_nominal').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_d_totalaset').val()) {
                    alert('Total Asset tidak boleh kosong');
                    $('#izintdp-vii_d_totalaset').focus();
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
            
            if(index==8) {
                if(!$('#izintdp-viii_jenis_perusahaan').val()) {
                    alert('Jenis Perusahaan tidak boleh kosong');
                    $('#izintdp-viii_jenis_perusahaan').focus();
                    return false;
                }
            }
            
            if(index==9) {
                
            }
        }
    });
    
    $('.tdp-form-po').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
//            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.tdp-form-pt').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.tdp-form-pt').find('.pager .next').hide();
                $('.tdp-form-pt').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.tdp-form-pt').find('.pager .next').show();
                $('.tdp-form-pt').find('.pager .previous').hide();
                $('.tdp-form-pt').find('.pager .finish').hide();
            } else {
		$('.tdp-form-pt').find('.pager .next').show();
		$('.tdp-form-pt').find('.pager .previous').show();
                $('.tdp-form-pt').find('.pager .finish').hide();
	    }

        },
        'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                if(!$('#izintdp-i_1_pemilik_nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izintdp-i_1_pemilik_nama').focus();
                    return false;
                }

                if(!$('#izintdp-i_2_pemilik_tpt_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izintdp-i_2_pemilik_tpt_lahir').focus();
                    return false;
                }

                if(!$('#izintdp-i_2_pemilik_tgl_lahir').val()) {
                    alert('Tanggal lahir tidak boleh kosong');
                    $('#izintdp-i_2_pemilik_tgl_lahir').focus();
                    return false;
                }

                if(!$('#izintdp-i_3_pemilik_alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izintdp-i_3_pemilik_alamat').focus();
                    return false;
                }
                
//                if(!$('#izintdp-i_3_pemilik_propinsi').val()) {
//                    alert('Propinsi tidak boleh kosong');
//                    $('#izintdp-i_3_pemilik_propinsi').focus();
//                    return false;
//                }

                if(!$('#izintdp-i_3_pemilik_kelurahan').val()) {
                    alert('Kelurahan tidak boleh kosong');
                    $('#izintdp-i_3_pemilik_kelurahan').focus();
                    return false;
                }

                if(!$('#izintdp-i_4_pemilik_telepon').val()) {
                    alert('Telepon tidak boleh kosong');
                    $('#izintdp-i_4_pemilik_telepon').focus();
                    return false;
                }
                
                if(!$('#izintdp-i_5_pemilik_no_ktp').val()) {
                    alert('No. KTP tidak boleh kosong');
                    $('#izintdp-i_5_pemilik_no_ktp').focus();
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
             /*   if(!$('#izintdp-ii_1_perusahaan_nama').val()) {
                    alert('Nama perusahaan tidak boleh kosong');
                    $('#izintdp-ii_1_perusahaan_nama').focus();
                    return false;
                }

                if(!$('#izintdp-ii_2_perusahaan_alamat').val()) {
                    alert('Alamat perusahaan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_alamat').focus();
                    return false;
                }

//                if(!$('#izintdp-ii_2_perusahaan_propinsi').val()) {
//                    alert('Propinsi tidak boleh kosong');
//                    $('#izintdp-ii_2_perusahaan_propinsi').focus();
//                    return false;
//                }

                if(!$('#izintdp-ii_2_perusahaan_kelurahan').val()) {
                    alert('Kelurahan tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_kelurahan').focus();
                    return false;
                }
                
                if(!$('#izintdp-ii_2_perusahaan_kodepos').val()) {
                    alert('Kodepos tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_kodepos').focus();
                    return false;
                }
                
                if(!$('#izintdp-ii_2_perusahaan_no_telp').val()) {
                    alert('Telepon tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_no_telp').focus();
                    return false;
                }
                
                if(!$('#izintdp-ii_2_perusahaan_email').val()) {
                    alert('Email tidak boleh kosong');
                    $('#izintdp-ii_2_perusahaan_email').focus();
                    return false;
                }
                */
            }
            if(index==3) {
                // Make sure we entered the name
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
                    alert('Bank Utama pendirian tidak boleh kosong');
                    $('#izintdp-iii_4_bank_utama_1').focus();
                    return false;
                }

                if(!$('#izintdp-iii_4_jumlah_bank').val()) {
                    alert('Jumlah Bank tidak boleh kosong');
                    $('#izintdp-iii_4_jumlah_bank').focus();
                    return false;
                }

		if(!$('#izintdp-iii_5_npwp').val()) {
                    alert('NPWP tidak boleh kosong');
                    $('#izintdp-iii_5_npwp').focus();
                    return false;
                }
                
                if(!$('#izintdp-iii_7a_tgl_pendirian').val()) {
                    alert('Tanggal Pendirian tidak boleh kosong');
                    $('#izintdp-iii_7a_tgl_pendirian').focus();
                    return false;
                }
                
                if(!$('#izintdp-iii_7b_tgl_mulai_kegiatan').val()) {
                    alert('Tanggal Mulai Kegiatan tidak boleh kosong');
                    $('#izintdp-iii_7a_tgl_pendirian').focus();
                    return false;
                }
                
            }

            if(index==4) {
                // Make sure we entered the name
                if(!$('#izintdp-iv_a1_nomor').val()) {
                    alert('Nomor akta pendirian tidak boleh kosong');
                    $('#izintdp-iv_a1_nomor').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_tanggal').val()) {
                    alert('Tanggal pengesahan akta pendirian tidak boleh kosong');
                    $('#izintdp-iv_a1_tanggal').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_notaris_nama').val()) {
                    alert('Nama Notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_nama').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_notaris_alamat').val()) {
                    alert('Alamat notaris tidak boleh kosong');
                    $('#izintdp-iv_a1_notaris_alamat').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a1_telpon').val()) {
                    alert('No. Telpon tidak boleh kosong');
                    $('#izintdp-iv_a1_telpon').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a2_nomor').val()) {
                    alert('Nonor tidak boleh kosong');
                    $('#izintdp-iv_a2_nomor').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a2_tanggal').val()) {
                    alert('Tanggal pengesahan tidak boleh kosong');
                    $('#izintdp-iv_a2_tanggal').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a2_notaris').val()) {
                    alert('Nama notaris tidak boleh kosong');
                    $('#izintdp-iv_a2_notaris').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a3_nomor').val()) {
                    alert('Nomor tidak boleh kosong');
                    $('#izintdp-iv_a3_nomor').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a3_tanggal').val()) {
                    alert('Tanggal pengesahan tidak boleh kosong');
                    $('#izintdp-iv_a3_tanggal').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a4_nomor').val()) {
                    alert('Nomor tidak boleh kosong');
                    $('#izintdp-iv_a3_nomor').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a4_tanggal').val()) {
                    alert('Tanggal pengesahan tidak boleh kosong');
                    $('#izintdp-iv_a3_tanggal').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a5_nomor').val()) {
                    alert('Nomor tidak boleh kosong');
                    $('#izintdp-iv_a3_nomor').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a5_tanggal').val()) {
                    alert('Tanggal pengesahan tidak boleh kosong');
                    $('#izintdp-iv_a3_tanggal').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a6_nomor').val()) {
                    alert('Nomor tidak boleh kosong');
                    $('#izintdp-iv_a3_nomor').focus();
                    return false;
                }
                
                if(!$('#izintdp-iv_a6_tanggal').val()) {
                    alert('Tanggal pengesahan tidak boleh kosong');
                    $('#izintdp-iv_a3_tanggal').focus();
                    return false;
                }
                              
                                
                
            }

            if(index==5){
                //$('#coba').click(function () {

            
            }

            if(index==6) {
                
            }
            
            if(index==7) {
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
                
                if(!$('#izintdp-vii_c1_dasar').val()) {
                    alert('Modal Dasar tidak boleh kosong');
                    $('#izintdp-vii_c1_dasar').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_c2_ditempatkan').val()) {
                    alert('Modal ditempatkan tidak boleh kosong');
                    $('#izintdp-vii_c2_ditempatkan').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_c3_disetor').val()) {
                    alert('Modal disetor tidak boleh kosong');
                    $('#izintdp-vii_c3_disetor').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_c4_saham').val()) {
                    alert('Banyak Saham tidak boleh kosong');
                    $('#izintdp-vii_c4_saham').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_c5_nominal').val()) {
                    alert('Nilai nominal tidak boleh kosong');
                    $('#izintdp-vii_c5_nominal').focus();
                    return false;
                }
                
                if(!$('#izintdp-vii_d_totalaset').val()) {
                    alert('Total Asset tidak boleh kosong');
                    $('#izintdp-vii_d_totalaset').focus();
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
            
            if(index==8) {
                if(!$('#izintdp-viii_jenis_perusahaan').val()) {
                    alert('Jenis Perusahaan tidak boleh kosong');
                    $('#izintdp-viii_jenis_perusahaan').focus();
                    return false;
                }
            }
            
            if(index==9) {
                
            }
        }
    });
    
    //Samuel
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


});
