<?php

include("conexion.php");

$con = conectar();


$nick = $_POST['nick'];
$pass = $_POST['pass'];
$email = $_POST['email'];

$nickResult = select($con, "usuario", "WHERE nick='$nick'");
$emailResult = select($con, "usuario", "WHERE email='$email'");

if($nickResult->num_rows > 0){
    $enick = "El nick '".$nick."' NICK EXISTENTE";
    $f = "f2";
    if($emailResult->num_rows > 0){
        $eemail = "El email '".$email."' EMAIL EXISTENTE";
        $f = "f1";
    }
} else {
    if($emailResult->num_rows > 0){
        $eemail = $email." EMAIL EXISTENTE";
        $f = "f3";
    } else {
        if(insert($con, "usuario", "nick, pass, email", "'$nick', '$pass', '$email'")){
            header("Location: index.html");
        } 
    }    

}
?>


<form action="error_login.php" method="post" id="f1" >
    <input type="hidden" name="enick" value="<?php echo $enick ?>">
    <input type="hidden" name="eemail" value="<?php echo $eemail ?>">
</form>

<form action="error_login.php" method="post" id="f2" >
    <input type="hidden" name="enick" value="<?php echo $enick ?>">
</form>

<form action="error_login.php" method="post" id="f3" >
    <input type="hidden" name="eemail" value="<?php echo $eemail ?>">
</form>

<script type="text/javascript">
    document.getElementById('<?php echo $f ?>').submit();
</script>