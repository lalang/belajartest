$(document).ready(function() {

    
    $('.izin-penelitian-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
//            return false;
//            load_js();
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('.izin-penelitian-form').find('.bar').css({width: $percent + '%'});

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $('.izin-penelitian-form').find('.pager .next').hide();
                $('.izin-penelitian-form').find('.pager .finish').hide();

            } else if (index == 0) {
                $('.izin-penelitian-form').find('.pager .next').show();
                $('.izin-penelitian-form').find('.pager .previous').hide();
                $('.izin-penelitian-form').find('.pager .finish').hide();
            } else {
                $('.izin-penelitian-form').find('.pager .next').show();
                $('.izin-penelitian-form').find('.pager .previous').show();
                $('.izin-penelitian-form').find('.pager .finish').hide();
            }

        },
        'onNext': function(tab, navigation, index) {
           // load_js();
            if (index == 1) {
                // Make sure we entered the name
               
                    if (!$('#izinpenelitian-nik').val()) {
                        alert('No Identitas tidak boleh kosong');
                        $('#izinpenelitian-nik').focus();
                        return false;
                    }
                    if (!$('#izinpenelitian-nama').val()) {
                        alert('Nama tidak boleh kosong');
                        $('#izinpenelitian-nama').focus();
                        return false;
                    }

                    if (!$('#izinpenelitian-tempat_lahir').val()) {
                        alert('Tempat Lahir tidak boleh kosong');
                        $('#izinpenelitian-tempat_lahir').focus();
                        return false;
                    }

                    if (!$('#izinpenelitian-tanggal_lahir').val()) {
                        alert('Tanggal Lahir tidak boleh kosong');
                        $('#izinpenelitian-tanggal_lahir').focus();
                        return false;
                    }

                    if (!$('#izinpenelitian-alamat_pemohon').val()) {
                        alert('Alamat Pemohon tidak boleh kosong');
                        $('#izinpenelitian-alamat_pemohon').focus();
                        return false;
                    }

                    if (!$('#izinpenelitian-rt').val()) {
                        alert('RT tidak boleh kosong');
                        $('#izinpenelitian-rt').focus();
                        return false;
                    }

                    if (!$('#izinpenelitian-rw').val()) {
                        alert('RW tidak boleh kosong');
                        $('#izinpenelitian-rw').focus();
                        return false;
                    }

                    if (!$('#izinpenelitian-kelurahan_pemohon').val()) {
                        alert('Kelurahan Pemohon tidak boleh kosong');
                        $('#izinpenelitian-kelurahan_pemohon').focus();
                        return false;
                    }

                    if (!$('#izinpenelitian-kode_pos').val()) {
                        alert('Kode Pos tidak boleh kosong');
                        $('#izinpenelitian-kode_pos').focus();
                        return false;
                    }

                    if (!$('#izinpenelitian-pekerjaan_pemohon').val()) {
                        alert('Pekerjaan Pemohon tidak boleh kosong');
                        $('#izinpenelitian-pekerjaan_pemohon').focus();
                        return false;
                    }

            }
            if (index == 2) {
                // Make sure we entered the name
                
               if (!$('#izinpenelitian-nama_instansi').val()) {
                    alert('Nama Instansi tidak boleh kosong');
                    $('#izinpenelitian-nama_instansi').focus();
                    return false;
                }

                if (!$('#izinpenelitian-alamat_instansi').val()) {
                    alert('Alamat Instansi tidak boleh kosong');
                    $('#izinpenelitian-alamat_instansi').focus();
                    return false;
                }

                if (!$('#izinpenelitian-kelurahan_instansi').val()) {
                    alert('Kelurahan Instansi tidak boleh kosong');
                    $('#izinpenelitian-kelurahan_instansi').focus();
                    return false;
                }

                if (!$('#izinpenelitian-kodepos_instansi').val()) {
                    alert('Kode Pos Instansi tidak boleh kosong');
                    $('#izinpenelitian-kodepos_instansi').focus();
                    return false;
                }

                
                if (!$('#izinpenelitian-telepon_instansi').val()) {
                    alert('Telepon Instansi tidak boleh kosong');
                    $('#izinpenelitian-telepon_instansi').focus();
                    return false;
                }

            }
            if (index == 3) {
                // Make sure we entered the name
               
                    if (!$('#izinpenelitian-tema').val()) {
                        alert('Tema Penelitian tidak boleh kosong');
                        $('#izinpenelitian-tema').focus();
                        return false;
                    }
                    
               /*     if (!$('#izinpenelitian-kab_penelitian').val()) {
                        alert('Lokasi Penelitian tidak boleh kosong');
                        $('#izinpenelitian-kab_penelitian').focus();
                        return false;
                    }
                    */
                    if (!$('#izinpenelitian-instansi_penelitian').val()) {
                        alert('Instansi Penelitian tidak boleh kosong');
                        $('#izinpenelitian-instansi_penelitian').focus();
                        return false;
                    }
                    
                    if (!$('#izinpenelitian-bidang_penelitian').val()) {
                        alert('Bidang Penelitian tidak boleh kosong');
                        $('#izinpenelitian-bidang_penelitian').focus();
                        return false;
                    }
                    
                    if (!$('#izinpenelitian-tgl_mulai_penelitian').val()) {
                        alert('Tanggal Mulai tidak boleh kosong');
                        $('#izinpenelitian-tgl_mulai_penelitian').focus();
                        return false;
                    }
                    if (!$('#izinpenelitian-tgl_akhir_penelitian').val()) {
                        alert('Tanggal Akhir tidak boleh kosong');
                        $('#izinpenelitian-tgl_akhir_penelitian').focus();
                        return false;
                    }
                    if (!$('#izinpenelitian-anggota').val()) {
                        alert('Jumlah Anggota tidak boleh kosong');
                        $('#izinpenelitian-anggota').focus();
                        return false;
                    }
                    
                
            }
        }
    });
});
