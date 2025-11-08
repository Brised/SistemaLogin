<?php
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
          <a href="#" id="logoutBtn">Cerrar sesión</a>
        <?php else: ?>
          <a href="registro.php">Registrarse</a>
          <a href="login.php">Iniciar sesión</a>
        <?php endif; ?>
      </div>
    </header>

    <main class="card">
      <h2>Bienvenido/a</h2>
      <p style="color:var(--muted)">
        Estas son mis recomendaciones de películas del 2025 que he visto hasta ahora. Si quieres descubrir más, ver las reseñas completas y conocer de qué trata cada una, 
        regístrate e inicia sesión. ¡Explora nuevas historias y encuentra tu próxima película favorita!
      </p>

      <section style="margin-top:18px" class="card">
        <h3>Sobre el sitio</h3>
        <p style="color:var(--muted)">
          Las películas están organizadas en tarjetas con su imagen y una breve descripción. Al registrarte e iniciar sesión, podrás acceder a más información sobre cada título, 
          leer reseñas detalladas y ver los tráilers. ¡Disfruta explorando mis recomendaciones del 2025 y encuentra tus próximas favoritas!
        </p>
      </section>
    </main>
  </div>

  <?php if($logeado): ?>
  <script>
    document.getElementById("logoutBtn").addEventListener("click", function(e){
      e.preventDefault();
      const confirmLogout = confirm("¿Estás seguro de que deseas cerrar sesión?");
      if(confirmLogout){
        window.location.href = "logout.php";
      }
    });
  </script>
  <?php endif; ?>
</body>
</html>