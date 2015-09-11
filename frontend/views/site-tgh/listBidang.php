<?php use frontend\models\BidangSearch;

$this->context->layout = 'main-no-landing';
?>
<div class="col-sm-6">
	<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapse<?php echo $model->id; ?>" aria-expanded="false" aria-controls="collapseExample">
		<?php echo $model->nama; ?>
	</a>
	<div class="collapse" id="collapse<?php echo $model->id; ?>">
  		<div class="well">
		<?php

			$searchModel = new BidangSearch();
			$searchModel->id = $id;
		    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		?>
  		</div>
  	</div>		

</div>
	