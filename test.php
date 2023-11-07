<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Memory</title>

    <link
      rel="stylesheet"
      href="styles.css" />
    <script
      src="script.js"
      defer></script>
  </head>

  <body>
    <div class="game">
      <div class="controls">
        <button>Début</button>
        <div class="stats">
          <div class="moves">0 mouvement</div>
          <div class="timer">time: 0 sec</div>
        </div>
      </div>
      <div class="board-container">
        <div class="board" data-dimension="4"></div>
        <div class="win">Tu as gagné!</div>
      </div>
    </div>
  </body>
</html>