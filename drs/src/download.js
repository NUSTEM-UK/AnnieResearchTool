// Downloads MLM/S data
$(".M").click(function() {
  console.log("mlm");
  $.ajax({
	type: "post",
	url: "https://nustem.uk/r/drs/mlm.php",
	success: function(data){
		let csvContent = "data:text/csv;charset=utf-8,";
		csvContent += data;
		var encodedUri = encodeURI(csvContent);
		var link = document.createElement("a");
		link.setAttribute("href", encodedUri);
		link.setAttribute("download", "mlm_data.csv");
		link.click();
	}
  });
});

// Downloads SKAT data
$(".S").click(function() {
  console.log("skat");
  $.ajax({
	type: "post",
	url: "https://nustem.uk/r/drs/skat.php",
	success: function(data){
		let csvContent = "data:text/csv;charset=utf-8,";
		csvContent += data;
		var encodedUri = encodeURI(csvContent);
		var link = document.createElement("a");
		link.setAttribute("href", encodedUri);
		link.setAttribute("download", "skat_data.csv");
		link.click();
	}
  });
});