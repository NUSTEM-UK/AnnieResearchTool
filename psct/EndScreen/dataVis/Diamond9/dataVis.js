var docWidth = $(document).width(),
    docHeight = $(document).height();

if (docWidth < 1000) {
    var perWidth = docWidth*0.9;
} else {
    var perWidth = docWidth*0.6;
}

if (docHeight < 600) {
    var perHeight = docHeight*0.9;
}else {
    var perHeight = docHeight*0.8;
}

var margin = {top: 100, right: 150, bottom: 100, left: 75},
    width = perWidth - margin.left - margin.right,
    height = perHeight - margin.top - margin.bottom;

var svg = d3.select("#chart-svg").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .attr("transform", "translate(" + (docWidth/2 - perWidth/2) + "," + (docHeight/2 - perHeight/2) + ")")
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

var xTicks = ["Least Like", " ", "  ", "   ", "Most Like"];

var colors = ["#65343A","#77485E","#7A6383","#6B81A3","#50A1B4","#43BEB4","#66D8A3","#A4ED8A","#EEFC76"];

d3.csv("data.csv").then(function (data){

	var headers = [],
        dataMe = [],
        dataSci = [],
        xSci = [],
        xMe = [],
        x = [];

	for (var key in data[0]) {
	    if (data[0].hasOwnProperty(key)) {
	        headers.push(key);
	    }
	}
    
    for (var element in data) {
        if (element < 5) {
            dataSci.push(data[element]);
            xSci.push(data[element].Rating);
            x.push(parseInt(element)+1);
        } else {
            dataMe.push(data[element]);
            xMe.push(data[element].Rating);
        }
    }

    headers.shift();
    dataMe.pop();
    xMe.pop();

    var m = data.length;
    var n = headers.length;

    var stack = d3.stack()
        .keys(headers)
        .order(d3.stackOrderReverse)
        .offset(d3.stackOffsetWiggle);
    
    var stackMe = d3.stack()
        .keys(headers)
        .order(d3.stackOrderReverse)
        .offset(d3.stackOffsetNone);
    
    var stackSci = d3.stack()
        .keys(headers)
        .order(d3.stackOrderReverse)
        .offset(d3.stackOffsetNone);
	
	var layers = stack(data);

    var layersMe = stackMe(dataMe);
    var layersSci = stackSci(dataSci);
    
    var yGroupMax = d3.max(layers, function(layer) { return d3.max(layer, function(d) { return d[1]; }); });
    var yStackMax = d3.max(layers, function(layer) { return d3.max(layer, function(d) { return d[1] - d[0]; }); });

    var xScale = d3.scalePoint()
        .domain(xTicks)
        .range([0, width]);

    var y = d3.scaleLinear()
        .domain([0, yGroupMax])
        .range([0, height])
        .nice(); 

    var yMe = d3.scaleLinear()
        .domain([0, yGroupMax])
        .range([height/2, 0])
        .nice();

    var ySci = d3.scaleLinear()
        .domain([0, yGroupMax])
        .range([0, height/2])
        .nice(); 

    var color = d3.scaleOrdinal()
        .domain(headers)
        .range(colors);
      
    var xAxis = d3.axisBottom()
        .scale(xScale)
        .tickValues(xTicks)
        .tickFormat(function(n) { return n;});

    var yAxisMe = d3.axisLeft()
        .scale(yMe);

    var yAxisSci = d3.axisLeft()
        .scale(ySci);
    
    var area = d3.area()
        .curve(d3.curveCardinal.tension(0))
        .x(d => xScale(xTicks[parseInt(Object.values(d)[2].Rating.substr(-1))-1]))
        .y0(d => y(d[1]))
        .y1(d => y(d[0]));
    
    var areaMe = d3.area()
        .curve(d3.curveCardinal.tension(0))
        .x(d => xScale(xTicks[parseInt(Object.values(d)[2].Rating.substr(-1))-1]))
        .y0(d => yMe(d[0]))
        .y1(d => yMe(d[1]));
    
    var areaSci = d3.area()
        .curve(d3.curveCardinal.tension(0))
        .x(d => xScale(xTicks[parseInt(Object.values(d)[2].Rating.substr(-1))-1]))
        .y0(d => ySci(d[1]))
        .y1(d => ySci(d[0]));

    var legend = svg.selectAll(".legend")
        .data(headers.slice().reverse())
            .enter().append("g")
            .attr("class", "legend")
            .attr("transform", function(d, i) { return "translate(120," + i * 20 + ")"; });
       
        legend.append("rect")
            .attr("x", width - 18)
            .attr("width", 18)
            .attr("height", 18)
            .style("fill", color);
    
        legend.append("text")
              .attr("x", width - 24)
              .attr("y", 9)
              .attr("dy", ".35em")
              .style("font-family", "sans-serif")
              .style("text-anchor", "end")
              .text(function(d) { return d;  });

    var pathMe = svg.append("g")
        .attr("transform", "translate(0," + 0 + ")")
        .selectAll(".pathMe")
        .data(layersMe)
        .enter().append("path")
            .attr("class", ".pathMe")
            .attr("d", areaMe)
            .attr("fill", function(d, i) { return color(i); });

    var pathSci = svg.append("g")
        .attr("transform", "translate(0," + height/2 + ")")
        .selectAll(".pathSci")
        .data(layersSci)
        .enter().append("path")
            .attr("class", ".pathSci")
            .attr("d", areaSci)
            .attr("fill", function(d, i) { return color(i); });

    //********** AXES ************
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + height/2 + ")")
        .call(xAxis)
        .selectAll("text").style("text-anchor", "start")
            .attr("dx", ".6em")
            .attr("dy", "-1em")
            .attr("transform", "rotate(90)");   
    
    svg.append("g")
    .attr("class", "y axis sci l")
        .attr("transform", "translate(1," + height+3 + ")")
        .call(yAxisSci)
    
    svg.append("g")
    .attr("class", "y axis me l")
        .attr("transform", "translate(1," + (height/2)+3 + ")")
        .call(yAxisMe)
    
    svg.append("g")
    .attr("class", "y axis sci 2")
        .attr("transform", "translate(" + width + ", " + height/2 + ")")
        .call(yAxisSci)
    
    svg.append("g")
    .attr("class", "y axis me 2")
        .attr("transform", "translate(" + width + ", 0)")
        .call(yAxisMe)

    svg.selectAll(".l path")
    .attr("transform", "rotate(180)");
});