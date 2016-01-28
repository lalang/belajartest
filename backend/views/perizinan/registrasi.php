<?php

use backend\models\IzinSiup;
use backend\models\IzinTdg;
use backend\models\PerizinanBerkasSearch;
use backend\models\PerizinanProses;
use backend\models\User;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\web\View;
use kartik\datecontrol\DateControl;

/* @var $this View */
/* @var $model PerizinanProses */

$this->title = 'Registrasi';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Registrasi'];
?>
<div class="row">
    <div class="col-md-12">
        
        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>
       
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Formulir Online</h3>
                
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
                $edit = 0;
				if($model->perizinan->izin->type=='TDG'){  
                    $izin_model = \backend\models\IzinTdg::findOne($model->perizinan->referrer_id);
					$izin_model[perizinan_proses_id] = $model->id;
					$izin_model[kode_registrasi] = $model->perizinan->kode_registrasi;
					$izin_model[url_back] = 'registrasi';
					
                } elseif($model->perizinan->izin->type=='PM1'){
                    $izin_model = \backend\models\IzinPm1::findOne($model->perizinan->referrer_id);
                    $edit = 1;
                    if($izin_model->izin_id == 537){
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-skbmr', [
                            'model' => $izin_model
                        ]);
                    } elseif($izin_model->izin_id == 519){
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-skck', [
                            'model' => $izin_model
                        ]);
                    } elseif ($izin_model->izin_id == 525) {
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-sktm', [
                            'model' => $izin_model
                        ]);
                }
				
                } 
                elseif($model->perizinan->izin->type=='TDP'){
                    $izin_model = \backend\models\IzinPm1::findOne($model->perizinan->referrer_id);
                    $edit = 1;
                    if($izin_model->izin_id == 601 || $model->izin_id == 602 || $model->izin_id == 603){
                        //Koprasi
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-tdp-kop', [
                            'model' => $izin_model
                        ]);
                    } elseif($model->izin_id == 491 || $model->izin_id == 598 || $model->izin_id == 599){
                        //PT
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-tdp-pt', [
                            'model' => $izin_model
                        ]);
                    }
                    elseif($model->izin_id == 604 || $model->izin_id == 605 || $model->izin_id == 606){
                        //Bul
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-tdp-bul', [
                            'model' => $izin_model
                        ]);
                    }
                    elseif($model->izin_id == 607 || $model->izin_id == 608 || $model->izin_id == 609){
                        //CV
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-tdp-cv', [
                            'model' => $izin_model
                        ]);
                    }
                    elseif($model->izin_id == 610 || $model->izin_id == 611 || $model->izin_id == 612){
                        //Firma
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-tdp-fa', [
                            'model' => $izin_model
                        ]);
                    }elseif ($model->izin_id == 613 || $model->izin_id == 614 || $model->izin_id == 615) {
                        //PO
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-tdp-po', [
                            'model' => $izin_model
                        ]);
                }
				
                } 
                else{
                    $izin_model = IzinSiup::findOne($model->perizinan->referrer_id);
                echo $this->render('/' . $model->perizinan->izin->action . '/view', [
                    'model' => $izin_model
                ]);
                }
                 
//                var_dump($izin_model);exit();
                
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
                    
					<?php
                    $items = [ 'Lanjut' => 'Lanjut'];
                    echo $form->field($model, 'status')->dropDownList($items);
                    ?>

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6, ['placeholder' => 'Catatan FO ke petugas selanjutnya']]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Kirim'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
						'data-confirm' => Yii::t('yii', 'Apakah Anda akan melanjutkan proses kirim?'),]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div><!-- /.panel-body -->

            </div><!-- /.box-footer -->
        
        </div>
    </div>
</div>

