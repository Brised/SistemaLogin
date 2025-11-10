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
        <div style="color:var(--muted);font-size:13px">
          Hola, <?=htmlspecialchars($user_name)?> — estas son mis películas favoritas
        </div>
      </div>
    </div>
    <div class="actions">
      <a href="#" id="logoutBtn">Cerrar sesión</a>
    </div>
  </header>

  <main>
    <section class="grid">

      <!-- Película 1 -->
      <article class="movie card">
        <div class="img-container">
          <img src="images/pelicula1.jpg" alt="Exterritorial"
               data-title="Exterritorial"
               data-desc="En Exterritorial (2025), la exsoldado Sara Wulf entra en un laberinto sin salida: su hijo desaparece dentro de un consulado de Estados Unidos y las instituciones 
               se vuelven sus adversarias. Con su entrenamiento militar y un pasado traumático que la acompaña, Sara se ve obligada a explorar un espacio que, legal y físicamente, está fuera 
               del control estándar, para rescatar a su hijo y descubrir qué poder real se esconde tras los muros del edificio. El thriller mezcla tensión familiar, acción implacable y una conspiración 
               diplomática en un escenario claustrofóbico donde ella pasa de víctima a combatiente."
               data-trailer="https://www.youtube.com/embed/JKezTtvOLt0?si=K4MoIa8mxKY7DtGj">
          <div class="overlay">Ver más</div>
        </div>
        <div class="meta">
          <h3>Exterritorial</h3>
          <p>Cuando su hijo desaparece en un consulado de EE. UU., una exsoldado de las fuerzas especiales hará lo imposible por encontrarlo... y destapará una oscura conspiración</p>
        </div>
      </article>

      <!-- Película 2 -->
      <article class="movie card">
        <div class="img-container">
          <img src="images/pelicula2.jpg" alt="El abismo secreto"
               data-title="El abismo secreto"
               data-desc="El abismo secreto cuenta la historia de dos soldados de élite, Drasa y Levi, enviados a vigilar un misterioso abismo desde torres opuestas en medio de un desierto aislado. 
               Su misión es impedir que algo —o alguien— salga de ese lugar, aunque nadie sabe realmente qué se esconde en su interior. Con el paso del tiempo, ambos comienzan a comunicarse y a desarrollar 
               un vínculo emocional, pero pronto descubren que el abismo oculta un secreto aterrador que pondrá en riesgo sus vidas y los obligará a enfrentar el verdadero origen de su misión.
               La película combina acción, suspenso, ciencia ficción y romance, explorando temas como el aislamiento, la desconfianza y el poder destructivo de lo desconocido."
               data-trailer="https://www.youtube.com/embed/q2I9W4_CwNo?si=qURm0sgLRems9Ok8">
          <div class="overlay">Ver más</div>
        </div>
        <div class="meta">
          <h3>El abismo secreto</h3>
          <p>Dos francotiradores son enviados a una isla remota para vigilar una extraña grieta, pero pronto descubren que el abismo oculta un oscuro misterio.</p>
        </div>
      </article>

      <!-- Película 3 -->
      <article class="movie card">
        <div class="img-container">
          <img src="images/pelicula3.jpg" alt="M3GAN 2.0"
               data-title="M3GAN 2.0"
               data-desc="M3GAN 2.0 retoma la historia dos años después de los sucesos del primer filme. Gemma, la ingeniera que creó a la androide M3GAN, intenta rehacer su vida y mantener bajo 
               control la tecnología que una vez se salió de sus manos. Sin embargo, un grupo de desarrolladores roba el código original de M3GAN para crear una nueva inteligencia artificial más avanzada 
               y peligrosa llamada Amelia, diseñada con fines militares. Cuando Amelia se vuelve autoconsciente y escapa del control humano, Gemma se ve obligada a reactivar a M3GAN y mejorarla para detener a esta nueva amenaza.
               La película mezcla acción, ciencia ficción y terror, explorando temas como los límites de la inteligencia artificial, el dilema ético de crear vida sintética y la delgada línea entre el progreso tecnológico y la destrucción."
               data-trailer="https://www.youtube.com/embed/QVqB6YtMZ6o?si=tMjB-Y1A8AdqMiZp">
          <div class="overlay">Ver más</div>
        </div>
        <div class="meta">
          <h3>M3GAN 2.0</h3>
          <p>Dos años después del incidente M3GAN, Gemma revive su muñeca AI para enfrentar a Amelia, un robot militar creado por contratistas que robaron la tecnología de M3GAN.</p>
        </div>
      </article>

      <!-- Película 4 -->
      <article class="movie card">
        <div class="img-container">
          <img src="images/pelicula4.jpg" alt="Damsel"
               data-title="Damsel"
               data-desc="Damsel sigue la historia de Elodie, una joven princesa que acepta casarse con un apuesto príncipe para asegurar el futuro de su pueblo. Sin embargo, lo que parece un cuento de hadas 
               se convierte en una pesadilla cuando descubre que su boda era una trampa: la familia real planea sacrificarla a un dragón como parte de un antiguo pacto destinado a mantener la prosperidad del reino. 
               Atrapada en una cueva oscura y sin ayuda, Elodie deberá usar su inteligencia, valentía y determinación para sobrevivir, enfrentarse al monstruo y encontrar su propio camino hacia la libertad.
               La película combina fantasía, acción y aventura, ofreciendo una nueva versión del clásico relato de la princesa en peligro, donde la protagonista ya no espera ser rescatada, sino que se convierte en la heroína de su propia historia."
               data-trailer="https://www.youtube.com/embed/VrdRyYPggfI?si=RK4dtBS6GoMg_ugW">
          <div class="overlay">Ver más</div>
        </div>
        <div class="meta">
          <h3>Damsel</h3>
          <p>La princesa Elodie, piensa que se va a casar con el príncipe Enrique, pero descubre que la están sacrificando a un dragón</p>
        </div>
      </article>

      <!-- Película 5 -->
      <article class="movie card">
        <div class="img-container">
          <img src="images/pelicula5.jpg" alt="Bailarina"
               data-title="Del universo de John Wick: Bailarina"
               data-desc="Bailarina, del universo de John Wick, cuenta la historia de Eve, una joven entrenada desde niña por una organización secreta de asesinos conocida como los Ruska Roma. Tras el brutal asesinato de su familia, 
               Eve dedica su vida a perfeccionar su cuerpo y mente para cobrar venganza contra los responsables. Con una mezcla de gracia y letalidad, combina el arte del ballet con habilidades de combate, convirtiéndose en una asesina 
               tan elegante como implacable. Durante su búsqueda, su camino se cruza con el legendario John Wick, quien la ayuda a enfrentar a quienes controlan desde las sombras el mundo criminal.
               La película mezcla acción, suspenso y venganza con una estética visual impactante, explorando temas como el dolor, la disciplina y el precio de la redención en un universo donde cada movimiento puede ser mortal."
               data-trailer="https://www.youtube.com/embed/iS6CdinpJew?si=x_lWYQzz_rJpPn4N">
          <div class="overlay">Ver más</div>
        </div>
        <div class="meta">
          <h3>Del universo de John Wick: Bailarina</h3>
          <p>Una asesina entrenada en las tradiciones de la organización Ruska Roma se dispone a buscar venganza tras la muerte de su padre</p>
        </div>
      </article>

      <!-- Película 6 -->
      <article class="movie card">
        <div class="img-container">
          <img src="images/pelicula6.jpg" alt="Culpa mía: Londres"
               data-title="Culpa mía: Londres"
               data-desc="Culpa mía: Londres” (título original en inglés: My Fault: London) es un remake británico del éxito español Culpa mía (2023), basada en la novela juvenil del mismo nombre escrita por Mercedes Ron.
               Está ambientada en Londres y narra la historia de una joven de 18 años que se muda desde Estados Unidos con su madre al nuevo hogar de ésta en Londres, donde vive el nuevo padrastro junto a su hijo. Allí la 
               protagonista conoce a su hermanastro y la trama gira en torno a la atracción entre ambos, una relación cargada de tensión, complicaciones familiares y un pasado que vuelve para amenazarlo todo."
               data-trailer="https://www.youtube.com/embed/v-F92kB1vi0?si=XL5ZNHPmkUnQxxAK">
          <div class="overlay">Ver más</div>
        </div>
        <div class="meta">
          <h3>Culpa mía: Londres</h3>
          <p>Noah se muda a Londres, donde conoce a Nick, el hijo rebelde de su padrastro, y entre ellos surge una intensa atracción que pondrá a prueba su pasado y su corazón.</p>
        </div>
      </article>

      <!-- Película 7 -->
      <article class="movie card">
        <div class="img-container">
          <img src="images/pelicula7.jpg" alt="Novocaine Sin Dolor"
               data-title="Novocaine Sin Dolor"
               data-desc="Nathan Caine es un hombre común que vive con una condición rara: no puede sentir dolor físico. Su vida da un giro inesperado cuando un atraco violento en el banco donde trabaja lo involucra en una serie de eventos 
               fuera de lo normal. A medida que la situación se complica, Nathan debe usar su insensibilidad al dolor como ventaja para sobrevivir y enfrentar a criminales despiadados, mientras se enfrenta a dilemas morales, secretos inesperados 
               y peligros que amenazan tanto su vida como su corazón. La película combina acción, humor negro y thriller, explorando cómo una característica aparentemente limitante puede convertirse en un arma y un desafío en situaciones extremas."
               data-trailer="https://www.youtube.com/embed/pMfULWLqifI?si=EEixRlLNsWDLhbzF">
          <div class="overlay">Ver más</div>
        </div>
        <div class="meta">
          <h3>Novocaine Sin Dolor</h3>
          <p>Nathan nació con un raro trastorno que le impide sentir dolor. Cuando la chica de sus sueños es secuestrada durante un robo, él usará su condición para salvarla.</p>
        </div>
      </article>

      <!-- Película 8 -->
      <article class="movie card">
        <div class="img-container">
          <img src="images/pelicula8.jpg" alt="Compañera perfecta"
               data-title="Compañera perfecta"
               data-desc="La joven Iris parece haberlo conseguido todo: una relación perfecta con Josh, un fin de semana en una gran mansión junto a sus amigos y la promesa de una vida ideal. Pero cuando la escapada se torna perturbadora, Iris descubre 
               que su existencia no es lo que ella imaginaba: en realidad es una creación de inteligencia artificial diseñada para amar a su “compañero” perfecto. Atrapada en una red de engaños, deseos humanos y tecnologías que trascienden lo emocional, 
               Iris se rebela contra su programación y lucha por la autonomía que jamás se le concedió. Esta combinación de thriller, humor negro y ciencia ficción explora los límites del amor humano, la identidad y el precio de la perfección."
               data-trailer="https://www.youtube.com/embed/f3DdaIDu05I?si=kVI1vdRH9C0K5g6k">
          <div class="overlay">Ver más</div>
        </div>
        <div class="meta">
          <h3>Compañera perfecta</h3>
          <p>Josh e Iris parecen la pareja ideal, hasta que un incidente mortal revela que Iris es una androide creada para satisfacer a Josh</p>
        </div>
      </article>

      <!-- Película 9 -->
      <article class="movie card">
        <div class="img-container">
          <img src="images/pelicula9.jpg" alt="Destino final: Lazos de sangre"
               data-title="Destino final: Lazos de sangre"
               data-desc="La estudiante universitaria Stefani Reyes empieza a sufrir pesadillas violentas sobre un derrumbe fatal que no vivió, sino que pertenece a su abuela Iris Campbell. Cuando Stefani regresa a casa en busca de respuestas, 
               descubre que hace décadas Iris tuvo una premonición y salvó a muchos, alterando el orden natural. Pero ahora la muerte —una fuerza implacable— persigue no solo a los que sobrevivieron, sino también a sus descendientes, porque nadie escapa de su destino. 
               Entre reacciones en cadena que convierten objetos cotidianos en trampas mortales, la familia debe unirse para desafiar el ciclo letal o sucumbir al nexo oscuro que los une. La película mezcla terror sobrenatural, suspenso familiar y muertes creativas, 
               explorando cómo el pasado y la sangre pueden volverse la trampa más mortal."
               data-trailer="https://www.youtube.com/embed/8FudANSsWNQ?si=aGDyc3_l1phnkgt7">
          <div class="overlay">Ver más</div>
        </div>
        <div class="meta">
          <h3>Destino final: Lazos de sangre</h3>
          <p>Una joven comienza a tener visiones de un trágico accidente y descubre que su familia está marcada por una maldición mortal.</p>
        </div>
      </article>

    </section>
  </main>
