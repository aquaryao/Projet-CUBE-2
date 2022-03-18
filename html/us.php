<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux - Cesisport</title>
    <link rel="stylesheet" href="../../Projet-CUBE-2/css/menu.css">
    <link rel="stylesheet" href="../../Projet-CUBE-2/css/index.css">
</head>
<body>
    <?php require_once("../php/menu.php")?> 

    <section id="liste-jeux">
            <h2>Tous nos jeux</h2>
            <div id="liste">
                <div id=jeux1>
                    <a href="jeux/jeux1.php">
                    <div>
                        <div class="phototeam" id="demichateur">
                            <div class="effet">Le but du jeu est de découvrir la bombe, c'est-à-dire en cliquer sur la case qui la dissimulent.</div>
                        </div>
                    </div>
                        <h3>Démichateur</h3>
                    </a>
                </div>
                <div id=jeux2>
                    <a href="jeux/jeux2.php">
                    <div>
                        <div class="phototeam" id="memory">
                            <div class="effet">Le but du jeu est de découvrir la bombe, c'est-à-dire en cliquer sur la case qui la dissimulent.</div>
                        </div>
                    </div>
                    
                        <h3>Memory</h3>

                    </a>
                </div>
                <div>
                    <a href="jeux/jeux3.php">
                        <h3>Titre 3</h3>
                        <p>Texte Texte Texte Texte Texte</p>
                    </a>
                </div>
                <div id=jeux4>
                    <a href="jeux/jeux4.php">
                    <div>
                        <div class="phototeam" id="memory">
                            <div class="effet">
                               Tetris met le joueur au défi de réaliser des lignes complètes en déplaçant des pièces de formes différentes.
                            </div>
                        </div>
                    </div>
                        <h3>Tetris</h3>

                    </a>
                </div>
        </section>
    <main>
    <?php require_once("../php/footer.php")?>
    <script src="../js/menu.js"></script>
</body>
</html>