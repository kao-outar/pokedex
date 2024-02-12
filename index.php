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

        <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/versions/generation-v/black-white/animated/shiny/female/25.gif" alt="pokemon" class="pokemon">
        <form class="form">
      <input
        type="search" class="search" placeholder="Nom ou Numéro" required/></form>
        <div class="big_green_box">
            <h1 class="pokemon_name">Pikachu</h1>
        </div>
        <div class="big_black_box">
            <h1 class="pokemon_power">25</h1>
        </div>
        <div class="buttons">
            <button class="button_prev">Précédant</button>
            <button class="button_next">Suivant</button>
        </div>
    </main>
</body>
</html>