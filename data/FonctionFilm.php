<?php

function get_film_by_id($filmID){
    $file_content = file_get_contents("data/"."Film.JSON");
    $json_data = json_decode($file_content, true);
    if (array_key_exists($filmID, $json_data)){
        $film = $json_data[$filmID];
    }
    return $film;
}

function liste_film(){
    $file_content = file_get_contents("data/"."Film.JSON");
    return json_decode($file_content, true);
}

function list_selected_film(){
    $file_content = file_get_contents("data/"."FilmTierlist.json");
    return json_decode($file_content, true);
}



function add_film_to_Tierlist($filmID){
    $file_content = file_get_contents("data/"."FilmTierlist.json");
    $json_data = json_decode($file_content, true);

    foreach ($json_data as $association) {
        if ($association["movie_id"] == $filmID) {
            echo "<h3> Ce film est déjà dans la Tierlist.</h3>";
            return;
        }
    }
    $new_association["association_id"] = uniqid();
    $new_association["movie_id"] = $filmID;
    array_push($json_data, $new_association);

    $new_file_content = json_encode($json_data);
    file_put_contents("data/"."FilmTierlist.json", $new_file_content);
}


function delete_all_films_from_Tierlist(){
    $new_file_content = json_encode([]);
    file_put_contents("data/"."FilmTierlist.json", $new_file_content);
}

?>

