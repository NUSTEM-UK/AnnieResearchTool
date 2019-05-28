<!DOCTYPE html>
<html>
  <head>
    <title>STEM Knowledge and Aspirations</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  </head>

  <body>

    <div id="app">
      <div id="dropboxes1">
        <div id="unknown-dropzone" class="dropzone"><p>Jobs I don't know</p></div>
        <div id="start-dropzone" class="dropzone"><p>Start</p></div>
        <div id="known-dropzone" class="dropzone"><p>Jobs I know</p></div>
      </div>

      <div id="dropboxes2">
        <div id="liked-dropzone" class="dropzone"><p>Would like to do</p></div>
    		<div id="double">
    			<div id="knownstart-dropzone" class="dropzone"><p>Jobs I know</p></div>
    			<div id="uncertain-dropzone" class="dropzone"><p>Not sure</p></div>
    		</div>
        <div id="disliked-dropzone" class="dropzone"><p>Would not like to do</p></div>
      </div>

      <div id="footer">
    		<div id="logos">
    			<img id="logo" src="img/NUSTEM.png"/>
    		</div>
    	  
    		<div id="playsound-dropzone" id="dropboxes2" class="dropzone">
    			<button type="submit" onclick="allowSpeech()"><img id="sound" src="img/NoSpeaker.png"/></button>
    		</div>
    		
    		<div id="buttons">
    			<button type="submit" id="next">Next...</button>
    			<button type="submit" id="finish">Finished</button>
    		</div>
      </div>
    </div>

    <div id="overlay-wrapper">
      <div class="overlay page1">
        <h1>Instructions</h1>
        <p>This is an interactive sorting game where children sort 30 jobs, firstly into whether they know the job or not and secondly into whether they would like to do the job in the future or not.</p>
        <p>Which of these jobs do you know? Drag and drop all the jobs from the start box into either the ‘jobs I know’ or ‘jobs I don’t know’ box.</p>
        <p>Drag a job into the sound box to hear this word read aloud.</p>
        <button type="submit" class="close-overlay">OK</button>
      </div>

      <div class="overlay page2">
        <h1>Instructions</h1>
        <p>Which of these jobs would you like to do when your older? Drag and drop all the jobs from the ‘jobs I know’ box into either ‘would like to do’ ‘would not like to do’ or ‘not sure’ boxes.</p>
        <p>Drag a job into the sound box below to hear the job word read aloud.</p>
        <button type="submit" class="close-overlay">OK</button>
      </div>
    </div>
	
    <script src="https://cdn.jsdelivr.net/npm/interactjs@1.3.4/dist/interact.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="src/artyom.window.min.js"></script>
    <script src="src/index.js"></script>

  </body>
</html>
