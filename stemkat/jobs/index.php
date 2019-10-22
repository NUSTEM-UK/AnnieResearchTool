<!-- Job aspirations and knowledge tool -->

<!DOCTYPE html>
<html>
  <head>
    <title>STEM Knowledge and Aspirations</title>
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

    <!-- App to sort jobs -->
    <div id="app">
      <!-- First screen of app to divide between unknown and known -->
      <div id="dropboxes1">
        <div id="unknown-dropzone" class="dropzone"><p>Jobs I don't know</p></div>
        <div id="start-dropzone" class="dropzone"><p>Start</p></div>
        <div id="known-dropzone" class="dropzone"><p>Jobs I know</p></div>
      </div>

      <!-- Second screen of app to divide between liked and disliked -->
      <div id="dropboxes2">
        <div id="disliked-dropzone" class="dropzone"><p>Would not like to do</p></div>
    		<div id="double">
    			<div id="knownstart-dropzone" class="dropzone"><p>Jobs I know</p></div>
    			<div id="uncertain-dropzone" class="dropzone"><p>Not sure</p></div>
    		</div>
        <div id="liked-dropzone" class="dropzone"><p>Would like to do</p></div>
      </div>

      <div id="footer">
    		<div id="logos">
    			<img id="logo" src="img/NUSTEM.png"/>
    		</div>
    	  
        <!-- Div to use google TTS -->
    		<div id="playsound-dropzone" id="dropboxes2" class="dropzone">
    			<button type="submit" onclick="allowSpeech()"><img id="sound" src="img/NoSpeaker.png"/></button>
    		</div>
    		
    		<div id="buttons">
    			<button type="submit" id="next">Next...</button>
    			<button type="submit" id="finish">Finished</button>
    		</div>
      </div>
    </div>

    <!-- Instruction overlays -->
    <div id="overlay-wrapper">
      <div class="overlay page1">
        <h1>Instructions : Game 1</h1>
        <p>Which of these jobs do you know?</p>
        <p>Drag and drop all the jobs from the start box into either the ‘jobs I don’t know’ or ‘jobs I know’ box.</p>
        <p>Drag a job into the sound box below to hear this word read aloud.</p>
        <button type="submit" class="close-overlay">OK</button>
      </div>

      <div class="overlay page2">
        <h1>Instructions : Game 1</h1>
        <p>Which of these jobs would you like to do when your older?</p>
        <p>Drag and drop all the jobs from the ‘jobs I know’ box into either ‘would not like to do’, ‘would like to do’ or ‘not sure’ boxes. </p>
        <p>Drag a job into the sound box below to hear this word read aloud.</p>
        <button type="submit" class="close-overlay">OK</button>
      </div>
    </div>
	
    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/interactjs@1.3.4/dist/interact.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="src/artyom.window.min.js"></script>
    <script src="../src/shared.js"></script>
    <script src="src/index.js"></script>

  </body>
</html>
