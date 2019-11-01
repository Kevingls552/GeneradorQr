<?php

 
include('libs/phpqrcode/qrlib.php'); 


if(isset($_POST['submit']) ) {
	$tempDir = 'temp/'; 
	$carnet = $_POST['carnet'];
	$nombre =  $_POST['nombre'];
	$filename = $_POST['carnet'];
	$apellido =  $_POST['apellido'];
	$codeContents = $carnet.','.$nombre.','.$apellido.''; 
	QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
	
}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
	<title>Generado Codigo QR</title>
	<?php header("Content-type: text/html; charset=utf8"); ?>
	
	<!-- <link rel="stylesheet" href="libs/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	<link rel="stylesheet" href="libs/style.css">
	<script src="libs/navbarclock.js"></script>
	</head>
	<body onload="startTime()" style="background: #E5E4E4">
	
		<nav class="navbar navbar-dark bg-primary" role="navigation">
			<div class="col-md-6"><h2 style="color:white;" >Con Tecnología haz tus sueños realidad</h2></div>
				
			
			<div id="clockdate">
				<div class="clockdate-wrapper">
					<div id="clock"></div>
					<div id="date"><?php echo date('l, F j, Y'); ?></div>
				</div>
			</div>
			
			
		</nav>

		<div class="container">
			<div class="row mt-4">
				<div class="col-sm-12 mt-4">
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-sm-12  shadow p-3 mb-5 bg-gray rounded">
							<h3 class="text-center"><strong> Datos del Estudiante</strong></h3>

							<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
								<div class="form-group">
									<label>Carnet</label>
									<input type="text" class="form-control" name="carnet"  placeholder="Ingresa tu Carnet" value="<?php echo @$email; ?>" required />
								</div>
								<div class="form-group">
									<label>Nombre</label>
									<input type="text" class="form-control" name="nombre"  placeholder="Ingresa tu Nombre" value="<?php echo @$subject; ?>" required pattern="[a-zA-Z .]+" />
								</div>
								<div class="form-group">
									<label>Apellido</label>
									<input type="text" class="form-control" name="apellido"  value="<?php echo @$body; ?>" required pattern="[a-zA-Z0-9 .]+" placeholder="Ingresa tu Apellido"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" name="submit" class="btn btn-primary submitBtn" />
								</div>
							</form>

						</div>	
						<div class="col-xl-4 col-lg-4 col-sm-12 ">
							<div class="d-md-flex justify-content-center align-items-center" style="height: 80%;">
							<img src="./img/Umg.png" alt="">
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-sm-12  shadow p-3 mb-5 bg-gray rounded">
							<?php
							if(!isset($filename)){
								$filename = "author";
							}
							?>
							<h2 class="text-center">QR Estudiante: </h2>

							<center>
								<div class="qrframe" >
										<?php echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; ?>
								</div>
								<a class="btn btn-primary submitBtn" style="width:210px; margin:5px 0;" href="download.php?file=<?php echo $filename; ?>.png ">Descargar Codigo QR</a>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
	
</html>