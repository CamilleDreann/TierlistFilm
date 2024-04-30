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
    <title>HOME</title>
</head>

<body>
    <header class="Accueil">
        <div class="presentTop">
            <button type="button" class="menu" name="navbutton" value="openMenu">
               <div class="logoMenu">
                    <div class="ligne"></div>
                    <div class="ligne"></div>
                    <div class="ligne"></div>
               </div>
            </button>
            <img src="images/icon.png" alt="icon site" class="logo">
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
                <a href="AboutMe.html">
                    <li>ABOUT ME</li>
                </a>
            </ul>
            
        <div class="description">
            <div class="carteFilm">
            <?php 
            include 'data/FonctionFilm.php';
            $rand = rand(1,16);
            $filmAccueil = get_film_by_id($rand);
            $maxImages = count($filmAccueil["Images"]) - 1;
            $randImages = rand(0,$maxImages);

                echo '<img src="' . $filmAccueil["Images"][$randImages] . '" alt="' . $filmAccueil["Title"] . '" title="' . $filmAccueil["Title"] . '">';
                echo'<div class="textCart">';
                echo '<h2 class="textRed">Have you seen '.$filmAccueil["Title"].'?</h2>';
                echo "<p>Maybe it's time to add this ".$filmAccueil["Type"]." to the tier list.</p>";

                echo '<form method="post" action="VotreTierlist.php">';
                echo '<input type="hidden" name="action" value="add">';
                echo '<input type="hidden" name="movie_id" value="' . $rand . '">';
                echo '<button type="submit" class="ajouter" name="add_movie">';
                echo '<span>Add to your Tierlist</span>';
                echo '<hr>';
                echo '<svg fill="#000000" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 45.402 45.402" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M41.267,18.557H26.832V4.134C26.832,1.851,24.99,0,22.707,0c-2.283,0-4.124,1.851-4.124,4.135v14.432H4.141 c-2.283,0-4.139,1.851-4.138,4.135c-0.001,1.141,0.46,2.187,1.207,2.934c0.748,0.749,1.78,1.222,2.92,1.222h14.453V41.27 c0,1.142,0.453,2.176,1.201,2.922c0.748,0.748,1.777,1.211,2.919,1.211c2.282,0,4.129-1.851,4.129-4.133V26.857h14.435 c2.283,0,4.134-1.867,4.133-4.15C45.399,20.425,43.548,18.557,41.267,18.557z"></path> </g> </g></svg>';
                echo '</button>';
                echo '</form>';

                echo'</div>';
            ?>
            </div>
            <div class="divAccueil">
                <h1 class="textAccueil">WELCOME</h1>
                <hr>
                <h2>This website allows you to choose from a list of your favorite movies and series and rank them.</h2>
                <hr>
            </div>
        </div>

    </header>



</body>
<script>
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* ------------------------------------------------------------------------Animation et gestion bouton menu -----------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    var boutonMenu = document.querySelector(".menu");
    var menuList = document.querySelector(".menuList");
    var icon = document.querySelector(".logo");
    var presentTop = document.querySelector(".presentTop");
    var description = document.querySelector(".description");
    var body = document.querySelector("body");
    
    boutonMenu.addEventListener("click", (event) => {
        boutonMenu.classList.toggle('active');
        if (boutonMenu.classList.contains('active')) {
            menuList.style.display = 'block';
            icon.style.display = 'none';
            presentTop.style.background = 'var(--main-color)';
            body.style.overflow = 'hidden';
            description.style.display ='none';
        } else {
            menuList.style.display = 'none';
            icon.style.display = 'block';
            presentTop.style.background = 'transparent';
            body.style.overflow = '';
            description.style.display ='flex';
        }
    });
</script>

</html>