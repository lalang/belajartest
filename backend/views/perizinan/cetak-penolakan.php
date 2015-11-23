<?php
use backend\models\PerizinanBerkasSearch;
use kartik\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanProses */

$this->title = $model->perizinan->kode_registrasi;
$this->params['breadcrumbs'][] = ['label' => $model->perizinan->izin->bidang->nama, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Cetak Surat Penolakan'];
?>
<div class="row">
    <div class="col-md-12">
        
        <?= $this->render('_progress', ['model' => $model->perizinan]) ?>
        
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Cetak Surat Penolakan</h3>
                
            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-bell"></i> Petunjuk SOP!</h4>
                    <?= $model->sop->deskripsi_sop; ?>
                </div>
                <br>
				<?php 
				if(Yii::$app->user->identity->pelaksana->cek_brankas=="Ya"){					 
					$model_b = new PerizinanBerkasSearch();
					$model_berkas = $model_b->searchBerkas($model->perizinan->id); 
					echo $this->render('/perizinan/_brankas', ['berkas_model' => $model_berkas,'model'=>$model]);
					}
				?>
                <div class="cetak-siup-view">
                    <div class="row">
                        <div class="col-md-12">
                                <?php
                                Modal::begin([
                                    'size'=>'modal-lg',
                                    'header' => '<h5>Preview Surat Penolakan</h5>',
                                    'toggleButton' => ['label' => '<i class="icon fa fa-search"></i> Preview SK', 'class'=> 'btn btn-primary'],
                                ]);
                                ?>
                                <div id="printableArea">
                                    <?= $this->render('_sk', ['model' => $model]) ?>
                                </div>                           
                                <?php
                                Modal::end();
                                ?>
                            
                            <?=
                        Html::a('<i class="fa fa-print"></i> ' . Yii::t('app', 'Cetak Penolakan'), ['cetak', 'id' => $model->id], [
                            'target' => '_blank',
                            'data-toggle' => 'tooltip',
                            'class' => 'btn btn-success',
                            'onclick' => "printDiv('printableArea')",
                            'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                                ]
                        )
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

                                <?php $this->title = 'Cetak Penolakan'; ?>
                        </div>
                    </div>
                </div>

            </div><!-- ./box-body -->
            <div class="box-footer">

                <div class="panel-body">


                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->errorSummary($model); ?>

                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

                    <?php
                    $items = [ 'Tolak' => 'Tolak'];
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
