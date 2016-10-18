function getDetail(sel) {
    console.log(sel);
    return sel;
}

var offset = 300,
    offset_opacity = 1200,
    scroll_top_duration = 700;
    
var locRingChart = dc.pieChart("#chart-ring-loc"),
    izinRowChart = dc.rowChart("#chart-row-izin"),
    PeriodChart = dc.barChart("#chart-period"),
    StatusChart = dc.pieChart("#chart-status")
;

d3.json("http://admin-ptsp.local/d3dash/getjson", function(error, izindata) {

    if (error) {
        alert(error);
    }
    
    // get width of body panel
    var lrc = document.getElementById("body-chart-ring-loc").offsetWidth;
    var bcp = document.getElementById("body-chart-period").offsetWidth;
    var bcri = document.getElementById("body-chart-row-izin").offsetWidth;
    var bcs = document.getElementById("body-chart-status").offsetWidth;
    var pieinner = 35;

    // set crossfilter
    var facts = crossfilter(izindata),
        all = facts.groupAll().reduceSum(function(d) {return d.kaun;})
        locDim = facts.dimension(function(d) {return d.lokasi;}),
        izinDim = facts.dimension(function(d) {return d.jenisizin;}),
        periodDim = facts.dimension(function(d) {return d.thbl;}),
        statDim = facts.dimension(function(d) {return d.status;}),
        izinPerLoc = locDim.group().reduceSum(function(d) {return d.kaun;}),
        sumPerIzin = izinDim.group().reduceSum(function(d) {return d.kaun;}),
        sumPerPeriod = periodDim.group().reduceSum(function(d) {return d.kaun;}),
        sumStatus = statDim.group().reduceSum(function(d) {return d.kaun;}),
        colorScale = d3.scale.ordinal().domain(["1"]).range(["#a6cee3","#1f78b4","#b2df8a","#33a02c","#fb9a99","#e31a1c","#fdbf6f","#ff7f00","#cab2d6"])
    ;
    
    dc.dataCount(".dc-data-count")
        .dimension(facts)
        .group(all);
    
    locRingChart
        .width(lrc)
        .height(300)
        .dimension(locDim)
        .group(izinPerLoc)
        .cx(155)
        .innerRadius(pieinner)
        .legend(dc.legend().x(0.57*lrc).legendText(function (d) {
            if (locRingChart.hasFilter() && !locRingChart.hasFilter(d.name)) {
                return d.name + " (0%)";
            } else {
                return d.name + " (" + Math.round(d.data / all.value() * 100) + "%)";
            }
        }))
        .colors(colorScale)
        .label(function (d) {
            var label = d.key;
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
            if (locRingChart.hasFilter() && !locRingChart.hasFilter(d.key)) {
                return label + " (0%)";
            }
            if (all.value()) {
                label += " (" + Math.round(d.value / all.value() * 100) + "%)";
            }
            return label;
        })
        .on('filtered', function() {
            d3.select('#chart-ring-loc-sel').text(locRingChart.filters().join(', '));
            getDetail(locRingChart.filters().join(', '));
        })
    ;

    izinRowChart
        .width(bcri)
        .height(300)
        .dimension(izinDim)
        .group(sumPerIzin)
        .elasticX(true)
        .colors(colorScale)
        .on('filtered', function() {
            d3.select('#chart-row-izin-sel').text(izinRowChart.filters().join(', '));
        })
    ;

    PeriodChart 
        .margins({top: 0, right: 35, bottom: 35, left: 45})
        .width(bcp)
        .height(300)
        .x(d3.scale.ordinal())
        .xUnits(dc.units.ordinal)
        .brushOn(false)
        .xAxisLabel("Bulan")
        //.yAxisLabel("Jumlah")
        .elasticY(true)
        .dimension(periodDim)
        .group(sumPerPeriod)
        .barPadding(0.1)
        .outerPadding(0.05)
        .colors(colorScale)
        .on('filtered', function() {
            d3.select('#chart-period-sel').text(PeriodChart.filters().join(', '));
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
        .height(300)
        .dimension(statDim)
        .group(sumStatus)
        .cx(155)
        .innerRadius(pieinner)
        .legend(dc.legend().x(0.65*bcs).legendText(function (d) {
            if (StatusChart.hasFilter() && !StatusChart.hasFilter(d.name)) {
                return d.name + " (0%)";
            } else {
                return d.name + " (" + Math.round(d.data / all.value() * 100) + "%)";
            }
        }))
        .colors(colorScale)
        .label(function (d) {
            var label = d.key;
            if (StatusChart.hasFilter() && !StatusChart.hasFilter(d.key)) {
                return label + " (0%)";
            }
            if (all.value()) {
                label += " (" + Math.round(d.value / all.value() * 100) + "%)";
            }
            return label;
        })
        .on('filtered', function() {
            d3.select('#chart-status-sel').text(StatusChart.filters().join(', '));
        })
    ;

    dc.renderAll();
   
});