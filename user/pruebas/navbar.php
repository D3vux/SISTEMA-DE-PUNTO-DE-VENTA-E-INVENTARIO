<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="http://localhost/posi/user/">PUNTO DE VENTA</a>
				
            </div>
			
			<ul class=" nav navbar-nav">
				<!--
				<li id="cartme" style="cursor:pointer">
                   <a id="cart_control"><i class="fa fa-shopping-cart fa-fw"></i> Mi Carrito</a>
                </li>
				-->
				<li id="cartme" style="cursor:pointer">
                   <a id="cart_control"><i class="fa fa-product-hunt fa-fw"></i> Categorias</a>
				   
                </li>
				<li id="history"><a href="history.php"><span class="fa fa-list-alt"></span> Historial</a></li>
				<li>
					<form class="navbar-form" role="search" method="POST" action="search_result2.php">
					<div class="input-group" id="searchbox" style="width:500px;">
						<input type="text" class="form-control" placeholder="Buscar Productos" name="search" id="search">
						<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
					</form>
				</li>
			</ul>
			
            <ul class="nav navbar-top-links navbar-right">
				<!--
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-product-hunt fa-fw"></i> Productos <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li><a href="index.php"> Todas las Categorias</a></li>
						
						<?php
							/*$caq=mysqli_query($conn,"select * from category");
							while($catrow=mysqli_fetch_array($caq)){
								?>
								<li class="divider"></li>
								<li><a href="plist.php?cat=<?php echo $catrow['categoryid']; ?>"><?php echo $catrow['category_name']; ?></a></li>
								<?php
							}
						*/
						?>
                    </ul> 
					
                </li>
				-->
				
						<i class="navbar-brand">Usuario: <strong><?php echo $user; ?></strong></i>
                        <a class="navbar-brand" href="#logout" data-toggle="modal"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a> 
            </ul>   
			        
        </nav>
		