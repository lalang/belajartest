<?php
$this->context->layout = 'main-test';
?>
<div id="myCarousel" class="carousel slide" data-ride="carousel">    
		
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<?php $loop_slide=0; foreach ($data_slide as $value) { 
			if($loop_slide=="0"){$active="class='active'";}else{$active="";}?>
			<li data-target="#myCarousel" data-slide-to="<?php echo$loop_slide; ?>" <?php echo $active; ?>></li>
			<?php
			$loop_slide++;
			}?>
		</ol>
		
		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<?php $loop_slide=1; foreach ($data_slide as $value) { 
				
				if($language=="en"){ 
					$judul = $value->title_en;
					$conten = $value->conten_en;
				}else{
					$judul = $value->title;
					$conten = $value->conten;
				}
				
				if($loop_slide=="1"){$active="active";}else{$active="";}
			?>
			  <div class="item <?php echo $active;?>">
				<img src="<?= Yii::getAlias('@test') ?>/images/slider/<?php echo $value->image ?>" height='100'/>
				<div class="carousel-caption">
					<?php if($judul){echo "<h3>$judul</h3>";}?>
					<?php if($conten){echo "<p>$conten</p>";}?>
				</div>
			  </div>
			<?php $loop_slide++; } ?>
	  
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	</div>