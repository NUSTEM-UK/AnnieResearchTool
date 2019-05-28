var docWidth = $(window).width(),
    docHeight = $(window).height();

if (docWidth < 1000) {
    var perWidth = docWidth*0.9;
} else {
    var perWidth = docWidth*0.6;
}

if (docHeight < 600) {
    var perHeight = docHeight*0.8;
}else {
    var perHeight = docHeight*0.6;
}

var margin = {top: 20, right: 150, bottom: 100, left: 75},
    width = perWidth - margin.left - margin.right,
    height = perHeight - margin.top - margin.bottom;

var svg = d3.select("#chart-svg").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .attr("transform", "translate(" + (docWidth/2 - perWidth/2) + "," + (docHeight/2 - perHeight/2) + ")")
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var colors = ["#324C51", "#57A4B2", "#57A4B2", "#57A4B2"];

var hoverColors = ["#324C51", "#2F6872", "#57A4B2", "#BFEAF2"];

d3.csv("data.csv").then(function (data){

    data.pop();

	var headers = [];
    var xTicks = [];

	for (var key in data[0]) {
	    if (data[0].hasOwnProperty(key)) {
	        headers.push(key);
	    }
	}
    
    for (var element in data) {
        console.log(data[element]);
        xTicks.push(data[element].Word);
    }

    headers.shift();
    xTicks.pop();

    var m = data.length;
    var n = headers.length;
    
    var stack = d3.stack()
    	.keys(headers)
	    .order(d3.stackOrderNone)
	    .offset(d3.stackOffsetNone);
	
	var layers = stack(data);
    
    var yGroupMax = d3.max(layers, function(layer) { return d3.max(layer, function(d) { return d[1]; }); });
    var yStackMax = d3.max(layers, function(layer) { return d3.max(layer, function(d) { return d[1] - d[0]; }); });

    var xScale = d3.scaleBand()
        .domain(xTicks)
        .rangeRound([0, width])
        .padding(0.1);

    var y = d3.scaleLinear()
        .domain([0, yGroupMax])
        .range([height, 0]);

    var color = d3.scaleOrdinal()
        .domain(headers)
        .range(colors);
    
    var hoverColor = d3.scaleOrdinal()
        .domain(headers)
        .range(hoverColors);
      
    var xAxis = d3.axisBottom()
        .scale(xScale);

    var yAxis = d3.axisLeft()
        .scale(y);

    var layer = svg.selectAll(".layer")
        .data(layers)
        .enter()
        .append("g")
        .attr("class", "layer")
        .style("fill", function(d, i) { return hoverColor(i); });

    var rect = layer.selectAll("rect")
        .data(function(d) { console.log(d); return d; })
        .enter()
        .append("rect")
        .attr("x", function(d) { return xScale(Object.values(d)[2].Word); })
        .attr("y", function(d) { return y(d[1]); })
        .attr("width", xScale.bandwidth())
        .attr("height", function(d) { return y(d[0]) - y(d[1]); });

    //********** AXES ************
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height + ")")
        .call(xAxis)
        .selectAll("text").style("text-anchor", "end")
            .attr("dx", "-.8em")
            .attr("dy", ".15em")
            .attr("transform", function(d) {
                  return "rotate(-60)" 
                });     
    
    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis)
        .append("text")
            .attr("transform", "rotate(-90)")
            .attr("y", -50)
            .style("text-anchor", "end")
            .text("% of Answers");

    var legend = svg.selectAll(".legend")
        .data(headers.slice().reverse())
            .enter().append("g")
            .attr("class", "legend")
            .attr("transform", function(d, i) { return "translate(100," + i * 20 + ")"; });
       
        legend.append("rect")
            .attr("x", width - 18)
            .attr("width", 18)
            .attr("height", 18)
            .style("fill", hoverColor);
    
        legend.append("text")
              .attr("x", width - 24)
              .attr("y", 9)
              .attr("dy", ".35em")
              .style("font-family", "sans-serif")
              .style("text-anchor", "end")
              .text(function(d) { return d;  });
});