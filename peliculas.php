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
          <h1>Mis películas recomendadas 2025</h1>
          <div style="color:var(--muted);font-size:13px">Hola, <?=htmlspecialchars($user_name)?> — estas son mis peliculas favortitas</div>
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
          <img src="images/pelicula2.jpg" alt="El abismo secreto">
          <div class="meta">
            <h3>El abismo secreto</h3>
            <p>Dos francotiradores son enviados a una isla remota para vigilar una extraña grieta, pero pronto descubren que el abismo oculta un oscuro misterio que pondrá en riesgo sus vidas.</p>
          </div>
        </article>

        <!-- Movie 3 -->
        <article class="movie card">
          <img src="images/pelicula3.jpg" alt="M3GAN 2.0">
          <div class="meta">
            <h3>M3GAN 2.0</h3>
            <p>Dos años después del incidente M3GAN, Gemma revive su muñeca AI para enfrentar a Amelia, un robot militar creado por contratistas que robaron la tecnología de M3GAN.</p>
          </div>
        </article>

        <!-- Movie 4 -->
        <article class="movie card">
          <img src="images/pelicula4.jpg" alt="Damsel">
          <div class="meta">
            <h3>Damsel</h3>
            <p>La princesa Elodie, piensa que se va a casar con el príncipe Enrique, pero descubre que la están sacrificando a un dragón.</p>
          </div>
        </article>

        <!-- Movie 5 -->
        <article class="movie card">
          <img src="images/pelicula5.jpg" alt="Del universo de John Wick: Bailarina">
          <div class="meta">
            <h3>Del universo de John Wick: Bailarina</h3>
            <p>Una asesina entrenada en las tradiciones de la organización Ruska Roma se dispone a buscar venganza tras la muerte de su padre.</p>
          </div>
        </article>
        
        <!-- Movie 6 -->
        <article class="movie card">
          <img src="images/pelicula6.jpg" alt="Culpa mía: Londres">
          <div class="meta">
            <h3>Culpa mía: Londres</h3>
            <p>Noah se muda a Londres, donde conoce a Nick, el hijo rebelde de su padrastro, y entre ellos surge una intensa atracción que pondrá a prueba su pasado y su corazón.</p>
          </div>
        </article>

      
        <!-- Movie 7 -->
        <article class="movie card">
          <img src="images/pelicula7.jpg" alt="Novocaine Sin Dolor">
          <div class="meta">
            <h3>Novocaine Sin Dolor</h3>
            <p>Nathan nació con un raro trastorno que le impide sentir dolor. Cuando la chica de sus sueños es secuestrada durante un robo en un banco, él aprovecha su incapacidad para sentir dolor físico como una ventaja inesperada para salvarla.</p>
          </div>
        </article>
        
        <!-- Movie 8 -->
        <article class="movie card">
          <img src="images/pelicula8.jpg" alt="Compañera perfecta">
          <div class="meta">
            <h3>Compañera perfecta</h3>
            <p>Josh e Iris parecen la pareja ideal, hasta que un incidente mortal en un viaje con amigos destapa un oscuro secreto: Iris es una androide creada para satisfacer a Josh. Y lo que debía ser perfecto pronto se vuelve incontrolable.</p>
          </div>
        </article>
        
        <!-- Movie 9 -->
        <article class="movie card">
          <img src="images/pelicula9.jpg" alt="Destino final: Lazos de sangre">
          <div class="meta">
            <h3>Destino final: Lazos de sangre</h3>
            <p>Una joven comienza a tener visiones de un trágico accidente ocurrido décadas atrás y descubre que su familia está marcada por una maldición. Al intentar escapar, desata una nueva cadena de muertes inevitables.</p>
          </div>
        </article>
      </section>
    </main>

    <footer class="footer">© 2025 - Mis recomendaciones personales</footer>
  </div>
</body>
</html>