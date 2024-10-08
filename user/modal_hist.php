<!-- History -->
    <div class="modal fade" id="detail<?php echo $hrow['salesid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Detalle de Venta Completo</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$sales=mysqli_query($conn,"select * from sales where salesid='".$hrow['salesid']."'");
					$srow=mysqli_fetch_array($sales);
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="pull-right">Fecha:<strong><?php  echo date("m-d-Y", strtotime($srow['sales_date'])); ?></p></strong>								
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Nombre del producto</th>
										<th>Precio por Unidad</th>
										<th>Cantidad de Venta</th>
										<th>SubTotal</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$total=0;
										$pd=mysqli_query($conn,"select * from sales_detail left join product on product.productid=sales_detail.productid where salesid='".$hrow['salesid']."'");
										while($pdrow=mysqli_fetch_array($pd)){
											?>
											<tr>
												<td><?php echo ucwords($pdrow['product_name']); ?></td>
												<td align="right"><?php echo "Bs "; ?><?php echo number_format($pdrow['product_price'],2); ?></td>
												<td align="center"><?php echo $pdrow['sales_qty']; ?></td>
												<td align="right">
													<?php 
														$subtotal=$pdrow['product_price']*$pdrow['sales_qty'];
														echo "Bs ";
														echo number_format($subtotal,2);
														$total+=$subtotal;
													?>
												</td>
											</tr>
											<?php
										}
									?>
									<tr>
										<td align="right" colspan="3"><strong>Total</strong></td>
										<td align="right"><strong> <?php echo "Bs "; ?><?php echo number_format($total,2); ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>      
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
