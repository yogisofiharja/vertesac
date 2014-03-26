<?php
include 'header.php';
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
		<h3 class="menu-title">Transaction</h3>
		<div id="line-title1">
		</div>
		<div id="line-title">
		</div>
	</div>
</div>
<div style="clear:both"></div>
<div id="content">
	<div id="data-product">
		<div id="list">
		<?php echo "<br/><center>".$pages."</center>";?>

			<table class="altrowstable" id="alternatecolor">
				<tr>
					<th>Promo</th>
					<th>Pelanggan</th>
					<th>Waktu</th>
					<th>Jumlah</th>
				</tr>
				<?php
				foreach ($transaction as $transaction) {
					?>
					<tr>
						<td><?php echo $transaction->subject;?></td>
						<td><?php echo $transaction->name;?></td>
						<td><?php echo $transaction->time;?></td>
						<td><?php echo $transaction->qty;?></td>
					</tr>

					<?php
				}
				?>

			</table>
		<?php echo "<br/><center>".$pages."</center>";?>
			
		</div>
	</div> 


	<?php
	include 'footer.php';
	?>