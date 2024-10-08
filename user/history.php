<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>
<?php include('navbar.php'); ?>
<div class="container">
	<?php include('cart_search_field.php'); ?>
	<div style="height: 50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Historial de Ventas</h1>
        </div>
    </div>
                <!-- /.row -->
				<div class="row">
                <div class="col-lg-12">
					<table width="100%" class="table table-striped table-bordered table-hover" id="historyTable">
						<thead>
							<tr>
								<th class="hidden"></th>
								<th>Fecha de Venta</th>
								<th>Monto total</th>
								<th>Reporte Rapido</th>
								<th>Recibo (PDF)</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$h=mysqli_query($conn,"select * from sales where userid='".$_SESSION['id']."' order by sales_date desc");
								while($hrow=mysqli_fetch_array($h)){
									?>
										<tr>
											<td class="hidden"></td>
											<td align="center"><?php echo date("m-d-Y - h:i A", strtotime($hrow['sales_date']));?></td>
											<td align="center"><?php echo number_format($hrow['sales_total'],2); ?></td>
											<td>
												<a href="#detail<?php echo $hrow['salesid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-fullscreen"></span> Ver todos los detalles</a>
												<?php include ('modal_hist.php'); ?>
											</td>
											<td>
											<a  href="../PDF/Report_user.php?salesid=<?php echo $hrow['salesid']; ?>" class="btn btn-primary btn-sm" target="_blank">
    										<span class="glyphicon glyphicon-fullscreen"></span> RECIBO DE VENTA (PDF)
											</a>
											</td>
										</tr>
									<?php
								}
							?>
						</tbody>
                    </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>

<script>
$(document).ready(function(){
	$('#history').addClass('active');

// Inicialización de DataTables
$('#historyTable').DataTable({
	"bLengthChange": true,
	"bInfo": true,
	"bPaginate": true,
	"bFilter": true,
	"bSort": true,
	"pageLength": 7,
	"language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
	
	});
});
</script>
</body>
</html>




