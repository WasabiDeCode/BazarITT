<?php
	session_start();
	require_once("C:/xampp/htdocs/JavaScriptExe/views/head/head.php");
	include("c:/xampp/htdocs/JavaScriptExe/connect.php");
	include("c:/xampp/htdocs/JavaScriptExe/functions.php");

	$user_data = check_login($con);

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		// POST ITEM
		$Titulo = $_POST['Titulo'];
		$Descripcion = $_POST['Descripcion'];
		$Precio = $_POST['Precio'];
		$Status = $_POST['Status'];
		$Imagen = $_POST['Imagen'];
		$Vendor = $user_data['NumControl'];

		if (!empty($Titulo) && !empty($Descripcion) && !empty($Precio) && !empty($Status)) {
			$query = "INSERT INTO articulos (Titulo, Descripcion, Precio, Status, Imagen, Vendor) VALUES ('$Titulo', '$Descripcion', '$Precio', '$Status', '$Imagen', '$Vendor')";
			mysqli_query($con, $query);
			header("Location: show.php");
			die;
		} else {
			echo "Ingresa datos válidos";
		}
	}
?>

<div class="container">
	<form action="" method="POST" autocomplete="off">
		<div class="mb-3">
			<label for="titulo" class="form-label">Nombre del Producto</label>
			<input type="text" name="Titulo" class="form-control" id="titulo" aria-describedby="emailHelp">
			<label for="descripcion" class="form-label">Descripción</label>
			<input type="text" name="Descripcion" class="form-control" id="descripcion" aria-describedby="emailHelp">
			<label for="status" class="form-label">Status (Disponible/Vendido/Apartado)</label>
			<input type="text" name="Status" class="form-control" id="status" aria-describedby="emailHelp">
			<label for="precio" class="form-label">Precio $ (Sólo Números)</label>
			<input type="text" name="Precio" class="form-control" id="precio" aria-describedby="emailHelp">
			<label for="imagen" class="form-label">Imagen</label>
			<input class="form-control" type="file" id="imagen" name="Imagen" placeholder="Imagen">
		</div>
		<button type="submit" class="btn btn-primary">Publicar</button>
		<a class="btn btn-danger" href="/JavaScriptExe/index2.php">Cancelar</a>
	</form>
</div>

<?php
	require_once("C:/xampp/htdocs/JavaScriptExe/views/head/footer.php");
?>
