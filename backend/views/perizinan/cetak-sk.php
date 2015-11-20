<?php
use backend\models\PerizinanBerkasSearch;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\Modal;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = 'Cetak';
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Cetak SK'];
?>
<div class="row">
    <div class="col-md-12">
        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>

        <div class="box">

            <div class="box-header with-border">
                <h3 class="box-title">Cetak Surat Keputusan</h3>

            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Petunjuk SOP!</h4>
                    <?= $model->sop->deskripsi_sop; ?>
                </div>
                <br>
				<?php if(Yii::$app->user->identity->pelaksana->cek_brankas=="Ya"){					 
					$model_b = new PerizinanBerkasSearch();
					$model_berkas = $model_b->searchBerkas($model->perizinan->referrer_id); 
					echo $this->render('/perizinan/_brankas', ['berkas_model' => $model_berkas]);
					}
				?>
                <div class="cetak-siup-view">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            Modal::begin([
                                'size' => 'modal-lg',
                                'header' => '<h5>Preview Surat Keputusan</h5>',
                                'toggleButton' => ['label' => '<i class="icon fa fa-search"></i> Preview SK', 'class' => 'btn btn-primary'],
                            ]);
                            ?>
                            <div id="printableArea">
                                <?= $this->render('_sk', ['model' => $model]) ?>
                            </div>                           
                            <?php
                            Modal::end();
                            ?>
                            <?=
                            Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak SK'), ['print', 'id' => $model->id], [
                                'target' => '_blank',
                                'class' => 'btn btn-success',
                                ]
                            );
                            
                           ?>

                            <?php $this->title = 'Cetak Izin'; ?>
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

                    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Kirim'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
						'data-confirm' => Yii::t('yii', 'Sudahkan Anda melakukan cetak SK? jika sudah klik ok untuk melanjutkan'),]) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div><!-- /.panel-body -->

            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div>
</div>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
