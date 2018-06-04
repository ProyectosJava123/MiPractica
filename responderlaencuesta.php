<?php
include("conexion.php");
$con = conectar();
$id_usuario = $_POST['id_usuario'];
$id_encuesta = $_POST['id_encuesta'];
$ResultadoUser = select($con, "usuario", "WHERE id_usuario =".$id_usuario);
if($ResultadoUser->num_rows > 0){
    $usuario = $ResultadoUser->fetch_array(MYSQLI_ASSOC);
}
$laspreguntas = select($con, "pregunta", "WHERE fk_encuesta=".$id_encuesta);
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
        <h1>ENCUESTAS</h1>
      </div>
    </header>
       <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#"><?php echo $usuario['nick'] ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">MOSTRAR ENCUESTAS<span class="sr-only">(current)</span></a>
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
                    <form  class="formlarge" action="responder.php" method="post">
                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                    <?php 
    if($laspreguntas->num_rows > 0){
        while($row = mysqli_fetch_array($laspreguntas, MYSQLI_ASSOC)){

                    ?>
                    <div class="col-sm-12">
                        <div>
                            <h3><?php echo $row['texto'] ?></h3>
                            <br>
                            <div class="radio">
                            <label class="radio"><input required class="rb" type="radio" value="Perfecto" name="<?php echo $row['id_pregunta'] ?>">Perfecto</label>
                            </div>  
                            <div class="radio">
                            <label class="radio"><input class="rb" type="radio" value="Mejorable" name="<?php echo $row['id_pregunta'] ?>">Mejorable</label>
                            </div>  
                            <div class="radio">
                            <label class="radio"><input class="rb" type="radio" value="Muy Mejorable" name="<?php echo $row['id_pregunta'] ?>">Muy Mejorable</label>
                            </div>  
                            <div class="radio">
                            <label class="radio"><input class="rb" type="radio" value="Horrible" name="<?php echo $row['id_pregunta'] ?>">Horrible</label>
                            </div>    
                        </div>
                        <hr>
                    </div>
                    <?php 
        }
    }
                    ?>  
                        <div class="text-center">
                                    <button type="submit" name="id_encuesta" value="<?php echo $id_encuesta ?>"  class="btn btn-primary btn-lg">Enviar</button>
                                </div>
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