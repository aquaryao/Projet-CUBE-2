<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - O'cesEat</title>
    <link rel="stylesheet" href="../../Projet-CUBE-2/css/index.css">
    <link rel="stylesheet" href="../../Projet-CUBE-2/css/menu.css">
</head>
<body>
    <?php require_once("../php/menu.php")?>
    <main>
        <section id="carroussel">
            <div class="img-cote" id="gauche"></div>
            <img class="img-centre" src="../img/unknown.png" alt="Une image">
            <div class="img-cote" id="droite"></div>
        </section>
        <section id="liste-jeux">
            <h2>Tous nos jeux</h2>
            <div id="liste">
                
                <div id=jeux1>
                    <a href="jeux/jeux1.php">
                    <div>
                        <img id="imgjeux1" src="../../Projet-CUBE-2/img/chat.jpg">
                    </div>
                        <h3>Démichateur</h3>
                    </a>
                </div>

                <div id=jeux2>
                    <a href="jeux/jeux2.php">
                        <div>
                            <img id="imgjeux1" src="../../Projet-CUBE-2/img/memory.jpg">
                        </div>
                    </a>
                    <h3>Memory</h3>
                </div>

                <div id=jeux3>
                    <a href="jeux/jeux3.php">
                    <div>
                        <img id="imgjeux1" src="../../Projet-CUBE-2/img/morpion.png">
                    </div>
                        <h3>Morpion</h3>
                    </a>
                </div>

                <div id=jeux4>
                    <a href="jeux/jeux4.php">
                    <div>
                        <img id="imgjeux1" src="../../Projet-CUBE-2/img/tetris.png">
                    </div>
                        <h3>Tetris</h3>
                    </a>
                </div>
   
                <div id=jeux5>
                    <a href="https://ilan-lo.github.io/portfolio/horizontal-space-invaders-main/main.html">
                    <div>
                        <img id="imgjeux1" src="../../Projet-CUBE-2/img/ilan.PNG">
                    </div>
                        <h3>Space-invaders</h3>
                    </a>
                </div>

                <div id=jeux6>
                    <a href="https://qkryzzljekzele4jpr7w0g.on.drv.tw/JeuDuNombre/JeuDuNombre2/">
                    <div>
                        <img id="imgjeux1" src="../../Projet-CUBE-2/img/loan.png">
                    </div>
                        <h3>Jeu du nombre</h3>
                    </a>
                </div>

                <div id=jeux7>
                    <a href="https://mastermind.joachim-b.repl.co/">
                    <div>
                        <img id="imgjeux1" src="../../Projet-CUBE-2/img/jo.png">
                    </div>
                        <h3>Mastermind</h3>
                    </a>
                </div>

                <div id=jeux8>
                    <a href="https://qkryzzljekzele4jpr7w0g.on.drv.tw/DavidClicker3/Clicker/">
                    <div>
                        <img id="imgjeux1" src="../../Projet-CUBE-2/img/loan2.png">
                    </div>
                        <h3>David clicker</h3>
                    </a>
                </div>

                <div id=jeux9>
                    <a href="https://bataille-navale.joachim-b.repl.co/">
                    <div>
                        <img id="imgjeux1" src="../../Projet-CUBE-2/img/bataille.png">
                    </div>
                        <h3>Bataille navale</h3>
                    </a>
                </div>

            </div>
        </section>
    <main>
        <?php require_once("../php/footer.php")?>
            <script src="../js/menu.js"></script>
            <script src="../js/carroussel.js"></script>
</body>
</html>


                            