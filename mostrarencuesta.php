<?php
include("conexion.php");
$con = conectar();
$id_usuario = $_POST['id_usuario'];
$id_encuesta = $_POST['id_encuesta'];
$resultUsuario = select($con, "usuario", "WHERE id_usuario =".$id_usuario);
if($resultUsuario->num_rows > 0){
    $usuario = $resultUsuario->fetch_array(MYSQLI_ASSOC);
}
$resultEncuestas = select($con, "encuesta", "WHERE id_encuesta=".$id_encuesta);
if($resultEncuestas->num_rows > 0){
    $encuesta = $resultEncuestas->fetch_array(MYSQLI_ASSOC);
}
$resultPreguntas = select($con, "pregunta", "WHERE fk_encuesta=".$id_encuesta);
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
        <h1>RESULTADOS</h1>
      </div>
    </header>

    <section id="about">

         <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">Bienvenido</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:postListaEncuestas();">Mostrar Encuestas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:postNuevaEncuesta();">Añadir Encuestas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">SALIR</a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="container">

            <div class="col-md-12 container-fluid ">
                <div class="row">
                    <div class="col-sm-12">
                    <h1><?php echo $encuesta['nombre'] ?></h1>
                    </div>    
                    <div class="col-sm-12">    
                    <hr> 
                    <form action="borrarencuesta.php" method="post" id="eliminar" >
                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                        <button type="submit" name="id_encuesta" value="<?php echo $id_encuesta ?>"  class="btn btn-danger"><stron>ELIMINAR</stron></button>
                        
                    </form>
                    <hr>
                    </div>    
                    <?php 
    if($resultPreguntas->num_rows > 0){
        while($row = mysqli_fetch_array($resultPreguntas, MYSQLI_ASSOC)){
                    ?>
                    <div class="col-sm-12">
                        <h3><?php echo $row['texto'] ?></h3>
                        <br>
                        <p><strong>Perfecto:</strong> <?php echo getVeces($con, $row['id_pregunta'], "Perfecto")?></p>
                        <p><strong>Mejorable:</strong> <?php echo getVeces($con, $row['id_pregunta'], "Mejorable")?></p>
                        <p><strong>Muy mejorable:</strong> <?php echo getVeces($con, $row['id_pregunta'], "Muy mejorable")?></p>
                        <p><strong>Horrible:</strong> <?php echo getVeces($con, $row['id_pregunta'], "Horrible")?></p>

                        <hr>
                    </div>
                    <?php 
        }
    }
                    ?>  
                </div>
            </div>

        </main>
        <!-- /.container -->

        <form action="encuestasdeladmin.php" method="post" id="f2" >
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
        </form>

        <form action="añadirencuesta.php" method="post" id="f3" >
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
        </form>

        <script type="text/javascript">

            function postListaEncuestas(){
                document.getElementById('f2').submit(); 
            }

            function postNuevaEncuesta(){
                document.getElementById('f3').submit(); 
            }

        </script>
      
    </section>


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