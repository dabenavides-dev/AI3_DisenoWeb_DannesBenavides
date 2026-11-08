<?php
require 'conexion.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM estudiantes WHERE id = ?");
$stmt->execute([$id]);
$e = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE estudiantes SET nombre=?, apellido=?, correo=?, telefono=?, carrera=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['telefono'], $_POST['carrera'], $id]);
    header("Location: index.php");
    exit;
}
?>
<form method="POST">
  <input type="text" name="nombre" value="<?php echo htmlspecialchars($e['nombre']); ?>" required><br>
  <input type="text" name="apellido" value="<?php echo htmlspecialchars($e['apellido']); ?>" required><br>
  <input type="email" name="correo" value="<?php echo htmlspecialchars($e['correo']); ?>" required><br>
  <input type="text" name="telefono" value="<?php echo htmlspecialchars($e['telefono']); ?>"><br>
  <input type="text" name="carrera" value="<?php echo htmlspecialchars($e['carrera']); ?>" required><br>
  <button>Actualizar</button>
</form>