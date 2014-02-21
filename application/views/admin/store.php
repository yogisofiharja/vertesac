<?php
include 'header.php';
// print "<pre>";
// print_r($store);
// print "</pre>";
?>
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
	<table >
		<tr>
			<td>No</td>
			<td>Nama Toko</td>
			<td>Alamat</td>
			<td>Website</td>
			<td>Rating</td>
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
<?php
include 'footer.php';
?>