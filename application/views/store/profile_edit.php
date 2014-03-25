<?php
include 'header.php';
/*print_r($profile);
print "<pre>";
print_r($store_socmed);
print "</pre>";*/
?>
<script type="text/javascript">
function kabkota(){
	var id_provinsi = $('#select-provinsi').val();
	$.ajax({
		url: '<?php echo base_url();?>store/profile/get_kabkota/'+id_provinsi,
		dataType: 'json',
		cache: false,
		success: function(msg){
			$element = $('#select-kabkota'); 
			$element.empty();
			$element.append($("<option></option>").attr("value",'<?php echo $profile[0]->id_kabkota;?>').text('<?php echo $profile[0]->kabupaten;?>'));
			$element.append($("<option></option>").attr("value",'0').text('------------------'));
			$.each(msg,function(i,kabupaten) { 
				$element.append($("<option></option>").attr("value",kabupaten.id_kabkota).text(kabupaten.nama));
			});
		}
	});
}
</script>
<div id="wrapper-menu">
	<div id="title">
		<h3 class="menu-title">General Profile</h3>
		<div id="line-title1">
		</div>
		<div id="line-title">
		</div>
	</div>
</div>
<div style="clear:both"></div>
<div id="content">

	<h4 class="title-edit-data">Profile Setting</h4>
	<form action="<?php echo base_url();?>store/profile/update" method="POST" enctype="multipart/form-data">
		<div id="profile-setting-left">
			<div id="box-img-profile">
				<?php if(!empty($profile[0]->photo)){
					?>
					<img src="<?php echo base_url();?>asset/photo/store/profile/<?php echo $profile[0]->photo;?>" /> 
					<?php
				}else{
					?>
					<img src="<?php echo base_url();?>asset/logged-in/images/Vertesac Website_Merchant Profile General Setting-07.png" />
					<?php
				}
				?>
			</div>
			<div id='file_browse_wrapper_profile'>
				<input type='file' id='file_browse_profile' name="file"/>
			</div>
			<?php
			foreach ($store_socmed as $socmed) {
				?>
				<input type="text" name="socmed[<?php echo $socmed->socme_id;?>]" value="<?php echo $socmed->url;?>" class="input-sosmed" style="background-image:url('<?php echo base_url();?>asset/logged-in/images/social icons/<?php echo $socmed->icon;?>'); background-repeat:no-repeat ; background-size:23px 23px; background-position:5% 75%; ">
				<?php
			}
			?>

		</div>
		<div id="profile-setting-right">
			<input type="hidden" name="photo" value="<?php //echo $profile[0]->photo;?>">
			<label class="judul">Nama Toko</label><br>
			<input type="text" name="name" placeholder="Enter Data Here.." class="input-data-profile" value="<?php echo $profile[0]->name;?>"><br>
			<label class="judul">Alamat Toko</label><br>
			<input type="text" name="address" value="<?php echo $profile[0]->address;?>" placeholder="Enter Data Here.." class="input-data-profile"><br>
			<label class="judul">Provinsi</label><br>
			<label class="provinsi">
				<select class="select-provinsi" id="select-provinsi" name="provinsi" onChange="kabkota()">
					<option><?php echo $profile[0]->provinsi;?></option>
					<option value='0'>------------------</option>
					<?php
					foreach ($provinsi as $provinsi) {
						?>
						<option value="<?php echo $provinsi->id_provinsi?>"><?php echo $provinsi->nama;?></option>
						<?php
					}
					?>
				</select>
			</label><br/>
			<label class="judul">Kabupaten/Kota</label><br>
			<label class="kabkota">
				<select class="select-kabkota" id="select-kabkota" name="id_kabkota">
					<option value="<?php echo $profile[0]->id_kabkota;?>"><?php echo $profile[0]->kabupaten;?></option>
				</select>
			</label><br/>
			<label class="judul">Website</label><br>
			<input type="text" name="site" value="<?php echo $profile[0]->site;?>"placeholder="Enter Data Here.." class="input-data-profile"><br>
			<label class="judul">Slogan</label><br>
			<input type="text" name="slogan" value="<?php echo $profile[0]->slogan;?>"placeholder="Enter Data Here.." class="input-data-profile"><br>
			<label class="judul">Description</label><br>
			<textarea name="desc" placeholder="Enter Data Here.." ><?php echo $profile[0]->description;?></textarea><br>
			<label class="judul">Kategori Bisnis</label><br>
			<label class="categori" >
				<select class="select-kategori" id="select-kategori" name="store_type">
					<option value="<?php echo $profile[0]->store_type_id;?>"><?php echo $profile[0]->store_type;?></option>
					<option>------------------</option>
					<?php
						foreach ($store_type as $store_type) {
							?>
								<option value="<?php echo $store_type->store_type_id;?>"><?php echo $store_type->name;?></option>
							<?php
						}
					?>
				</select>
				</label><br>
				<input type="submit" value="Simpan !" class="btn-simpan-profile" name="save_profile"><br>
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
				}*/

				?>
			</div>
		</form>

		<?php
		include 'footer.php';
		?>