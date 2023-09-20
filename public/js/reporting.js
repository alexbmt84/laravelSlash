// This demo uses the Chartjs javascript library
// Simple yet flexible JavaScript charting for designers & developers
// Webite: https://www.chartjs.org
// CDN: https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js
function updateChart() {
    async function fetchData() {

        const url = '/data';
        const response = await fetch(url);
        const datapoints = await response.json();

        console.log("Datapoints : ", datapoints);

        return datapoints;

    }

    fetchData().then(datapoints => {

        let events = [];
        let dureeEvent = [];

        datapoints.data.forEach((element) => {

             let nomEvenement = element.nom_evenement;
             let dureeEvenement = element.duree;

            events.push(nomEvenement);
            dureeEvent.push(dureeEvenement);

        });

        doughnutChart.data.labels = events;
        doughnutChart.data.datasets[0].data = dureeEvent;

        doughnutChart.update();

    });

}

const percent = 0;
const percentValue = percent;

const color = '#212121';
const canvas = 'chartCanvas';
const container = 'chartContainer';

const chartFigure = document.getElementById("chart__figure");
const chartCanvas = document.getElementById(canvas);
const chartContainer = document.getElementById(container);

const pPercent = document.createElement("p");
pPercent.setAttribute("id", "pourcentage2");
pPercent.innerText = percentValue + "%";

chartFigure.appendChild(pPercent);

const doughnutChart = new Chart(chartCanvas, {

    type: "doughnut",

    data: {

        labels: [""],

        datasets: [{

                data: [],

                backgroundColor: [
                    "#FC4A50",
                    "#2490F6",
                    "#FFDED",
                    "#2ED82E",
                    "#C39D78",
                    "#FC8823",
                ],

            },

        ],

    },

    options: {

        animation: {
            duration: 2000,
        },

        plugins: {

            title: {

                display: true,
                text: "Evénements effectués",
                position: "top",
                padding: {
                    bottom: 30
                }

            },

            legend: {
                display: true,
                position: "bottom",
            },

            cutoutPercentage: 80, // The percentage of the middle cut out of the chart
            responsive: false, // Set the chart to not be responsive

            tooltips: {
                enabled: true, // Hide tooltips
            },

        },

    }

});
