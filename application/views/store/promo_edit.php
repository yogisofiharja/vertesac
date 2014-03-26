<?php
include 'header.php';
/*print "<pre>";
print_r($promo);
print "</pre>";*/
$start_time = date("m/d/Y",strtotime($promo[0]->start_time));
$end_time = date("m/d/Y",strtotime($promo[0]->end_time));
?>
<div id="wrapper-menu">
	<div id="title">
		<h3 class="menu-title">Promo</h3>
		<div id="line-title1">
		</div>
		<div id="line-title">
		</div>
	</div>
</div>
<div style="clear:both"></div>
<div id="content">
	<h4 class="title-edit-data">Edit Promo</h4>
	<form action="<?php echo base_url();?>store/promo/update" method="POST" enctype="multipart/form-data" onSubmit="return valid(this)"  name="add" id="add">
		<div id="profile-setting-left">
			
			<div id="box-img-profile">
				<img src="<?php echo base_url();?>timthumb/timthumb.php?src=media/images/store/promo/<?php echo $promo[0]->photo;?>&w=210&h=200">
			</div>

			<div id='file_browse_wrapper_profile'>
				<input type='file' id='file_browse_profile' name="file">
			</div>

		</div>
		<div id="profile-setting-right">

			<label class="judul">Nama Promo</label>
			<span class="error" id="ejudul"></span><br>
			<input type="text" name="subject" placeholder="Enter Data Here.." class="input-data-profile" value="<?php echo $promo[0]->subject;?>"><br>
			<label class="judul">Description</label>
			<span class="error" id="eket"></span><br>
			<textarea placeholder="Enter Data Here.." name="keterangan"><?php echo $promo[0]->description;?></textarea>
			<br>
			<label class="judul">Discount</label>
			<span class="error" id="ediskon"></span><br>
			<input type="number" max="100" name="discount" class="diskon" placeholder="%" value="<?php echo $promo[0]->disc;?>"><br>
			<label class="judul">Egg</label>
			<span class="error" id="epoint"></span><br>
			<input type="number" name="egg" placeholder="Egg" class="diskon" value="<?php echo $promo[0]->egg;?>"><br>
			<label class="judul">Masa Berlaku</label>
			<span class="error" id="eawalpromo"></span><br>
			<input type="text" name="start_time" placeholder="Awal promo" id="popupDatepicker" class="input-data-profile" value="<?php echo $start_time;?>"><br>
			<label class="judul">Sampai dengan</label>
			<span class="error" id="eakhirpromo"></span><br>
			<input type="text" name="end_time" placeholder="Akhir promo" id="popupDatepicker2" class="input-data-profile" value="<?php echo $end_time;?>"><br>
			<input type="hidden" name="promo_code"  class="input-data-profile" value="<?php echo $promo[0]->promo_code;?>" ><br>
			<input type="hidden" name="photo"  class="input-data-profile" value="<?php echo $promo[0]->photo;?>" ><br>
			<input type="submit" value="Simpan !" class="btn-simpan-profile" name="promoedit">

		</div>
	</form>
	<?php 

	/*if(isset($_SESSION['sukses']['query'])){
		echo '<p id="notif" onClick="closemini();">'.$_SESSION['sukses']['query'].'</p>';
	}
	if(!empty($_SESSION['error']['query'])){
		echo '<p id="notif" onClick="closemini();">'.$_SESSION['error']['query'].'</p>';
	}
	if(isset($_SESSION['error'])) {
		unset($_SESSION['error']);
	}
	if(isset($_SESSION['sukses'])){
		unset($_SESSION['sukses']);
	}
*/
	?>
	<script>		
	function valid(form) {
		var valid = true;
		var form = document.add;
		if (form.subject.value=='') {
			$('#ejudul').html('*Required ');
			valid = false;
		}else {
			$('#ejudul').html(''); 
		} 
		if (form.keterangan.value=='') {
			$('#eket').html('*Required ');
			valid = false;
		}else {
			$('#eket').html(''); 
		} 
		if (form.discount.value=='') {
			$('#ediskon').html('*Required ');
			valid = false;
		}else {
			$('#ediskon').html(''); 
		} 
		if (form.egg.value=='') {
			$('#epoint').html('*Required ');
			valid = false;
		}else {
			$('#epoint').html(''); 
		}
		if (form.start_time.value=='') {
			$('#eawalpromo').html('*Required ');
			valid = false;
		}else {
			$('#eawalpromo').html(''); 
		}	
		if (form.end_time.value=='') {
			$('#eakhirpromo').html('*Required ');
			valid = false;
		}else if(form.end_time.value < form.start_time.value){
			$('#eakhirpromo').html('*Wrong date ');
			valid = false;
		}else {
			$('#eakhirpromo').html(''); 
		}	

		return valid;
	}
	</script>
	<?php
	include 'footer.php';
	?>