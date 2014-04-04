<?php
include 'header.php';
/*echo "<pre>";
print_r($bag_list);
echo "</pre>";*/
?>
<div id="wrapper-menu">
	<div id="title">
		<h3 class="menu-title">Bags</h3>
		<div id="line-title1">
		</div>
		<div id="line-title">
		</div>
	</div>
</div>
<div style="clear:both"></div>
<div id="content">	
	<button onclick="location.href='<?php echo base_url();?>admin/bag/add_bag'" class="add-product" style="float:left;background-image:url('<?php echo base_url();?>asset/logged-in/images/add.png'); background-repeat:no-repeat; background-size:23px 23px; background-position:5% 75%;">Add Bags</button>

	<div id="data-product">
		<br/>
		<?php echo "<br/><center>".$pages."</center>";?>
		<br/>
		<br/>
		<?php 
		foreach ($bag_list as $bag) {
			?>
			<div id="box-photo">
				<div id="box-img">
					<img src="<?php echo base_url();?>timthumb/timthumb.php?src=media/images/bag/main/<?php echo $bag->photo;?>&w=130&h=120"><br>
					<button id="vis-btn-promo" onclick="location.href='<?php echo base_url().'admin/bag/edit_bag/'.$bag->bag_type_id;?>'">Edit Photo</button>
				</div>
				<a href="<?php echo base_url();?>admin/bag/delete/<?php echo $bag->bag_type_id;?>"><img src="<?php echo base_url();?>asset/logged-in/images/delete.png" width="12" height="12" style="margin-left: 230px; margin-top:8px; cursor: pointer; position:absolute;" onClick="return confirm('Delete This Bag?')" title="Delete"></a>
				<p class="photo-name" ><?php echo $bag->name;?></p>
				<p class="bag-attr"><?php echo $bag->short_desc;?></p>
				<p class="bag-attr">
					<?php
						setlocale(LC_MONETARY, 'in');
						echo 'Rp'.number_format($bag->price); 
						// echo $bag->price;
					?>
				</p>
				<p class="bag-attr">
					<?php 
						if($bag->gender =="F"){
							echo "Female";
						}else{
							echo "Male";
						}
					?>
				</p>
				<p class="bag-attr">
					<?php 
						if($bag->type =="F"){
							echo "Fashion";
						}else if($bag->type =="L"){
							echo "Lipat";
						}else{
							echo "Heavy Duty";
						}
					?>
				</p>
				<p class="bag-attr"><button onclick="location.href='<?php echo base_url();?>admin/bag/gallery/<?php echo $bag->bag_type_id;?>'" class="btn-simpan-profile">See Galleries</button></p>
			</div>
			
			<?php
		}
		?>
			<div style="clear:both"></div>
		<?php echo "<br/><center>".$pages."</center>";?>
	</div> 
	
	
	<?php
	include 'footer.php';
	?>