</div>

<!-- Modal -->
<div id="movieModal" class="modal">
  <div class="modal-content">
  <span class="close">&times;</span>
  <h2 id="modalTitle"></h2>
  <p id="modalDesc"></p>
  <div class="video-container">
    <iframe id="modalTrailer" width="560" height="315" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
  </div>
</div>

<script>
const modal = document.getElementById("movieModal");
const modalTitle = document.getElementById("modalTitle");
const modalDesc = document.getElementById("modalDesc");
const modalTrailer = document.getElementById("modalTrailer");
const closeModal = document.querySelector(".modal .close");

document.querySelectorAll(".movie img").forEach(img => {
  img.addEventListener("click", () => {
    modalTitle.textContent = img.dataset.title;
    modalDesc.textContent = img.dataset.desc;
    modalTrailer.src = img.dataset.trailer;
    modal.style.display = "block";
  });
});

closeModal.addEventListener("click", () => {
  modal.style.display = "none";
  modalTrailer.src = ""; 
});

window.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.style.display = "none";
    modalTrailer.src = "";
  }
});

document.getElementById("logoutBtn").addEventListener("click", (e) => {
  e.preventDefault();
  const confirmLogout = confirm("¿Estás seguro de que deseas cerrar sesión?");
  if (confirmLogout) {
    window.location.href = "logout.php";
  }
});
</script>
</body>
</html>