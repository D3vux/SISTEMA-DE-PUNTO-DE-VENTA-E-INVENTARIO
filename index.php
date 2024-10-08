<?php include('conn.php'); ?>
<?php include('header.php'); ?>
<?php
	session_start();
	
	if (isset($_SESSION['id'])){
		$query=mysqli_query($conn,"select * from user where userid='".$_SESSION['id']."'");
		$row=mysqli_fetch_array($query);
		
		if ($row['access']==1){
			header('location:admin/');
		}
		else{
			header('location:user/');
		}
	}
?>
<body>
<form method="POST" action="login.php">
<div style="height: 35px;"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-xxl-11">
          <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
				
              <div class="col-12 col-md-6">
                <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="./web/img.webp" alt=" Por favor, inicie sesión">
              </div>
              <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <div class="col-12 col-lg-11 col-xl-10">
                  <div class="card-body p-3 p-md-4 p-xl-5">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-5">
                          <div class="text-center mb-4">                           
                          </div>
                          <h4 class="text-center"> Por favor, inicie sesión</h4>
                        </div>
                      </div>
                    </div>             
                    <form action="#!">
                      <div class="row gy-3 overflow-hidden">
                        <div class="col-12">
                          
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="" required>
                            <label for="user" class="form-label">Usuario:</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" required>
                            <label for="password" class="form-label">Contraseña:</label>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button class="btn btn-dark btn-lg" type="submit"><span class="glyphicon glyphicon-log-in"></span> ENTRAR AHORA</button>
							</form>
                          </div>
                        
                        </div>
                      </div>
                    </form> 
                    <div class="row">
                      <div class="col-12">
                        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                          <div style="color: red; font-size: 15px;">
                            <center>
                              <?php
                                
                                if(isset($_SESSION['msg'])){
                                  echo $_SESSION['msg'];
                                  unset($_SESSION['msg']);
                                }
                              ?>
                              </center>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>
</html>