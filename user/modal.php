<!-- Logout -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Cerrar sesión...</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					<h5><center>Usuario: <strong><?php echo $user; ?></strong></center></h5> 
                </div> 
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                    <a href="logout.php" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cerrar sesión</a>
                </div>
				
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

