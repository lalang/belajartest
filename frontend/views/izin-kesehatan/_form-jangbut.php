<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use backend\models\Params;
use yii\web\Session;

$session = Yii::$app->session;
$session->set('izin_id', $model->izin_id);

/* @var $this yii\web\View */
/* @var $model backend\models\IzinKesehatan */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinKesehatanJadwal',
        'relID' => 'izin-kesehatan-jadwal',
        'value' => \yii\helpers\Json::encode($model->izinKesehatanJadwals),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinKesehatanJadwalDua',
        'relID' => 'izin-kesehatan-jadwal-dua',
        'value' => \yii\helpers\Json::encode($model->izinKesehatanJadwalDuas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'IzinKesehatanJadwalSatu',
        'relID' => 'izin-kesehatan-jadwal-satu',
        'value' => \yii\helpers\Json::encode($model->izinKesehatanJadwalSatus),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);

$this->registerCss('.form-horizontal .control-label{
  /* text-align:right; */
  text-align:left;
 
}');

$search = "$(document).ready(function(){

    $('.akta-button').click(function(){
	$('.akta-form').toggle(1000);
	return false;
    });
    
     $('.btnNext').click(function(){
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
      });

    $('.btnPrevious').click(function(){
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
    $('#btnsub').attr('disabled', 'disabled');
   $('#check-dis').change(function(){
        if($(this).is(':checked')){
            $('#btnsub').removeAttr('disabled');
        }else{
            $('#btnsub').attr('disabled', 'disabled');
        }
    });



});";
$this->registerJs($search);
?>
<style>
    form .form-group .control-label {
        font-size: 14px;
        font-weight: 600;
        min-width: 200px;
        padding-top: 10px;
    }
    .nav>li>a:focus, .nav>li>a:hover {
        background:none;    
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Form Permohonan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">

                <?php
                $min = \backend\models\Izin::findOne($model->izin_id)->min;
                $max = \backend\models\Izin::findOne($model->izin_id)->max;

                if ($model->tipe == "Perorangan") {
                    $status_readonly = true;
                    $status_readonly2 = false;
                } else {
                    $status_readonly = false;
                    $status_readonly2 = true;
                }
				
				//Untuk menentukan dokter atau (bidan & perawat)
				$src_izin = strtoupper($model->nama_izin);
				if(strpos($src_izin,'BIDAN')==true || strpos($src_izin,'PERAWAT')==true){
					$group_izin = 1;
					//Untuk menentukan Perorangan atau Faskes
					if(strpos($src_izin,'PERORANGAN')){
						$group_type_izin = 2;
					}else{
						$group_type_izin = 1;
					}
				}else{
					$group_izin = 2;
				}
                ?>

                <?php $form = ActiveForm::begin(['id' => 'form-izin-kesehatan']); ?>

                <?= $form->errorSummary($model); ?>

                <input type="hidden" value="<?php echo $min; ?>" class="LimitMin" />
                <input type="hidden" value="<?php echo $max; ?>" class="LimitMax" />

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'izin_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'tipe', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                <?= $form->field($model, 'nama_izin', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>	


                <div class="kesehatan-form">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Preview SK</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Disclaimer</a></li>
                        </ul>
                        <div id="result"></div>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Preview SK</div>
                                    <div class="panel-body">		
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="border: solid 1px; padding: 40px">
                                                    <?php
                                                    $model->teks_sk = str_replace('{qrcode}', '<img src="' . \yii\helpers\Url::to('@test/images/qrcode/' . $model->perizinan->kode_registrasi . '.png', TRUE) . '"/>', $model->teks_sk);
                                                    echo $model->teks_sk; 
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            	
                            <div class="tab-pane" id="tab_2">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Disclaimer</div>
                                    <div class="panel-body">
                                        <div class="callout callout-warning">
                                            <font size="3px"> <?= Params::findOne("disclaimer")->value; ?></font>
                                        </div>
                                        <br/>
                                        <input type="checkbox" id="check-dis" /> Saya Setuju
                                        <div class="box text-center" style='padding:20px;'>
                                            <br>
                                            <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Daftar Permohonan Izin') : Yii::t('app', 'Update'), ['id' => 'btnsub', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

                                        </div>
                                        <br/>
                                    </div>
                                </div>
                            </div>	
                            <ul class="pager wizard">
                                <li class="previous"><a href="#">Previous</a></li>
                                <li class="next"><a href="#">Next</a></li>
                                <li class="next finish" style="display:none;"><a href="#">Finish</a></li>
                            </ul>
                        </div>	
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>	
<script src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/openlayers-2.12/OpenLayers.js"></script>
<script type="text/javascript">
    window.onload = function() {
        var dms = false;
        var map;

        map = new OpenLayers.Map("map");
        map.addLayer(new OpenLayers.Layer.OSM());

        var Lon = parseFloat($("#izinkesehatan-longitude").val());
        var Lat = parseFloat($("#latitude").val());
        var lonLat = new OpenLayers.LonLat(Lon, Lat);
        var zoom = 15;
        var markers = new OpenLayers.Layer.Markers("Markers");

        map.addLayer(markers);
        markers.addMarker(new OpenLayers.Marker(lonLat));
        map.setCenter(lonLat, zoom);
        if (!map.getCenter())
            map.zoomToMaxExtent();
        map.events.register('click', map, handleMapClick);

        function handleMapClick(evt) {
            var mc = map.getLonLatFromViewPortPx(new OpenLayers.Pixel(evt.xy.x, evt.xy.y));

            var lon = getFormattedCoordLon(mc);
            var lat = getFormattedCoordLat(mc);

            $("#izinkesehatan-longitude").val(lon);
            $("#latitude").val(lat);
            addMarker(mc);
        }
        function getFormattedCoordLat(latlng) {
            latlng = latlng.transform(map.projection, map.displayProjection);
            var lat = latlng.lat;

            if (dms) {
                lat = getDMS(lat);
            }
            return lat;
        }
        function getFormattedCoordLon(latlng) {
            latlng = latlng.transform(map.projection, map.displayProjection);
            var lon = latlng.lon;

            if (dms) {
                lon = getDMS(lon);
            }
            return lon;
        }
        function getDMS(dd) {
            var absDD = Math.abs(dd);
            var deg = Math.floor(absDD);
            var min = Math.floor((absDD - deg) * 60);
            var sec = (Math.round((((absDD - deg) - (min / 60)) * 60 * 60) * 100) / 100);
            if (dd < 0)
                deg = -deg;
            //return {"deg":deg, "min":min, "sec":sec}; 
            return deg + " " + min + "' " + sec + "''";
        }
        function addMarker(latlng) {
            markers.clearMarkers();
            latlng = latlng.transform(map.displayProjection, map.projection);
            var lat = latlng.lat;
            var lon = latlng.lon;
            var size = new OpenLayers.Size(21, 25);
            var icon = new OpenLayers.Icon('/images/marker.png', size);
            markers.addMarker(new OpenLayers.Marker(new OpenLayers.LonLat(lon, lat), icon));
            map.addLayer(markers);
        }
    };

    $(".gllpUpdateButton").click(function() {
        $(".koorLatitude").html($("#latitude").val());
        $(".koorLongitude").html($("#izinkesehatan-longitude").val());
    });
</script>


<script>

    $(function() {
        $('#tempat_praktek1').show();
        if ($('#izinkesehatan-jumlah_sip_offline').val() == 1) {
            $('#tempat_praktek2').hide();
        } else {
            $('#tempat_praktek2').show();
        }
		
			if ($('#izinkesehatan-jumlah_sip_offline option:selected').text() == '2') {
                $('#tempat_praktek1').show();
                $('#tempat_praktek2').show();
            } else {
                $('#tempat_praktek1').show();
                $('#tempat_praktek2').hide();
            }
		
        $('#izinkesehatan-jumlah_sip_offline').change(function() {
            if ($('#izinkesehatan-jumlah_sip_offline option:selected').text() == '2') {
                $('#tempat_praktek1').show();
                $('#tempat_praktek2').show();
            } else {
                $('#tempat_praktek1').show();
                $('#tempat_praktek2').hide();
            }
        });
    });

    $(function() {
		
		if ($('#izinkesehatan-status_sip_offline option:selected').text() == 'Ada') {
			$('#jumlah_sip_offline').show();
			$('#side_tab_3').show();
			$('#sub2_tab_3').hide();
		} else {
			$('#jumlah_sip_offline').hide();
			$('#side_tab_3').hide();
			$('#sub2_tab_3').show();
		}
		
        $('#izinkesehatan-status_sip_offline').change(function() {
            if ($('#izinkesehatan-status_sip_offline option:selected').text() == 'Ada') {
                $('#jumlah_sip_offline').show();
                $('#side_tab_3').show();
                $('#sub2_tab_3').hide();
            } else {
                $('#jumlah_sip_offline').hide();
                $('#side_tab_3').hide();
                $('#sub2_tab_3').show();
            }
        });
    });

    $(function() {
		if ($('#izinkesehatan-kewarganegaraan_id option:selected').text() != 'INDONESIA') {
			$('#kitas').show();
		} else {
			$('#kitas').hide();
		}
        $('#izinkesehatan-kewarganegaraan_id').change(function() {
            if ($('#izinkesehatan-kewarganegaraan_id option:selected').text() != 'INDONESIA') {
                $('#kitas').show();
            } else {
                $('#kitas').hide();
            }
        });
    });

    $(function() {
		if ($('#izinkesehatan-kepegawaian_id').val() == '1' || $('#izinkesehatan-kepegawaian_id').val() == '4') {
			$('#surat_pimpinanan').show();
		} else {
			$('#surat_pimpinanan').hide();
		}
        $('#izinkesehatan-kepegawaian_id').change(function() {
            if ($('#izinkesehatan-kepegawaian_id').val() == '1' || $('#izinkesehatan-kepegawaian_id').val() == '4') {
                $('#surat_pimpinanan').show();
            } else {
                $('#surat_pimpinanan').hide();
            }
        });
    });
</script>

<script>


    $(document).ready(function() {
        var nama_izin = $('#izinkesehatan-nama_izin').val();
        var key = 'Praktik Perorangan';
        key = key.toUpperCase();
        nama_izin = nama_izin.toUpperCase();
        if (nama_izin.indexOf(key) > 0) {
            $('#izinkesehatan-nama_gelar').on('keyup', function() {
                $('#izinkesehatan-nama_tempat_praktik').val($('#izinkesehatan-nama_gelar').val());
                //$('#izinkesehatan-nama_tempat_praktik').prop('readonly', true);
            });
        }



    });


</script>

<script src="/js/wizard_kesehatan-jangbut.js"></script>
