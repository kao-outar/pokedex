<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css">
    <title>Pokédex</title>
</head>
<body>
    <main>
        <img src="images/pokédex.png" alt="image pokédex" class="pokedex">

        <div class="pokemon_image">
            <img src="#" alt="pokemon" class="pokemon">
        </div>
       
           
        <form class="form">
      <input
        type="search" class="search" placeholder="Nom ou Numéro" required/></form>

        <div class="big_green_box">
            <h1 class="pokemon_name"></h1>
        </div>
        <div class="big_black_box">
            <h1 class="pokemon_number"></h1>
        </div>
        <div class="buttons">
            <button class="button_prev">Précédant</button>
            <button class="button_next">Suivant</button>
        </div>

        
    </main>
    <script src="js/script.js"></script>
</body>
</html>