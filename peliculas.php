<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$user_name = $_SESSION['user_name'] ?? 'Usuario';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Películas - Mis Películas 2025</title>
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
  <div class="container">
    <header class="header">
      <div class="brand">
        <div class="logo">🎬</div>
        <div>
          <h1>Películas recomendadas 2025</h1>
          <div style="color:var(--muted);font-size:13px">Hola, <?=htmlspecialchars($user_name)?> — estas son mis favoritas</div>
        </div>
      </div>
      <div class="actions">
        <a href="index.php">Inicio</a>
        <a href="logout.php">Cerrar sesión</a>
      </div>
    </header>

    <main>
      <section class="grid">
        <!-- Movie 1 -->
        <article class="movie card">
          <img src="images/pelicula1.jpg" alt="Exterritorial">
          <div class="meta">
            <h3>Exterritorial</h3>
            <p>Cuando su hijo desaparece en un consulado de EE. UU., una exsoldado de las fuerzas especiales hará lo imposible por encontrarlo... y destapará una oscura conspiración.</p>
          </div>
        </article>

        <!-- Movie 2 -->
        <article class="movie card">
          <img src="images/movie2.jpg" alt="Movie 2">
          <div class="meta">
            <h3>Neon City</h3>
            <p>Futurista y vibrante: una aventura visual en una ciudad que nunca duerme.</p>
          </div>
        </article>

        <!-- Movie 3 -->
        <article class="movie card">
          <img src="images/movie3.jpg" alt="Movie 3">
          <div class="meta">
            <h3>Ocean's Edge</h3>
            <p>Drama humano ambientado en la costa, con actuaciones emotivas y una fotografía preciosa.</p>
          </div>
        </article>

        <!-- Movie 4 -->
        <article class="movie card">
          <img src="images/movie4.jpg" alt="Movie 4">
          <div class="meta">
            <h3>Silent Echoes</h3>
            <p>Misterio psicológico que te mantiene en tensión hasta el final.</p>
          </div>
        </article>

        <!-- Movie 5 -->
        <article class="movie card">
          <img src="images/movie5.jpg" alt="Movie 5">
          <div class="meta">
            <h3>Eclipse of Time</h3>
            <p>Una historia de viajes en el tiempo con enfoque emotivo y una banda sonora envolvente.</p>
          </div>
        </article>
        
        <!-- Movie 6 -->
        <article class="movie card">
          <img src="images/movie5.jpg" alt="Movie 5">
          <div class="meta">
            <h3>Eclipse of Time</h3>
            <p>Una historia de viajes en el tiempo con enfoque emotivo y una banda sonora envolvente.</p>
          </div>
        </article>

      
        <!-- Movie 7 -->
        <article class="movie card">
          <img src="images/movie5.jpg" alt="Movie 5">
          <div class="meta">
            <h3>Eclipse of Time</h3>
            <p>Una historia de viajes en el tiempo con enfoque emotivo y una banda sonora envolvente.</p>
          </div>
        </article>
        
        <!-- Movie 8 -->
        <article class="movie card">
          <img src="images/movie5.jpg" alt="Movie 5">
          <div class="meta">
            <h3>Eclipse of Time</h3>
            <p>Una historia de viajes en el tiempo con enfoque emotivo y una banda sonora envolvente.</p>
          </div>
        </article>
        
        <!-- Movie 9 -->
        <article class="movie card">
          <img src="images/movie5.jpg" alt="Movie 5">
          <div class="meta">
            <h3>Eclipse of Time</h3>
            <p>Una historia de viajes en el tiempo con enfoque emotivo y una banda sonora envolvente.</p>
          </div>
        </article>
      </section>
    </main>

    <footer class="footer">© 2025 - Mis recomendaciones personales</footer>
  </div>
</body>
</html>