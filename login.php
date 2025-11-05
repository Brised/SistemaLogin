<?php
session_start();
require_once 'config/db.php';

$error = '';

if (!isset($_SESSION['op1']) || !isset($_SESSION['op2'])) {
    $_SESSION['op1'] = rand(1, 9);
    $_SESSION['op2'] = rand(1, 9);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';
    $respuesta = $_POST['captcha'] ?? '';

    $suma_correcta = $_SESSION['op1'] + $_SESSION['op2'];

    if ($respuesta != $suma_correcta) {
        $error = "Operación matemática incorrecta. Inténtalo de nuevo.";
        $_SESSION['op1'] = rand(1, 9);
        $_SESSION['op2'] = rand(1, 9);
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = "Correo no válido.";
    } else {
        $stmt = $pdo->prepare("SELECT id, nombre, contrasena FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        $user = $stmt->fetch();

        if ($user && password_verify($contrasena, $user['contrasena'])) {
            unset($_SESSION['op1'], $_SESSION['op2']);
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nombre'];
            header('Location: peliculas.php');
            exit;
        } else {
            $error = "Credenciales incorrectas.";
            $_SESSION['op1'] = rand(1, 9);
            $_SESSION['op2'] = rand(1, 9);
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Iniciar sesión - Mis Películas 2025</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <div class="container">
    <header class="header">
      <div class="brand">
        <div class="logo">🎬</div>
        <div>
          <h1>Iniciar sesión</h1>
          <div style="color:var(--muted);font-size:13px">Accede a tu cuenta</div>
        </div>
      </div>
      <div class="actions">
        <a href="index.php">Inicio</a>
      </div>
    </header>

    <main class="card">
      <?php if($error): ?>
        <div style="background:#2b0b0b;padding:12px;border-radius:8px;color:#ffb4b4;margin-bottom:12px">
          <?=htmlspecialchars($error)?>
        </div>
      <?php endif; ?>

      <form method="post" style="max-width:520px">
        <div class="input">
          <label for="correo">Correo</label>
          <input id="correo" name="correo" type="email" required value="<?=htmlspecialchars($_POST['correo'] ?? '')?>">
        </div>

        <div class="input">
          <label for="contrasena">Contraseña</label>
          <div style="display:flex;gap:8px;align-items:center">
            <input id="contrasena" name="contrasena" type="password" required style="flex:1">
            <label style="display:flex;align-items:center;gap:6px;color:var(--muted)">
              <input id="toggleLoginPw" type="checkbox"> Mostrar
            </label>
          </div>
        </div>

        <div class="input">
          <label for="captcha">Resuelve la operación: <?= $_SESSION['op1'] ?> + <?= $_SESSION['op2'] ?> = ?</label>
          <input id="captcha" name="captcha" type="number" required>
        </div>

        <div style="margin-top:12px">
          <button class="btn" type="submit">Entrar</button>
        </div>

        <div style="margin-top:10px; text-align:center;">
            <a href="recuperar.php" style="color:#5ab0ff;">¿Olvidaste tu contraseña?</a>
        </div>
      </form>
    </main>

    <footer class="footer">¿No tienes cuenta? <a href="registro.php">Regístrate</a></footer>
  </div>

<script>
document.getElementById('toggleLoginPw').addEventListener('change', function(){
  const p = document.getElementById('contrasena');
  p.type = this.checked ? 'text' : 'password';
});
</script>
</body>
</html>