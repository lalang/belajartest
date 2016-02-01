<?php
use backend\models\PerizinanBerkasSearch;
use backend\models\PerizinanProses;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\bootstrap\Modal;
use kartik\datecontrol\DateControl;

/* @var $this View */
/* @var $model PerizinanProses */

$this->title = 'Approval Izin';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Approval SK'];
?>
<div class="row">
    <div class="col-md-12">

        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Approval Surat Keputusan</h3>

            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Petunjuk SOP!</h4>
                    <?= $model->sop->deskripsi_sop; ?>
                </div>

                <?php
                $edit = 0;
                if($model->perizinan->izin->type=='TDG'){ 
                    $izin_model = \backend\models\IzinTdg::findOne($model->perizinan->referrer_id);
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
                    
                }elseif($model->perizinan->izin->type=='TDP'){ 
                    $izin_model = \backend\models\IzinTdp::findOne($model->perizinan->referrer_id);
                    $edit = 1;
					$izin_model[perizinan_proses_id] = $model->id;
					$izin_model[kode_registrasi] = $model->perizinan->kode_registrasi;
					$izin_model[url_back] = 'approval';
						
                    if($izin_model->izin_id == 601 || $izin_model->izin_id == 602 || $izin_model->izin_id == 603){
                        //Koprasi
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-kop', [
                            'model' => $izin_model
                        ]);
                    } elseif($izin_model->izin_id == 491 || $izin_model->izin_id == 598 || $izin_model->izin_id == 599){
                        //PT
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-pt', [
                            'model' => $izin_model
                        ]);
                    }
                    elseif($izin_model->izin_id == 604 || $izin_model->izin_id == 605 || $izin_model->izin_id == 606){
                        //Bul
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-bul', [
                            'model' => $izin_model
                        ]);
                    }
                    elseif($izin_model->izin_id == 607 || $izin_model->izin_id == 608 || $izin_model->izin_id == 609){
						//CV
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-cv', [
                            'model' => $izin_model
                        ]);
                    }
                    elseif($izin_model->izin_id == 610 || $izin_model->izin_id == 611 || $izin_model->izin_id == 612){
                        //Firma
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-fa', [
                            'model' => $izin_model
                        ]);
                    }elseif ($izin_model->izin_id == 613 || $izin_model->izin_id == 614 || $izin_model->izin_id == 615) {
                        //PO
                        echo $this->render('/' . $model->perizinan->izin->action . '/view-po', [
                            'model' => $izin_model
                        ]);
					}
				
                } else{
                }
                 
//                var_dump($izin_model);exit();
                
//                echo $this->render('/' . $model->perizinan->izin->action . '/view', ['id' => $model->perizinan->referrer_id]);
                ?>
                <br>
				<?php 
				if(Yii::$app->user->identity->pelaksana->cek_brankas=="Ya"){
					echo $this->render('/perizinan/_brankas', ['berkas_model' => $model_berkas,'model'=>$model]);
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

                                <?php $this->title = 'Approval Izin'; ?>
                        </div>
                    </div>
                </div>

            </div><!-- ./box-body -->
            <div class="box-footer">

                <table class="table table-striped table-bordered">
                    <tbody><tr>
                            <th style="width: 10px"  class="text-center">No.</th>
                            <th style="width: 300px"  class="text-center">Petugas</th>
                            <th class="text-center">Catatan Petugas</th>
                        </tr>
                        <?php
                        $catatans = PerizinanProses::find()->where('urutan < ' . $model->urutan . ' and perizinan_id = ' . $model->perizinan_id)->all();
                        $i = 1;
                        foreach ($catatans as $catatan) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $i++; ?>.</td>
                                <td><?= $catatan->pelaksana->nama; ?></td>
                                <td><?= $catatan->keterangan; ?></td>
                            </tr>
                        <?php } ?>

                    </tbody></table>

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
                   if ($model->status == 'Tolak') {
                        $items = [ 'Tolak' => 'Tolak', 'Lanjut' => 'Lanjut'];
                    } 
//                    else if ($model->status == 'Revisi') {
//                        $items = [ 'Revisi' => 'Revisi','Tolak' => 'Tolak','Lanjut' => 'Lanjut'];
//                    } 
                    else {
                        $items = [ 'Lanjut' => 'Lanjut','Tolak' => 'Tolak'];
                    }
//                    $items = [ 'Lanjut' => 'Lanjut','Tolak' => 'Tolak', 'Revisi' => 'Revisi'];
                    echo $form->field($model, 'status')->dropDownList($items)
                    ?>
                    
                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Kirim'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
						'data-confirm' => Yii::t('yii', 'Apakah Anda akan melanjutkan proses kirim?'),]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div><!-- /.panel-body -->

            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>
