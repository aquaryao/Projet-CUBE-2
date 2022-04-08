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
            </div>
        </section>
    <main>
    <?php require_once("../php/footer.php")?>
    <script src="../js/menu.js"></script>
</body>
</html>