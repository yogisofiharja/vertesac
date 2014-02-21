<?php
include 'header.php';
/*echo "<pre>";
print_r($photo);
echo "</pre>";*/
?>
<div id="wrapper-menu">
	<div id="title">
		<h3 class="menu-title">Gallery</h3>
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
				<?php 
					foreach ($photo as $photo) {
						?>
				<div id="box-product">
					<div id="box-img">
						<img src="<?php echo base_url();?>asset/photo/store/<?php echo $photo->photo?>"><br>
						<button id="vis-btn-promo" onclick="editgaleri('1','judul','nama file');">Edit Photo</button>
					</div>
					<a href="#"><img src="<?php echo base_url();?>asset/logged-in/images/delete.png" width="15" height="15" style="margin-left: 48px; margin-top:6px; cursor: pointer; position:absolute;" onClick="return confirm('Delete This Image?')" title="Delete"></a>
						<p class="product-detail-years" >judul</p>
		
				</div>
				<div style="clear:both"></div>
						<?php
					}
					echo "<center>".$pages."</center>";
				?>
			</div>
		<div id="fm-add-product">
				<h3 class="title-popup">Tambah Photo</h3>
				<p id="popupBoxClose"><img src="<?php echo base_url();?>asset/logged-in/images/exit2.png"/></p>  
				<form action="<?php echo base_url();?>store/gallery/save" method="POST" enctype="multipart/form-data" onSubmit="return valid(this)"  name="add" id="add">
				<div id="fm-add-product-left">
					<div id='file_browse_wrapper_inventory'>
					<input type='file' id='file_browse_inventory' name="file">
					</div>
				</div>
				<div id="fm-add-product-right">
						<label class="input-label" >Title</label><span class="error" id="eaddpromo"></span><br>
						<input type="text" name="nama" class="add-product-input" max-size="20" placeholder="Enter Data Here.."><span class="error" id="etitle"></span><br>
						<input type="submit" value="Simpan" name="post-add-galeri" class="add-product-save" style="background-image:url('<?php echo base_url();?>asset/logged-in/images/1.png'); background-repeat:no-repeat; background-size:23px 23px; background-position:10% 50%;">
				</div>
				</form>
				<div style="clear:both"></div>
				
			</div>
			<div id="fm-edit-galeri">
				<h3 class="title-popup">Edit Photo</h3>
				 <p><img src="<?php echo base_url();?>asset/logged-in/images/exit2.png" onclick="exitbox();" id="exit-intopro"/></p>
				<form action="#" name="form1" id="form1" method="post" enctype="multipart/form-data" onSubmit="return vform1(this)">
				<div id="fm-edit-galeri-box">
					<div id='file_browse_wrapper_galeri'>
						<input type='file' id='file_browse_galeri' name="file">
					</div>
				</div>
						<label class="label-galeri">Title</label><span class="error" id="egalerititle"></span><br>
						<input type="text" name="titleedit" class="input-galeri-title" max-size="20" placeholder="Enter Data Here.." id="title_edit"><span class="error" id="etitleedit"></span><br>
						<input type="hidden" name="barangid_add" value="" onsubmit="cek()">
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
   function editgaleri(id,title,gambar){ 
	var barangId = id;
	var titleedit = title;
	var gambar = gambar;
	var baseurl = "images/galeri/";
	document.form1.barangid_add.value = barangId;
	$('#fm-edit-galeri').fadeIn("slow"); 
	document.getElementById('title_edit').value = titleedit;
	document.getElementById('gambar').src = baseurl+gambar;
   }		
</script>
<?php
include 'footer.php';
?>