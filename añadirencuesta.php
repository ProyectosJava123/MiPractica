<?php
include("conexion.php");
$con = conectar();
$id_usuario = $_POST['id_usuario'];
$resultUsuario = select($con, "usuario", "WHERE id_usuario =".$id_usuario);
if($resultUsuario->num_rows > 0){
    $usuario = $resultUsuario->fetch_array(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
    
    

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Practica</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
  </head>
    
  <body id="page-top">

 

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>AÑADIR ENCUESTA</h1>
      </div>
    </header>

     <main role="main" class="container">

            <div class="starter-template">
                <div class="formularioc">
                    <form action="nuevaencuesta.php" method="post">
                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                        <div class="form-group">
                            <label for="nombre">Nombre de la encuesta</label>
                            <input required name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">
                        </div>
                        <hr>
                        <div class="form-group">

                            <input required name="p1" type="text" class="form-control" id="p1"  placeholder="Pregunta 1">
                        </div>
                        <div class="form-group">

                            <input required name="p2" type="textarea" class="form-control" id="p2"  placeholder="Pregunta 2">
                        </div>
                        <div class="form-group">

                            <input required name="p3" type="textarea" class="form-control" id="p3"  placeholder="Pregunta 3">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">AÑADIR</button>
                    </form>
                </div>
            </div>

        </main>
   

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>

  </body>

</html>