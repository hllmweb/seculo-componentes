<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $titulo_header; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!--css-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/app.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/all.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery.mobile-1.4.4.min.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/swiper.css'); ?>">
</head>
<body>
	<div class="app-main">
		<div class="header-top fixed-header">
			<h2 class="header-title"><?= $titulo_header; ?></h2>
		</div>
		<div class="content-main fixed-content" id="tabs_container">
			<div class="swiper-container" id="swiper-container2">
				<div class="swiper-wrapper">
					<div class="swiper-slide"><a href="#" rel="#1" class="btn-tab-1 tab activo">1</a></div>
					<div class="swiper-slide"><a href="#" rel="#2" class="btn-tab-1 tab">2</a></div>
					<div class="swiper-slide"><a href="#" rel="#3" class="btn-tab-1 tab">3</a></div>
					<div class="swiper-slide"><a href="#" rel="#4" class="btn-tab-1 tab">4</a></div>
					<div class="swiper-slide"><a href="#" rel="#5" class="btn-tab-1 tab">5</a></div>
					<div class="swiper-slide"><a href="#" rel="#6" class="btn-tab-1 tab">6</a></div>
					<div class="swiper-slide"><a href="#" rel="#7" class="btn-tab-1 tab">7</a></div>
					<div class="swiper-slide"><a href="#" rel="#8" class="btn-tab-1 tab">8</a></div>
					<div class="swiper-slide"><a href="#" rel="#9" class="btn-tab-1 tab">9</a></div>
					<div class="swiper-slide"><a href="#" rel="#10" class="btn-tab-1 tab">10</a></div>
					<div class="swiper-slide"><a href="#" rel="#11" class="btn-tab-1 tab">11</a></div>
					<div class="swiper-slide"><a href="#" rel="#12" class="btn-tab-1 tab">12</a></div>
					<div class="swiper-slide"><a href="#" rel="#13" class="btn-tab-1 tab">13</a></div>
					<div class="swiper-slide"><a href="#" rel="#14" class="btn-tab-1 tab">14</a></div>
					<div class="swiper-slide"><a href="#" rel="#15" class="btn-tab-1 tab">15</a></div>
					<div class="swiper-slide"><a href="#" rel="#16" class="btn-tab-1 tab">16</a></div>
					<div class="swiper-slide"><a href="#" rel="#17" class="btn-tab-1 tab">17</a></div>
					<div class="swiper-slide"><a href="#" rel="#18" class="btn-tab-1 tab">18</a></div>
					<div class="swiper-slide"><a href="#" rel="#19" class="btn-tab-1 tab">19</a></div>
					<div class="swiper-slide"><a href="#" rel="#20" class="btn-tab-1 tab">20</a></div>
				</div>
			</div>

			<div class="section tab_contents_container">
				<div id="1" class="tab_contents tab_contents_active fade">
					<div class="title text-bold border-bottom">
						1. Quanto é 1+1?
					</div>
					<div class="description">
						<div class="group-label block">
							<div class="inline circle no-mark">
								<label for="a">A</label>
							</div>
							<div class="inline row-80">
								<span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
							</div>
						</div>
						<div class="group-label block">
							<div class="inline circle certo">
								<label for="b">B</label>
							</div>
							<div class="inline row-80">
								<span>2</span>
							</div>
						</div>
						<div class="group-label block">
							<div class="inline circle no-mark">
								<label for="c">C</label>
							</div>
							<div class="inline row-80">
								<span>when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</span>
							</div>
						</div>
						<div class="group-label block">
							<div class="inline circle oficial">
								<label for="d">D</label>
							</div>
							<div class="inline row-80">
								<span>It has survived not only five centuries</span>
							</div>
						</div>
						<div class="group-label block">
							<div class="inline circle no-mark">
								<label for="e">E</label>
							</div>
							<div class="inline row-80">
								<span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</span>
							</div>
						</div>						


	
					</div>


				</div>
				<div id="2" class="tab_contents fade">
					teste 2
				</div>
				<div id="3" class="tab_contents fade">
					teste 3
				</div>
				<div id="4" class="tab_contents fade">
					teste 4
				</div>
				<div id="5" class="tab_contents fade">
					teste 5
				</div>
				<div id="6" class="tab_contents fade">
					teste 6
				</div>
				<div id="7" class="tab_contents fade">
					teste 7
				</div>
				<div id="8" class="tab_contents fade">
					teste 8
				</div>
				<div id="9" class="tab_contents fade">
					teste 9
				</div>
				<div id="10" class="tab_contents fade">
					teste 10
				</div>


			</div>

		</div>

	</div>

	<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery-ui.js'); ?>"></script>
	<!-- <script src="<?= base_url('assets/js/jquery.mobile-1.4.4.min.js'); ?>"></script> -->
	<script src="<?= base_url('assets/js/swiper.js'); ?>"></script>
	<script type="text/javascript">
		var mySwiper2 = new Swiper('#swiper-container2', {
            watchSlidesProgress: true,
            watchSlidesVisibility: true,
            slidesPerView: 4


        });

	    $(".swiper-wrapper .swiper-slide a").click(function(){
		    $(".swiper-slide a").removeClass("activo");
		    $(this).addClass("activo");
			$()    
		});


		$(".tab_contents:not(:nth-child(1))").hide();
		$(".btn-tab-1").click(function(e){
			var target = $(this.rel);
			$(".tab_contents").not(target).hide();
			target.toggle();
			
			$(".swiper-wrapper > .tabs > div.active").removeClass("active");
			$(this).parent().addClass('active');


			$('#tabs_container > .tab_contents_container > div.tab_contents_active').removeClass('tab_contents_active');
		    $(this.rel).addClass('tab_contents_active');

		    
			e.preventDefault();
		});


	</script>
</body>
</html>