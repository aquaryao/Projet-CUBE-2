<?php
echo'
<header>
    <div class="header-bloc-gauche" class="header-bloc">
        <a href="../index.php">
            <img src="../../img/david-hd.jpg" alt="David HD">
        </a>
        <p>
            <a href="../index.php">Cesi-esport</a>
        </p>
        <div class="grid" id="grid">
            <p id="bouton">
                Menu
            </p>
            <p id="close" class="phone menu-side">
                X
            </p>
            <p>
                <a href="../index.php">
                    Cesi-esport
                </a>
            </p>
            <p id="recherche" class="phone menu-side">
                <a href="../compte.php">
                    O
                </a>
            </p>
        </div>
    </div>
    <div class="header-bloc-droite" class="header-bloc">
        <nav>
            <p>
                <a href="../jeux.php">
                    Jeux
                </a>
            </p>
            <p>
                <a href="../jeux.php?type=solo">
                    Solo
                </a>
            </p>
            <p>
                <a href="../jeux.php?type=multijoueurs">
                    Multijoueurs
                </a>
            </p>';
            if ($_SESSION['connecte'] != 'oui') {
                echo'
                <p>
                    <a href="../forum.php">
                        Forum
                    </a>
                </p>
                ';
            }
            echo '
        </nav>
        <a href="../connexion.php">
            <img src="../../img/david.jpg" alt="David LD">
        </a>
    </div>
</header>
';

//NOTE :
//Je sais pus trop pourquoi cette page existe mais on va la garde au cas où ça sert plus tard