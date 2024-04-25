<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="images/icon.png"/>
    <title>Movies and series</title>
</head>

<body>
    <header>
            <div class="presentTop">
                <button type="button" class="menu" name="navbutton" value="openMenu">
                   <div class="logoMenu">
                        <div class="ligne"></div>
                        <div class="ligne"></div>
                        <div class="ligne"></div>
                   </div>
                </button>
                <img src="images/icon.png" alt="icon Cinéma classement" class="logo">
            </div>

            <ul class="menuList">
                <a href="index.php">
                    <li class="premierLi">HOME</li>
                </a>
                <a href="Film.php">
                    <li>MOVIES AND SERIES</li>
                </a>
                <a href="VotreTierlist.php">
                    <li>YOUR TIERLIST</li>
                </a>
                <a href="VotreTierlist.php#footer">
                    <li>ABOUT ME</li>
                </a>
            </ul>

    </header>
    <main>
    <?php
              include 'data/FonctionFilm.php';
              $film = liste_film();
              echo '<section class="Film">';
              echo'<div class="presentMovies">';
              echo'<h1>Movies</h1>';
              echo "<h2>Here is a list of movies you can add to your tierlist. If you have recommendations for new movies you'd like to see added, let me know.</h2>";
              echo '<hr>';
              echo '</div>';
              foreach($film as $movieId => $movie){
                  if($movie['Type']== "movie") {
                      echo '<div class="FilmDiv">';
                      echo '<img src="'.$movie["Poster"].'" alt="Poster '.$movie["Title"].'" title="Poster '.$movie["Title"].'">';
                      echo '<div class="blocfilm">';
                      echo '<div class="Filmdetail">';
                      echo '<div class="TitreDate">';
                      echo "<h2>" . ucfirst($movie["Title"]) . '</h2>';
                      echo '<h2 class="textRed">' .$movie["Year"]. '</h2>';
                      echo '</div>';
                      echo '<p class="histoire">' . $movie["Plot"] . '</p>';
                      $genres = explode(", ", $movie["Genre"]);
                      if (count($genres) > 1) {
                          echo "<p> Genres </p>";
                      }
                      else {
                          echo "<p> Genre </p>";
                      }
                      echo '<p class="textRed">'.$movie["Genre"].'</p>';
      
                      $writer = explode(",", $movie["Writer"]);
                      if (count($writer) > 1) {
                          echo "<p> Writers </p>";
                      }
                      else{
                          echo "<p> Writer </p>";
                      }
                      
                      echo '<p class="textRed">'.$movie["Writer"]."</p>";


                      echo '</div>';
                      echo '<form method="post" action="VotreTierlist.php">';
                      echo '<input type="hidden" name="action" value="add">';
                      echo '<input type="hidden" name="movie_id" value="' . $movieId . '">';
                      echo '<button type="submit" class="ajouter" name="add_movie">';
                      echo '<span>Add to your Tierlist</span>';
                      echo '<hr>';
                      echo '<svg fill="#000000" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45.402 45.402" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141 c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27 c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435 c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z"></path> </g> </g></svg>';
                      echo '</button>';
                      echo '</form>';

                      echo '</div>';
                      echo '</div>';
                      echo '<hr>';
      
                  }
              }
              echo '</section>';

        ?>
    <?php 
        $film = liste_film();
        echo '<section class="Film">';
        echo'<div class="presentMovies">';
        echo'<h1>Series</h1>';
        echo "<h2>Here is a list of series you can add to your tierlist. If you have recommendations for new series you'd like to see added, let me know.</h2>";
        echo'<hr>';
        echo '</div>';
        foreach($film as $serieId => $serie){
            if($serie['Type']== "series") {
                echo '<div class="FilmDiv">';
                echo '<img src="'.$serie["Poster"].'" alt="Poster '.$serie["Title"].'" title="Poster '.$serie["Title"].'">';
                echo '<div class="blocfilm">';
                echo '<div class="Filmdetail">';
                echo '<div class="TitreDate">';
                echo "<h2>" . ucfirst($serie["Title"]) . '</h2>';
                echo '<h2 class="textRed">' .$serie["Year"]. '</h2>';
                echo '</div>';
                echo '<p class="histoire">' . $serie["Plot"] . '</p>';
                $genres = explode(", ", $serie["Genre"]);
                if (count($genres) > 1) {
                    echo "<p> Genres </p>";
                }
                else {
                    echo "<p> Genre </p>";
                }
                echo '<p class="textRed">'.$serie["Genre"].'</p>';

                $writer = explode(",", $serie["Writer"]);
                if (count($writer) > 1) {
                    echo "<p> Writers </p>";
                }
                else{
                    echo "<p> Writer </p>";
                }
 
                echo '<p class="textRed">'.$serie["Writer"]."</p>";
                echo '</div>';

                echo '<form method="post" action="VotreTierlist.php">';
                echo '<input type="hidden" name="action" value="add">';
                echo '<input type="hidden" name="movie_id" value="'. $serieId .'">';
                echo '<button type="submit" class="ajouter" name="add_movie">';
                echo '<span>Add to your Tierlist</span>';
                echo '<hr>';
                echo '<svg fill="#000000" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45.402 45.402" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141 c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27 c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435 c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z"></path> </g> </g></svg>';
                echo '</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '<hr>';

            }
        }
        echo '</section>';
