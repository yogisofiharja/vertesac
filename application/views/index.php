<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Beta</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/reset-min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/style_slideshow.css" />
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/modernizr.custom.28468.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.stellar.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/waypoints.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.easing.1.3.js"></script>
</head>
<script type="text/javascript">
jQuery(document).ready(function ($) {
	$(window).stellar();

	var links =$('.navigation').find('li');
	slide = $('.slide');
	button = $('.button');
	back = $('.back');
	mywindow = $(window);
	htmlbody = $('html,body');

		//setup waypoint
		slide.waypoint(function (event, direction){
			dataslide = $(this).attr('data-slide');
			if (direction === 'down') {
				$('.navigation li[data-slide="' + dataslide + '"]').addClass('active').prev().removeClass('active');
			}else {
				$('.navigation li[data-slide="' + dataslide + '"]').addClass('active').next().removeClass('active');
			}
		});
		mywindow.scroll(function () {
			if (mywindow.scrollTop() == 0) {
				$('.navigation li[data-slide="1"]').addClass('active');
				$('.navigation li[data-slide="2"]').removeClass('active');
			}
		});

		//setup jquery ease to link
		function goToByScroll(dataslide) {

			htmlbody.animate({
				scrollTop: $('.slide[data-slide="' + dataslide + '"]').offset().top
			}, 2000, 'easeInOutQuint');
		}

		$("#login_button").click(function(e){
			e.preventDefault();
			$("#form_login").show();
		});
	    //setup link
	    links.click(function (e) {
	    	e.preventDefault();
	    	dataslide = $(this).attr('data-slide');
	    	goToByScroll(dataslide);
	    });
	    button.click(function (e) {
	    	e.preventDefault();
	    	dataslide = $(this).attr('data-slide');
	    	goToByScroll(dataslide);

	    });
	    back.click(function (e) {
	    	e.preventDefault();
	    	dataslide = $(this).attr('data-slide');
	    	goToByScroll(dataslide);

	    });
	});
