<?php
// index.php
session_start();
$logeado = isset($_SESSION['user_id']);
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Recomendaciones 2025 - Inicio</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <div class="container">
    <header class="header">
      <div class="brand">
        <div class="logo">🎬</div>
        <div>
          <h1>Mis Películas 2025</h1>
          <div style="color:var(--muted);font-size:13px">Recomendaciones personales y reseñas</div>
        </div>
      </div>
      <div class="actions">
        <?php if($logeado): ?>
          <a href="peliculas.php">Ver películas</a>
          <a href="logout.php">Cerrar sesión</a>
        <?php else: ?>
          <a href="registro.php">Registrarse</a>
          <a href="login.php">Iniciar sesión</a>
        <?php endif; ?>
      </div>
    </header>

    <main class="card">
      <h2>Bienvenido/a</h2>
      <p style="color:var(--muted)">
        Este sitio contiene mis recomendaciones de las mejores películas que vi en 2025.
        Para ver las fichas completas debes registrarte e iniciar sesión. ¡Regístrate y descubre nuevas películas!
      </p>

      <section style="margin-top:18px" class="card">
        <h3>Sobre el sitio</h3>
        <p style="color:var(--muted)">
          Encontrarás tarjetas con imagen, una pequeña sinopsis y enlace para volver al inicio.
          La página de películas está protegida: solo usuarios con sesión activa pueden verla.
        </p>
      </section>
    </main>

    <footer class="footer">© 2025 - Tus recomendaciones personales</footer>
  </div>
</body>
</html>