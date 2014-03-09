<?php
include 'header.php';
?>
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
	<div id="info-profile">
		<div id="info-left">
			<div id="box-info-left">
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
				<!-- <img src="<?php echo base_url();?>asset/photo/store/<?php echo $profile[0]->photo;?>"/> -->
			</div>
			<h2 class="retail-store"><?php echo $profile[0]->store_type;?></h2>
		</div>
		<div id="info-right">
			<h2 class="title-merchant"><?php echo $profile[0]->name;?></h2>
			<p class="description-merchant"><?php echo $profile[0]->desc;?></p>
			<a href="#" class="link"><button>Download QRCODE</button></a>
			<hr>
			<p class="address-merchant"><?php echo $profile[0]->address;?></p> 
			<img src="<?php echo base_url();?>asset/logged-in/images/Vertesac Website_Merchant Profile-15.png" style="float:left;">
			<a href="<?php echo base_url();?>store/profile/edit" class="link"><p class="option-menu" >Edit Profile</p><img src="<?php echo base_url();?>asset/logged-in/images/Vertesac Website_Merchant Profile-14.png"  style=" padding-top:0px; width:25px; height:25px;"></a><br/>
			<a target="_blank" href='<?php echo "http://".$profile[0]->site;?>' class="link"><p class="site-merchant"><?php echo $profile[0]->site;?></p></a>
			<?php
			foreach ($store_socmed as $socmed) {
				?>
					<img src="<?php echo base_url();?>asset/logged-in/images/social icons/<?php echo $socmed->icon;?>" style="float:left; margin-right:10px;">
					<a href="<?php echo 'http://www.'.$socmed->name.'.com/'.$socmed->url;?>" class="link" target="_blank"><p class="sosmed-merchant-fb"><?php echo $socmed->url;?></p></a><br/><br/>
				<?php	
			}
			?>
			<!-- <a href="#" class="link"><p class="merchant-promo"><?php echo $profile[0]->jumlah_promo;?> promo</p></a> -->
		</div>

		<div style="clear:both"></div>
	</div>
	<div id="recent-promo" style="min-height:300px;">
		<hr style="margin-bottom:0px;">
		<h2 class="title-recent-promo">Recent promo</h2>
		<!-- loop recent promo -->
		<a href="<?php echo base_url();?>store/promo" class="link"><p class="option-see-all">See all..</p></a><br>
		<?php
		foreach ($recent_promo as $recent) {
			?>
			<div id="box-recent-promo">

				<div id="box-recent-promo-img">
					<a href="index.php?module=promoedit&id=<?php echo $recent->promo_id;?>" class="link"><img src="<?php echo base_url();?>asset/photo/promo/<?php echo $recent->photo;?>"></a>
				</div>
				<div id="box-recent-promo-detail">
					<a href="index.php?module=promoedit&id=<?php echo $recent->promo_id;?>" class="link"><h5 class="desk-promo"><?php echo $recent->subject;?></h5></a>
					<p class="masa-berlaku">Valid From <?php echo $recent->start_time; echo" to "; echo $recent->end_time;?></p> 
					<p class="promo-code">Kode Promo : <?php echo $recent->promo_code;?></p>

				</div>

			</div>
			<?php
		}
		?>
		<!-- endloop recent promo -->
		<div style="clear:both"></div>
	</div>

	<!-- <div id="barang-dan-photo" style="min-height:300px;"> -->
	<!-- <hr style="margin-bottom:0px;"> -->
	<!-- <h2 class="title-barang-photo">Barang & Photo</h2> -->
	<!-- loop barang  -->
	<!-- <div id="barang-dan-photo-box-img"> -->
	<!-- <a href="index.php?module=inventoryedit&id=<?php //echo $databarang['barang_id'];?>" class="link"><img src="images/product/<?php //echo $databarang['gambar'];?>"></a> -->
	<!-- </div> -->
	<!-- end loop barang -->
	<!-- <div style="clear:both"></div> -->
	<!-- </div> -->

	<?php
	include 'footer.php';
	?>