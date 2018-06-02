<?php

include("conexion.php");

$con = conectar();


$nick = $_POST['nick'];
$pass = $_POST['pass'];

$nickResult = select($con, "usuario", "WHERE nick='$nick'");


if($nickResult->num_rows > 0){
    $row = $nickResult->fetch_array(MYSQLI_ASSOC);
    if($pass == $row['pass']){
        if($row['tipo'] == "admin"){
            ?>
            <form action="lista_encuestas_admin.php" method="post" id="f1" >
                <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']?>">
            </form>
            <script type="text/javascript">
                document.getElementById('f1').submit();
            </script>
            <?php
        } else {
             ?>
            <form action="lista_encuestas_user.php" method="post" id="f2" >
                <input type="hidden" name="id_usuario" value="<?php echo $row['id_usuario']?>">
            </form>
            <script type="text/javascript">
                document.getElementById('f2').submit();
            </script>
            <?php
        }
    } else {
        $epass = "Contraseña incorrecta";
         ?>
            <form action="fallo_login.php" method="post" id="f3" >
                <input type="hidden" name="epass" value="<?php echo $epass ?>">
            </form>
            <script type="text/javascript">
                document.getElementById('f3').submit();
            </script>
            <?php
        
    }
    
} else {
    $enick = "El usuario '".$nick."' no existe";
     ?>
            <form action="fallo_login.php" method="post" id="f4" >
                <input type="hidden" name="enick" value="<?php echo $enick ?>">
            </form>
            <script type="text/javascript">
                document.getElementById('f4').submit();
            </script>
            <?php
}



?>