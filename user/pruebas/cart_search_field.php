
<div class="well" style="display:none; position:fixed; top:55px; margin-left:-163px; left:350px; max-width:550px; z-index:2;" id="cart_box">
		<div id="cart_area" style="max-height:300px; overflow-y:auto; overflow-x:hidden;"></div>
		             
						<h4><a  href="index.php"> Todas las Categorias</a></h4>
						
						<?php
							$caq=mysqli_query($conn,"select * from category");
							while($catrow=mysqli_fetch_array($caq)){
								?>
								<h4 class="divider"></h4>
								<h4><a href="plist.php?cat=<?php echo $catrow['categoryid']; ?>"><?php echo $catrow['category_name']; ?></a></h4>
								<?php
							}
						
						?>
                     
        
</div>
	<div id="search_area" class="panel panel-default" style="display:none; position:fixed; top:55px; left:603px; height:40px; width:447px; z-index:3;">
	</div>