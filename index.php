<?php
require 'conexion.php';
$mensaje = "";

// CREATE - Insertar con Prepared Statements
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $carrera = trim($_POST['carrera']);

    if ($nombre != "" && $apellido != "" && $correo != "" && $carrera != "") {
        $sql = "INSERT INTO estudiantes (nombre, apellido, correo, telefono, carrera) VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
	$stmt->execute([$nombre, $apellido, $correo, $telefono, $carrera]);
	header("Location: index.php");
	exit;
    } else {
        $mensaje = "Completa los campos obligatorios";
    }
}

// READ - Consultar registros
$stmt = $pdo->query("SELECT * FROM estudiantes ORDER BY id DESC");
$estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Sistema Web DWBG</title>
<style>
table{width:100%;border-collapse:collapse;margin-top:20px;display:block;overflow-x:auto}
@media(max-width:600px){
  body{padding:5px}
  th,td{font-size:14px;padding:6px}
}
body{font-family:Arial;max-width:800px;margin:20px auto;padding:10px}
input,select{width:100%;padding:8px;margin:5px 0}
button{background:#2563eb;color:white;border:0;padding:10px;width:100%;cursor:pointer}

th,td{border:1px solid #ccc;padding:8px;text-align:left}
th{background:#eee}
</style>
</head>
<body>
<h2>Registro de Estudiantes</h2>
<?php if($mensaje!=""){ echo "<p>$mensaje</p>"; } ?>
<form method="POST">
  <input type="text" name="nombre" placeholder="Nombre" required>
  <input type="text" name="apellido" placeholder="Apellido" required>
  <input type="email" name="correo" placeholder="Correo" required>
  <input type="text" name="telefono" placeholder="Teléfono">
  <input type="text" name="carrera" placeholder="Carrera" required>
  <button type="submit">Guardar</button>
</form>

<h2>Lista de Estudiantes</h2>
<table>
<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Correo</th><th>Teléfono</th><th>Carrera</th><th>Acciones</th></tr>
<?php foreach($estudiantes as $e){ ?>
<tr>
  <td><?php echo htmlspecialchars($e['id']); ?></td>
  <td><?php echo htmlspecialchars($e['nombre']); ?></td>
  <td><?php echo htmlspecialchars($e['apellido']); ?></td>
  <td><?php echo htmlspecialchars($e['correo']); ?></td>
  <td><?php echo htmlspecialchars($e['telefono']); ?></td>
  <td><?php echo htmlspecialchars($e['carrera']); ?></td>
<td>
  <a href="editar.php?id=<?php echo $e['id']; ?>">Editar</a> |
  <a href="eliminar.php?id=<?php echo $e['id']; ?>" onclick="return confirm('¿Seguro que quieres eliminar?')">Eliminar</a>
</td>
</tr>
<?php } ?>
</table>
</body>
</html>