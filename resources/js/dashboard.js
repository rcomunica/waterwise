import ApexCharts from "apexcharts";

var options = {
    series: [
        {
            data: [],
        },
    ],
    chart: {
        id: "realtime",
        height: 350,
        type: "area",
        animations: {
            enabled: true,
            easing: "linear",
            dynamicAnimation: {
                speed: 1000,
            },
        },
        toolbar: {
            show: false,
        },
        zoom: {
            enabled: false,
        },
    },
    dataLabels: {
        enabled: false,
    },
    stroke: {
        curve: "smooth",
    },
    markers: {
        size: 0,
    },
    yaxis: {
        max: 50,
        labels: {
            formatter: (value) => {
                return value + " Lt";
            },
        },
    },
    legend: {
        show: false,
    },
};

var areChart = new ApexCharts(document.querySelector("#areaMeasure"), options);
areChart.render();

function toPorcent(val) {
    /**
     * 25 SEGÚN EL PROMEDIO DE USO DE BOGOTÁ
     * ES DECIR SI GASTO 30 LITROS DE AGUA Y EL PROMEDIO
     * ES DE 25 LITROS LA HORA, TENEMOS QUE VER QUE PORCENTAJE ESTAMOS USANDO
     */
    return (val / 25) * 100;
}

var options = {
    series: [0],
    chart: {
        height: 350,
        type: "radialBar",
        animations: {
            enabled: true,
            easing: "linear",
            dynamicAnimation: {
                speed: 500,
            },
        },
    },
    plotOptions: {
        radialBar: {
            hollow: {
                size: "70%",
            },
        },
    },
    labels: ["Sin datos"],
};

var realtimeChart = new ApexCharts(
    document.querySelector("#realtimeBar"),
    options
);
realtimeChart.render();

var device = document.getElementById("device_uuid").value;
var values = [];
setTimeout(() => {
    window.Echo.private(`measures.${device}`).listen("MeasureEvent", (e) => {
        values.push(e.consumption);
        areChart.updateSeries([
            {
                data: values,
            },
        ]);

        realtimeChart.updateOptions({
            series: [toPorcent(e.consumption)],
            labels: [e.consumption + " L"],
        });
    });
}, 100);
