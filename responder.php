<?php

include("conexion.php");
$con = conectar();

$id_usuario = $_POST['id_usuario'];
$id_encuesta = $_POST['id_encuesta'];

$resultPreguntas = select($con, "pregunta","WHERE fk_encuesta=".$id_encuesta);


if($resultPreguntas->num_rows > 0){
    while($row = mysqli_fetch_array($resultPreguntas, MYSQLI_ASSOC)){
        $id_pregunta = $row['id_pregunta'];
        $value = $_POST[$id_pregunta];
        $resultUsuario = select($con, "responden","WHERE fk_usuario=".$id_usuario." AND fk_pregunta=".$id_pregunta);
        insert($con, "resultados", "fk_usuario, fk_pregunta, respuesta", $id_usuario.", ".$id_pregunta.", '$value'");
    }
}

?>

<form action="encuestasdelusuario.php" method="post" id="f1" >
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
</form>
<script type="text/javascript">
    document.getElementById('f1').submit();
</script>

<?php
?>