</script>
<body>
	<ul class="navigation">
		<?php 
			session_start();
			if($this->session->userdata('logged_in')){
				?>
					<li><a href="<?php echo base_url();echo $this->session->userdata('logged_in')['user_type']?>" target="_blank"><img src="<?php echo base_url();?>asset/images/Side Bar Icons-02.png"><p>Login</p></a></li>		
				<?php
			}
		?>
		<li id="login_button"><img src="<?php echo base_url();?>asset/images/Side Bar Icons-02.png"><p>Login</p></li>
		<li data-slide="1"><img src="<?php echo base_url();?>asset/images/Side Bar Icons-03.png"><p>Home</p></li>
		<li data-slide="2"><img src="<?php echo base_url();?>asset/images/Side Bar Icons-04.png"><p>About</p></li>
		<li data-slide="3"><img src="<?php echo base_url();?>asset/images/Side Bar Icons-05.png"><p>Stores</p></li>
		<li data-slide="4"><img src="<?php echo base_url();?>asset/images/Side Bar Icons-06.png"><p>Bags</p></li>
		<li data-slide="5"><img src="<?php echo base_url();?>asset/images/Side Bar Icons-07.png"><p>Community</p></li>
		<li data-slide="6"><img src="<?php echo base_url();?>asset/images/Side Bar Icons-08.png"><p>Ask</p></li>
		<li data-slide="7"><img src="<?php echo base_url();?>asset/images/Side Bar Icons-09.png"><p>Search</p></li>
	</ul>
	<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5"> 
		<div id="home">
			<form action="<?php echo base_url();?>login/process"  method="POST" enctype="multipart/form-data" onSubmit="return validasi(this)"  name="form_login" id="form_login" style="margin-left:150px;margin-top:100px;color:#ffffff;display:none;">
				<label>Email</label><span id="e-email"></span><br>
				<input type="email" name="email" placeholder="email"/><br/><br/>
				<label>Password</label><span id="e-password"></span><br>
				<input type="password" name="password" placeholder="password"/><br/><br/>
				<input type="radio" name="user_type" value="user" checked="true">User
				<input type="radio" name="user_type" value="store">store<br/><br/>
				<input type="submit" value="login">
				<?php 
				if($this->session->flashdata('status')=="error"){
					echo "<h2>Login gagal. Pastikan email dan password anda benar!</h2>";
				}
				?>
			</form>
			<h1>-welcome-</h1>
			<h2>Vertesac in a nutshell</h2>
			<p>Vertesac is a convergence pruduct from fashion and information technology.
				We make asystem into a bag, to make it smart enough to detect the usage history of the bag.</p>
			</div>
			<div id="winner-of">
				<h6>Vertesac is the winner of :</h6>
				<img src="<?php echo base_url();?>asset/images/Awards - Great Lake.png" id="frst">
				<img src="<?php echo base_url();?>asset/images/Awards - BNI.png">
			</div>
			<div id="home-video"><img src="<?php echo base_url();?>asset/images/Vertesac Web Parallax Home-09.png" width="130px" height="130px" style="margin:20% auto; display:block;"></div>
			<div class="clear"></div>
		</div>
		<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">

			<div id="wrapper-about1">
				<h1>-about-</h1>
				<div class="about-box" id="col1">
					<img src="<?php echo base_url();?>asset/images/Icon Bag.png">
					<p>Tas yang fashionable dan harganya terjangkau, praktis, bervariasi, dengan menjadi member berarti konsument beraksi dalam kepedulian lingkungan juga!</p>
					<div class="clear"></div>
				</div>
				<div class="about-box">
					<img src="<?php echo base_url();?>asset/images/Icon Smartphone.png">
					<p>Setelah membeli starter pack yang berisi smart shopping bag, dan user id + password, konsumen dapat menginstall mobile apps Vertesac pada smartphone mereka dan banyak lagi keuntungannya!</p>
					<div class="clear"></div>
				</div>
				<div class="about-box">
					<img src="<?php echo base_url();?>asset/images/Icon Rewards.png">
					<p>Mendapat promo khusus (diskon, poin, cashback) dari merchant-merchant yang bekerjasama dengan Vertesac.</p>
					<div class="clear"></div>
				</div>
				<div style="width:100%; float:left;"><button id="seehow">See How!</button></div>
			</div>
			<div id="col2">
				<div id="da-slider" class="da-slider">

					<div class="da-slide">

						<div class="da-img"><img src="<?php echo base_url();?>asset/images/Web illustrations 1.png" alt="image01" /></div>
						<h2>Integrasi Sistem</h2>
						<p>
							Merchant dapat mentracking consumer behavior dari setiap konsumentnya dengan fitur Customer
							Relationship agar promosi tepat tertuju pada target serta dapat meng-upgrade promosi pada mobile
							apps sehingga konsumen dapat langsung melihatnya.
						</p>

					</div>
					<div class="da-slide">
						<div class="da-img"><img src="<?php echo base_url();?>asset/images/Web illustrations 1.png" alt="image01" /></div>
						<h2>Promo yang Tepat</h2>
						<p>
							Vertesac system ini akan dijadikan "Loyalty Program" untuk merchant yang
							flexible dengan kata lain merchant boleh saja menentukan penawarannya sendiri
							tanpa ditetapkan oleh Vertesac, semenarik mungkin penawarannya akan berdampak
							langsung pada respon dari konsumennya.
						</p>

						<div class="da-img"><img src="<?php echo base_url();?>asset/images/Web illustrations 2.png" alt="image01" /></div>
					</div>
					<div class="da-slide">
						<div class="da-img"><img src="<?php echo base_url();?>asset/images/Web illustrations 1.png" alt="image01" /></div>
						<h2>Go Green Jadi Asik!</h2>
						<p>
							Vertesac Shopping Ecosystem ini dirancang untuk menjadi
							solusi dari masalah kantong plastik memudahkan konsumen dalam membawa shopping
							bag sendiri yang smart, dan memberikan keuntungan secara langsung maupun tidak
							bagi konsumen ataupun merchant!
						</p>

						<div class="da-img"><img src="<?php echo base_url();?>asset/images/Web illustrations 3.png" alt="image01" /></div>
					</div>
					<nav class="da-arrows">
						<span class="da-arrows-prev"></span>
						<span class="da-arrows-next"></span>
					</nav>
				</div>
			</div>
		</div>
		<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
			<h1>-stores-</h1>
			<?php 
			print "<pre>";
			// print_r($stores);
			print "</pre>";
			foreach ($stores as $store):?>
			<div class="store-box">
				<div class="store-box-wrapper">
					<img src="<?php echo base_url();?>asset/photo/promo/<?php echo $store->photo;?>">
					<h2 class="title"><?php echo $store->store_name;?></h2>
					<label class="fashion"><?php echo $store->store_type;?></label>
					<hr/>
					<div class="box-detail">
						<div id="discount"><label><?php echo $store->disc;?></label></div>
						<label class="lbl-detail">Available Discount</label>
					</div>
					<div class="box-detail">
						<div id="discount"><label><?php echo $store->egg;?></label></div>
						<label class="lbl-detail">Egg Per Visit</label>
					</div>
					<button class="see-more-info">See More Information</button>
				</div>
			</div>
		<?php endforeach;?>		
		<div id="i-box"><button id="stores-see-more">See More</button></div>
		
	</div>
	<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
		<h1>-bags-</h1>
		<div id="wrapper-bags">
			<img src="<?php echo base_url();?>asset/images/Arrow-16.png" id="arrow-l">
			<img src="<?php echo base_url();?>asset/images/IMG_4102.JPG" width="600px" height="85%" class="img-bags">
			<img src="<?php echo base_url();?>asset/images/Arrow-15.png" id="arrow-r">
			<p id="see-more-bags">See More bags</p>
		</div>
	</div>
	<div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
		<h1>-community-</h1>
		<div id="scrl">
			<div class="community-box">
				
				<div class="community-box-img"><img src="<?php echo base_url();?>asset/images/Community-21.png"></div>
				<div class="community-deskripsi">
					<h3>WWF ( World Wildlife Fund)</h3>
					<hr class="ln-community-name"> </hr>
					<p>Our mission is to build a future in which people live in harmony with nature. From our experience as the world's leading independent conservation body, we know that the well being of people, wildlife and the environment are closely linked. That's why we take an integrated approach to our work. We're strinving to safeguard the natural world, helping people live more sustainably and take action against climate change. We spend a lot of time...</p>
					
				</div>
				<button id="cummunity-readmore">Read More</button>
				
				<div class="clear"></div>

			</div>

			<div class="community-box">
				
				<div class="community-box-img"><img src="<?php echo base_url();?>asset/images/Community-22.png"></div>
				<div class="community-deskripsi">
					<h3>WWF ( World Wildlife Fund)</h3>
					<hr class="ln-community-name"/>
					<p>Our mission is to build a future in which people live in harmony with nature. From our experience as the world's leading independent conservation body, we know that the well being of people, wildlife and the environment are closely linked. That's why we take an integrated approach to our work. We're strinving to safeguard the natural world, helping people live more sustainably and take action against climate change. We spend a lot of time...</p>
					
				</div>
				<button id="cummunity-readmore">Read More</button>
				
				<div class="clear"></div>

			</div>
			<div class="community-box">
				
				<div class="community-box-img"><img src="<?php echo base_url();?>asset/images/Community-23.png"></div>
				<div class="community-deskripsi">
					<h3>WWF ( World Wildlife Fund)</h3>
					<hr class="ln-community-name"/>
					<p>Our mission is to build a future in which people live in harmony with nature. From our experience as the world's leading independent conservation body, we know that the well being of people, wildlife and the environment are closely linked. That's why we take an integrated approach to our work. We're strinving to safeguard the natural world, helping people live more sustainably and take action against climate change. We spend a lot of time...</p>
					
				</div>
				<button id="cummunity-readmore">Read More</button>
				
				<div class="clear"></div>

			</div>
			<div class="community-box">
				
				<div class="community-box-img"><img src="<?php echo base_url();?>asset/images/Community-22.png"></div>
				<div class="community-deskripsi">
					<h3>WWF ( World Wildlife Fund)</h3>
					<hr class="ln-community-name"/>
					<p>Our mission is to build a future in which people live in harmony with nature. From our experience as the world's leading independent conservation body, we know that the well being of people, wildlife and the environment are closely linked. That's why we take an integrated approach to our work. We're strinving to safeguard the natural world, helping people live more sustainably and take action against climate change. We spend a lot of time...</p>
					
				</div>
				<button id="cummunity-readmore">Read More</button>
				
				<div class="clear"></div>

			</div>
			<div class="community-box">
				
				<div class="community-box-img"><img src="<?php echo base_url();?>asset/images/Community-21.png"></div>
				<div class="community-deskripsi">
					<h3>WWF ( World Wildlife Fund)</h3>
					<hr class="ln-community-name"/>
					<p>Our mission is to build a future in which people live in harmony with nature. From our experience as the world's leading independent conservation body, we know that the well being of people, wildlife and the environment are closely linked. That's why we take an integrated approach to our work. We're strinving to safeguard the natural world, helping people live more sustainably and take action against climate change. We spend a lot of time...</p>
					
				</div>
				<button id="cummunity-readmore">Read More</button>
				
				<div class="clear"></div>

			</div>
		</div>
	</div>
	<div class="slide" id="slide6" data-slide="6" data-stellar-background-ratio="0.5">
		<div id="wrapper-contact">
			<h1>-contact-</h1>
			<div id="contact-left">
				<p id="contact-p1">Have questions regarding Vertesac?</p><hr class="hr-p1"/>
				<p id="contact-p2">Wanna make your brand receive higher retention?</p><hr class="hr-p2"/>
				<p id="contact-p3">Or get many great reward?</p>
				<div class="clear"></div>
			</div>
			<div id="contact-right">
				<form id="fm-contact" method="post" action="<?php echo base_url();?>contact/save">
					<input type="text" name="name" placeholder="Name" class="contact-in" id="contact-inp">
					<input type="text" name="email" placeholder="Email Address" class="contact-in" id="contact-inp">
					<textarea name="message" Placeholder="Message" class="contact-in" id="contact-txtarea"></textarea>
					<input type="submit" value="Submit" id="contact-submit"> 
				</form>
				<a class="back" data-slide="1" title=""><img src="<?php echo base_url();?>asset/images/Back To Top-17.png" id="backtotop"></a>

				<div class="clear"></div>
			</div>
		</div>
		<div id="footer">
			<h5>Elsewhere :</h5>
			<img src="<?php echo base_url();?>asset/images/Vertesac Web Parallax Home-20.png" class="sosmed">
			<img src="<?php echo base_url();?>asset/images/Vertesac Web Parallax Home-19.png" class="sosmed">
			<hr id="ln-vertical"/>
			<h5>Email us at :</h5><h6>info@vertesac.com</h6>
			<h3>For Users, you can download the app here</h3>
			<img src="<?php echo base_url();?>asset/images/Vertesac Web Parallax Home-18.png" id="g-play">
		</div>
		<div class="clear"></div>
	</div>
</body>
</html>
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.cslider.js"></script>
<script type="text/javascript">
$(function() {
	
	$('#da-slider').cslider({
		autoplay	: true,
		bgincrement	: 450
	});
	
});



</script>
<script>
function validasi(form){
	var valid = true;
		// var form = document.form_login;
		if (form.email.value=='') {
			$('#e-email').html('*required');
			valid = false;
		}else {
			$('#e-email').html(''); 
		} 
		if (form.file.value=='') {
			$('#e-password').html('*required');
			valid = false;
		}else {
			$('#e-password').html(''); 
		} 
		return valid;
	}
	</script>