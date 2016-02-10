<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\widgets\ActiveForm;
use kartik\builder\TabularForm;

    use yii\data\ArrayDataProvider;
	
	 $form = ActiveForm::begin(['id' => 'form-izin-tdp']); 
	
    $dataProvider = new ArrayDataProvider([
        'allModels'=>[
            ['price'=>
			'<div class="row">
			<div class="col-md-4">'.
			$form->field($model, 'i_1_pemilik_nama')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']).
			'</div><div class="col-md-4">'.
			$form->field($model, 'i_2_pemilik_tpt_lahir')->textInput(['maxlength' => true, 'placeholder' => 'Tempat Lahir']).'</div>'],
            ['price'=>'Rp.20.000'],
            ['price'=>'Rp.30.000'],
            ['price'=>'Rp.40.000'],
            ['price'=>'Rp.50.000']
        ],
		
    ]);
    echo Html::beginForm();
    echo TabularForm::widget([
        // your data provider
        'dataProvider'=>$dataProvider,
     
        // formName is mandatory for non active forms
        // you can get all attributes in your controller 
        // using $_POST['kvTabForm']
        'formName'=>'kvTabForm',
        
        // set defaults for rendering your attributes
        'attributeDefaults'=>[
            'type'=>TabularForm::INPUT_TEXT,
        ],
        
        // configure attributes to display
        'attributes'=>[
      //      'id'=>['label'=>'book_id', 'type'=>TabularForm::INPUT_HIDDEN_STATIC],
       //     'name'=>['label'=>'Book Name'],
			'price'=>['label'=>'','type' => TabularForm::INPUT_RAW],
      //      'publish_date'=>['label'=>'Published On', 'type'=>TabularForm::INPUT_STATIC],
			
        ],
        
		
		
        // configure other gridview settings
        'gridSettings'=>[
            'panel'=>[
                'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Manage Books</h3>',
                'type'=>GridView::TYPE_PRIMARY,
                'before'=>false,
                'footer'=>false,
                'after'=>Html::button('<i class="glyphicon glyphicon-plus"></i> Add New', ['type'=>'button', 'class'=>'btn btn-success kv-batch-create']) . ' ' . 
                        Html::button('<i class="glyphicon glyphicon-remove"></i> Delete', ['type'=>'button', 'class'=>'btn btn-danger kv-batch-delete']) . ' ' .
                        Html::button('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['type'=>'button', 'class'=>'btn btn-primary kv-batch-save'])
            ]
        ]
    ]);
    echo Html::endForm();