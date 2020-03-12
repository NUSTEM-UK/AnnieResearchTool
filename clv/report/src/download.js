// Downloads SKAT data
$(".S").click(function() {
  console.log("skat");
  $.ajax({
	type: "post",
	url: "https://nustem.uk/r/clv/report/skat.php",
	success: function(data){
		let csvContent = "data:text/csv;charset=utf-8,";
		csvContent += data;
		var encodedUri = encodeURI(csvContent);
		var link = document.createElement("a");
		link.setAttribute("href", encodedUri);
		link.setAttribute("download", "clv_stemkat_data.csv");
		link.click();
	}
  });
});