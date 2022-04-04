<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeux2 - Cesisport</title>
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="../../css/jeux2.css">
</head>
<body>
    <?php require_once("../../php/menu-lvl2.php")?>   


    <h1>
      <h1>MEMORY</h1>
    </h1>

    <section class="main">
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>
      <div class="box play"></div>

      <div id="state">
        <span id="time">0</span>
        <span id="score">0</span>
      </div>
    </section>

    <footer>
      <p>
       footer ici 
      </p>
    </footer>

    <section id="pre" class="">
      <div id="themes">
        <h2>Choisie ton thème</h2>
        <p id="pokemon" class="themes" title="Pokemon">Pokemon</p>
        <p id="genshin" class="themes" title="genshin">Genshin Impact</p>
        <p id="lotr" class="themes" title="Lord of the Ring">Le seigneur des anneaux</p>
        <p id="disney" class="themes" title="Disney">Disney</p>
      </div>
    </section>

    <section id="post" class="hidden">
      <div>
        <h2>BRAVO !</h2>
        <p id="final"></p>
        <br />
        <p>
          <a id="again">Rejouer !</a>
        </p>
      </div>
    </section>

    <script src="../../js/jeux2.js"></script>
    <script src="../../js/menu.js"></script>
</body>
</html>