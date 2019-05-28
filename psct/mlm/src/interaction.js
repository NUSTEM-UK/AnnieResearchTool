const artyom = new Artyom();
var canPlay = false;

artyom.initialize({
    lang:"en-GB",
	debug: false
})

interact(".dropbox").dropzone({
    // Require a 50% element overlap for a drop to be possible
    overlap: 0.5,

    // listen for drop related events:

  ondropactivate: function(event) {
    // add active dropzone feedback
    event.relatedTarget.classList.add("drop-active");
  },
  ondragenter: function(event) {
    // feedback the possibility of a drop
    event.target.classList.add("drop-target");
    if (event.target.classList.contains("inside")) {
    	event.relatedTarget.classList.add(event.target.id);
    } else if (event.target.classList.contains("outside")) {
    	event.relatedTarget.classList.add("app");
    }

    if(event.target.id == "playsound-dropzone") {
		cardSpeak(event);
	}
  },
  ondragleave: function(event) {
    // remove the drop feedback style
    event.target.classList.remove("drop-target");
    if (event.target.classList.contains("inside")) {
    	event.relatedTarget.classList.remove(event.target.id);
    } else if (event.target.classList.contains("outside")) {
    	event.relatedTarget.classList.remove("app");
    }
  },
  ondropdeactivate: function(event) {
    // remove active dropzone feedback
    event.target.classList.remove("drop-target");
  },
  ondrop: function (event) {
	// feedback a drop	
    event.relatedTarget.classList.remove("drop-active");

	targetEl = event.target;
	draggedEl = event.relatedTarget;
	parentEl = $('#' + draggedEl.id).parent()[0];
	appEl = $('#' + draggedEl.id).closest('#app')
	
	if (targetEl.classList.contains("outside")) {
		console.log("outside");

		if(parentEl.id != "app"){

			var absoluteX = parseFloat(draggedEl.getAttribute("data-ax"));
			var absoluteY = parseFloat(draggedEl.getAttribute("data-ay"));
			draggedEl.setAttribute("data-x", absoluteX);
			draggedEl.setAttribute("data-y", absoluteY);

			draggedEl.style.webkitTransform = draggedEl.style.transform = "translate(" + absoluteX + "px, " + absoluteY + "px)";


			var x = parseFloat(draggedEl.getAttribute("data-x"));
			var y = parseFloat(draggedEl.getAttribute("data-y"));
		}
	  	appEl.append($('#' + draggedEl.id));
	} else if ( $('#' + targetEl.id).children(".draggable").length == 0 ) {
		
		$('#' + targetEl.id).append($('#' + draggedEl.id));

		draggedEl.setAttribute("data-x", -2);
		draggedEl.setAttribute("data-y", -2);
		draggedEl.style.webkitTransform = draggedEl.style.transform = "translate(-2px, -2px)";
    } else if ( $('#' + targetEl.id).children(".draggable").length == 1 ) {

		var swapped = $('#' + targetEl.id).children(".draggable");
		swapped.attr('class', 'draggable app');

		var absoluteX = parseFloat(swapped[0].getAttribute("data-ax"));
		var absoluteY = parseFloat(swapped[0].getAttribute("data-ay"));
		
		$('#app').append(swapped);
		$('#' + targetEl.id).append($('#' + draggedEl.id));

		var leftMargin = document.documentElement.clientWidth*0.7;
		var verticalMargin = document.documentElement.clientHeight*0.07;

		if ($('#' + targetEl.id).parent()[0].id == "row1") {
			swapped[0].setAttribute("data-x", leftMargin + "px");
			swapped[0].setAttribute("data-y", (absoluteY + verticalMargin) + "px");
			swapped[0].style.webkitTransform = swapped[0].style.transform = "translate(70vw, " + (absoluteY + verticalMargin) + "px)";
		} else if ($('#' + targetEl.id).parent()[0].id == "row2") {
			swapped[0].setAttribute("data-x", leftMargin + "px");
			swapped[0].setAttribute("data-y", absoluteY + "px");
			swapped[0].style.webkitTransform = swapped[0].style.transform = "translate(70vw, " + absoluteY + "px)";
		} else if ($('#' + targetEl.id).parent()[0].id == "row3") {
			swapped[0].setAttribute("data-x", leftMargin + "px");
			swapped[0].setAttribute("data-y", absoluteY + "px");
			swapped[0].style.webkitTransform = swapped[0].style.transform = "translate(70vw, " + absoluteY + "px)";
		} else if ($('#' + targetEl.id).parent()[0].id == "row4") {
			swapped[0].setAttribute("data-x", leftMargin + "px");
			swapped[0].setAttribute("data-y", absoluteY + "px");
			swapped[0].style.webkitTransform = swapped[0].style.transform = "translate(70vw, " + absoluteY + "px)";
		} else if ($('#' + targetEl.id).parent()[0].id == "row5") {
			swapped[0].setAttribute("data-x", leftMargin + "px");
			swapped[0].setAttribute("data-y", (absoluteY - verticalMargin) + "px");
			swapped[0].style.webkitTransform = swapped[0].style.transform = "translate(70vw, " + (absoluteY - verticalMargin) + "px)";
		}

		draggedEl.setAttribute("data-x", -2);
		draggedEl.setAttribute("data-y", -2);
		draggedEl.style.webkitTransform = draggedEl.style.transform = "translate(-2px, -2px)";
	}
	
	
  }
});

