<!DOCTYPE HTML>
<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="views/html/estilos/encuesta.cs
s">
<link rel="shortcut icon" type="image/x-icon" href="../<?php echo rtrim(PROJECT_ROOT); ?>/views/recursos/Icono.ico" />
  <title>Login-Ucaplus</title>
  </head>
<body id="LoginForm">
  <?php
 error_reporting(0);
 /**
  * @author José Joaquín Pérez-Calderón Ortiz - José Manuel Morales García
  * @version 1.0
  */
 define('USER','root');//Cambiar usuario
 define('PASS','');//Cambiar la pass
 //define('FECHA_CADENA',strtotime(FECHA));

 require __DIR__.'./../../Clases/conexion.php';
 $dsn = 'mysql:dbname=encuesta;host=127.0.0.1;';
 //Creamos la conexión

 $conexion = new PDOp($dsn,USER,PASS);//Creamos la conexión
 $conexion->query("SET NAMES 'utf8'");
 /**
  * Comprobamos si el servidor soporta la version de PHP actual.
  */


/**
*Comprobación del Login
*/
$boton=$_POST["enviar"];
$usuario=$_POST["usuario"];
$contrasenia=sha1($_POST["contrasena"]);
if(isset($boton))
{
  $sql="select usuario, contrasenna from usuario where usuario in('".$usuario."')and contrasenna in('".$contrasenia."')";
  $stm=$conexion->query($sql);
  $res=$stm->fetch();
  if($res)
  {
    //echo $res["tipo"];
    $_SESSION["datos_sesion"] = array($res["tipo"],$res["id"]);//Tipo de usuario e id
    echo "Location: localhost/".rtrim(PROJECT_ROOT)."/";
    header(rtrim("Location: /".rtrim(PROJECT_ROOT)."/"));
  }
  else
  {
    echo "Datos Incorrectos";
  }
}



 ?>
<div class="container align-items-center">
<div class="row">
<div class="col-sm-6 offset-sm-3 text-center">
<h1 class="form-heading">Formulario</h1>
  <div class="login-form">
  <div class="main-div">
    <div class="panel">
   <h2>Login</h2>
   <p>Usuario y contraseña</p>
   </div>
    <form id="Login" method="post" action="">

        <div class="form-group">


            <input type="text" class="form-control" name="usuario" placeholder="Usuario">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" name="contrasena" placeholder="Contrase&ntilde;a">

        </div>
        <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>

    </form>
    </div>
<p class="botto-text", color:black>&copy;Ucaplus</p>
</div>
</div>
</div>
</div>
</body></html>