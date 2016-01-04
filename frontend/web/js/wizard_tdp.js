$(document).ready(function() {
    
    var max_number = 100;

    $('#izintdp-saham_nasional').keyup(function(){
        if($('#izintdp-saham_nasional').val() > max_number){
            alert('angka yang di input melebihi'+max_number+'%')
            $('#izintdp-saham_nasional').val('0')
        }

        if($('#izintdp-saham_nasional').val() < max_number){
            val2 = max_number - $('#izintdp-saham_nasional').val()
        }

        if($('#izintdp-saham_nasional').val() == max_number){
            val2 = max_number - $('#izintdp-saham_nasional').val()
        }

        $('#izintdp-saham_asing').val(val2)
    });
    
//    $('#izintdp-saham_nasional').keyup(function(){
//        
//    });
    
    $('#izintdp-telepon').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izintdp-fax').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izintdp-kode_pos').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izintdp-telpon_perusahaan').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
    
    $('#izintdp-fax_perusahaan').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });



    $('#izintdp-saham_asing').keyup(function(){
        if($('#izintdp-saham_asing').val() > max_number){
            alert('angka yang di input melebihi'+max_number+'%')
            $('#izintdp-saham_asing').val('0')
        }

        if($('#izintdp-saham_asing').val() < max_number){
            val2 = max_number - $('#izintdp-saham_asing').val()
        }

        if($('#izintdp-saham_asing').val() == max_number){
            val2 = max_number - $('#izintdp-saham_asing').val()
        }

        $('#izintdp-saham_nasional').val(val2)
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




    $('#izintdp-modal').keydown(function (e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                e.preventDefault();
            }
        }
    });

    $('#izintdp-nilai_saham_pma').keydown(function (e) {
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


    $('.tdp-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            //return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.tdp-form').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.tdp-form').find('.pager .next').hide();
                $('.tdp-form').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.tdp-form').find('.pager .next').show();
                $('.tdp-form').find('.pager .previous').hide();
                $('.tdp-form').find('.pager .finish').hide();
            } else {
		$('.tdp-form').find('.pager .next').show();
		$('.tdp-form').find('.pager .previous').show();
                $('.tdp-form').find('.pager .finish').hide();
	    }

        },
        'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                if(!$('#izintdp-ktp').val()) {
                    alert('KTP tidak boleh kosong');
                    $('#izintdp-ktp').focus();
                    return false;
                }

                if(!$('#izintdp-nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izintdp-nama').focus();
                    return false;
                }

                if(!$('#izintdp-alamat').val()) {
                    alert('Alamat tidak boleh kosong');
                    $('#izintdp-alamat').focus();
                    return false;
                }

                if(!$('#izintdp-tempat_lahir').val()) {
                    alert('Tempat lahir tidak boleh kosong');
                    $('#izintdp-tempat_lahir').focus();
                    return false;
                }

                if(!$('#izintdp-kewarganegaraan').val()) {
                    alert('Kewarganegaraan tidak boleh kosong');
                    $('#izintdp-kewarganegaraan').focus();
                    return false;
                }

                if(!$('#izintdp-jabatan_perusahaan').val()) {
                    alert('Jabatan Perusahaan tidak boleh kosong');
                    $('#izintdp-jabatan_perusahaan').focus();
                    return false;
                }
            }
            if(index==2) {
                // Make sure we entered the name
                if(!$('#izintdp-npwp_perusahaan').val() && $('#izintdp-tipe').val()=="Perusahaan") {
                    alert('npwp perusahaan tidak boleh kosong');
                    $('#izintdp-npwp_perusahaan').focus();
                    return false;
                }

                if(!$('#izintdp-nama_perusahaan').val()) {
                    alert('Nama perusahaan tidak boleh kosong');
                    $('#izintdp-nama_perusahaan').focus();
                    return false;
                }

                if(!$('#izintdp-bentuk_perusahaan').val()) {
                    alert('Harap pilih bentuk perusahaan');
                    $('#izintdp-bentuk_perusahaan').focus();
                    return false;
                }

                if(!$('#izintdp-alamat_perusahaan').val()) {
                    alert('Alamat Perusahaan tidak boleh kosong');
                    $('#izintdp-alamat_perusahaan').focus();
                    return false;
                }

                if(!$('#izintdp-kode_pos').val()) {
                    alert('Kode pos tidak boleh kosong');
                    $('#izintdp-kode_pos').focus();
                    return false;
                }
            }
            if(index==3) {
                // Make sure we entered the name
                if(!$('#izintdp-akta_pendirian_no').val() && $('#izintdp-tipe').val()=="Perusahaan") {
                    alert('Akta pendirian tidak boleh kosong');
                    $('#izintdp-akta_pendirian_no').focus();
                    return false;
                }
		
		if(!$('#izintdp-akta_pendirian_tanggal').val() && $('#izintdp-tipe').val()=="Perusahaan") {
                    alert('Tanggal Akta pendirian tidak boleh kosong');
                    $('#izintdp-akta_pendirian_tanggal').focus();
                    return false;
                }

                if(!$('#izintdp-no_sk').val() && $('#izintdp-tipe').val()=="Perusahaan") {
                    alert('No SK Kemenkumham tidak boleh kosong');
                    $('#izintdp-no_sk').focus();
                    return false;
                }

		if(!$('#izintdp-tanggal_pengesahan').val() && $('#izintdp-tipe').val()=="Perusahaan") {
                    alert('Tanggal Pengesahan Kemenkumham tidak boleh kosong');
                    $('#izintdp-tanggal_pengesahan').focus();
                    return false;
                }
            }

            if(index==4) {
                // Make sure we entered the name
                if(!$('#izintdp-modal').val()) {
                    alert('modal tidak boleh kosong');
                    $('#izintdp-modal').focus();
                    return false;
                }
                              
                                
                if((parseInt($('#izintdp-modal').val()) < parseInt($('.LimitMin').val())) ||  (parseInt($('#izintdp-modal').val()) > parseInt($('.LimitMax').val())) ) {
                   if (confirm('Kekayaan bersih tidak sesuai dengan syarat jenis ijin yang dipilih ( '+ parseInt($('.LimitMin').val()) +'<= MODAL <= '+ parseInt($('.LimitMax').val()) +'), mohon memilih jenis ijin yang sesuai dengan kekayaan bersih anda.')) {
                        window.location.replace(""+window.location.protocol + "//" + window.location.host + "/perizinan/search");
                    } else {
                        $('#izintdp-modal').focus();
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
                if(!$('#izintdp-aktiva_lancar_kas').val()) {
                    $('#izintdp-aktiva_lancar_kas').val('0');
//                    return false;
                }
                if(!$('#izintdp-aktiva_lancar_bank').val()) {
//                    alert('aktiva bank tidak boleh kosong');
                    $('#izintdp-aktiva_lancar_bank').val('0');
//                    return false;
                }
                if(!$('#izintdp-aktiva_lancar_piutang').val()) {
//                    alert('aktiva piutang tidak boleh kosong');
                    $('#izintdp-aktiva_lancar_piutang').val('0');
//                    return false;
                }
                if(!$('#izintdp-aktiva_lancar_barang').val()) {
//                    alert('aktiva barang tidak boleh kosong');
                    $('#izintdp-aktiva_lancar_barang').val('0');
//                    return false;
                }
                if(!$('#izintdp-aktiva_lancar_pekerjaan').val()) {
//                    alert('aktiva pekerjaan tidak boleh kosong');
                    $('#izintdp-aktiva_lancar_pekerjaan').val('0');
//                    return false;
                }
                if(!$('#izintdp-aktiva_tetap_peralatan').val()) {
//                    alert('aktiva peralatan dalam mesin tidak boleh kosong');
                    $('#izintdp-aktiva_tetap_peralatan').val('0');
//                    return false;
                }
                if(!$('#izintdp-aktiva_tetap_investasi').val()) {
//                    alert('aktiva tetap investasi tidak boleh kosong');
                    $('#izintdp-aktiva_tetap_investasi').val('0');
//                    return false;
                }
                if(!$('#izintdp-aktiva_lainnya').val()) {
//                    alert('aktiva lainnya tidak boleh kosong');
                    $('#izintdp-aktiva_lainnya').val('0');
//                    return false;
                }
                if(!$('#izintdp-pasiva_hutang_dagang').val()) {
//                    alert('pasiva hutang dagang tidak boleh kosong');
                    $('#izintdp-pasiva_hutang_dagang').val('0');
//                    return false;
                }
                if(!$('#izintdp-pasiva_hutang_pajak').val()) {
//                    alert('pasiva hutang pajak tidak boleh kosong');
                    $('#izintdp-pasiva_hutang_pajak').val('0');
//                    return false;
                }
                if(!$('#izintdp-pasiva_hutang_lainnya').val()) {
//                    alert('pasiva hutang lainnya tidak boleh kosong');
                    $('#izintdp-pasiva_hutang_lainnya').val('0');
//                    return false;
                }
                if(!$('#izintdp-hutang_jangka_panjang').val()) {
//                    alert('pasiva hutang jangka panjang tidak boleh kosong');
                    $('#izintdp-hutang_jangka_panjang').val('0');
//                    return false;
                }
                if(!$('#izintdp-kekayaan_bersih').val()) {
//                    alert('pasiva kekayaan bersih tidak boleh kosong');
                    $('#izintdp-kekayaan_bersih').val('0');
//                    return false;
                }

                if($('#izintdp-modal').val() !== $('#izintdp-kekayaan_bersih').val()){
                    alert('data kekayaan bersih di aktiva tidak sama dengan kekayaan bersih di tab modal dan saham');
                    $('#izintdp-kekayaan_bersih').focus();
                    return false;
                }

                if($('#total_aktiva').val() !== $('#total_pasiva').val()){
                    alert('Total aktiva dan pasiva tidak sama');
                    return false;
                }
                
                if((parseInt($('#izintdp-kekayaan_bersih').val()) < parseInt($('.LimitMin').val())) ||  (parseInt($('#izintdp-kekayaan_bersih').val()) > parseInt($('.LimitMax').val())) ) {
//                    alert('Kekayaan bersih tidak sesuai dengan syarat jenis ijin yang dipilih ( '+ parseInt($('.LimitMin').val()) +'<= MODAL <= '+ parseInt($('.LimitMax').val()) +'), mohon memilih jenis ijin yang sesuai dengan kekayaan bersih anda.');
                    if (confirm('Kekayaan bersih tidak sesuai dengan syarat jenis ijin yang dipilih ( '+ parseInt($('.LimitMin').val()) +'<= MODAL <= '+ parseInt($('.LimitMax').val()) +'), mohon memilih jenis ijin yang sesuai dengan kekayaan bersih anda.')) {
                        window.location.replace(""+window.location.protocol + "//" + window.location.host + "/perizinan/search");
                    } else {
                        $('#izintdp-kekayaan_bersih').focus();
                        return false;
                    }
                    return false;
                }
            }
        }
    });
});
