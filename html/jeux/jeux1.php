<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux1 - Cesisport</title>
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/jeux1.css">
</head>
<body>
    <?php require_once("../../php/menu-lvl2.php")?>   

    <h1>Jeux du démichateur  </h1>
        <h3>Le but du jeu est de découvrir la bombe, c'est-à-dire en cliquer sur la case qui la dissimulent. </h3>
  <div class="board">
    <div class="row" id="row-0">
      <div class="tile" id="tile-0-0" onclick="doClick('tile-0-0')"></div>
      <div class="tile" id="tile-0-1" onclick="doClick('tile-0-1')"></div>
      <div class="tile" id="tile-0-2" onclick="doClick('tile-0-2')"></div>
      <div class="tile" id="tile-0-3" onclick="doClick('tile-0-3')"></div>
    </div>
    <div class="row" id="row-1">
      <div class="tile" id="tile-1-0" onclick="doClick('tile-1-0')"></div>
      <div class="tile" id="tile-1-1" onclick="doClick('tile-1-1')"></div>
      <div class="tile" id="tile-1-2" onclick="doClick('tile-1-2')"></div>
      <div class="tile" id="tile-1-3" onclick="doClick('tile-1-3')"></div>
    </div>
    <div class="row" id="row-2">
      <div class="tile" id="tile-2-0" onclick="doClick('tile-2-0')"></div>
      <div class="tile" id="tile-2-1" onclick="doClick('tile-2-1')"></div>
      <div class="tile" id="tile-2-2" onclick="doClick('tile-2-2')"></div>
      <div class="tile" id="tile-2-3" onclick="doClick('tile-2-3')"></div>
    </div>
    <div class="row" id="row-3">
      <div class="tile" id="tile-3-0" onclick="doClick('tile-3-0')"></div>
      <div class="tile" id="tile-3-1" onclick="doClick('tile-3-1')"></div>
      <div class="tile" id="tile-3-2" onclick="doClick('tile-3-2')"></div>
      <div class="tile" id="tile-3-3" onclick="doClick('tile-3-3')"></div>
    </div>
  </div>
  
  <p id='tries'></p>


    <script src="../../js/menu.js"></script>
    <script src="../../js/jeux1.js"></script>
</body>
</html>