$(document).ready(function() {

    function load_js()
    {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = '/google_map/jquery-gmaps-latlon-picker.js';
        head.appendChild(script).remove();
    }

    $('.skdp-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
//            return false;
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
                if ($('#izinskdp-tipe').val() == "Perusahaan") {
                    if (!$('#izinskdp-nama').val()) {
                        alert('Nama tidak boleh kosong');
                        $('#izinskdp-nama').focus();
                        return false;
                    }

                    if (!$('#izinskdp-tempat_lahir').val()) {
                        alert('Tempat Lahir tidak boleh kosong');
                        $('#izinskdp-tempat_lahir').focus();
                        return false;
                    }

                    if (!$('#izinskdp-tanggal_lahir').val()) {
                        alert('Tanggal Lahir tidak boleh kosong');
                        $('#izinskdp-tanggal_lahir').focus();
                        return false;
                    }

                    if (!$('#izinskdp-jenkel').val()) {
                        alert('Jenis Kelamin tidak boleh kosong');
                        $('#izinskdp-jenkel').focus();
                        return false;
                    }

                    if (!$('#izinskdp-agama').val()) {
                        alert('Agama tidak boleh kosong');
                        $('#izinskdp-agama').focus();
                        return false;
                    }

                    if (!$('#izinskdp-alamat').val()) {
                        alert('Alamat tidak boleh kosong');
                        $('#izinskdp-alamat').focus();
                        return false;
                    }

                    if (!$('#izinskdp-jenkel').val()) {
                        alert('Jenis Kelamin tidak boleh kosong');
                        $('#izinskdp-jenkel').focus();
                        return false;
                    }

                    if (!$('#izinskdp-rt').val()) {
                        alert('RT tidak boleh kosong');
                        $('#izinskdp-rt').focus();
                        return false;
                    }

                    if (!$('#izinskdp-rw').val()) {
                        alert('RW tidak boleh kosong');
                        $('#izinskdp-rw').focus();
                        return false;
                    }

                    if (!$('#prov-id').val()) {
                        alert('Propinsi tidak boleh kosong');
                        $('#prov-id').focus();
                        return false;
                    }

                    if ($('#prov-id option:selected').text() == 'DKI Jakarta') {
                        if (!$('#kabkota-id').val()) {
                            alert('Wilayah / Kota tidak boleh kosong');
                            $('#kabkota-id').focus();
                            return false;
                        }

                        if (!$('#kec-id').val()) {
                            alert('Kecamatan tidak boleh kosong');
                            $('#kec-id').focus();
                            return false;
                        }

                        if (!$('#izinskdp-kelurahan_id').val()) {
                            alert('Kelurahan tidak boleh kosong');
                            $('#izinskdp-kelurahan_id').focus();
                            return false;
                        }
                    }

                    if (!$('#izinskdp-kodepos').val()) {
                        alert('Kodepos tidak boleh kosong');
                        $('#izinskdp-kodepos').focus();
                        return false;
                    }

                    if (!$('#izinskdp-kewarganegaraan_id').val()) {
                        alert('Kewarganegaraan tidak boleh kosong');
                        $('#izinskdp-kewarganegaraan_id').focus();
                        return false;
                    } else {
                        if ($('#izinskdp-kewarganegaraan_id option:selected').text() == 'INDONESIA') {
                            if (!$('#izinskdp-nik').val()) {
                                alert('NIK tidak boleh kosong');
                                $('#izinskdp-nik').focus();
                                return false;
                            }
                        } else {
                            if (!$('#izinskdp-passport').val()) {
                                alert('Passport tidak boleh kosong');
                                $('#izinskdp-passport').focus();
                                return false;
                            }
                        }
                    }
                } else {
                    if (!$('#izinskdp-nik').val()) {
                        alert('NIK tidak boleh kosong');
                        $('#izinskdp-nik').focus();
                        return false;
                    }

                    if (!$('#izinskdp-nama').val()) {
                        alert('Nama tidak boleh kosong');
                        $('#izinskdp-nama').focus();
                        return false;
                    }

                    if (!$('#izinskdp-tempat_lahir').val()) {
                        alert('Tempat Lahir tidak boleh kosong');
                        $('#izinskdp-tempat_lahir').focus();
                        return false;
                    }

                    if (!$('#izinskdp-tanggal_lahir').val()) {
                        alert('Tanggal Lahir tidak boleh kosong');
                        $('#izinskdp-tanggal_lahir').focus();
                        return false;
                    }

                    if (!$('#izinskdp-jenkel').val()) {
                        alert('Jenis Kelamin tidak boleh kosong');
                        $('#izinskdp-jenkel').focus();
                        return false;
                    }

                    if (!$('#izinskdp-agama').val()) {
                        alert('Agama tidak boleh kosong');
                        $('#izinskdp-agama').focus();
                        return false;
                    }

                    if (!$('#izinskdp-alamat').val()) {
                        alert('Alamat tidak boleh kosong');
                        $('#izinskdp-alamat').focus();
                        return false;
                    }

                    if (!$('#izinskdp-jenkel').val()) {
                        alert('Jenis Kelamin tidak boleh kosong');
                        $('#izinskdp-jenkel').focus();
                        return false;
                    }

                    if (!$('#izinskdp-rt').val()) {
                        alert('RT tidak boleh kosong');
                        $('#izinskdp-rt').focus();
                        return false;
                    }

                    if (!$('#izinskdp-rw').val()) {
                        alert('RW tidak boleh kosong');
                        $('#izinskdp-rw').focus();
                        return false;
                    }

                    if (!$('#prov-id').val()) {
                        alert('Propinsi tidak boleh kosong');
                        $('#prov-id').focus();
                        return false;
                    }

                    if ($('#prov-id option:selected').text() == 'DKI Jakarta') {
                        if (!$('#kabkota-id').val()) {
                            alert('Wilayah / Kota tidak boleh kosong');
                            $('#kabkota-id').focus();
                            return false;
                        }

                        if (!$('#kec-id').val()) {
                            alert('Kecamatan tidak boleh kosong');
                            $('#kec-id').focus();
                            return false;
                        }

                        if (!$('#izinskdp-kelurahan_id').val()) {
                            alert('Kelurahan tidak boleh kosong');
                            $('#izinskdp-kelurahan_id').focus();
                            return false;
                        }
                    }

                    if (!$('#izinskdp-kodepos').val()) {
                        alert('Kodepos tidak boleh kosong');
                        $('#izinskdp-kodepos').focus();
                        return false;
                    }

                    if (!$('#izinskdp-kewarganegaraan_id').val()) {
                        alert('Kewarganegaraan tidak boleh kosong');
                        $('#izinskdp-kewarganegaraan_id').focus();
                        return false;
                    } else {
                        if ($('#izinskdp-kewarganegaraan_id option:selected').text() == 'INDONESIA') {
                            if (!$('#izinskdp-nik').val()) {
                                alert('NIK tidak boleh kosong');
                                $('#izinskdp-nik').focus();
                                return false;
                            }
                        } else {
                            if (!$('#izinskdp-passport').val()) {
                                alert('Passport tidak boleh kosong');
                                $('#izinskdp-passport').focus();
                                return false;
                            }
                        }
                    }
                }

            }
            if (index == 2) {
                // Make sure we entered the name
                if (!$('#latitude').val()) {
                    alert('Lokasi Latitude tidak boleh kosong');
                    $('#latitude').focus();
                    return false;
                }

                if (!$('#izinskdp-longtitude').val()) {
                    alert('Lokasi Latitude tidak boleh kosong');
                    $('#izinskdp-longtitude').focus();
                    return false;
                }

                if (!$('#izinskdp-npwp_perusahaan').val() && $('#izinskdp-tipe').val() == "Perusahaan") {
                    alert('NPWP Perusahaan tidak boleh kosong');
                    $('#izinskdp-npwp_perusahaan').focus();
                    return false;
                }

                if (!$('#izinskdp-nama_perusahaan').val()) {
                    alert('Nama Perusahaan tidak boleh kosong');
                    $('#izinskdp-nama_perusahaan').focus();
                    return false;
                }

                if (!$('#izinskdp-alamat_perusahaan').val()) {
                    alert('Alamat Perusahaan tidak boleh kosong');
                    $('#izinskdp-alamat_perusahaan').focus();
                    return false;
                }

                if (!$('#izinskdp-rt_perusahaan').val()) {
                    alert('RT Perusahaan tidak boleh kosong');
                    $('#izinskdp-rt_perusahaan').focus();
                    return false;
                }

                if (!$('#izinskdp-rw_perusahaan').val()) {
                    alert('RW Perusahaan tidak boleh kosong');
                    $('#izinskdp-rw_perusahaan').focus();
                    return false;
                }

                if (!$('#kabkota-id_tab2').val()) {
                    alert('Wilayah / Kota Perusahaan tidak boleh kosong');
                    $('#kabkota-id_tab2').focus();
                    return false;
                }

                if (!$('#kec-id_tab2').val()) {
                    alert('Kecamatan Perusahaan tidak boleh kosong');
                    $('#kec-id_tab2').focus();
                    return false;
                }

                if (!$('#izinskdp-kelurahan_id_perusahaan').val()) {
                    alert('Kelurahan Perusahaan tidak boleh kosong');
                    $('#izinskdp-kelurahan_id_perusahaan').focus();
                    return false;
                }

                if (!$('#izinskdp-kodepos_perusahaan').val()) {
                    alert('Kodepos Perusahaan tidak boleh kosong');
                    $('#izinskdp-kodepos_perusahaan').focus();
                    return false;
                }

                if (!$('#izinskdp-telpon_perusahaan').val()) {
                    alert('Telepon Perusahaan tidak boleh kosong');
                    $('#izinskdp-telpon_perusahaan').focus();
                    return false;
                }
                
                if (!$('#izinskdp-klarifikasi_usaha').val()) {
                    alert('Klarifikasi Usaha Perusahaan tidak boleh kosong');
                    $('#izinskdp-klarifikasi_usaha').focus();
                    return false;
                }

                if (!$('#izinskdp-jumlah_karyawan').val()) {
                    alert('Jumlah Karyawan Perusahaan tidak boleh kosong');
                    $('#izinskdp-jumlah_karyawan').focus();
                    return false;
                }
            }
            if (index == 3) {
                // Make sure we entered the name
                if ($('#izinskdp-tipe').val() == "Perusahaan") {
                    if (!$('#izinskdp-nomor_akta_pendirian').val()) {
                        alert('Nomor Akta Pendirian tidak boleh kosong');
                        $('#izinskdp-nomor_akta_pendirian').focus();
                        return false;
                    }
                    
                    if (!$('#izinskdp-tanggal_pendirian-disp').val()) {
                        alert('Tanggal Akta Pendirian tidak boleh kosong');
                        $('#izinskdp-tanggal_pendirian-disp').focus();
                        return false;
                    }
                    
                    if (!$('#izinskdp-nama_notaris_pendirian').val()) {
                        alert('Nama Notaris Pendirian tidak boleh kosong');
                        $('#izinskdp-nama_notaris_pendirian').focus();
                        return false;
                    }
                    
                    if (!$('#izinskdp-nomor_sk_kemenkumham').val()) {
                        alert('Nomor SK Kemenkumham tidak boleh kosong');
                        $('#izinskdp-nomor_sk_kemenkumham').focus();
                        return false;
                    }
                    
                    if (!$('#izinskdp-tanggal_pengesahan-disp').val()) {
                        alert('Tanggal Pengesahan tidak boleh kosong');
                        $('#izinskdp-tanggal_pengesahan-disp').focus();
                        return false;
                    }
                    
                }
            }
        }
    });
});
