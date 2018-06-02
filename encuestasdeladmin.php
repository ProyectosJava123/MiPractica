<?php
include("conexion.php");
$con = conectar();
$id_usuario = $_POST['id_usuario'];
$resultUsuario = select($con, "usuario", "WHERE id_usuario =".$id_usuario);
if($resultUsuario->num_rows > 0){
    $usuario = $resultUsuario->fetch_array(MYSQLI_ASSOC);
}
$resultEncuestas = select($con, "encuesta", "");
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

    <section id="about">
    <main role="main" class="container">

            <div class="col-md-12 container-fluid ">
                        <div class="row">
                            <?php 
                            if($resultEncuestas->num_rows > 0){
                                while($row = mysqli_fetch_array($resultEncuestas, MYSQLI_ASSOC)){

                            ?>
                            <div class="col-sm-12">
                                <div class="encuestac">
                                    <h3><?php echo $row['nombre'] ?></h3>
                                    <form class="hiddenform" method="post" action="mostrarencuesta.php">
                                        <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
                                        <button type="submit" name="id_encuesta" value="<?php echo $row['id_encuesta'] ?>"  class="btn btn-primary">ABRIR</button>
                                    </form>
                                </div>
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

        <form action="añadirencuesta.php" method="post" id="f2" >
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
        </form>
        
         <script type="text/javascript">

            function postNuevaEncuesta(){
                document.getElementById('f2').submit(); 
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