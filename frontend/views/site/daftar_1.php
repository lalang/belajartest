<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use \yii\db\Query;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


//AppAsset::register($this);
/* @var $this yii\web\View */
$this->title = 'Perizinan';
//$this->context->layout = 'main-no-landing';
?>

<div class="loginColumns animated fadeInDown">
    <div class="row">

        <div class="col-md-6">
            <h2 class="font-bold">Selamat datang di mode pendaftaran</h2>
            <p>
                Khusus Pemohon warga DKI Jakarta, Sistem akan otomatis memvalidasi nomor NIK dan KK Anda dengan Data Kependudukan (Sumber : Dinas Kependudukan dan Catatan Sipil Pemprov DKI Jakarta)
            </p>

        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <form id="registration-form" action="/user/register" method="post">    
                    <div id="sign-wrapper">

                        <!-- Login form -->

                        <div class="sign-body">
                            <div class="form-group">
                                <div class="form-group field-register-form-tipe required">
                                    <label class="control-label" for="type_id">Tipe</label>
                                    <select id="type_id" class="form-control" name="register-form[tipe]">
                                        <option value="">Tipe...</option>
                                        <option value="Perorangan">Perorangan</option>
                                        <option value="Perusahaan">Perusahaan</option>
                                    </select>

                                    <div class="help-block"></div>
                                </div>                    </div><!-- /.form-group -->
                            <div id="person_select" style="display:none">
                                <div class="form-group field-register-form-nik">
                                    <label class="control-label" for="nik_id">NIK</label>
                                    <input type="text" id="nik_id" class="form-control" name="register-form[nik]">

                                    <div class="help-block"></div>
                                </div>
                                <div class="form-group field-register-form-no_kk">
                                    <label class="control-label" for="no_kk_id">No. KK</label>
                                    <input type="text" id="no_kk_id" class="form-control" name="register-form[no_kk]">

                                    <div class="help-block"></div>
                                </div>                    </div>
                            <div id="perusahaan_select" style="display:none">
                                <div class="form-group field-register-form-npwp">
                                    <label class="control-label" for="npwp_id">NPWP</label>
                                    <input type="text" id="npwp_id" class="form-control" name="register-form[npwp]">

                                    <div class="help-block"></div>
                                </div>                    </div>
                            <div class="form-group">
                                <div class="form-group field-register-form-name required">
                                    <label class="control-label" for="register-form-name">Nama</label>
                                    <input type="text" id="register-form-name" class="form-control" name="register-form[name]">

                                    <div class="help-block"></div>
                                </div>                    </div>
                            <div class="form-group">
                                <div class="form-group field-register-form-email required">
                                    <label class="control-label" for="register-form-email">Email</label>
                                    <input type="text" id="register-form-email" class="form-control" name="register-form[email]">

                                    <div class="help-block"></div>
                                </div>                    </div>
                            <div class="form-group">
                                <div class="form-group field-register-form-telepon required">
                                    <label class="control-label" for="register-form-telepon">Handphone</label>
                                    <input type="text" id="register-form-telepon" class="form-control" name="register-form[telepon]">

                                    <div class="help-block"></div>
                                </div>                    </div>

                        </div><!-- /.sign-body -->
                        <div class="sign-footer">

                            <div class="form-group">
                                <button type="submit" class="btn btn-theme btn-lg btn-block no-margin rounded" id="login-btn">Daftar</button>
                            </div><!-- /.form-group -->
                        </div><!-- /.sign-footer -->
                <!-- /.form-horizontal -->

            </div>
                    </form>
        </div>
    </div>

</div>


<script type="text/javascript">
    $(document).ready(function(){
    
     $('#type_id').change(function () {
     if ($('#type_id').val() == 'Perorangan') {
        document.getElementById('npwp_id').value = '';
         $('#person_select').show();
         $('#perusahaan_select').hide();
         
         
     } else if($('#type_id').val() == 'Perusahaan') {
        document.getElementById('nik_id').value = '';
        document.getElementById('no_kk_id').value = '';
         $('#perusahaan_select').show();
         $('#person_select').hide(); 
         
          
     }
     });
   
})
</script>