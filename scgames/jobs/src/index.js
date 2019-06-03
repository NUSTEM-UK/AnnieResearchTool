const artyom = new Artyom();
var numCards = 0;
var canPlay = false;

artyom.initialize({
    lang:"en-GB",
	debug: false
})

//Load all careers in careers table
$.ajax({
  type: "post",
  url: "https://nustem.uk/r/scgames/jobs/getcareers.php",
  success: function(data){
  console.log(data);
  var cardtext = data.split("%").reverse();
  numCards = cardtext.length - 1;
  
  cardtext.forEach(function(card) {
    card = card.split(",");
    console.log(card);
    if(card[0]){
    let div = document.createElement("div");
    div.classList.add("drag-drop1");
    div.id = card[0];
    div.innerHTML = card[1];

    document.querySelector("#start-dropzone").appendChild(div);
    }
  });
  }
});

// enable draggables to be dropped into this
interact(".dropzone").dropzone({
  // Require a 75% element overlap for a drop to be possible
  overlap: 0.5,

  // listen for drop related events:

  ondropactivate: function(event) {
    // add active dropzone feedback
    event.target.classList.add("drop-active");
  },
  ondragenter: function(event) {
    var draggableElement = event.relatedTarget,
      dropzoneElement = event.target;

    // feedback the possibility of a drop
    dropzoneElement.classList.add("drop-target");
    draggableElement.classList.add("can-drop");
    draggableElement.classList.add(dropzoneElement.id);
	
	if(dropzoneElement.id == "playsound-dropzone") {
		cardSpeak(event);
	}
  },
  ondragleave: function(event) {
    // remove the drop feedback style
    event.target.classList.remove("drop-target");
    event.relatedTarget.classList.remove("can-drop");
    event.relatedTarget.classList.remove(event.target.id);
  },
  ondropdeactivate: function(event) {
    // remove active dropzone feedback
    event.target.classList.remove("drop-active");
    event.target.classList.remove("drop-target");
  }
});

interact(".drag-drop1").draggable({
  inertia: true,
  restrict: {
    restriction: "#dropboxes1",
    endOnly: true,
    elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
  },
  autoScroll: true,
  // dragMoveListener from the dragging demo above
  onmove: dragMoveListener
});

interact(".drag-drop2").draggable({
  inertia: true,
  restrict: {
    restriction: "#dropboxes2",
    endOnly: true,
    elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
  },
  autoScroll: true,
  // dragMoveListener from the dragging demo above
  onmove: dragMoveListener
});

function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

//Play card name
function cardSpeak(event) {
	if (canPlay){
	var eventCardText = event.relatedTarget.id;
	artyom.say(eventCardText);
	}
}

function dragMoveListener(event) {
  var target = event.target,
    // keep the dragged position in the data-x/data-y attributes
    x = (parseFloat(target.getAttribute("data-x")) || 0) + event.dx,
    y = (parseFloat(target.getAttribute("data-y")) || 0) + event.dy;

  // translate the element
  target.style.webkitTransform = target.style.transform =
    "translate(" + x + "px, " + y + "px)";

  // update the position attributes
  target.setAttribute("data-x", x);
  target.setAttribute("data-y", y);
}

function allowSpeech () {
	if (canPlay){
		$('#sound').attr("src","img/NoSpeaker.png");
		speechSynthesis.speak(new SpeechSynthesisUtterance('Goodbye'));
		canPlay = false;
	} else {
		$('#sound').attr("src","img/Speaker.png");
		speechSynthesis.speak(new SpeechSynthesisUtterance('Hello'));
		canPlay = true;
	}
}

$(".close-overlay").click(function() {
  document.querySelector("#overlay-wrapper").style.display = "none";
});

//JQuery function call on click of next button to create second tab
$("#next").click(function() {
  //Get all sorted elements
  let knownEl = document.querySelectorAll("#dropboxes1 .known-dropzone");
  let unknownEl = document.querySelectorAll("#dropboxes1 .unknown-dropzone");
  
  //Ensure there is the full ammount of elements
  if ((knownEl.length+unknownEl.length) == numCards) {
	  let known = [];
	  knownEl.forEach(function(element) {
		known.push(element.id);
	  });
	  knownEl.forEach(function(card) {
		let div = document.createElement("div");
		div.classList.add("drag-drop2");
		div.id = card.id;
		div.innerHTML = card.innerHTML;

		document.querySelector("#knownstart-dropzone").appendChild(div);
	  });
  
	  document.querySelector("#dropboxes1").style.display = "none";
	  document.querySelector("#dropboxes2").style.display = "flex";
	  document.querySelector("#next").style.display = "none";
	  document.querySelector("#finish").style.display = "block";
	  document.querySelector(".page1").style.display = "none";
	  document.querySelector(".page2").style.display = "block";
      document.querySelector("#overlay-wrapper").style.display = "block";
  } else {
	  window.alert("Make sure to put everything in a box");
  }
});

//JQuery function call on click of finish button to insert data and move to next page
$("#finish").click(function() {
  let unknownEl = document.querySelectorAll("#dropboxes1 .unknown-dropzone");
  let likedEl = document.querySelectorAll("#dropboxes2 .liked-dropzone");
  let dislikedEl = document.querySelectorAll("#dropboxes2 .disliked-dropzone");
  let uncertainEl = document.querySelectorAll("#dropboxes2 .uncertain-dropzone");

  let fnameId = $("#hidden-data .fname").val();
  let snameId = $("#hidden-data .lname").val();
  let bdayId = $("#hidden-data .bday").val();
  let bmonthId = $("#hidden-data .bmonth").val();
  let schoolId = $("#hidden-data .school").val();

  fnameId = pad((fnameId.substring(0, 1).toLowerCase().charCodeAt(0)-97), 2);
  snameId = pad((snameId.substring(0, 1).toLowerCase().charCodeAt(0)-97), 2);
  bdayId = pad(bdayId, 2);
  bmonthId = pad(bmonthId, 2);
  schoolId = pad(schoolId, 4);

  //Create ID
  let id = fnameId+snameId+bdayId+bmonthId+schoolId;

  //If number of cards is correct insert data and link to next page
  if ((unknownEl.length+likedEl.length+dislikedEl.length+uncertainEl.length) == numCards) {
	  let unknown = [];
	  let liked = [];
	  let disliked = [];
	  let uncertain = [];

	  unknownEl.forEach(function(element) {
		unknown.push(element.id);
	  });
	  likedEl.forEach(function(element) {
		liked.push(element.id);
	  });
	  dislikedEl.forEach(function(element) {
		disliked.push(element.id);
	  });
	  uncertainEl.forEach(function(element) {
		uncertain.push(element.id);
	  });

	  document.querySelector("#dropboxes2").style.display = "none";
	  document.querySelector("#footer").style.display = "none";

    //Create data array
	  let data = {
	  	id: id,
  		unknowncards: unknown.toString(),
  		likedcards: liked.toString(),
  		dislikedcards: disliked.toString(),
  		uncertain: uncertain.toString()
	  };
	  
    //AJAX request to insert, on success links to next
	  $.ajax({
		data: data,
		type: "post",
		url: "https://nustem.uk/r/scgames/jobs/request.php",
		success: function(data){
      if (data){
        window.alert(data);
      }
      else {
        window.location.replace("https://nustem.uk/r/scgames/mesci");
      }
		}
	  });
  } else {
	   window.alert("Make sure to put everything in a box");
  }
});