interact(".draggable").draggable({
	inertia: true,
	restrict: {
	restriction: "#app",
	endOnly: true,
	elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
	},
	autoScroll: true,
	// dragMoveListener from the dragging demo above
	onmove: dragMoveListener
	//ondend: dropOffset
});

interact(".dropbox2").dropzone({
    // Require a 50% element overlap for a drop to be possible
    overlap: 0.5,

    // listen for drop related events:

  ondropactivate: function(event) {
    // add active dropzone feedback
    event.relatedTarget.classList.add("drop-active");
  },
  ondragenter: function(event) {
    // feedback the possibility of a drop
    event.target.classList.add("drop-target");
    if (event.target.classList.contains("inside")) {
    	event.relatedTarget.classList.add(event.target.id);
    } else if (event.target.classList.contains("outside")) {
    	event.relatedTarget.classList.add("app2");
    }

    if(event.target.id == "playsound-dropzone") {
		cardSpeak(event);
	}
  },
  ondragleave: function(event) {
    // remove the drop feedback style
    event.target.classList.remove("drop-target");
    if (event.target.classList.contains("inside")) {
    	event.relatedTarget.classList.remove(event.target.id);
    } else if (event.target.classList.contains("outside")) {
    	event.relatedTarget.classList.remove("app2");
    }
  },
  ondropdeactivate: function(event) {
    // remove active dropzone feedback
    event.target.classList.remove("drop-target");
  },
  ondrop: function (event) {
	// feedback a drop	
    event.relatedTarget.classList.remove("drop-active");

	targetEl = event.target;
	draggedEl = event.relatedTarget;
	parentEl = $('.draggable2#' + draggedEl.id).parent()[0];
	appEl = $('.draggable2#' + draggedEl.id).closest('#app2');
	
	if (targetEl.classList.contains("outside")) {
		console.log("outside");

		if(parentEl.id != "app2"){

			var absoluteX = parseFloat(draggedEl.getAttribute("data-ax"));
			var absoluteY = parseFloat(draggedEl.getAttribute("data-ay"));

			draggedEl.setAttribute("data-x", absoluteX);
			draggedEl.setAttribute("data-y", absoluteY);

			draggedEl.style.webkitTransform = draggedEl.style.transform = "translate(" + absoluteX + "px, " + absoluteY + "px)";


			var x = parseFloat(draggedEl.getAttribute("data-x"));
			var y = parseFloat(draggedEl.getAttribute("data-y"));
		}
	  	appEl.append($('.draggable2#' + draggedEl.id));
	} else if ( $('.dropbox2#' + targetEl.id).children(".draggable2").length == 0 ) {
		
		$('.dropbox2#' + targetEl.id).append($('.draggable2#' + draggedEl.id));

		draggedEl.setAttribute("data-x", -2);
		draggedEl.setAttribute("data-y", -2);
		draggedEl.style.webkitTransform = draggedEl.style.transform = "translate(-2px, -2px)";
    } else if ( $('.dropbox2#' + targetEl.id).children(".draggable2").length == 1 ) {

		var swapped = $('.dropbox2#' + targetEl.id).children(".draggable2");
		swapped.attr('class', 'draggable2 app2');

		var absoluteX = parseFloat(swapped[0].getAttribute("data-ax"));
		var absoluteY = parseFloat(swapped[0].getAttribute("data-ay"));
		
		$('#app2').append(swapped);
		$('.dropbox2' + targetEl.id).append($('#' + draggedEl.id));

		var leftMargin = document.documentElement.clientWidth*0.7;
		var verticalMargin = document.documentElement.clientHeight*0.07;

		if ($('#' + targetEl.id).parent()[0].id == "row1") {
			swapped[0].setAttribute("data-x", leftMargin + "px");
			swapped[0].setAttribute("data-y", (absoluteY + verticalMargin) + "px");
			swapped[0].style.webkitTransform = swapped[0].style.transform = "translate(70vw, " + (absoluteY + verticalMargin) + "px)";
		} else if ($('#' + targetEl.id).parent()[0].id == "row2") {
			swapped[0].setAttribute("data-x", leftMargin + "px");
			swapped[0].setAttribute("data-y", absoluteY + "px");
			swapped[0].style.webkitTransform = swapped[0].style.transform = "translate(70vw, " + absoluteY + "px)";
		} else if ($('#' + targetEl.id).parent()[0].id == "row3") {
			swapped[0].setAttribute("data-x", leftMargin + "px");
			swapped[0].setAttribute("data-y", absoluteY + "px");
			swapped[0].style.webkitTransform = swapped[0].style.transform = "translate(70vw, " + absoluteY + "px)";
		} else if ($('#' + targetEl.id).parent()[0].id == "row4") {
			swapped[0].setAttribute("data-x", leftMargin + "px");
			swapped[0].setAttribute("data-y", absoluteY + "px");
			swapped[0].style.webkitTransform = swapped[0].style.transform = "translate(70vw, " + absoluteY + "px)";
		} else if ($('#' + targetEl.id).parent()[0].id == "row5") {
			swapped[0].setAttribute("data-x", leftMargin + "px");
			swapped[0].setAttribute("data-y", (absoluteY - verticalMargin) + "px");
			swapped[0].style.webkitTransform = swapped[0].style.transform = "translate(70vw, " + (absoluteY - verticalMargin) + "px)";
		}

		draggedEl.setAttribute("data-x", -2);
		draggedEl.setAttribute("data-y", -2);
		draggedEl.style.webkitTransform = draggedEl.style.transform = "translate(-2px, -2px)";
	}
	
	
  }
});

