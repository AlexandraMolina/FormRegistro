<?php

function comprobarCampos($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = comprobarCampos($_POST["nombre"]);
  $apellido1 = comprobarCampos($_POST["apellido1"]);
  $apellido2 = comprobarCampos($_POST["apellido2"]);
  $email = comprobarCampos($_POST["email"]);
  $login = comprobarCampos($_POST["login"]);
  $pass = comprobarCampos($_POST["password"]);



  $ComprobarEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
  $ComprobarPass = (strlen($pass) >= 4 && strlen($pass) <= 8);

  if (empty($nombre) || empty($apellido1) || empty($apellido2) ||empty($email) || empty($login) || empty($pass)) {
     echo "<div class='alert alert-danger mt-4'>Todos los campos deben estar rellenados, por favor compruebelos</div>";
  } elseif (!$ComprobarEmail) {
    echo "Introduzca un email valido";
  } elseif (!$ComprobarPass) {
    echo "<div class='alert alert-danger mt-4'>introduzca una contraseña entre 4 y 8 caracteres</div>";
  } else {
    $password =password_hash($pass, PASSWORD_DEFAULT);
    $sql = "SELECT * FROM usuarios WHERE EMAIL='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "<div class='alert alert-danger mt-4'>El email proporcionado ya está regristrado</div>";
    } else {
      $sql = "INSERT INTO usuarios (NOMBRE, APELLIDO1, APELLIDO2, EMAIL, LOGIN, PASSWORD)
      VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$password')";
      if (mysqli_query($conn, $sql)) {
        
        echo '<script>';
        echo 'window.location.href = "index.html?registro=exitoso";';
        echo '</script>';

      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

    }
  }
}
mysqli_close($conn);
?>
