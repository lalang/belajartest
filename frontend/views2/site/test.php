
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
       
        <link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') ?>/assets/parallax/css/style2.css" />
		<script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/assets/parallax/js/modernizr.custom.28468.js"></script>
		
		<noscript>
			<link rel="stylesheet" type="text/css" href="<?= Yii::getAlias('@web') ?>/assets/parallax/css/nojs.css" />
		</noscript>
    </head>
    <body>
        <div class="container">
			<!-- Codrops top bar -->
            <div class="codrops-top">
                <a href="http://tympanus.net/Tutorials/CSS3Accordion/">
                    <strong>&laquo; Previous Demo: </strong>Accordion with CSS3 
                </a>
                <span class="right">
					<a href="http://www.dinpattern.com/2011/03/21/waves/">Pattern from Dinpattern</a>
					<a href="http://medialoot.com/item/free-designer-portfolio-icon-set/">Icons by: LazyCrazy via MediaLoot</a>
                    <a href="http://tympanus.net/codrops/2012/03/15/parallax-content-slider-with-css3-and-jquery/">
                        <strong>Back to the Codrops Article</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
			<header>
				<h1>Parallax Content Slider <span>with CSS3 and jQuery</span></h1>
				<h2>A content slider with delayed animations and background parallax effect</h2>
				<p class="codrops-demos">
					<a href="index.html">Default</a>
					<a class="current-demo" href="index2.html">Autoplay</a>
					<a href="index3.html">Parallax off</a>
				</p>
			</header>
			<div id="da-slider" class="da-slider">
				<div class="da-slide">
					<h2>Easy management</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?= Yii::getAlias('@web') ?>/assets/parallax/images/2.png" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>Revolution</h2>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?= Yii::getAlias('@web') ?>/assets/parallax/images/3.png" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>Warm welcome</h2>
					<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?= Yii::getAlias('@web') ?>/assets/parallax/images/1.png" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>Quality Control</h2>
					<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?= Yii::getAlias('@web') ?>/assets/parallax/images/4.png" alt="image01" /></div>
				</div>
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div>
        </div>
		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
		<script type="text/javascript" src="<?= Yii::getAlias('@web') ?>/assets/parallax/js/jquery.cslider.js"></script>
		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 450
				});
			
			});
		</script>	
    </body>
</html>