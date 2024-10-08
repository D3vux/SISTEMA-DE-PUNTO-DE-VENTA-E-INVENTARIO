<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container-fluid">
   <div class="row">
		<!--1 -->
        <div class="col-sm-7" id="colum1">
			
<div class="container">
    <?php include('cart_search_field.php'); ?>
    <div style="height: 0px;"></div><!--hacia abajo-->
    <?php
    
    // Número de productos por página
    $productos_por_pagina = 8; // Ajusta este valor según tus necesidades

    // Obtener el número de la página actual
    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $offset = ($pagina - 1) * $productos_por_pagina;

    // Contar el total de productos
    $result = $conn->query("SELECT COUNT(*) AS total FROM product");
    $row = $result->fetch_assoc();
    $total_productos = $row['total'];
    $total_paginas = ceil($total_productos / $productos_por_pagina);

    // Obtener los productos para la página actual
    $sql = "SELECT * FROM product LIMIT $offset, $productos_por_pagina";
    $query = $conn->query($sql);

    $inc = 4;
    while($row = $query->fetch_assoc()) {
        $inc = ($inc == 4) ? 1 : $inc + 1; 
        if ($inc == 1) echo "<div class='row'>";  
        ?>
        <div class="col-lg-3">
            <div>
                <!--foto--><img src="../<?php if (empty($row['photo'])){echo "upload/noimage.jpg";}else{echo $row['photo'];} ?>" style="width: 190px; height:190px; padding:auto; margin:0px;" class="thumbnail">
                <div style="height: 5px;"></div>
                <!--nombre--><div style="height:40px; width:230px; margin-left:-8px;"><?php echo $row['product_name']; ?></div>
                <div style="height: 10px;"></div>
                <!--cantidad--><div style="display:none; position:absolute; top:210px; left:10px;" class="well" id="cart<?php echo $row['productid']; ?>">Cant: <input type="text" style="width:40px;" id="qty<?php echo $row['productid']; ?>"> <button type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i></button></div>
                <span class="pull-right"></span> 
                <strong><?php echo "Bs  "; echo number_format($row['product_price'],2); ?></strong>
                <div style="margin-left:-5px; margin-right:17px;">
                    <!--<button type="button" class="btn btn-primary btn-sm addcart" value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i> </button>-->
                    <button onclick="window.location.href='index.php'" type="button" class="btn btn-primary btn-sm concart" value="<?php echo $row['productid']; ?>"><i class="fa fa-shopping-cart fa-fw"></i>Agregar al Carrito</button>
                </div>
            </div>
        </div>
        <?php
        if($inc == 4) echo "</div><div style='height: 20px;' ></div>";
    }
    if ($inc == 1) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
    if ($inc == 2) echo "<div class='col-lg-3'></div><div class='col-lg-3'></div></div>"; 
    if ($inc == 3) echo "<div class='col-lg-3'></div></div>"; 

    // Mostrar los enlaces de paginación
    echo "<nav><ul class='pagination'>";
    for ($i = 1; $i <= $total_paginas; $i++) {
        echo "<li class='page-item'><a class='page-link' href='?pagina=$i'>$i</a></li>";
    }
    echo "</ul></nav>";

    $conn->close();
    ?>
</div>
        </div>
		<!--2 -->
   	 	<div class="col-sm-6" id="colum2">
			<?php include('checkout1.php'); ?>
        </div>
   </div>
</div>
<?php include('script.php'); ?>

<?php include('modal.php'); ?>
<!--<script src="custom.js"></script>
<script src="custom1.js"></script>-->
</body>
</html>