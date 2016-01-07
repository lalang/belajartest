$(document).ready(function() {
    
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
    
    $('#izinsiup-telepon').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izinsiup-fax').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izinsiup-kode_pos').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izinsiup-telpon_perusahaan').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izinsiup-fax_perusahaan').on('input', function(event) {
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
      
    function findEmptyInput() {
        var result = 0;
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


    $('.siup-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            //return false;
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
                if(!$('#izinsiup-ktp').val()) {
                    alert('KTP tidak boleh kosong');
                    $('#izinsiup-ktp').focus();
                    return false;
                }

                if(!$('#izinsiup-nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izinsiup-nama').focus();
                    return false;
                }

                if(!$('#izinsiup-alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izinsiup-alamat').focus();
                    return false;
                }

                if(!$('#izinsiup-tempat_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izinsiup-tempat_lahir').focus();
                    return false;
                }

                if(!$('#izinsiup-kewarganegaraan').val()) {
                    alert('Kewarganegaraan tidak boleh kosong');
                    $('#izinsiup-kewarganegaraan').focus();
                    return false;
                }

                if(!$('#izinsiup-jabatan_perusahaan').val()) {
                    alert('Jabatan Perusahaan tidak boleh kosong');
                    $('#izinsiup-jabatan_perusahaan').focus();
                    return false;
                }
            }
            if(index==2) {
                // Make sure we entered the name
                if(!$('#izinsiup-npwp_perusahaan').val() && $('#izinsiup-tipe').val()=="Perusahaan") {
                    alert('npwp perusahaan tidak boleh kosong');
                    $('#izinsiup-npwp_perusahaan').focus();
                    return false;
                }

                if(!$('#izinsiup-nama_perusahaan').val()) {
                    alert('Nama perusahaan tidak boleh kosong');
                    $('#izinsiup-nama_perusahaan').focus();
                    return false;
                }

                if(!$('#izinsiup-bentuk_perusahaan').val()) {
                    alert('Harap pilih bentuk perusahaan');
                    $('#izinsiup-bentuk_perusahaan').focus();
                    return false;
                }

                if(!$('#izinsiup-alamat_perusahaan').val()) {
                    alert('Alamat Perusahaan tidak boleh kosong');
                    $('#izinsiup-alamat_perusahaan').focus();
                    return false;
                }

                if(!$('#izinsiup-kode_pos').val()) {
                    alert('Kode pos tidak boleh kosong');
                    $('#izinsiup-kode_pos').focus();
                    return false;
                }
            }
            if(index==3) {
                // Make sure we entered the name
                if(!$('#izinsiup-akta_pendirian_no').val() && $('#izinsiup-tipe').val()=="Perusahaan") {
                    alert('Akta pendirian tidak boleh kosong');
                    $('#izinsiup-akta_pendirian_no').focus();
                    return false;
                }
		
		if(!$('#izinsiup-akta_pendirian_tanggal').val() && $('#izinsiup-tipe').val()=="Perusahaan") {
                    alert('Tanggal Akta pendirian tidak boleh kosong');
                    $('#izinsiup-akta_pendirian_tanggal').focus();
                    return false;
                }

                if(!$('#izinsiup-no_sk').val() && $('#izinsiup-tipe').val()=="Perusahaan") {
                    alert('No SK Kemenkumham tidak boleh kosong');
                    $('#izinsiup-no_sk').focus();
                    return false;
                }

		if(!$('#izinsiup-tanggal_pengesahan').val() && $('#izinsiup-tipe').val()=="Perusahaan") {
                    alert('Tanggal Pengesahan Kemenkumham tidak boleh kosong');
                    $('#izinsiup-tanggal_pengesahan').focus();
                    return false;
                }
            }

            if(index==4) {
                // Make sure we entered the name
                if(!$('#izinsiup-modal').val()) {
                    alert('modal tidak boleh kosong');
                    $('#izinsiup-modal').focus();
                    return false;
                }
                              
                                
                if((parseInt($('#izinsiup-modal').val()) < parseInt($('.LimitMin').val())) ||  (parseInt($('#izinsiup-modal').val()) > parseInt($('.LimitMax').val())) ) {
                   if (confirm('Kekayaan bersih tidak sesuai dengan syarat jenis ijin yang dipilih ( '+ parseInt($('.LimitMin').val()) +'<= MODAL <= '+ parseInt($('.LimitMax').val()) +'), mohon memilih jenis ijin yang sesuai dengan kekayaan bersih anda.')) {
                        window.location.replace(""+window.location.protocol + "//" + window.location.host + "/perizinan/search");
                    } else {
                        $('#izinsiup-modal').focus();
                        return false;
                    }
                    return false;
                }
            }

            if(index==5){
                //$('#coba').click(function () {

                    if(findDuplicate() == 1){
                        alert('terdapat lebih dari satu inputan kbli yang sama');
                        return false;
                    }
                    
                    if(findEmptyInput() == 1){
                        alert('Kbli tidak boleh kosong');
                        return false;
                    }
            
            }

            if(index==6) {
                // Make sure we entered the name
                if(!$('#izinsiup-aktiva_lancar_kas').val()) {
                    $('#izinsiup-aktiva_lancar_kas').val('0');
//                    return false;
                }
                if(!$('#izinsiup-aktiva_lancar_bank').val()) {
//                    alert('aktiva bank tidak boleh kosong');
                    $('#izinsiup-aktiva_lancar_bank').val('0');
//                    return false;
                }
                if(!$('#izinsiup-aktiva_lancar_piutang').val()) {
//                    alert('aktiva piutang tidak boleh kosong');
                    $('#izinsiup-aktiva_lancar_piutang').val('0');
//                    return false;
                }
                if(!$('#izinsiup-aktiva_lancar_barang').val()) {
//                    alert('aktiva barang tidak boleh kosong');
                    $('#izinsiup-aktiva_lancar_barang').val('0');
//                    return false;
                }
                if(!$('#izinsiup-aktiva_lancar_pekerjaan').val()) {
//                    alert('aktiva pekerjaan tidak boleh kosong');
                    $('#izinsiup-aktiva_lancar_pekerjaan').val('0');
//                    return false;
                }
                if(!$('#izinsiup-aktiva_tetap_peralatan').val()) {
//                    alert('aktiva peralatan dalam mesin tidak boleh kosong');
                    $('#izinsiup-aktiva_tetap_peralatan').val('0');
//                    return false;
                }
                if(!$('#izinsiup-aktiva_tetap_investasi').val()) {
//                    alert('aktiva tetap investasi tidak boleh kosong');
                    $('#izinsiup-aktiva_tetap_investasi').val('0');
//                    return false;
                }
                if(!$('#izinsiup-aktiva_lainnya').val()) {
//                    alert('aktiva lainnya tidak boleh kosong');
                    $('#izinsiup-aktiva_lainnya').val('0');
//                    return false;
                }
                if(!$('#izinsiup-pasiva_hutang_dagang').val()) {
//                    alert('pasiva hutang dagang tidak boleh kosong');
                    $('#izinsiup-pasiva_hutang_dagang').val('0');
//                    return false;
                }
                if(!$('#izinsiup-pasiva_hutang_pajak').val()) {
//                    alert('pasiva hutang pajak tidak boleh kosong');
                    $('#izinsiup-pasiva_hutang_pajak').val('0');
//                    return false;
                }
                if(!$('#izinsiup-pasiva_hutang_lainnya').val()) {
//                    alert('pasiva hutang lainnya tidak boleh kosong');
                    $('#izinsiup-pasiva_hutang_lainnya').val('0');
//                    return false;
                }
                if(!$('#izinsiup-hutang_jangka_panjang').val()) {
//                    alert('pasiva hutang jangka panjang tidak boleh kosong');
                    $('#izinsiup-hutang_jangka_panjang').val('0');
//                    return false;
                }
                if(!$('#izinsiup-kekayaan_bersih').val()) {
//                    alert('pasiva kekayaan bersih tidak boleh kosong');
                    $('#izinsiup-kekayaan_bersih').val('0');
//                    return false;
                }

                if($('#izinsiup-modal').val() !== $('#izinsiup-kekayaan_bersih').val()){
                    alert('data kekayaan bersih di aktiva tidak sama dengan kekayaan bersih di tab modal dan saham');
                    $('#izinsiup-kekayaan_bersih').focus();
                    return false;
                }

                if($('#total_aktiva').val() !== $('#total_pasiva').val()){
                    alert('Total aktiva dan pasiva tidak sama');
                    return false;
                }
                
                if((parseInt($('#izinsiup-kekayaan_bersih').val()) < parseInt($('.LimitMin').val())) ||  (parseInt($('#izinsiup-kekayaan_bersih').val()) > parseInt($('.LimitMax').val())) ) {
//                    alert('Kekayaan bersih tidak sesuai dengan syarat jenis ijin yang dipilih ( '+ parseInt($('.LimitMin').val()) +'<= MODAL <= '+ parseInt($('.LimitMax').val()) +'), mohon memilih jenis ijin yang sesuai dengan kekayaan bersih anda.');
                    if (confirm('Kekayaan bersih tidak sesuai dengan syarat jenis ijin yang dipilih ( '+ parseInt($('.LimitMin').val()) +'<= MODAL <= '+ parseInt($('.LimitMax').val()) +'), mohon memilih jenis ijin yang sesuai dengan kekayaan bersih anda.')) {
                        window.location.replace(""+window.location.protocol + "//" + window.location.host + "/perizinan/search");
                    } else {
                        $('#izinsiup-kekayaan_bersih').focus();
                        return false;
                    }
                    return false;
                }
            }
        }
    });
    
    $('.pm1-form-sktm').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            //return false;
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
                
                if(!$('#izinpm1-telepon').val()) {
                    alert('Telepon tidak boleh kosong');
                    $('#izinpm1-telepon').focus();
                    return false;
                }
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
                    if(!$('#izinpm1-kelurahan_id_orang_lain').val()) {
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
                    if(!$('#izinpm1-telepon_orang_lain').val()) {
                        alert('Telepon Orang Lain tidak boleh kosong');
                        $('#izinpm1-telepon_orang_lain').focus();
                        return false;
                    }
                }
            } 
        }
    });
    
    $('.pm1-form-skbmr').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            //return false;
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
                
                if(!$('#izinpm1-telepon').val()) {
                    alert('Telepon tidak boleh kosong');
                    $('#izinpm1-telepon').focus();
                    return false;
                }
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
               if(!$('#izinpm1-telepon_saksi1').val()) {
                   alert('Telepon Saksi 1 tidak boleh kosong');
                   $('#izinpm1-telepon_saksi1').focus();
                   return false;
               }   
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
               if(!$('#izinpm1-telepon_saksi2').val()) {
                   alert('Telepon Saksi 2 tidak boleh kosong');
                   $('#izinpm1-telepon_saksi2').focus();
                   return false;
               }   
            }
        }
    });
    
    $('.pm1-form-skck').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            //return false;
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
                
                if(!$('#izinpm1-telepon').val()) {
                    alert('Telepon tidak boleh kosong');
                    $('#izinpm1-telepon').focus();
                    return false;
                }
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
