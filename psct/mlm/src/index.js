var numCards = 0;

console.log("start");

function pad(n, width, z) {
  z = z || '0';
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

//Load all careers in careers table
$.ajax({
	type: "post",
	url: "https://nustem.uk/r/psct/mlm/getattrib.php",
	success: function(data){

		var cardtext = data.split(",").reverse();
		numCards = cardtext.length - 1;

		cardtext.forEach(function(card) {
	  	if(card){
			let div = document.createElement("div");
			div.classList.add("draggable");
			div.id = card;
			div.innerHTML = card;

			let div2 = document.createElement("div");
			div2.classList.add("draggable2");
			div2.id = card;
			div2.innerHTML = card;

			document.querySelector(".me #startbox").appendChild(div);
			document.querySelector(".sci #startbox").appendChild(div2);
	  	}
	});
	}
});

$(".close-overlay").click(function() {
  document.querySelector("#overlay-wrapper").style.display = "none";
});

//JQuery function call on click of next button to create second tab
$("#next").click(function() {
  //Get all sorted elements
	let sciDropboxes = document.querySelectorAll(".me #diamond-cont span .inside .draggable");

	//Ensure there is the full ammount of elements
	if (sciDropboxes.length == numCards) {
		document.querySelector(".me").style.display = "none";
		document.querySelector(".sci").style.display = "flex";
  		document.querySelector(".page1").style.display = "none";
		document.querySelector(".page2").style.display = "block";
		document.querySelector("#overlay-wrapper").style.display = "block";
	} else {
	  	window.alert("Make sure to up everything in a box");
	}
});

$("#finish").click(function() {
  	let sciDropboxes = document.querySelectorAll(".sci #diamond-cont span .inside .draggable2");
  	let meDropboxes = document.querySelectorAll(".me #diamond-cont span .inside .draggable");

	let fnameId = $("#hidden-data .fname").val();
	let snameId = $("#hidden-data .lname").val();
	let bdayId = $("#hidden-data .bday").val();
	let bmonthId = $("#hidden-data .bmonth").val();
	let schoolId = $("#hidden-data .school").val();

	// TODO: Change encoding here (also in /skat/src/index.js)
	fnameId = pad((fnameId.substring(0, 1).toLowerCase().charCodeAt(0)-97), 2);
	snameId = pad((snameId.substring(0, 1).toLowerCase().charCodeAt(0)-97), 2);
	bdayId = pad(bdayId, 2);
	bmonthId = pad(bmonthId, 2);
	schoolId = pad((schoolId.substring(0, 1).toLowerCase().charCodeAt(0)-97), 2) + pad((schoolId.substring(1, 2).toLowerCase().charCodeAt(0)-97), 2);

	let id = fnameId+snameId+bdayId+bmonthId+schoolId;

	let sciId = [];
	let meId = [];

	sciDropboxes.forEach(function(element) {
		sciId.push(element.id);
	});

	meDropboxes.forEach(function(element) {
		meId.push(element.id);
	});

	sciId.sort();
	meId.sort();

	if (meDropboxes.length == numCards) {
		let sciRow = [];
		let meRow = [];

		meId.forEach(function(element) {
			meRow.push($('.draggable#' + element).closest('span').attr('id'));
		});

		sciId.forEach(function(element) {
			sciRow.push($('.draggable2#' + element).closest('span').attr('id'));
		});

		document.querySelector(".sci").style.display = "none";

		let data = {
			id: id,
			sciId: sciId.toString(),
			sciRow: sciRow.toString(),
			meId: meId.toString(),
			meRow: meRow.toString()
		};

		console.log(data);

		$.ajax({
			data: data,
			type: "post",
			url: "https://nustem.uk/r/psct/mlm/request.php",
			success: function(data){
				window.location.replace("https://nustem.uk/r/psct/EndScreen");
			}
		});
	} else {
		window.alert("Make sure to up everything in a box");
	}
});