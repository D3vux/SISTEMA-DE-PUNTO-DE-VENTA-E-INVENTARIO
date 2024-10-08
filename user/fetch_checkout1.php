<?php
	include('session.php');
	if(isset($_POST['check'])){
		?>
		<!-- scroll -->
	<div style="max-height: 600px; overflow-y: auto;"> 
		<!-- tamaño del formulario de venta alo horizontal y el tamaño de celdas -->
		<table  class="table table-striped table-bordered table-hover" style="width: 688px; height: 20px; " >
			<thead  style="position: sticky; top: 0; background-color:silver;	">
				<th>Imagen</th>
				<th>Nombre</th>
				<th>Precio</th>
				<!--<th>Cantidad disponible</th>-->
				<th>Cantidad</th>
				<th>SubTotal</th>
				<th></th>
				
			</thead >
			<tbody>
			<form method="POST" action="">
			<?php
				$total=0;
				$query=mysqli_query($conn,"select * from cart left join product on product.productid=cart.productid where userid='".$_SESSION['id']."'");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td>
							<img src="../<?php if (empty($row['photo'])){echo "upload/noimage.jpg";}else{echo $row['photo'];} ?>" style="width: 50px; height:50px; " class="thumbnail">
						</td>
						<td width="32%"><?php echo $row['product_name']; ?></td>
						
						<td align="right" width="15%"><?php echo "Bs "; echo number_format($row['product_price'],2); ?></td>
						<td align="center" width="20%">
							<strong>
							<button type="button"class="btn btn-primary btn-sm add_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-plus fa-fw"></i></button>
							<?php echo '<span style="font-size: 20px;">' . $row['qty'] . '</span>'; ?>
							<button type="button" class="btn btn-warning btn-sm minus_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-minus fa-fw"></i></button> 
							</strong>
						</td>
						
						<td align="right" width="570"><strong><span class="subt">
							<?php
								$subtotal=$row['qty']*$row['product_price'];
								echo "Bs ";
								echo number_format($subtotal,2);
								$total+=$subtotal;
							?>
						</span></strong></td>
						<!-- ELIMINAR-->
						<td >
							<button type="button" class="btn btn-danger btn-sm remove_prod" value="<?php echo $row['productid']; ?>"><i class="fa fa-trash fa-fw"></i></button>
						</td>
					</tr>
					<?php
				}
			?>
			<tr >
				<td  colspan="4"  ><span class="pull-right" ><strong>Monto Total</strong></span></td>
				<td align="right" ><strong><span id="total"><?php  echo number_format($total,2); ?></span><strong></td>
			</tr>
			</form>
			
			</tbody>
		</table>
	</div>
		<?php
	}
	

?>