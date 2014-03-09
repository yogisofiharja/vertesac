<?php
include 'header.php';
// print "<pre>";
// print_r($store);
// print "</pre>";
?>
<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>
<div id="wrapper-menu">
	<div id="title">
		<h3 class="menu-title">Store</h3>
		<div id="line-title1">
		</div>
		<div id="line-title">
		</div>
	</div>
</div>
<div style="clear:both"></div>
<div id="content">
	<div id="list">
		<table class="altrowstable" id="alternatecolor">
			<tr>
				<th>No</th>
				<th>Nama Toko</th>
				<th>Alamat</th>
				<th>Website</th>
				<th>Rating</th>
			</tr>
			<?php
			$i=1;
			foreach ($store as $store) {
				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $store->name;?></td>
					<td><?php echo $store->address;?></td>
					<td><?php echo $store->site;?></td>
					<td><?php echo $store->rating;?></td>
				</tr>
				<?php
				$i++;
			}
			?>
		</table>
	</div>
	<?php
	include 'footer.php';
	?>