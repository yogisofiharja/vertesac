<?php
include 'header.php';
print "<pre>";
print_r($promo);
print "</pre>";
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
<button class="add-product" id="add-promo" style="background-image:url('<?php echo base_url();?>asset/logged-in/images/add.png'); background-repeat:no-repeat; background-size:23px 23px; background-position:5% 75%;">Tambah Promo</button>
<div id="data-product">
	<?php
		foreach ($promo as $promo) {
			?>
			<div id="box-product">
				<div id="box-img">
					<img src="<?php echo base_url();?>asset/photo/promo/<?php echo $promo->photo;?>" title="<?php echo $promo->subject;?>"><br>
				</div>
				<div id="detail-promo">
					<h3 class="get-promo"><?php echo $promo->subject;?></h3><br/><br/>
					<!-- <a href="#"  class="link"><p class="see-all-promo">See all..</p></a> -->
					<p class="promo-deskription"><?php echo $promo->desc;?></p>
					<p class="promo-diskon">Diskon: <?php echo $promo->disc;?> %</p>
					<p class="eggs">Egg Rewards : <?php echo $promo->egg;?> Eggs</p>
					<p class="massa-berlaku">Masa Berlaku : <?php echo $promo->start_time;?> s/d <?php echo $promo->end_time;?></p>
					<p class="kode-promo">Kode Promo : <?php echo $promo->promo_code;?></p>
					<a href="#" class="link"><img src="<?php echo base_url();?>asset/logged-in/images/Vertesac Website_Merchant Profile-14.png" width="25px" height="25px" class="option-edit-img"><p class="option-edit">Edit Promo</p></a><br>
					<hr>
				</div>
			</div>
			<?php
		}
	?>

	<div id="fm-add-promo" onload="load()">
		<h3 class="title-popup">Tambah Promo</h3>
		<p id="popupBoxClose"><img src="<?php echo base_url();?>asset/logged-in/images/exit1.png"/></p>  
		<form action="#" method="POST"  enctype="multipart/form-data" name="addpromo" id="addpromo" onSubmit="return valid(this)">
			<div id="fm-add-promo-left">
				<div id='file_browse_wrapper_inventory'>
					<input type='file' id='file_browse_inventory' name="file">
				</div>
			</div>
			<span class="error" id="eall"></span>
			<label class="label-quote" name="keterangan">Add Detail/Quote</label>
			<textarea name="keterangan" style="width: 170px; height:130px; position:absolute; left:30px; top:280px;" ></textarea>
			<div id="fm-add-promo-right">
				<input type="hidden" name="iduser" value="<?php echo $id;?>">
				<label class="input-label" >Judul Promo</label><br>
				<input type="text" name="judulpromo" class="add-promo-input" placeholder="Enter Data Here..">
				<span class="error" id="ejudul"></span><br>
				<label class="input-label">Diskon Mulai Dari :</label><br>
				<input type="text" name="awaldiskon" class="add-promo-input-diskon" placeholder="%"> <label>s/d</label> <input type="text" name="akhirdiskon" class="add-promo-input-diskon" placeholder="%">
				<span class="error" id="ediskon"></span><br>
				<label class="input-label">Point Mulai Dari :</label><br>
				<input type="text" name="awalpoint" class="add-promo-input-diskon" placeholder="Egg"> <label>s/d</label> <input type="text" name="akhirpoint" class="add-promo-input-diskon" placeholder="Egg"><span class="error" id="epoint"></span><br>
				<label class="input-label">Masa Berlaku</label><br>
				<input type="text" name="awalpromo" placeholder="Awal promo" id="popupDatepicker" class="add-promo-input"><span class="error" id="eawalpromo"></span>
				<br>
				<label class="input-label">Sampai dengan</label><br>
				<input type="text" name="akhirpromo" placeholder="Akhir promo" id="popupDatepicker2" class="add-promo-input"><span class="error" id="eakhirpromo"></span>
				<br>
				<input type="submit" value="Simpan" name="post-add-promo" class="add-promo-save" style="background-image:url('images/1.png'); background-repeat:no-repeat; background-size:23px 23px; background-position:10% 50%;">

			</div>
		</form>
		<div style="clear:both"></div>
	</div>
	<script type="text/javascript">
	$(document).ready( function() {
		$('#add-promo').click(function(){
			$('#fm-add-promo').fadeIn("slow"); 
			$("#data-product").css({ 
				"opacity": "0.8" 
			});  

		});

		$('#popupBoxClose').click( function() {
			unloadPopupBox();
		});
		function unloadPopupBox() {    
			$('#fm-add-promo').fadeOut("slow");
			$("#data-product").css({      
				"opacity": "1"  
			}); 

		}    	
	});

	function valid(form) {
		var valid = true;
		var form = document.addpromo;

		if (form.judulpromo.value=='') {
			$('#ejudul').html('*Required');
			valid = false;
		}else {
			$('#ejudul').html(''); 
		} 
		if (form.awaldiskon.value=='' || form.akhirdiskon.value=='') {
			$('#ediskon').html('*Required');
			valid = false;
		}else if(form.awaldiskon.value > form.akhirdiskon.value){
			$('#ediskon').html('*Required');
			valid = false;
		}else {
			$('#ediskon').html(''); 
		} 
		if (form.awalpoint.value=='' || form.akhirpoint.value=='') {
			$('#epoint').html('*Required');
			valid = false;
		}else if(form.awalpoint.value > form.akhirpoint.value){
			$('#epoint').html('*Required');
			valid = false;
		}else {
			$('#epoint').html(''); 
		} 

		if (form.keterangan.value=='') {
			$('#eall').html('*Semua Data harus diisi ');
			valid = false;
		}else {
			$('#eall').html(''); 
		} 
		if (form.file.value=='') {
			$('#eall').html('*Semua Data harus diisi');
			valid = false;
		}else {
			$('#eall').html(''); 
		} 	
		if (form.awalpromo.value=='') {
			$('#eawalpromo').html('*Required');
			valid = false;
		}else {
			$('#eawalpromo').html(''); 
		} 
		if (form.akhirpromo.value=='') {
			$('#eakhirpromo').html('*Required');
			valid = false;
		}else if(form.akhirpromo.value < form.awalpromo.value){
			$('#eakhirpromo').html('*Tgl Salah');
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