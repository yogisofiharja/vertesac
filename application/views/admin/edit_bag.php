<?php
include 'header.php';
/*echo "<pre>";
print_r($bag);
echo "</pre>";*/
?>
<div id="wrapper-menu">
	<div id="title">
		<h3 class="menu-title" style="cursor:pointer;" onclick="location.href='<?php echo base_url();?>admin/bag'"> < Bags</h3>
		<div id="line-title1">
		</div>
		<div id="line-title">
		</div>
	</div>
</div>
<div style="clear:both"></div>
<div id="content">	
	
	<h4 class="title-edit-data">Edit bag</h4>
	<form action="<?php echo base_url();?>admin/bag/update/<?php echo $bag->bag_type_id;?>" method="POST" enctype="multipart/form-data">
		<div id="profile-setting-left">
			<div id="box-img-profile">
				<?php
					if($bag->photo!=''){
						?>
					<img src="<?php echo base_url();?>asset/photo/bag/main/<?php echo $bag->photo;?>" />
					<input type="hidden" name="photo" value="<?php echo $bag->photo;?>">
						<?php
					}else{
						?>
					<img src="<?php echo base_url();?>asset/logged-in/images/Vertesac Website_Merchant Profile General Setting-07.png" />
						<?php
					}
				?>
			</div>
			<div>
				<input type='file' name="file"/>
			</div>
		</div>
		<div id="profile-setting-right">
			<label class="judul">Nama Tas</label><br>
			<input type="text" name="name" value="<?php echo $bag->name;?>" placeholder="Enter Data Here.." class="input-data-profile"><br>
			<label class="judul">Deskripsi Singkat</label><br>
			<textarea name="short_desc" placeholder="Enter Data Here.." style="resize:vertical;"><?php echo $bag->short_desc;?></textarea><br>
			<label class="judul">Harga</label><br>
			<input type="text" name="price" value="<?php echo $bag->price;?>" placeholder="Enter Data Here.." class="input-data-profile"><br>
			<label class="judul">Gender</label><br>
			<label class="provinsi">
				<select class="select-provinsi" id="select-provinsi" name="gender">
					<option value="<?php echo $bag->gender;?>" ><?php 
						if($bag->gender =="F"){
							echo "Female";
						}else{
							echo "Male";
						}
					?></option>
					<option>---------</option>
					<option value='F'>Female</option>
					<option value='M'>Male</option>
				</select>
			</label><br/>
			<label class="judul">Type</label><br>
			<label class="kabkota">
				<select class="select-kabkota" id="select-kabkota" name="type">
					<option value="<?php echo $bag->type;?>" >
						<?php 
						if($bag->type =="F"){
							echo "Fashion";
						}else if($bag->type =="L"){
							echo "Lipat";
						}else{
							echo "Heavy Duty";
						}
					?>
					</option>
					<option>---------</option>
					<option value="F">Fashion</option>
					<option value="L">Lipat</option>
					<option value="H">Heavy Duty</option>
				</select>
			</label><br/>
			<input type="submit" value="Simpan !" class="btn-simpan-profile" name="save_profile"><br>

		</div>
	</form>

	<?php
	include 'footer.php';
	?>