?>
    </main>
<footer id="footer">
    <img src="images/icon.png" class="logo" alt="icon site">
    <div class="separation">
        <hr>
        <h2>POUR ME CONTACTER</h2>
        <hr>
    </div>
    <div class="contact">
            <a href="https://www.linkedin.com/in/camille-drean-3a0a78279/" target="_blank"><svg class="logocontact"
                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="#ffffff">
                    <path
                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248c-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586c.173-.431.568-.878 1.232-.878c.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252c-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z" />
                </svg>Linkedin</a>
            <a href="mailto:camille.drean@etudiant.univ-rennes1.fr?subject=Demande%20d'information" target="_blank"><svg
                    class="logocontact" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32" fill="#ffffff">
                    <path
                        d="M32 6v20c0 1.135-.865 2-2 2h-2V9.849l-12 8.62l-12-8.62V28H2c-1.135 0-2-.865-2-2V6c0-.568.214-1.068.573-1.422A1.973 1.973 0 0 1 2 4h.667L16 13.667L29.333 4H30c.568 0 1.068.214 1.427.578c.359.354.573.854.573 1.422" />
                </svg>Mail</a>
            <a href="https://github.com/CamilleDreann" target="_blank"><svg class="logocontact" xmlns="http://www.w3.org/2000/svg" fill="#ffffff"
                    width="1em" height="1em" viewBox="0 0 24 24">
                    <path
                        d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33c.85 0 1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2" />
                </svg>GitHub</a>
        </div>
    <p>Copyright © 2024 Camille Drean. Tous droits réservés.</p>
</footer>
</body>

<script src="https://unpkg.com/scrollreveal"></script>
<script>

/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* ------------------------------------------------------------------------Animation et gestion bouton menu -----------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    var boutonMenu = document.querySelector(".menu");
    var menuList = document.querySelector(".menuList");
    var icon = document.querySelector(".logo");
    var presentTop = document.querySelector(".presentTop");
    var body = document.querySelector("body");

    boutonMenu.addEventListener("click", (event) => {
        boutonMenu.classList.toggle('active');
        if (boutonMenu.classList.contains('active')) {
            menuList.style.display = 'block';
            icon.style.display = 'none';
            presentTop.style.background = 'var(--main-color)';
            body.style.overflow = 'hidden';
        } else {
            menuList.style.display = 'none';
            icon.style.display = 'block';
            presentTop.style.background = 'transparent';
            body.style.overflow = '';
        }
    });

    ScrollReveal({
            reset: true,
            distance: '30px',
            duration: '1500',
        });

        const sr = ScrollReveal();
        sr.reveal('.FilmDiv', { origin: 'top' })
        sr.reveal('.presentMovies', { origin: 'left' })
        
</script>


</html>