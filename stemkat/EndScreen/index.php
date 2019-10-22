<html>
  <head>
    <title>You're Done!</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="img/NUSTEMSQR.jpg"/>
    <?php
      // Resets session data so next itteration does not get contaminated
      session_start();
      $_SESSION = array();
      session_destroy();
    ?>
  </head>

  <body>
    <div id="end-screen">
		<h1>You're Done!</h1>
		<p>That’s the end. We hope you have enjoyed playing. </p>
		<a id="end" href="https://nustem.uk/r/stemkat/">return to start</a>
	</div>
	
    <script src="https://cdn.jsdelivr.net/npm/interactjs@1.3.4/dist/interact.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
</html>

