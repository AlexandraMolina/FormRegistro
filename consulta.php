<!DOCTYPE html>
<html>
<head>
  <title>Lista de Usuarios</title>
  <!-- Enlace a los archivos CSS y JavaScript de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <h1>Lista de Usuarios Registrados</h1>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">NOMBRE</th>
          <th scope="col">PRIMER APELLIDO</th>
          <th scope="col">SEGUNDO APELLIDO</th>
          <th scope="col">EMAIL</th>
          <th scope="col">LOGIN</th>
          <th scope="col">PASSWORD</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "formulario";

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                 die("Conexión fallida: " . mysqli_connect_error());
            }

        // Consulta a la base de datos
        $query = "SELECT ID,NOMBRE,APELLIDO1,APELLIDO2,EMAIL,LOGIN, PASSWORD FROM usuarios";
        $result = mysqli_query($conn, $query);

        // Mostrar resultados
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['NOMBRE'] . "</td>";
            echo "<td>" . $row['APELLIDO1'] . "</td>";
            echo "<td>" . $row['APELLIDO2'] . "</td>";
            echo "<td>" . $row['EMAIL'] . "</td>";
            echo "<td>" . $row['LOGIN'] . "</td>";
            echo "<td>" . $row['PASSWORD'] . "</td>";
            echo "</tr>";
          }
         
        } else {
          echo "<tr><td colspan='2'>No se encontraron usuarios registrados.</td></tr>";
        }

        mysqli_close($conn);
        ?>
      </tbody>
    </table>
   <button class="btn btn-primary" type="button" onclick="window.location.href='index.html'">Home</button>
  </div>
</body>
</html>
