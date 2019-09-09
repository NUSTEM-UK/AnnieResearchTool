<html>
  <head>
    <title>Most Like Me/Most Like a Scientist</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"/>
    <link rel="icon" type="image/png" href="img/NUSTEMSQR.jpg"/>
	<?php
      session_start();

      // Grab session data to use to create personal ID
      $fname = ($_SESSION["fname"] ?: NULL);
      $lname = ($_SESSION["lname"] ?: NULL);
      $bday = $_SESSION["bday"];
      $bmonth = $_SESSION["bmonth"];
      $school = ($_SESSION["school"] ?: NULL);

      // Sends back to begining if there is no session data
      if ($fname == NULL) {
        header("Location: https://nustem.uk/r/scgames/");
      }
    ?>
  </head>

  <body>

  	<!-- Location for session data for JS scripts to access -->
  	<form id="hidden-data">
      <input type="text" name="fname" class="fname" value=<?php echo "'".$fname."'"; ?>>
      <input type="text" name="lname" class="lname" value=<?php echo "'".$lname."'"; ?>>
      <input type="number" name="bday" class="bday" value=<?php echo "'".$bday."'"; ?>>
      <input type="number" name="bmonth" class="bmonth" value=<?php echo "'".$bmonth."'"; ?>>
      <input type="text" name="school" class="school" value=<?php echo "'".$school."'"; ?>>
    </form>
    
    <!-- App to compare expectations about yourself -->
    <div id="app" class="dropbox outside me">
    	<div id="playsound-dropzone" class="dropbox outside">
			<button type="submit" onclick="allowSpeech()"><img id="sound" src="img/NoSpeaker.png"/></button>
		</div>
    	
		<article id="diamond-cont" class="dropbox outside">
			<span id="row1" class="dropbox outside">
				<div class="dropbox inside" id="box1"><h2>Most like me</h2></div>
			</span>
			<span id="row2" class="dropbox outside">
				<div class="dropbox inside" id="box2"></div>
				<div class="dropbox inside" id="box3"></div>
			</span>
			<span id="row3" class="dropbox outside">
				<div class="dropbox inside" id="box4"></div>
				<div class="dropbox inside" id="box5"></div>
				<div class="dropbox inside" id="box6"></div>
			</span>
			<span id="row4" class="dropbox outside">
				<div class="dropbox inside" id="box7"></div>
				<div class="dropbox inside" id="box8"></div>
			</span>
			<span id="row5" class="dropbox outside">
				<div class="dropbox inside" id="box9"><h2>Least like me</h2></div>
			</span>
		</article>
		
		<div id="startbox">
		</div>

		<button type="submit" id="next">Next...</button>
	</div>

	<!-- App to compare expectations about scientists -->
	<div id="app2" class="dropbox2 outside sci">
		<div id="playsound-dropzone" class="dropbox2 outside">
			<button type="submit" onclick="allowSpeech()"><img id="sound" src="img/NoSpeaker.png"/></button>
		</div>

		<article id="diamond-cont" class="dropbox2 outside">
			<span id="row1" class="dropbox2 outside">
				<div class="dropbox2 inside" id="box1"><h2>Most like a scientist</h2></div>
			</span>
			<span id="row2" class="dropbox2 outside">
				<div class="dropbox2 inside" id="box2"></div>
				<div class="dropbox2 inside" id="box3"></div>
			</span>
			<span id="row3" class="dropbox2 outside">
				<div class="dropbox2 inside" id="box4"></div>
				<div class="dropbox2 inside" id="box5"></div>
				<div class="dropbox2 inside" id="box6"></div>
			</span>
			<span id="row4" class="dropbox2 outside">
				<div class="dropbox2 inside" id="box7"></div>
				<div class="dropbox2 inside" id="box8"></div>
			</span>
			<span id="row5" class="dropbox2 outside">
				<div class="dropbox2 inside" id="box9"><h2>Least like a scientist</h2></div>
			</span>
		</article>
		
		<div id="startbox">
		</div>

		<button type="submit" id="finish">Finish...</button>
	</div>

	<!-- Instruction overlays -->
	<div id="overlay-wrapper">
	    <div class="overlay page1">
	    	<h1>Instructions : Game 2</h1>
			<p>This is a ranking game all about attributes. Attributes are words you would use to describe someone.</p>
			<p>How would you describe yourself? Drag and drop each of the attributes from the box on the left into the diamond.</p>
			<p>Attributes which are the most like you go at the top, and ones which are least like you at the bottom.</p>
			<p>Drag an attribute into the sound box below to hear it read aloud.</p>
			<button type="submit" class="close-overlay">OK</button>
	    </div>

	    <div class="overlay page2">
	    	<h1>Instructions : Game 2</h1>
			<p>This time we would like you to think about how you would describe a scientist.</p>
			<p>Drag and drop each of the attributes from the box on the left into the diamond.</p>
			<p>Attributes which are the most like a scientist go at the top, and the ones which are least like a scientist at the bottom.</p>
			<p>Drag an attribute into the sound box below to hear it read aloud.</p>
			<button type="submit" class="close-overlay">OK</button>
	    </div>
    </div>
	
	<!-- JS Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/interactjs@1.3.4/dist/interact.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="src/artyom.window.min.js"></script>
    <script src="src/interaction.js"></script>
	<script src="../src/shared.js"></script>
    <script src="src/index.js"></script>
  </body>
</html>

