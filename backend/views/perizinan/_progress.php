<?php

use kartik\slider\Slider;
?>


<div class="row">

    <div class="col-sm-12">


        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Data Perizinan</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                
                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th style="width: 10px"  class="text-center">Kode Registrasi</th>
                            <th class="text-center">Pemohon</th>
                            <th class="text-center">Jenis Perizinan</th>
                            <th class="text-center">Lokasi Perizinan</th>
                            <th class="text-center">ETA</th>
                        </tr>
                        <tr>
                            <td class="text-center"><?= $model->kode_registrasi; ?></td>
                            <td><?= $model->pemohon->profile->name; ?></td>
                            <td><?= $model->izin->nama; ?></td>
                            <td><?= $model->lokasiIzin->nama; ?></td>
                            <td class="text-center"><?= Yii::$app->formatter->asDate($model->pengambilan_tanggal, 'php: l, d F Y') . '<br><strong>' . $model->pengambilan_sesi . '</strong>'; ?></td>
                        </tr>


                    </tbody></table>
                <br><br><br>
                <div style="text-align: center">
                    <?=
                    Slider::widget([
                        'name' => 'current_no',
                        'value' => $model->current_no,
                        'sliderColor' => Slider::TYPE_GREY,
                        'handleColor' => Slider::TYPE_DANGER,
                        'pluginOptions' => [
                            'ticks' => explode(',', $model->steps),
                            'ticks_labels' => explode(',', $model->processes),
                            'ticks_snap_bounds' => 50,
                            'tooltip' => 'always',
                            'formatter' => new yii\web\JsExpression("function(val) {
               return 'Posisi Dokumen';
            }")
                        ],
                        'options' => ['disabled' => true, 'style' => 'width: 80%']
                    ]);
                    ?>
                </div>
                <br>
            </div><!-- /.box-body -->



        </div>


    </div>
</div>
