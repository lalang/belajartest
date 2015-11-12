<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use \backend\models\Kuota;
use \backend\models\Lokasi;
use yii\helpers\ArrayHelper;
use kartik\slider\Slider;
use yii\widgets\Pjax;
use backend\models\HariLibur;
?>

                <?php $form = ActiveForm::begin([
                    'layout' => 'horizontal',
                    'action' => Url::to(['perizinan/schedule', 'id'=>$model->id]),
                    ]); ?>

                <?= $form->errorSummary($model); ?>

                <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                <?= Html::hiddenInput('lokasi_izin_id', $model->lokasi_izin_id, ['id' => 'lokasi_izin_id']); ?>

                <?= Html::hiddenInput('wewenang', $model->izin->wewenang_id, ['id' => 'wewenang']); ?>
                
              <?php
// $jumlah_libur = HariLibur::find()->where("tanggal between '2015-12-27' and '2015-12-28'")->count();
// echo $jumlah_libur;
                $offdays = ArrayHelper::getColumn(HariLibur::find('tanggal >= now()')->select(['DATE_FORMAT(tanggal,"%d-%m-%Y") as tanggal'])->asArray()->all(), 'tanggal');
                echo $form->field($model, 'pengambilan_tanggal')->widget(\kartik\widgets\DatePicker::classname(), [
//                        'options' => ['placeholder' => Yii::t('app', 'Choose Tanggal Pertemuan')],
//                        'id'=>'tanggal-id',
                    'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-mm-yyyy',
                        'startDate' => $eta,
                        'daysOfWeekDisabled' => [0, 6],
                        'datesDisabled' => $offdays,
                    ],
                    'pluginEvents' => [
                        "changeDate" => "function(e) {
                            $.ajax({
                                    url: '" . Url::to(['kuota']) . "',
                                    type: 'GET',

                                    data:{
                                    tanggal: $('#perizinan-pengambilan_tanggal').val(), 
                                    lokasi: $('#lokasi_izin_id').val(), 
                                    wewenang: $('#wewenang').val(), 
                                    opsi_pengambilan:$(\"input[name='Perizinan[opsi_pengambilan]']:checked\").val(), 
                                    },
                                    dataType: 'html',
                                    async: false,
                                    success: function(data, textStatus, jqXHR)
                                    {
						$('#warning-kuota').show()
                                       	$('#kuota').html(data)
                                    }
                                    
                                });

                         }",
                    ],
                ])->hint('format : dd-mm-yyyy (cth. 27-04-2015)');
                ?>
		<div id="warning-kuota" style="display: none">
			<div class="alert alert-warning alert-dismissible">
				<h4><i class="icon fa fa-bell"></i> Tentukan lokasi Sesi!</h4>
				<p>Sebelum klik daftar, tentukan Sesi pengambilan terlebih dahulu dengan meng-klik salah satu tombol berwarna biru di bawah ini.</p>
			</div>
				
		</div>

               <div id="kuota"></div>

                <div class="box-body no-padding">
                    <div class="form-group text-center">
                        <?= Html::submitButton('Daftar', [ 'id' => 'submit-btn', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'disabled' => true]) ?>
                    </div>
                    <?= $form->field($model, 'lokasi_pengambilan_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                    <?= $form->field($model, 'pengambilan_sesi', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                    <?php ActiveForm::end(); ?>
                </div>
