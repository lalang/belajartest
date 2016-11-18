var locRingChart = dc.pieChart("#chart-ring-loc"),
    izinRowChart = dc.rowChart("#chart-row-izin"),
    PeriodChart = dc.barChart("#chart-period"),
    StatusChart = dc.pieChart("#chart-status")
;

// get width of body panel
var margins = {top: 0, right: 25, bottom: 35, left: 45};
var lrc = document.getElementById("body-chart-ring-loc").offsetWidth - margins.right;
var bcp = document.getElementById("body-chart-period").offsetWidth - margins.right;
var bcri = document.getElementById("body-chart-row-izin").offsetWidth - margins.right;
var bcs = document.getElementById("body-chart-status").offsetWidth - margins.right;
var h_normal = 300, h_long = 300;

function getDetail(sel) {
    console.log(sel);
}

d3.json("http://admin-ptsp.local/d3dash/getjson", function(error, izindata) {

    if (error) {
        alert(error);
    }

    // set crossfilter
    var facts = crossfilter(izindata),
        all = facts.groupAll().reduceSum(function(d) {return d.c5;})
        locDim = facts.dimension(function(d) {return d.c1;}),
        izinDim = facts.dimension(function(d) {return d.c2;}),
        periodDim = facts.dimension(function(d) {return d.c3;}),
        statDim = facts.dimension(function(d) {return d.c4;}),
        izinPerLoc = locDim.group().reduceSum(function(d) {return d.c5;}),
        sumPerIzin = izinDim.group().reduceSum(function(d) {return d.c5;}),
        countIzin = izinDim.group().reduceCount(),
        sumPerPeriod = periodDim.group().reduceSum(function(d) {return d.c5;}),
        sumStatus = statDim.group().reduceSum(function(d) {return d.c5;}),
        colorScale = d3.scale.ordinal().domain(["1"]).range(["#a6cee3","#1f78b4","#b2df8a","#33a02c","#fb9a99","#e31a1c","#fdbf6f","#ff7f00","#cab2d6"])
    ;

    dc.dataCount(".dc-data-count")
        .dimension(facts)
        .group(all);
    
    locRingChart
        .width(lrc)
        .height(h_normal)
        .dimension(locDim)
        .group(izinPerLoc)
        .innerRadius(h_normal*.15)
        .radius(h_normal*.45)
        .legend(dc.legend().x(0*lrc).legendText(function (d) {
            if (locRingChart.hasFilter() && !locRingChart.hasFilter(d.name)) {
                return d.name + " (0%)";
            } else {
                return d.name + " (" + Math.round(d.data / all.value() * 100) + "%)";
            }
        }))
        .colors(colorScale)
        .transitionDuration(750)
        .label(function (d) {
            var label = d.key;
            /*
            switch (d.key) {
                case "JAKARTA PUSAT":
                    label = "JAKPUS";
                    break;
                case "JAKARTA UTARA":
                    label = "JAKUT";
                    break;
                case "JAKARTA TIMUR":
                    label = "JAKTIM";
                    break;
                case "JAKARTA SELATAN":
                    label = "JAKSEL";
                    break;
                case "JAKARTA BARAT":
                    label = "JAKBAR";
                    break;
                case "KABUPATEN KEPULAUAN SERIBU":
                    label = "KEPSERIBU";
                    break;
                default:
                    break;
            }
            */
            /*
            if (locRingChart.hasFilter() && !locRingChart.hasFilter(d.key)) {
                return label + " (0%)";
            }
            if (all.value()) {
                label += " (" + Math.round(d.value / all.value() * 100) + "%)";
            }
            */
            return label;
        })
        .on("filtered", function(chart) {
            d3.select("#chart-ring-loc-sel").text(chart.filters().join(", "));
            document.getElementById("chart-ring-loc-sel").innerHTML = document.getElementById("chart-ring-loc-sel").innerHTML === "" ?"..." :document.getElementById("chart-ring-loc-sel").innerHTML;
            getDetail(chart.filters().join(", "));
        })
    ;

    izinRowChart
        .width(bcri)
        .height(h_long)
        .margins(margins)
        .dimension(izinDim)
        .group(sumPerIzin)
        .elasticX(true)
        .colors(colorScale)
        .transitionDuration(750)
        .on("filtered", function(chart) {
            d3.select("#chart-row-izin-sel").text(chart.filters().join(", "));
            document.getElementById("chart-row-izin-sel").innerHTML = document.getElementById("chart-row-izin-sel").innerHTML === "" ?"..." :document.getElementById("chart-row-izin-sel").innerHTML;
        })
    ;

    PeriodChart 
        .width(bcp)
        .height(h_normal)
        .margins(margins)
        .dimension(periodDim)
        .group(sumPerPeriod)
        .elasticX(true)
        .elasticY(true)
        .x(d3.scale.ordinal())
        .xUnits(dc.units.ordinal)
        .xAxisLabel("Bulan")
        //.yAxisLabel("Jumlah")
        .barPadding(0.1)
        .outerPadding(0.05)
        .colors(colorScale)
        .transitionDuration(750)
        .on("filtered", function(chart) {
            d3.select("#chart-period-sel").text(chart.filters().join(", "));
            document.getElementById("chart-period-sel").innerHTML = document.getElementById("chart-period-sel").innerHTML === "" ?"..." :document.getElementById("chart-period-sel").innerHTML;
        })
    ;

    // Customize axes
    PeriodChart.xAxis().tickFormat(function (v) { 
        r = "...";
        switch (v.substring(5,7)) {
            case "01":
                r = "Jan";
                break;
            case "02":
                r = "Feb";
                break;
            case "03":
                r = "Mar";
                break;
            case "04":
                r = "Apr";
                break;
            case "05":
                r = "Mei";
                break;
            case "06":
                r = "Jun";
                break;
            case "07":
                r = "Jul";
                break;
            case "08":
                r = "Agu";
                break;
            case "09":
                r = "Sep";
                break;
            case "10":
                r = "Okt";
                break;
            case "11":
                r = "Nov";
                break;
            case "12":
                r = "Des";
                break;
            default:
                break;
        }
        if (r === "Jan") {
            r = v.substring(0,4);
        }
        return r; 
    });
    //PeriodChart.yAxis().ticks(5);

    StatusChart
        .width(bcs)
        .height(h_normal)
        .dimension(statDim)
        .group(sumStatus)
        .innerRadius(h_normal*.15)
        .radius(h_normal*.45)
        .legend(dc.legend().x(0*bcs).legendText(function (d) {
            if (StatusChart.hasFilter() && !StatusChart.hasFilter(d.name)) {
                return d.name + " (0%)";
            } else {
                return d.name + " (" + Math.round(d.data / all.value() * 100) + "%)";
            }
        }))
        .colors(colorScale)
        .transitionDuration(750)
        .label(function (d) {
            var label = d.key;
            /*
            if (StatusChart.hasFilter() && !StatusChart.hasFilter(d.key)) {
                return label + " (0%)";
            }
            if (all.value()) {
                label += " (" + Math.round(d.value / all.value() * 100) + "%)";
            }
            */
            return label;
        })
        .on("filtered", function(chart) {
            d3.select("#chart-status-sel").text(chart.filters().join(", "));
            document.getElementById("chart-status-sel").innerHTML = document.getElementById("chart-status-sel").innerHTML === "" ?"..." :document.getElementById("chart-status-sel").innerHTML;
        })
    ;

    dc.renderAll();
});

$("#body-chart-ring-loc").resize(function(e){
    xbcp = document.getElementById("body-chart-ring-loc").offsetWidth - margins.right;
    locRingChart
        .width(xbcp)
        .redraw();
    izinRowChart
        .width(xbcp)
        .redraw();
    PeriodChart
        .width(xbcp)
        .redraw();
    StatusChart
        .width(xbcp)
        .redraw();
});
