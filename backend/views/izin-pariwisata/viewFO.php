<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Perizinan */

$this->title = $model->izin->nama;

/* @var $this yii\web\View */
/* @var $model backend\models\IzinSiup */
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-tab rounded shadow">
            <!-- Start tabs heading -->
            <div class="panel-heading no-padding">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1-1" data-toggle="tab"><span>Identitas Pemilik</span></a></li>
                    <li><a href="#tab1-2" data-toggle="tab"><span>Identitas Perusahaan</span></a></li>
                    <li><a href="#tab1-3" data-toggle="tab"><span>Legalitas Perusahaan</span></a></li>
					<li><a href="#tab1-4" data-toggle="tab"><span>Identitas Penanggung Jawab</span></a></li>
                    <li><a href="#tab1-5" data-toggle="tab"><span>Data Usaha Pariwisata</span></a></li>
                </ul>
            </div><!-- /.panel-heading -->
            <!--/ End tabs heading -->

            <!-- Start tabs content -->
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1-1">
                        <?= $this->render('_tab-identitas-pemilik', ['model' => $model]) ?>					
                    </div>
                    <div class="tab-pane fade" id="tab1-2">
                        <?= $this->render('_tab-identitas-perusahaan', ['model' => $model]) ?>					
                    </div>
                    <div class="tab-pane fade" id="tab1-3">
                        <?= $this->render('_tab-legalitas-perusahaan', ['model' => $model])
                        ?>
                    </div>
					<div class="tab-pane fade" id="tab1-4">
						<?= $this->render('_tab-identitas-penanggung-jawab', ['model' => $model])
                        ?>
                    </div>
					<div class="tab-pane fade" id="tab1-5">
                        <?= $this->render('_tab-data-usaha-pariwisata', ['model' => $model])
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
function DECtoDMS($latitude, $longitude)
	{
		$latitudeDirection = $latitude < 0 ? 'S': 'N';
		$longitudeDirection = $longitude < 0 ? 'W': 'E';

		$latitudeNotation = $latitude < 0 ? '-': '';
		$longitudeNotation = $longitude < 0 ? '-': '';

		$latitudeInDegrees = floor(abs($latitude));
		$longitudeInDegrees = floor(abs($longitude));

		$latitudeDecimal = abs($latitude)-$latitudeInDegrees;
		$longitudeDecimal = abs($longitude)-$longitudeInDegrees;

		$_precision = 3;
		$latitudeMinutes = round($latitudeDecimal*60,$_precision);
		$longitudeMinutes = round($longitudeDecimal*60,$_precision);

		return sprintf('%s%s&deg; %s %s %s%s&deg; %s %s',
			$latitudeNotation,
			$latitudeInDegrees,
			$latitudeMinutes,
			$latitudeDirection,
			$longitudeNotation,
			$longitudeInDegrees,
			$longitudeMinutes,
			$longitudeDirection
		);

	}
?>

