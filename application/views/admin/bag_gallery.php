<?php
include 'header.php';
/*echo "<pre>";
print_r($bag_gallery);
echo "</pre>";*/
?>
<div id="wrapper-menu">
	<div id="title">
		<h3 class="menu-title">Bag Gallery</h3>
		<div id="line-title1">
		</div>
		<div id="line-title">
		</div>
	</div>
</div>
<div style="clear:both"></div>
<div id="content">
	<button class="add-product" style="float:left;background-image:url('<?php echo base_url();?>asset/logged-in/images/add.png'); background-repeat:no-repeat; background-size:23px 23px; background-position:5% 75%;">Tambah Photo</button>
	<p style="color:#01A39A; ">.</p>
	<div id="data-product">
		<br/>
		<?php echo "<br/><center>".$pages."</center>";?>
		<br/>
		<br/>
		<?php 
		foreach ($bag_gallery as $photo) {
			?>
			<div id="box-photo">
				<div id="box-img">
					<img src="<?php echo base_url();?>timthumb/timthumb.php?src=media/images/bag/gallery/<?php echo $photo->photo;?>&w=130&h=120"><br>
				</div>
				<a href="<?php echo base_url();?>admin/bag/delete_gallery/<?php echo $photo->photo_id;?>/<?php echo $photo->bag_type_id;?>"><img src="<?php echo base_url();?>asset/logged-in/images/delete.png" width="12" height="12" style="margin-left: -12px; margin-top:-1px; cursor: pointer; position:absolute;" onClick="return confirm('Delete This Image?')" title="Delete"></a>
			</div>
			
			<?php
		}
		?>
			<div style="clear:both"></div>
		<?php echo "<br/><center>".$pages."</center>";?>
	</div> 
	
	<div id="fm-add-product">
		<h3 class="title-popup">Tambah Photo</h3>
		<p id="popupBoxClose"><img src="<?php echo base_url();?>asset/logged-in/images/exit2.png"/></p>  
		<form action="<?php echo base_url();?>admin/bag/add_gallery" method="POST" enctype="multipart/form-data" name="add" id="add">
			<div id="fm-add-product-left">
				<div id='file_browse_wrapper_inventory'>
					<input type='file' id='file_browse_inventory' name="file">
				</div>
			</div>
			<div id="fm-add-product-right">
				<input type="hidden" name="bag_type_id" value="<?php echo $bag_type_id;?>">
				<input type="submit" value="Simpan" name="post-add-galeri" class="add-product-save" style="background-image:url('<?php echo base_url();?>asset/logged-in/images/1.png'); background-repeat:no-repeat; background-size:23px 23px; background-position:10% 50%;">
			</div>
		</form>
		<div style="clear:both"></div>

	</div>
	<div id="fm-edit-galeri">
		<h3 class="title-popup">Edit Photo</h3>
		<p><img src="<?php echo base_url();?>asset/logged-in/images/exit2.png" onclick="exitbox();" id="exit-intopro"/></p>
		<form action="<?php echo base_url();?>store/gallery/update" name="form1" id="form1" method="post" enctype="multipart/form-data" onSubmit="return vform1(this)">
			<div id="fm-edit-galeri-box">
				<div id='file_browse_wrapper_galeri'>
					<input type='file' id='file_browse_galeri' name="file">
				</div>
			</div>
			<label class="label-galeri">Title</label><span class="error" id="egalerititle"></span><br>
			<input type="text" name="nama" class="input-galeri-title" max-size="20" placeholder="Enter Data Here.." id="nama"><span class="error" id="etitleedit"></span><br>
			<input type="hidden" name="photo_id" id="photo_id" value="">
			<input type="hidden" name="photo" id="photo" value="">
			<input type="submit" value="Simpan" name="post-edit-galeri" class="btn-galeri-edit" style="background-image:url('<?php echo base_url();?>asset/logged-in/images/1.png'); background-repeat:no-repeat; background-size:23px 23px; background-position:10% 50%;">
		</form>
		<div style="clear:both"></div>
	</div>
	<?php 

	if(isset($_SESSION['sukses']['query'])){
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

	?>
	<script type="text/javascript">
	$(document).ready( function() {
		$('.add-product').click(function(){
			$('#fm-add-product').fadeIn("slow"); 
			$("#data-product").css({ 
				"opacity": "0.8"  
			});    
		});

		$('#popupBoxClose').click( function() {
			unloadPopupBox();
		});
		function unloadPopupBox() {    
			$('#fm-add-product').fadeOut("slow");
			$("#data-product").css({      
				"opacity": "1"  
			}); 
		}  
	});		

	function vform1(form) {
		var valid = true;
		var form = document.form1;
		if (form.titleedit.value=='') {
			$('#egalerititle').html('*required');
			valid = false;
		}else {
			$('#egalerititle').html(''); 
		} 
		
		return valid;
	}
	function valid(form) {
		var valid = true;
		var form = document.add;
		if (form.title.value=='') {
			$('#eaddpromo').html('*required');
			valid = false;
		}else {
			$('#eaddpromo').html(''); 
		} 
		if (form.file.value=='') {
			$('#eaddpromo').html('*required');
			valid = false;
		}else {
			$('#eaddpromo').html(''); 
		} 
		return valid;
	}

	function exitbox() {    
		$('#fm-edit-galeri').fadeOut("slow");
	} 
	function editgaleri(photo_id,nama,photo){ 
		var photo_id = photo_id;
		var nama = nama;
		var photo = photo;
		$('#fm-edit-galeri').fadeIn("slow"); 
		document.getElementById('nama').value = nama;
		document.getElementById('photo').value = photo;
		document.getElementById('photo_id').value = photo_id;
	}		
	</script>
	<?php
	include 'footer.php';
	?>