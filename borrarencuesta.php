<?php

include("conexion.php");

$con = conectar();

$id_encuesta = $_POST['id_encuesta'];
$id_usuario = $_POST['id_usuario'];

delete($con, "encuesta", "WHERE id_encuesta=".$id_encuesta);

?>
<form action="encuestasdeladmin.php" method="post" id="f1" >
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
</form>
<script type="text/javascript">
    document.getElementById('f1').submit();
</script>