<?php
include("conexion.php");
$con = conectar();
$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$pregunta1 = $_POST['pregunta1'];
$pregunta2 = $_POST['pregunta2'];
$pregunta3 = $_POST['pregunta3'];

insert($con, "encuesta", "nombre", "'$nombre'");
$ResultadoEncuesta =  select($con, "encuesta order by id_encuesta DESC limit 1", "");
if($ResultadoEncuesta->num_rows > 0){
    $encuesta = $ResultadoEncuesta->fetch_array(MYSQLI_ASSOC);
    $id_encuesta = $encuesta['id_encuesta'];
    insert($con, "pregunta","texto, fk_encuesta","'$pregunta1', ".$id_encuesta);
    insert($con, "pregunta","texto, fk_encuesta","'$pregunta2', ".$id_encuesta);
    insert($con, "pregunta","texto, fk_encuesta","'$pregunta3', ".$id_encuesta);
}

?>
<form action="encuestasdeladmin.php" method="post" id="f2" >
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
</form>
<script type="text/javascript">
    document.getElementById('f2').submit();
</script>