<html>
<head>
	<title>Vertesac</title>
	<link rel='stylesheet' type='text/css' href='<?php echo base_url();?>asset/logged-in/css/style.css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/logged-in/css/style_slideshow.css" />
	<script type="text/javascript" src="<?php echo base_url();?>asset/logged-in/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>asset/logged-in/js/modernizr.custom.28468.js"></script>
	<link type="text/css" href="<?php echo base_url();?>asset/logged-in/js/jquery.datepick.css" rel="stylesheet">
	<script type="text/javascript" src="<?php echo base_url();?>asset/logged-in/js/jquery.datepick.js"></script>
	<script>
	$(document).ready( function() {
		$('#login-popup').click(function(){
			$('#fm-login').fadeIn("slow"); 
			$("#container").css({ 
				"opacity": "0.3"  
			});    
		});
		$('#lupa-password').click(function(){
			$('#fm-lupa-password').fadeIn("slow"); 
			$('#fm-login').fadeOut("slow"); 
			$("#container").css({ 
				"opacity": "0.3"  
			});    
		});
		$('#popupBoxClose').click( function() {
			unloadPopupBox();
		});
		$('#popupBoxClose2').click( function() {
			unloadPopupBox2();
		});

		function unloadPopupBox() {    
			$('#fm-login').fadeOut("slow");
			$("#container").css({      
				"opacity": "1"  
			}); 
		}    
		function unloadPopupBox2() {    
			$('#fm-lupa-password').fadeOut("slow");
			$("#container").css({      
				"opacity": "1"  
			}); 	
		}    
	});
	function closemini(){
		$('#notif').fadeOut("slow"); 
	}

	</script>
	<link type="text/css" href="<?php echo base_url();?>asset/logged-in/js/jquery.datepick.css" rel="stylesheet">

	<script type="text/javascript" src="<?php echo base_url();?>asset/logged-in/js/jquery.datepick.js"></script>
	<script type="text/javascript">
	$(function() {
		$('#popupDatepicker').datepick();
		$('#inlineDatepicker').datepick();
	});
	$(function() {
		$('#popupDatepicker2').datepick();
		$('#inlineDatepicker').datepick();
	});
	function showDate(date) {
		alert('The date chosen is ' + date);
	}
	</script>
</head>
<body>
	<div id="container">
		<div id="nav-menu">
			<a href="home"><img src="<?php echo base_url();?>asset/logged-in/images/Vertesac Logo.png" alt="Logo"></a>
			<div id="menu-reg">
				<a href='logout.php' class='link' style='font-size: 12px; color:#fff;  margin-top: 20px; margin-left: 50px; position:absolute; '>Logout</a>
			</div>
			<ul class="top-menu">
				<li class="border"><a href="<?php echo base_url('admin/bag')?>"><p class="menu-merchant-title">Bags</p></a></li>
				<li class="border"><a href="<?php echo base_url('admin/transaction')?>"><p class="menu-merchant-title">Transaction</p></a></li>
				<li class="border"><a href="<?php echo base_url('admin/store')?>"><p class="menu-merchant-title">Store</p></a></li>
				<li class="border"><a href="<?php echo base_url('admin/member')?>"><p class="menu-merchant-title">Member</p></a></li>
			</ul>
		</div>
		

