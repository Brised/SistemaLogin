<?php
// recuperar.php
require_once 'config/db.php';
session_start();

$mensaje = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo'] ?? '');

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = "Por favor, ingresa un correo válido.";
    } else {
        // Verificar si el correo existe
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $user = $stmt->fetch();

        if ($user) {
            // Generar una nueva contraseña temporal
            $nueva_contrasena = substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789@$!%*?&'), 0, 10);
            $hash = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

            // Actualizar en la base de datos
            $update = $pdo->prepare("UPDATE usuarios SET contrasena = ? WHERE correo = ?");
            $update->execute([$hash, $correo]);

            $mensaje = "Tu nueva contraseña temporal es: <strong>$nueva_contrasena</strong><br>Inicia sesión y cámbiala lo antes posible.";
        } else {
            $error = "No existe una cuenta con ese correo.";
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Recuperar contraseña - Mis Películas 2025</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <div class="container">
    <header class="header">
      <div class="brand">
        <div class="logo">🔑</div>
        <div>
          <h1>Recuperar contraseña</h1>
          <div style="color:var(--muted);font-size:13px">Genera una nueva contraseña temporal</div>
        </div>
      </div>
      <div class="actions">
        <a href="login.php">Volver al inicio de sesión</a>
      </div>
    </header>

    <main class="card" style="max-width:520px">
      <?php if($error): ?>
        <div style="background:#2b0b0b;padding:12px;border-radius:8px;color:#ffb4b4;margin-bottom:12px">
          <?=htmlspecialchars($error)?>
        </div>
      <?php elseif($mensaje): ?>
        <div style="background:#0d2b0d;padding:12px;border-radius:8px;color:#b6ffb4;margin-bottom:12px">
          <?= $mensaje ?>
        </div>
      <?php endif; ?>

      <form method="post">
        <div class="input">
          <label for="correo">Correo electrónico</label>
          <input id="correo" name="correo" type="email" required placeholder="usuario@ejemplo.com">
        </div>

        <div style="margin-top:12px">
          <button class="btn" type="submit">Generar nueva contraseña</button>
        </div>
      </form>
    </main>

    <footer class="footer">
      <a href="login.php">Volver a iniciar sesión</a>
    </footer>
  </div>
</body>
</html>