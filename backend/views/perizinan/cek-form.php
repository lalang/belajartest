<?php

use backend\models\IzinSiup;
use backend\models\PerizinanBerkasSearch;
use backend\models\PerizinanProses;
use backend\models\User;
use dosamigos\tinymce\TinyMce;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use backend\models\Zonasi;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use kartik\datecontrol\DateControl;

/* @var $this View */
/* @var $model PerizinanProses */

$this->title = 'Cek Teknis';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Cek Formulir'];
?>

<div class="row">
    <div class="col-md-12">

        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Cek Formulir</h3>

            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Petunjuk SOP!</h4>
                    <?= $model->sop->deskripsi_sop; ?>
                </div>
                <br>
                <?php
                $user = User::findOne($model->perizinan->pemohon_id);
                ?>
                <?php
				
				if($model->perizinan->izin->type=='TDG'){  
					
                    $izin_model = \backend\models\IzinTdg::findOne($model->perizinan->referrer_id);
					$izin_model[perizinan_proses_id] = $model->id;
					$izin_model[kode_registrasi] = $model->perizinan->kode_registrasi;
					$izin_model[url_back] = 'cek-form';

                } elseif($model->perizinan->izin->type=='PM1'){
                    $izin_model = \backend\models\IzinPm1::findOne($model->perizinan->referrer_id);
                } elseif($model->perizinan->izin->action=="izin-tdg"){
					$izin_model = IzinTdg::findOne($model->perizinan->referrer_id); 
				}else{
                    $izin_model = IzinSiup::findOne($model->perizinan->referrer_id);
                }

                echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                    'model' => $izin_model
                ]);
                $this->title = 'Cek Teknis';
//                echo $this->render('/' . $model->perizinan->izin->action . '/view', ['id' => $model->perizinan->referrer_id]);
                ?>
                <br>				
				<?php 
				if(Yii::$app->user->identity->pelaksana->cek_brankas=="Ya"){					 
					 
					echo $this->render('/perizinan/_brankas', ['model'=>$model]);
					}
				?>
                <div class="cetak-siup-view">
                    <div class="row">
                        <div class="col-md-12">
                                <?php
                                Modal::begin([
                                    'size'=>'modal-lg',
                                    'header' => '<h5>Preview Surat Keputusan</h5>',
                                    'toggleButton' => ['label' => '<i class="icon fa fa-search"></i> Preview SK', 'class'=> 'btn btn-primary'],
                                ]);
                                ?>
                                <div id="printableArea">
                                    <?= $this->render('_sk', ['model' => $model]) ?>
                                </div>                           
                                <?php
                                Modal::end();
                                ?>
                            
                            <?php
                                if(Yii::$app->user->identity->pelaksana->view_history=="Ya"){
                                    echo Html::a('<i class="fa fa-eye"></i> ' . Yii::t('app', 'View History'), ['view-history', 'pemohonID' => $model->perizinan->pemohon_id], [
                                        'data-toggle' => 'tooltip',
                                        'class' => 'btn btn-warning',
                                        'title' => Yii::t('app', 'View All Guest History')
                                            ]
                                    );
                                }
                            ?>

                                <?php $this->title = 'Preview SK'; ?>
                        </div>
                    </div>
                </div>

            </div><!-- ./box-body -->
            <div class="box-footer">

                <div class="panel-body">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

					<?php if(Yii::$app->user->identity->pelaksana->flag_ubah_tgl_exp=="Ya"){ ?>
										
						<?php
						$expired = explode(" ",$model2->tanggal_expired);
						?>
						
						<?php
						$model2->tanggal_expired=$expired[0];
						?>
                    <?=
						$form->field($model2, 'tanggal_expired')->widget(DateControl::classname(), [
							//'displayFormat' => 'dd/MM/yyyy',
							'options' => [
								'pluginOptions' => [
									'autoclose' => true,
								]
								 
							],

							'type' => DateControl::FORMAT_DATE,
						])->hint('format : dd-mm-yyyy (cth. 27-04-1990)');
						?>
					
					<?php } ?>
					
                    <?=
                    $form->field($model, 'zonasi_id')->widget(\kartik\widgets\Select2::classname(), [
                        'data' => ArrayHelper::map(Zonasi::find()->select(['id', 'concat(kode, " - ", replace(zonasi, "SUB ZONA ", "")) as kode_zonasi'])->asArray()->all(), 'id', 'kode_zonasi'),
                        'options' => ['placeholder' => Yii::t('app', '[N\A] - Tanpa zonasi')],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])
                    ?>

                    <?= $form->field($model, 'zonasi_sesuai')->radioList(['Y' => 'Sesuai', 'N' => 'Tidak Sesuai']); ?>
                    <?php
                    if ($model->status == 'Tolak') {
                        $items = [ 'Tolak' => 'Tolak', 'Lanjut' => 'Lanjut'];
                    } 
//                    else if ($model->status == 'Revisi') {
//                        $items = [ 'Revisi' => 'Revisi','Tolak' => 'Tolak','Lanjut' => 'Lanjut'];
//                    } 
                    else {
                        $items = [ 'Lanjut' => 'Lanjut','Tolak' => 'Tolak'];
                    }
//                     $items = [ 'Lanjut' => 'Lanjut','Tolak' => 'Tolak', 'Revisi' => 'Revisi'];
                    echo $form->field($model, 'status')->dropDownList($items)
                    ?>

                        <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Kirim'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary btn-disabled',
					'data-confirm' => Yii::t('yii', 'Apakah Anda akan melanjutkan proses kirim?'),]) ?>
                    </div>

<?php ActiveForm::end(); ?>
                </div><!-- /.panel-body -->

            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>
