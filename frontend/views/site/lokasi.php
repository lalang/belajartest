<?php
use yii\jui\AutoComplete;
use kartik\widgets\ActiveForm;
use kartik\typeahead\Typeahead;

use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\services\DirectionsWayPoint;
use dosamigos\google\maps\services\TravelMode;
use dosamigos\google\maps\overlays\PolylineOptions;
use dosamigos\google\maps\services\DirectionsRenderer;
use dosamigos\google\maps\services\DirectionsService;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
use dosamigos\google\maps\services\DirectionsRequest;
use dosamigos\google\maps\overlays\Polygon;
use dosamigos\google\maps\layers\BicyclingLayer;

$this->context->layout = 'main-google-map';

?>
<?php $language = Yii::$app->getRequest()->getCookies()->getValue('language');  Yii::$app->language = $language;?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class='main-title-page'><h2><strong><?= Yii::t('frontend','Lokasi') ?></strong></h2></div>

	<div class="ibox-title">
		<a href="<?= Yii::$app->homeUrl ?>"><i class="fa fa-backward"></i> <?= Yii::t('frontend','Kembali Ke Beranda') ?></a>
		<div class="ibox-tools">
			<a class="collapse-link">
				<i class="fa fa-chevron-up"></i>
			</a>

		</div>
	</div>
	<?php
/*	echo $form->field($data_kantor, 'kecamatan')->widget(Select2::classname(), [
	 'data' => ArrayHelper::map(Kantor::find()->all(), 'id', 'nama'),
	 'options' => ['placeholder' => 'Select ...'],
	 ]);*/
	?>
	<div class="ibox-content">
		<div class="container">   
			 <div class="row">
				<div class="col-md-3">
				</div>	
					<?php $form = ActiveForm::begin(); ?> 		
					<div class="input-group col-md-6">
						<?php echo AutoComplete::widget([
							'model' => $model,
							'name' => 'nama',
							'attribute' => 'nama',
							'clientOptions' => [
								'source' => $data_kantor
							],
							'options' => ['class' => 'form-control','required placeholder'=> Yii::t('frontend','Masukkan kantor yang dicari...')],
						]);

						?>
						<span class="input-group-btn"> 
						<button type="submit" value="submit" class="btn btn-primary"> <i class="fa fa-search "></i>&nbsp;<?php echo Yii::t('frontend','Cari Lokasi'); ?> </button> 
						</span>
					</div>
					<?php ActiveForm::end(); ?> 
				<div class="col-md-3">
				</div>		
			</div>  
		</div>   
	
	<?php 
	
	
	//$coord = new LatLng(['lat' => -6.181483, 'lng' => 106.828568]);
	$coord = new LatLng(['lat' => $lokasi->latitude, 'lng' => $lokasi->longitude]);
	$map = new Map([
		'center' => $coord,
		'zoom' => 17,
	]);
	 
	// lets use the directions renderer
	/*
	$home = new LatLng(['lat' => 39.720991014764536, 'lng' => 2.911801719665541]);
	$school = new LatLng(['lat' => 39.719456079114956, 'lng' => 2.8979293346405166]);
	$santo_domingo = new LatLng(['lat' => 39.72118906848983, 'lng' => 2.907628202438368]);
	 
	// setup just one waypoint (Google allows a max of 8)
	$waypoints = [
		new DirectionsWayPoint(['location' => $santo_domingo])
	];
	 
	$directionsRequest = new DirectionsRequest([
		'origin' => $home,
		'destination' => $school,
		'waypoints' => $waypoints,
		'travelMode' => TravelMode::DRIVING
	]);
	 
	// Lets configure the polyline that renders the direction
	$polylineOptions = new PolylineOptions([
		'strokeColor' => '#FFAA00',
		'draggable' => true
	]);
	 
	// Now the renderer
	$directionsRenderer = new DirectionsRenderer([
		'map' => $map->getName(),
		'polylineOptions' => $polylineOptions
	]);
	 
	// Finally the directions service
	$directionsService = new DirectionsService([
		'directionsRenderer' => $directionsRenderer,
		'directionsRequest' => $directionsRequest
	]);
	 
	// Thats it, append the resulting script to the map
	$map->appendScript($directionsService->getJs());
	 */
	// Lets add a marker now
	$marker = new Marker([
		'position' => $coord,
	   // 'title' => 'My Home Town',
	]);
	 
	if($lokasi->kepala){$kepala = '<br><b>Kepala:</b> '.$lokasi->kepala; }
	if($lokasi->alamat){$alamat = '<br><b>Alamat:</b> '.$lokasi->alamat; }
	if($lokasi->kodepos){$kodepos = '<br><b>Kodepos:</b> '.$lokasi->kodepos; }
	if($lokasi->telepon){$telepon = '<br><b>Telepon:</b> '.$lokasi->telepon; }
	if($lokasi->fax){$fax = '<br><b>Fax:</b> '.$lokasi->fax; }
	if($lokasi->kodepos){$kodepos = '<br><b>Kodepos:</b> '.$lokasi->kodepos; }
	if($lokasi->email_jak_go_id || $lokasi->email_kelurahan || $lokasi->email_ptsp){$email = '<br><b>Email:</b> '.$lokasi->email_jak_go_id.','.$lokasi->email_kelurahan.','.$lokasi->email_ptsp; }
	if($lokasi->twitter){$twitter = '<br><b>Twitter:</b> '.$lokasi->twitter; }

	// Provide a shared InfoWindow to the marker
	$marker->attachInfoWindow(
		new InfoWindow([
			'content' => strtoupper('<b>'.$lokasi->nama.'</b>').''.$kepala.''.$alamat.''.$kodepos.''.$telepon.''.$fax.''.$kodepos.''.$email.''.$twitter
		])
	);
	 
	// Add marker to the map
	$map->addOverlay($marker);
	 
	// Now lets write a polygon
	/*
	$coords = [
		new LatLng(['lat' => 25.774252, 'lng' => -80.190262]),
		new LatLng(['lat' => 18.466465, 'lng' => -66.118292]),
		new LatLng(['lat' => 32.321384, 'lng' => -64.75737]),
		new LatLng(['lat' => 25.774252, 'lng' => -80.190262])
	];
	 
	$polygon = new Polygon([
		'paths' => $coords
	]);
	 
	// Add a shared info window
	$polygon->attachInfoWindow(new InfoWindow([
			'content' => '<p>This is my super cool Polygon</p>'
		]));
	 
	// Add it now to the map
	$map->addOverlay($polygon);
	 */
	 
	// Lets show the BicyclingLayer :)
	$bikeLayer = new BicyclingLayer(['map' => $map->getName()]);
	 
	// Append its resulting script
	$map->appendScript($bikeLayer->getJs());
	 
	// Display the map -finally :)
	echo $map->display();

	/* @var $this yii\web\View */
	?>
	</div>
</div>



		
