<?php
session_start();
require_once 'config/db.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $contrasena = $_POST['contrasena'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?: null;
    $genero = $_POST['genero'] ?: null;

    if (strlen($nombre) < 2) {
        $errors[] = "El nombre debe tener al menos 2 caracteres.";
    }
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "⚠️ Correo no válido. Asegúrate de incluir el símbolo @ en tu dirección de correo.";
    }

    $pwErrors = [];
    if (strlen($contrasena) < 8) $pwErrors[] = "mínimo 8 caracteres";
    if (!preg_match('/[A-Z]/', $contrasena)) $pwErrors[] = "una letra mayúscula";
    if (!preg_match('/[a-z]/', $contrasena)) $pwErrors[] = "una letra minúscula";
    if (!preg_match('/[0-9]/', $contrasena)) $pwErrors[] = "un número";
    if (!preg_match('/[\@\$\!\%\*\?\&\#\_\-]/', $contrasena)) $pwErrors[] = "un carácter especial (@ $ ! % * ? & # _ -)";

    if ($pwErrors) {
        $errors[] = "La contraseña debe contener: " . implode(', ', $pwErrors) . ".";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE correo = ?");
        $stmt->execute([$correo]);
        if ($stmt->fetch()) {
            $errors[] = "El correo ya está registrado.";
        } else {
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, correo, contrasena, fecha_nacimiento, genero) VALUES (?, ?, ?, ?, ?)");
            try {
                $stmt->execute([$nombre, $correo, $hash, $fecha_nacimiento, $genero]);

                echo "<script>
                        alert('Registro correcto. Ya puedes iniciar sesión.');
                        window.location.href = 'login.php';
                      </script>";
                exit;
            } catch (Exception $e) {
                $errors[] = "Error al registrar. Intenta nuevamente.";
            }
        }
    }
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Registro - Mis Películas 2025</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <div class="container">
    <header class="header">
      <div class="brand">
        <div class="logo">🎬</div>
        <div>
          <h1>Registro</h1>
          <div style="color:var(--muted);font-size:13px">Crea tu cuenta para comenzar</div>
        </div>
      </div>
      <div class="actions">
        <a href="index.php">Inicio</a>
        <a href="login.php">Iniciar sesión</a>
      </div>
    </header>

    <main class="card">
      <?php if($errors): ?>
        <div style="background:#2b0b0b;padding:12px;border-radius:8px;color:#ffb4b4;margin-bottom:12px">
          <strong>Errores:</strong>
          <ul>
            <?php foreach($errors as $e) echo "<li>".htmlspecialchars($e)."</li>"; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form method="post" novalidate>
        <div class="form-grid">
          <div class="input">
            <label for="nombre">Nombre completo</label>
            <input id="nombre" name="nombre" type="text" value="<?=htmlspecialchars($_POST['nombre'] ?? '')?>" required>
          </div>

          <div class="input">
            <label for="correo">Correo electrónico</label>
            <input id="correo" name="correo" type="email" 
            placeholder="ejemplo@correo.com"
            value="<?=htmlspecialchars($_POST['correo'] ?? '')?>" required>
          </div>


          <div class="input">
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="<?=htmlspecialchars($_POST['fecha_nacimiento'] ?? '')?>">
          </div>

          <div class="input">
            <label for="genero">Género</label>
            <select id="genero" name="genero">
              <option value="">-- Seleccionar --</option>
              <option <?= (($_POST['genero'] ?? '')==='Masculino')? 'selected':'' ?>>Masculino</option>
              <option <?= (($_POST['genero'] ?? '')==='Femenino')? 'selected':'' ?>>Femenino</option>
              <option <?= (($_POST['genero'] ?? '')==='Otro')? 'selected':'' ?>>Otro</option>
            </select>
          </div>
        </div>

        <div style="margin-top:12px" class="input">
          <label for="contrasena">Contraseña</label>
          <div style="display:flex;gap:8px;align-items:center">
            <input id="contrasena" name="contrasena" type="password" required style="flex:1">
            <label style="display:flex;align-items:center;gap:6px;color:var(--muted)">
              <input id="togglePw" type="checkbox"> Mostrar
            </label>
          </div>

          <div class="pw-checklist" id="pwChecklist">
            <span id="len" class="bad">✖ 8+ caracteres</span>
            <span id="upper" class="bad">✖ Mayúscula</span>
            <span id="lower" class="bad">✖ Minúscula</span>
            <span id="num" class="bad">✖ Número</span>
            <span id="spec" class="bad">✖ Carácter especial (@ $ ! % * ? & # _ -)</span>
          </div>
        </div>

        <div style="margin-top:14px">
          <button class="btn" type="submit">Crear cuenta</button>
        </div>
      </form>
    </main>

    <footer class="footer">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></footer>
  </div>

<script>
const pw = document.getElementById('contrasena');
const toggle = document.getElementById('togglePw');
toggle.addEventListener('change', ()=> pw.type = toggle.checked ? 'text' : 'password');

const checks = {
  len: document.getElementById('len'),
  upper: document.getElementById('upper'),
  lower: document.getElementById('lower'),
  num: document.getElementById('num'),
  spec: document.getElementById('spec'),
};

pw.addEventListener('input', ()=> {
  const v = pw.value;
  checks.len.className = v.length >= 8 ? 'ok' : 'bad';
  checks.upper.className = /[A-Z]/.test(v) ? 'ok' : 'bad';
  checks.lower.className = /[a-z]/.test(v) ? 'ok' : 'bad';
  checks.num.className = /[0-9]/.test(v) ? 'ok' : 'bad';
  checks.spec.className = /[\@\$\!\%\*\?\&\#\_\-]/.test(v) ? 'ok' : 'bad';
});
</script>
</body>
</html>