function updateChart() {

    async function fetchData() {

        const url = '/data';
        const response = await fetch(url);
        const datapoints = await response.json();

        console.log(datapoints);

        return datapoints;
    }

    fetchData().then(datapoints => {

        let users = [];
        let metiers = [];
        let events = [];
        let dureeEvent = [];
        let recettes = [];
        let depenses= [];
        let sphereMetier = [];
        let sphereLabel = [];

        datapoints.data.forEach((element) => {

            let event = element.nom_evenement;
            let dureeEvenement = element.duree;
            let userId = element.metier.user_id;
            let label = element.metier.nom;

            events.push(event);
            dureeEvent.push(dureeEvenement);
            users.push(userId);
            metiers.push(label);

        });

        datapoints.recettesDepenses.forEach((element) => {

            let recette = element.recette;
            let depense = element.recette;

            recettes.push(recette);
            depenses.push(depense);

        });

        datapoints.spheres.forEach((element) => {

            let total = element.total;
            let label = element.label

            sphereMetier.push(total);
            sphereLabel.push(label);

        });

        doughnutChart.data.labels = events;
        doughnutChart.data.datasets[0].data = dureeEvent;

        graph.data.datasets[0].data = users;
        graph.data.labels = metiers;

        graph2.data.datasets[0].data = depenses;
        graph2.data.labels = events;

        graph3.data.datasets[0].data = recettes;
        graph3.data.labels = events;

        graphSphere.data.datasets[0].data = sphereMetier;
        graphSphere.data.labels = sphereLabel;

        doughnutChart.update();
        graph.update();
        graph2.update();
        graph3.update();
        graphSphere.update();

    });

}

window.addEventListener("load", myInit, true); function myInit(){updateChart()}

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

let ctx = document.querySelector("#chartCanvas2")

let graphSphere = new Chart(ctx, {

    type: "pie",

    data: {
        labels: [""],
        datasets: [
            {
                data: [""],
                backgroundColor: [
                    "#2490F6",
                    "#2ED82E"
                ],
            },
        ],
    },

    options: {
        plugins: {
            tooltip: {
                enabled: true,
                callbacks: {
                    footer: (ttItem) => {
                        let sum = 0;
                        let dataArr = ttItem[0].dataset.data;
                        dataArr.map(data => {
                            sum += Number(data);
                        });

                        let percentage = (ttItem[0].parsed * 100 / sum).toFixed(2) + '%';
                        return `Total: ${percentage}`;
                    }
                }
            },
            labels: {
                render: 'percentage',
                precision: 2
            },
            title: {
                display: true,
                text: "Type de métiers",
                position: "top",
                padding: {
                    bottom: 30,
                }
            },
            legend: {
                display: true,
                position: "bottom",
                padding: {
                    top : 300
                }
            }
        }
    }
});

let chart = document.querySelector("#chartCanvas5");

let graph = new Chart(chart, {

    type: "pie",
    data: {
        labels: [""],
        datasets: [
            {
                data: [""],
                backgroundColor: [
                    '#fc4a50', '#2490F6', '#2ED82E', '#C39D78', '#fc8823', '#ffff55'
                ],
            },
        ],
    },

    options: {
        plugins: {
            tooltip: {
                enabled: true,
                callbacks: {
                    footer: (ttItem) => {
                        let sum = 0;
                        let dataArr = ttItem[0].dataset.data;
                        dataArr.map(data => {
                            sum += Number(data);
                        });

                        let percentage = (ttItem[0].parsed * 100 / sum).toFixed(2) + '%';
                        return `Total: ${percentage}`;
                    }
                }
            },
            labels: {
                render: 'percentage',
                precision: 2
            },
            title: {
                display: true,
                text: "Liste des métiers",
                position: "top",
                padding: {
                    bottom: 30,
                }
            },
            legend: {
                display: true,
                position: "bottom",
                padding: {
                    top : 300
                }
            }
        }
    }
});

let ctx2 = document.querySelector("#chartCanvas3");

let graph2 = new Chart(ctx2, {
    type: "polarArea",
    data: {
        labels: [''],
        datasets: [{
            data: [''],
            backgroundColor: ['#fc4a50', '#2490F6', '#2ED82E', '#C39D78', '#fc8823']
        }]
    },
    options: {
        plugins:{
            title: {
                display: true,
                text: "Dépenses",
                position: 'top',
                padding: {
                    bottom: 30
                }
            },
            legend: {
                display: true,
                position: 'bottom',
            }
        }
    }
})

let ctx3 = document.querySelector("#chartCanvas4");

let graph3 = new Chart(ctx3, {
    type: "bar",
    data: {
        labels: [""],
        datasets: [{
            data: [''],
            backgroundColor: ['#fc4a50', '#2490F6', '#2ED82E', '#C39D78', '#fc8823', '#ffff55']
        }]
    },
    options: {
        plugins:{
            title: {
                display: true,
                text: "Recettes",
                position: 'top',
                padding: {
                    bottom: 30
                }
            },
            legend: {
                display: false,
                position: 'bottom',
            }
        }
    }
})
