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
    <title>Your Tierlist</title>
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
                <a href="AboutMe.html">
                    <li>ABOUT ME</li>
                </a>
            </ul>

    </header>
    <main>
    
        <?php
            include 'data/FonctionFilm.php';
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $movieId = $_POST['movie_id'];
                $association_id= $_POST['association_id'];
                if (isset($_POST['add_movie'])) {
                    add_film_to_Tierlist($movieId);
                } elseif(isset($_POST['remove_all_films'])){
                    delete_all_films_from_Tierlist();
                }


                header('Location: VotreTierlist.php');
                exit();
            }

        ?>
                        <div class="presentMovies">
                            <h1>Welcome to your Tierlist</h1>
                            <h2>Here are your selected movies that you can drag into different categories. You can click on the different categories and change their names to make them more specific.</h2>
                            <hr>
                        </div>

                    <section class="tierlist">
                        <div class="ligneTierlist">
                            <div contenteditable="true" class="categorie max" id="categorie1">Enter the text ...</div>
                            <div class="emplacementFilm" ondrop="drop(event)" ondragover="allowDrop(event)" id="emplacementFilm1" ></div>
                        </div>
                        <div class="ligneTierlist">
                            <div contenteditable="true" class="categorie top" id="categorie2">Enter the text ...</div>
                            <div class="emplacementFilm" ondrop="drop(event)" ondragover="allowDrop(event)" id="emplacementFilm2"></div>
                        </div>
                        <div class="ligneTierlist">  
                            <div contenteditable="true" class="categorie mid" id="categorie3">Enter the text ...</div>
                            <div class="emplacementFilm" ondrop="drop(event)" ondragover="allowDrop(event)" id="emplacementFilm3"></div>
                        </div>
                        <div class="ligneTierlist">
                            <div contenteditable="true" class="categorie bot" id="categorie4">Enter the text ...</div>
                            <div class="emplacementFilm" ondrop="drop(event)" ondragover="allowDrop(event)" id="emplacementFilm4"></div>
                        </div>
                        <div class="ligneTierlist">
                            <div contenteditable="true" class="categorie min" id="categorie5">Enter the text ...</div>
                            <div class="emplacementFilm" ondrop="drop(event)" ondragover="allowDrop(event)" id="emplacementFilm5"></div>
                        </div>
                    </section>
       
                    <form method="post" action="VotreTierlist.php" onsubmit="removeImage()">
                        <button type="submit" class="moins" name="remove_all_films">
                            <img src="images/poubelleFermer" alt="poubelle" title="poubelle">
                        </button>
                    </form>

            <section class="filmDepot"  ondrop="drop(event)" ondragover="allowDrop(event)">
            <?php 
                $film = list_selected_film();

                foreach($film as $movie){
                    $filmContent = get_film_by_id($movie["movie_id"]);
                    echo '<img id="'.$movie["movie_id"].'" class="imageFilm" src="'.$filmContent["Poster"].'" draggable="true" ondragstart="drag(event)" alt="Poster '.$filmContent["Title"].'" title="Poster'.$filmContent["Title"].'">';
                }
            ?>
            </section>
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

/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* --------------------------------------------------------------Option pour garder en mémoire le texte écris dans les catégorie -------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

document.querySelectorAll('.categorie').forEach(function(categorie) {
    var id = categorie.id;
    categorie.innerText = localStorage.getItem('savedText_' + id) || 'Enter the text ...';
});

document.querySelectorAll('.categorie').forEach(function(categorie) {
    var id = categorie.id;
    categorie.addEventListener('input', function() {
        localStorage.setItem('savedText_' + id, this.innerText);
    });
});

document.querySelectorAll('.imageFilm').forEach(function(imageFilm) {
    if (localStorage.getItem('f'+ imageFilm.id)) {
        var emplacementFilm = document.getElementById(localStorage.getItem('f'+ imageFilm.id));
        emplacementFilm.appendChild(imageFilm);
    }
});

function removeImage(){
    for (var i = 0; i < localStorage.length; i++){
        if (localStorage.key(i).substring(0,1) === "f") {
            localStorage.removeItem(localStorage.key(i));
        }
}
}
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
/* ----------------------------------------------------------------------------Option pour le drag and drop -----------------------------------------------------------------*/
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function adjustEmplacementFilmHeight() {
    var emplacementFilms = document.querySelectorAll(".emplacementFilm");
    var categories = document.querySelectorAll(".categorie");
    
    emplacementFilms.forEach(function(emplacementfilm, index) {
        var category = categories[index];

        if (emplacementfilm.childElementCount > 12) {
            emplacementfilm.style.height = 'auto';
            category.style.height = 'auto';
        } else {
            emplacementfilm.style.height = '150px';
            category.style.height = '150px';
        }
    });
}

adjustEmplacementFilmHeight();

function drop(ev) {
    ev.preventDefault();
    draggedElement = ev.target;
    var data = ev.dataTransfer.getData("text");
    
    if (draggedElement.classList.contains('imageFilm')) {
        return false;
    }
    if (draggedElement.classList.contains('categorie')) {
        return false;
    }
    ev.target.appendChild(document.getElementById(data));
    localStorage.setItem("f"+ data , ev.target.id);

    adjustEmplacementFilmHeight();
}
</script>


</html>