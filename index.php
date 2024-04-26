<?php include_once 'includes/header.php'; ?>
<link rel="stylesheet" href="./css/style.css">

<body>
    <main>
        <img src="images/pokédex.png" alt="image pokédex" class="pokedex">

        <div class="pokemon_image">
            <img src="#" alt="pokemon" class="pokemon">
        </div>
       
        <form class="form" action="index.php" method="GET">
            <input type="search" class="search" placeholder="Nom ou Numéro" name="search" required/>
            <input type="submit" value="Rechercher" class="rechercher">
        </form>


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
    
<?php include_once 'includes/footer.php'; ?>
