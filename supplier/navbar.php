<!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="http://localhost/posi/supplier/">INVENTARIO</a>
            </div>
			
			<ul class=" nav navbar-nav">
				<li>
                   <a href="index.php"><i class="fa fa-product-hunt fa-fw"></i> Mis Productos</a>
                </li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="fa fa-copy fa-fw"></span> Reportes <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="sales.php"><span class="fa fa-money fa-fw"></span>  informe de ventas</a></li>
						<li class="divider"></li>
						<li><a href="inventory.php"><span class="fa fa-barcode"></span>  Informe de inventario</a></li>
                    </ul> 
				</li>
			</ul>
			
            <ul class="nav navbar-top-links navbar-right">
            <i class="navbar-brand">Usuario: <strong><?php echo $user; ?></strong></i>
            <a class="navbar-brand" href="#logout" data-toggle="modal"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a> 
            </ul>
        </nav>