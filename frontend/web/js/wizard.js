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

    function findDuplicate(value) {
        var result = 1;
        $(".kbli_input").each(function () {
            if (this.value == value) {
                result++;
            }
        });
        return result - 1;
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
                if(!$('#izinsiup-akta_pendirian_no').val()) {
                    alert('Akta pendirian tidak boleh kosong');
                    $('#izinsiup-akta_pendirian_no').focus();
                    return false;
                }
		
		if(!$('#izinsiup-akta_pendirian_tanggal').val()) {
                    alert('Tanggal Akta pendirian tidak boleh kosong');
                    $('#izinsiup-akta_pendirian_tanggal').focus();
                    return false;
                }

                if(!$('#izinsiup-no_sk').val()) {
                    alert('No SK Kemenkumham tidak boleh kosong');
                    $('#izinsiup-no_sk').focus();
                    return false;
                }

		if(!$('#izinsiup-tanggal_pengesahan').val()) {
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
            }

            if(index==5){
                //$('#coba').click(function () {

                    if(findDuplicate($('.kbli_input').val()) > 1){
                        var test = $('.kbli_input').val();
                        console.log(test.length);
                        alert('terdapat lebih dari satu inputan kbli yang sama');

                        return false;
                    }
                //});
            }

            if(index==6) {
                // Make sure we entered the name
                if(!$('#izinsiup-aktiva_lancar_kas').val()) {
                    alert('aktiva kas tidak boleh kosong');
                    $('#izinsiup-aktiva_lancar_kas').focus();
                    return false;
                }
                if(!$('#izinsiup-aktiva_lancar_bank').val()) {
                    alert('aktiva bank tidak boleh kosong');
                    $('#izinsiup-aktiva_lancar_bank').focus();
                    return false;
                }
                if(!$('#izinsiup-aktiva_lancar_piutang').val()) {
                    alert('aktiva piutang tidak boleh kosong');
                    $('#izinsiup-aktiva_lancar_piutang').focus();
                    return false;
                }
                if(!$('#izinsiup-aktiva_lancar_barang').val()) {
                    alert('aktiva barang tidak boleh kosong');
                    $('#izinsiup-aktiva_lancar_barang').focus();
                    return false;
                }
                if(!$('#izinsiup-aktiva_lancar_pekerjaan').val()) {
                    alert('aktiva pekerjaan tidak boleh kosong');
                    $('#izinsiup-aktiva_lancar_pekerjaan').focus();
                    return false;
                }
                if(!$('#izinsiup-aktiva_tetap_peralatan').val()) {
                    alert('aktiva peralatan dalam mesin tidak boleh kosong');
                    $('#izinsiup-aktiva_tetap_peralatan').focus();
                    return false;
                }
                if(!$('#izinsiup-aktiva_tetap_investasi').val()) {
                    alert('aktiva tetap investasi tidak boleh kosong');
                    $('#izinsiup-aktiva_tetap_investasi').focus();
                    return false;
                }
                if(!$('#izinsiup-aktiva_lainnya').val()) {
                    alert('aktiva lainnya tidak boleh kosong');
                    $('#izinsiup-aktiva_lainnya').focus();
                    return false;
                }
                if(!$('#izinsiup-pasiva_hutang_dagang').val()) {
                    alert('pasiva hutang dagang tidak boleh kosong');
                    $('#izinsiup-pasiva_hutang_dagang').focus();
                    return false;
                }
                if(!$('#izinsiup-pasiva_hutang_pajak').val()) {
                    alert('pasiva hutang pajak tidak boleh kosong');
                    $('#izinsiup-pasiva_hutang_pajak').focus();
                    return false;
                }
                if(!$('#izinsiup-pasiva_hutang_lainnya').val()) {
                    alert('pasiva hutang lainnya tidak boleh kosong');
                    $('#izinsiup-pasiva_hutang_lainnya').focus();
                    return false;
                }
                if(!$('#izinsiup-hutang_jangka_panjang').val()) {
                    alert('pasiva hutang jangka panjang tidak boleh kosong');
                    $('#izinsiup-pasiva_hutang_jangka_panjang').focus();
                    return false;
                }
                if(!$('#izinsiup-kekayaan_bersih').val()) {
                    alert('pasiva kekayaan bersih tidak boleh kosong');
                    $('#izinsiup-kekayaan_bersih').focus();
                    return false;
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
            }
        }
    });
});
