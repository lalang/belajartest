$(document).ready(function() {

    $('#testing').on('input', function(event) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function findAngkaAnggotaNikLength() {
        var result = 0;
        $(".anggota_nik").each(function() {
            
            var val = this.value;
            if (val.length > 16) {
                result = 1;
            }

        });
        return result;
    }

    function findAngkaAnggotaNik() {
        var result = 0;
        $(".anggota_nik").each(function() {
            var regex = new RegExp(/[^0-9]/g);
            var containsNonNumeric = this.value.match(regex);
            if (containsNonNumeric) {
                result = 1;
            }

        });
        return result;
    }

    function findJumLokasi() {
        var i = 0;
        $(".lokasi_input").each(function() {
            if (this.value != '') {
                i++;
            }
        });
        return i;
    }

    function findDuplicateAnggotaNik() {
        var result = 0;
        var i = 0;
        var isiSatu;
        $(".anggota_nik").each(function() {
            i++;
            //alert('i='+i);
            var y = 0;
            isiSatu = this.value;
            $(".anggota_nik1").each(function() {
                y++;
                //alert('y='+y);
                if (isiSatu == this.value) {
                    if (i != y) {
                        //alert('ketemu');
                        result = 1;
                    }
                }
            });
        });
        return result;
    }

    function findEmptyInputAnggotaNIK() {
        var result = 0;
        $(".anggota_nik").each(function() {
            if (!this.value) {
                result = 1;
            }
        });
        return result;
    }

    function findEmptyInputAnggotaNama() {
        var result = 0;
        $(".anggota_nama").each(function() {
            if (!this.value) {
                result = 1;
            }
        });
        return result;
    }

    function findDuplicateAnggotaNama() {
        var result = 0;
        var i = 0;
        var isiSatu;
        $(".anggota_nama").each(function() {
            i++;
            //alert('i='+i);
            var y = 0;
            isiSatu = this.value;
            $(".anggota_nama1").each(function() {
                y++;
                //alert('y='+y);
                if (isiSatu == this.value) {
                    if (i != y) {
                        //alert('ketemu');
                        result = 1;
                    }
                }
            });
        });
        return result;
    }

    function findDuplicate2() {
        var result = 0;
        var i = 0;
        var isiSatu;
        $(".lokasi_input").each(function() {
            i++;
            //alert('i='+i);
            var y = 0;
            isiSatu = this.value;
            if (isiSatu == $('#izinpenelitian-kab_penelitian').val()) {
                result = 1;
            }
            $(".lokasi_input1").each(function() {
                y++;
                //alert('y='+y);
                if (isiSatu == this.value) {
                    if (i != y) {
                        //alert('ketemu');
                        result = 1;
                    }
                }
            });
        });
        return result;
    }

    function findEmptyInputMetode() {
        var result = 0;
        $(".metode_input").each(function() {
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
        $(".metode_input").each(function() {
            i++;
            //alert('i='+i);
            var y = 0;
            isiSatu = this.value;
            $(".metode_input1").each(function() {
                y++;
                //alert('y='+y);
                if (isiSatu == this.value) {
                    if (i != y) {
                        //alert('ketemu');
                        result = 1;
                    }
                }
            });
        });

        return result;
    }
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
                if (!$('#izinpenelitian-kab_penelitian').val()) {
                    alert('Lokasi Penelitian tidak boleh kosong');
                    $('#izinpenelitian-kab_penelitian').focus();
                    return false;
                }
//                if (!$('#izinpenelitian-instansi_penelitian').val()) {
//                    alert('Instansi Penelitian tidak boleh kosong');
//                    $('#izinpenelitian-instansi_penelitian').focus();
//                    return false;
//                }

                if ($('#wewenang_id').val() == 1) {
                    var jum = findJumLokasi();
                    if (jum == 0) {
                        alert('Lokasi Penelitian harus lebih dari satu');
                        return false;
                    }

                }

                if (findDuplicate2() == 1) {
                    alert('Lokasi penelitian sama');
                    return false;
                }

                if (findEmptyInputMetode() == 1) {
                    alert('Metode Penelitian tidak boleh kosong');
                    return false;
                }

                if (findDuplicate() == 1) {
                    alert('terdapat lebih dari satu inputan metode yang sama');
                    return false;
                }

                if (findDuplicateAnggotaNik() == 1) {
                    alert('terdapat lebih dari satu NIK Anggota yang sama');
                    return false;
                }

                if (findDuplicateAnggotaNama() == 1) {
                    alert('terdapat lebih dari satu Nama Anggota yang sama');
                    return false;
                }

                if (findEmptyInputAnggotaNama() == 1) {
                    alert('Nama Anggota tidak boleh kosong');
                    return false;
                }

                if (findEmptyInputAnggotaNIK() == 1) {
                    alert('NIK Anggota tidak boleh kosong');
                    return false;
                }

                if (findAngkaAnggotaNik() == 1) {
                    alert('NIK Anggota hanya diperbolehkan angka');
                    return false;
                }
                
                if (findAngkaAnggotaNikLength() == 1) {
                    alert('NIK Anggota hanya diperbolehkan max 16 digit');
                    return false;
                }

//                if (!$('#izinpenelitian-bidang_penelitian').val()) {
//                    alert('Bidang Penelitian tidak boleh kosong');
//                    $('#izinpenelitian-bidang_penelitian').focus();
//                    return false;
//                }

//                if (!$('#izinpenelitian-alamat_penelitian').val()) {
//                    alert('Alamat Penelitian tidak boleh kosong');
//                    $('#izinpenelitian-alamat_penelitian').focus();
//                    return false;
//                }

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
//                    if (!$('#izinpenelitian-anggota').val()) {
//                        alert('Jumlah Anggota tidak boleh kosong');
//                        $('#izinpenelitian-anggota').focus();
//                        return false;
//                    }


            }
        }
    });
});
