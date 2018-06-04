<?php
include("conexion.php");
$con = conectar();
$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$p1 = $_POST['p1'];
$p2 = $_POST['p2'];
$p3 = $_POST['p3'];
$p4 = $_POST['p4'];
$p5 = $_POST['p5'];

insert($con, "encuesta", "nombre", "'$nombre'");
$rsEncuesta =  select($con, "encuesta order by id_encuesta DESC limit 1", "");
if($rsEncuesta->num_rows > 0){
    $encuesta = $rsEncuesta->fetch_array(MYSQLI_ASSOC);
    $id_encuesta = $encuesta['id_encuesta'];
    insert($con, "pregunta","texto, fk_encuesta","'$p1', ".$id_encuesta);
    insert($con, "pregunta","texto, fk_encuesta","'$p2', ".$id_encuesta);
    insert($con, "pregunta","texto, fk_encuesta","'$p3', ".$id_encuesta);
}

?>
<form action="encuestasdeladmin.php" method="post" id="f2" >
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
</form>
<script type="text/javascript">
    document.getElementById('f2').submit();
</script>