interact(".draggable2").draggable({
	inertia: true,
	restrict: {
	restriction: "#app2",
	endOnly: true,
	elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
	},
	autoScroll: true,
	// dragMoveListener from the dragging demo above
	onmove: dragMoveListener
	//ondend: dropOffset
});

function dragMoveListener(event) {
	var target = event.target,
	// keep the dragged position in the data-x/data-y attributes
	x = (parseFloat(target.getAttribute("data-x")) || 0) + event.dx,
	y = (parseFloat(target.getAttribute("data-y")) || 0) + event.dy;

	// translate the element
	target.style.webkitTransform = target.style.transform = "translate(" + x + "px, " + y + "px)";

	// update the position attributes
	target.setAttribute("data-x", x);
	target.setAttribute("data-y", y);

	target.setAttribute("data-ax", $('#' + target.id).offset().left);
	target.setAttribute("data-ay", $('#' + target.id).offset().top);
}

function dropOffset(event) {
	draggedEl = event.target;
	parentEl = $('#' + draggedEl.id).parent()[0];

	if(parentEl.id != "app" || parentEl.id != "app2"){

		console.log("offsetting");

		var absoluteX = parseFloat(draggedEl.getAttribute("data-ax"));
		var absoluteY = parseFloat(draggedEl.getAttribute("data-ay"));
		draggedEl.style.webkitTransform = draggedEl.style.transform = "translate(" + absoluteX + ", " + absoluteY + ")";
		$('#' + draggedEl.id).css( "transform", "translate(" + absoluteX + ", " + absoluteY + ")" )
		$('#' + draggedEl.id).css( "webkitTransform", "translate(" + absoluteX + ", " + absoluteY + ")" )
	}
}

//On clicking speacker toggels speach
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

//On dragging over speacker box reads card
function cardSpeak(event) {
	if (canPlay){
	var eventCardText = event.relatedTarget.id;
	artyom.say(eventCardText);
	}
}