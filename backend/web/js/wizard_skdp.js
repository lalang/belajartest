$(document).ready(function() {

    function load_js()
    {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'http://portal-ptsp.local/google_map/jquery-gmaps-latlon-picker.js';
        head.appendChild(script).remove();
    }

    $('.skdp-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            return false;
            load_js();
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('.skdp-form').find('.bar').css({width: $percent + '%'});

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $('.skdp-form').find('.pager .next').hide();
                $('.skdp-form').find('.pager .finish').hide();

            } else if (index == 0) {
                $('.skdp-form').find('.pager .next').show();
                $('.skdp-form').find('.pager .previous').hide();
                $('.skdp-form').find('.pager .finish').hide();
            } else {
                $('.skdp-form').find('.pager .next').show();
                $('.skdp-form').find('.pager .previous').show();
                $('.skdp-form').find('.pager .finish').hide();
            }

        },
        'onNext': function(tab, navigation, index) {
            load_js();
            if (index == 1) {
                // Make sure we entered the name
                if (!$('#izinskdp-nik').val()) {
                    alert('NIK tidak boleh kosong');
                    $('#izinskdp-nik').focus();
                    return false;
                }
//
//                if(!$('#izinpm1-no_kk').val()) {
//                    alert('No.KK tidak boleh kosong');
//                    $('#izinpm1-no_kk').focus();
//                    return false;
//                }
//
//                if(!$('#izinpm1-nama').val()) {
//                    alert('Nama tidak boleh kosong');
//                    $('#izinpm1-nama').focus();
//                    return false;
//                }
//
//                if(!$('#izinpm1-agama').val()) {
//                    alert('Agama tidak boleh kosong');
//                    $('#izinpm1-agama').focus();
//                    return false;
//                }
//                
//                if(!$('#izinpm1-alamat').val()) {
//                    alert('Alamat tidak boleh kosong');
//                    $('#izinpm1-alamat').focus();
//                    return false;
//                }
//
//                if(!$('#izinpm1-tempat_lahir').val()) {
//                    alert('Tempat lahir tidak boleh kosong');
//                    $('#izinpm1-tempat_lahir').focus();
//                    return false;
//                }
//                
//                if(!$('#izinpm1-tanggal_lahir-disp').val()) {
//                    alert('Tanggal lahir tidak boleh kosong');
//                    $('#izinpm1-tanggal_lahir-disp').focus();
//                    return false;
//                }
//
//                if(!$('#izinpm1-kodepos').val()) {
//                    alert('Kodepos tidak boleh kosong');
//                    $('#izinpm1-kodepos').focus();
//                    return false;
//                }
//
//                if(!$('#izinpm1-pekerjaan').val()) {
//                    alert('Pekerjaan tidak boleh kosong');
//                    $('#izinpm1-pekerjaan').focus();
//                    return false;
//                }
//                
////                if(!$('#izinpm1-telepon').val()) {
////                    alert('Telepon tidak boleh kosong');
////                    $('#izinpm1-telepon').focus();
////                    return false;
////                }
//                
//                $('#kabkota-id-org-lain').val($('#kabkota-id').val());
//                $('#kec-id-org-lain').val($('#kec-id').val());
//                $('#kel-id-org-lain').val($('#izinpm1-kelurahan_id').val());
            }
            if (index == 2) {
                // Make sure we entered the name
//                if(!$('#izinpm1-no_surat_pengantar').val()) {
//                    alert('Nomor Surat Pengantar tidak boleh kosong');
//                    $('#izinpm1-no_surat_pengantar').focus();
//                    return false;
//                }
//
//                if(!$('#izinpm1-tanggal_surat-disp').val()) {
//                    alert('Tanggal Surat Pengantar tidak boleh kosong');
//                    $('#izinpm1-tanggal_surat-disp').focus();
//                    return false;
//                }
//
//                if(!$('#izinpm1-instansi_tujuan').val()) {
//                    alert('Instansi Tujuan tidak boleh kosong');
//                    $('#izinpm1-instansi_tujuan').focus();
//                    return false;
//                }

            }
        }
    });
});
