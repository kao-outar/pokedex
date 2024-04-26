<?php include_once 'includes/header.php'; ?>
<link rel="stylesheet" href="./css/landing.css">

<div class="button-container">
    <button id="left-btn"><i class="fa fa-caret-left"></i></button>
    <?php
    $totalPokemon = 898; // Nombre total de Pokémon dans lapi
    $pokemonPerPage = 24; // le nombre par page
    $totalPages = ceil($totalPokemon / $pokemonPerPage);
    
    // Détermination de la page actuelle
    $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
    
    // Détermination du nombre de pages à afficher dans la pagination pour eviter d'avoir trop d'informations
    $maxPagesToShow = 8;
    $startPage = max(1, min($totalPages - $maxPagesToShow + 1, $currentPage - floor($maxPagesToShow / 2)));
    $endPage = min($startPage + $maxPagesToShow - 1, $totalPages);
    
    // Affichage des boutons de pagination
    if ($startPage > 1) {
        echo "<div class='pagination'><a href='?page=1'>1</a></div>";
        echo "<span>...</span>";
    }
    for ($i = $startPage; $i <= $endPage; $i++) {
        echo "<div class='pagination" . ($i === $currentPage ? " current-page" : "") . "'><a href='?page=$i'>$i</a></div>";
    }
    if ($endPage < $totalPages) {
        echo "<span>...</span>";
        echo "<div class='pagination'><a href='?page=$totalPages'>$totalPages</a></div>";
    }
    ?>
    <button id="right-btn"><i class="fa fa-caret-right"></i></button>
</div>

<div class="pokemon-container">
    <?php
    // Calcul de l'index de départ pour la pagination
    $startIndex = ($currentPage - 1) * $pokemonPerPage;

    // Requête à l'API pour récupérer les Pokémon de la page actuelle
    $response = file_get_contents("https://pokeapi.co/api/v2/pokemon?limit=$pokemonPerPage&offset=$startIndex");
    $data = json_decode($response);

    // Affichage des Pokémon
    foreach ($data->results as $pokemon) {
        $pokemonResponse = file_get_contents($pokemon->url);
        $pokemonData = json_decode($pokemonResponse);
        
        $pokemonName = $pokemonData->name;
        $pokemonTypes = array_map(function ($type) {
            return $type->type->name;
        }, $pokemonData->types);
        $imageURL = $pokemonData->sprites->front_default;
        
        echo "
            <div class='pc-container'>
                <div class='pokemon-card'>
                    <div class='card_front'>
                        <img src='{$imageURL}'>
                        <h5 class='poke-id'>#{$pokemonData->id}</h5>
                        <h5 class='poke-name'>{$pokemonName}</h5>
                        <h5>" . implode(" / ", $pokemonTypes) . "</h5>
                    </div>
                    <div class='card_back'>
                        <p>Autres informations</p>
                        <!-- Ajoutez ici les autres informations que vous souhaitez afficher -->
                    </div>
                </div>
            </div>
        ";
    }
    ?>
</div>

<script>
    const pokemonCards = document.querySelectorAll('.pokemon-card');
    const leftBtn = document.getElementById('left-btn');
    const rightBtn = document.getElementById('right-btn');
    const pagination = document.querySelector('.button-container');

    let currentPage = <?php echo $currentPage; ?>;

    pagination.addEventListener('click', (e) => {
        if (e.target.matches('.pagination a')) {
            currentPage = parseInt(e.target.textContent);
            updatePage();
        }
    });

    leftBtn.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            updatePage();
        }
    });

    rightBtn.addEventListener('click', () => {
        if (currentPage < <?php echo $totalPages; ?>) {
            currentPage++;
            updatePage();
        }
    });

    function updatePage() {
        window.location.href = `?page=${currentPage}`;
    }
</script>

<?php include_once 'includes/footer.php'; ?>
