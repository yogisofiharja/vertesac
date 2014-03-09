</div>
<div style="clear:both"></div>
<div id="footer">
	<div id="tier2">
		<ul id="foot-menu">
			<li class="firs-sub">About</li>
			<li>Company Info</li>
			<li>Contact</li>
			<li>Stores</li>
			<li>Privasy Police</li>
		</ul>
		<ul id="foot-menu2">
			<li class="menu2">how vertesac work</li> 
			<li class="menu2">our partners</li> 
			<li class="menu2">promo</li> 
			<li>term of conditions</li>
		</ul>

		<div class="sosial-twitter"></div>
		<div class="sosial-fb"></div>
		<p>Copyright 2013 Vertesac All right reserved</p>
		<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
</div>
</div>
<?php 
if (!login()){
	?>
	<script>		
	function valid(form) {
		var valid = true;
		var form = document.add;
		
		var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]­{1}[a-z0-9]+)*[\.]{1}(com|ca|net|org|fr|us|qc.ca|gouv.qc.ca|co.id|de|web.id)$', 'i');
		if(form.email.value == "") {
			$('#eemail').html('*Required');
			valid = false;
		} else if(!reg.test(form.email.value)) {
			$('#eemail').html('* Format email tidak sesuai');
			valid = false;
		} else {
			$('#eemail').html('');
		}
		
		if (form.password.value=='') {
			$('#epass').html('* Required ');
			valid = false;
		}else {
			$('#epass').html(''); 
		}
		
	return valid;
	}
	
	function validforgotpass(form){
		var valid = true;
		var form = document.forgotpass;
		
		var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]­{1}[a-z0-9]+)*[\.]{1}(com|ca|net|org|fr|us|qc.ca|gouv.qc.ca|co.id|de|web.id)$', 'i');
		if(form.email.value == "") {
			$('#eforgotemail').html('* Required');
			valid = false;
		} else if(!reg.test(form.email.value)) {
			$('#eforgotemail').html('* Required');
			valid = false;
		} else {
			$('#eforgotemail').html('');
		}
	return valid;
	}
</script>
<div id="fm-login">
				<h3 class="login-dulu">Login Dahulu Sebelum Masuk!</h3>
				<p id="popupBoxClose"><img src="images/exit3.png"/></p>  

				<div id="fm-login-left">
					<form action="action_login.php" method="POST" onSubmit="return valid(this)"  name="add" id="add">
						<label class="label-fm-login">Email Address</label><span class="error" id="eemail"></span><br>
						<input type="text" name="email" class="login-input" placeholder="Enter Data Here.."><br>
						<label class="label-fm-login">Password</label><span class="error" id="epass"></span><br>
						<input type="password" name="password" class="login-input" placeholder="Enter Data Here.."><br>
						<input type="submit" value="Masuk" class="login-save"> <input type="button" value="*Lupa Password" id="lupa-password">
					</form>
				</div>
				<div id="fm-login-right">
					<p>Belum menjadi merchant Vertesac?</p>
					<img src="images/Vertesac Website_Login Screen_Button-04.png">
					<a href=register><button id="join-us">Ayo Bekerja Bersama Dengan Kami !</button></a>
				</div>
				<div style="clear:both"></div>
	</div>

	<div id="fm-lupa-password">
		<h3 class="login-dulu">Lupa Password?</h3>
		<p id="popupBoxClose2"><img src="images/exit3.png"/></p>  
		<div id="fm-lupa-password-left">
					<form action="forgot_password.php" method="POST" onSubmit="return validforgotpass(this)"  name="forgotpass" id="forgotpass">
						<label class="label-fm-login">Email Address</label><br>
						<input type="text" name="email" class="login-input" placeholder="Enter Data Here..">
						<span class="error" id="eforgotemail"></span><br>
						<input type="submit" value="Submit" class="login-save"> 
					</form>
		</div>
	</div>
<?php
	}
?>
<script type="text/javascript" src="js/jquery.cslider.js"></script>
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