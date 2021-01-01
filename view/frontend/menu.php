<nav id="menu" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="/tests/projet4serveur/P4_morvan_eva/P4_01_code/view/frontend/accueil.php">Jean Forteroche</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item">
                        <a class="nav-link" href="/tests/projet4serveur/P4_morvan_eva/P4_01_code/index.php?action=listChapters">Chapitres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tests/projet4serveur/P4_morvan_eva/P4_01_code/view/frontend/auteur.php">Auteur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="connexion" href="/tests/projet4serveur/P4_morvan_eva/P4_01_code/view/frontend/espaceMembresView.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin")
                         echo '<a class="nav-link" href="/tests/projet4serveur/P4_morvan_eva/P4_01_code/index.php?action=noticedComment">Administration</a>'
                        ?>
                    </li>
                </ul>
    
            </div>
        </nav>

        