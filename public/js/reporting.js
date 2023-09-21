function updateChart() {

    async function fetchData() {

        const url = '/data';
        const response = await fetch(url);
        const datapoints = await response.json();

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

        eventsChart.data.labels = events;
        eventsChart.data.datasets[0].data = dureeEvent;

        jobsChart.data.datasets[0].data = users;
        jobsChart.data.labels = metiers;

        depensesChart.data.datasets[0].data = depenses;
        depensesChart.data.labels = events;

        recettesChart.data.datasets[0].data = recettes;
        recettesChart.data.labels = events;

        spheresChart.data.datasets[0].data = sphereMetier;
        spheresChart.data.labels = sphereLabel;

        eventsChart.update();
        jobsChart.update();
        depensesChart.update();
        recettesChart.update();
        spheresChart.update();

    });

}

window.addEventListener("load", myInit, true); function myInit(){updateChart()}

const percent = 0;
const percentValue = percent;

const color = '#212121';
const canvas = 'eventsCanvas';
const container = 'chartContainer';

const chartFigure = document.getElementById("chart__figure");
const eventsCanvas = document.getElementById(canvas);
const chartContainer = document.getElementById(container);

const pPercent = document.createElement("p");
pPercent.setAttribute("id", "pourcentage2");
pPercent.innerText = percentValue + "%";

chartFigure.appendChild(pPercent);

const eventsChart = new Chart(eventsCanvas, {

    type: "doughnut",

    data: {

        labels: [""],

        datasets: [{

            data: [],

            backgroundColor: [
                "#FC4A50",
                "#2490F6",
                "#ffc7c4",
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

let spheresCanvas = document.querySelector("#chartCanvas2")

let spheresChart = new Chart(spheresCanvas, {

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

let jobsCanvas = document.querySelector("#chartCanvas5");

let jobsChart = new Chart(jobsCanvas, {

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

let depensesCanvas = document.querySelector("#chartCanvas3");

let depensesChart = new Chart(depensesCanvas, {
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

let recettesCanvas = document.querySelector("#chartCanvas4");

let recettesChart = new Chart(recettesCanvas, {
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
