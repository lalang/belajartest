<?php
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Typeahead;
use yii\widgets\ListViewHome;
use yii\helpers\ArrayHelper;
use backend\models\Bidang;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
?>   
    
<div class="site-index">
    <!-- <div class="row">
        <div class="col-sm-9">
            <i class="fa fa-balance-scale fa-5x"></i>
        </div>
        <div class="col-sm-9">
            <i class="fa fa-balance-scale fa-5x"></i>
        </div>
        <div class="col-sm-9">
            <i class="fa fa-balance-scale fa-5x"></i>
        </div>
    </div>         -->

    <ul class="list-inline text-center">
        <li class="text-center">
            <a href="http://portal.bptsp.tratapp.com/perizinan" target="_blank">
                <span class="fa-stack fa-5x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-adn fa-stack-1x fa-inverse"></i>
                </span>
                <section>Perizinan</section>
            </a>
        </li>
        <li class="text-center">
            <a href="http://portal.bptsp.tratapp.com/regulasi" target="_blank">
                <span class="fa-stack fa-5x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-balance-scale fa-stack-1x fa-inverse"></i>
                </span>
                <section>Regulasi</section>
            </a>
        </li>
        <li class="text-center">
            <a href="http://bptspdki.net" target="_blank">
                <span class="fa-stack fa-5x">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-search fa-stack-1x fa-inverse"></i>
                </span>
                <section>Lacak Perizinan</section>
            </a>
        </li>                            
    </ul>
    <div class="content-quotes">
        <h3>"Solusi Perizinan Warga Jakarta"</h3>
    </div>
        
        <div class="bidang_search">

         <?php
         $form = ActiveForm::begin([
            // 'action' => ['index'],
             'method' => 'get',
             'type' => ActiveForm::TYPE_INLINE,
             'action' => ['/site/search-bidang'],
         ]);
         ?>
         <?php $model = $searchModel; ?>
         <?php
         echo $form->field($model, 'nama');
         ?>
          <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-success']) ?>
            </div>


        <?php ActiveForm::end(); ?>
        </center>
    <h3 class="title_list">DAFTAR PERIZINAN</h3>
    <div class="body-content">
        <?= ListViewHome::widget([
         'dataProvider' => $dataProvider,
         'itemOptions' => ['class' => 'item'],
        // 'cssFile'=>'/css/bootrap-min.css',
         
    //    'itemView' => function ($model, $key, $index, $widget) {
      //   return Html::a(Html::encode($model->nama), ['view', 'id' => $model->id]);
         'itemView' => 'listBidang'
         ]) ?>






    </div>
</div>


