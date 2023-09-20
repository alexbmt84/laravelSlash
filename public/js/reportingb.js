function updateChartData() {
    async function fetchData() {

        const url = '/data';
        const response = await fetch(url);
        const datapoints = await response.json();

        console.log("Evenements : ", datapoints['data'])

        return datapoints;

    }

    fetchData().then(datapoints => {

        let users = [];
        let metiers = [];

        datapoints.data.forEach((element) => {

            let userId = element.metier.user_id;
            let label = element.metier.nom

            users.push(userId);
            metiers.push(label);

        });

        console.log("Users : ", users);
        console.log("Metiers : ", metiers);

        graph.data.datasets[0].data = users;
        graph.data.labels = metiers;

        graph.update();

    });

}

window.addEventListener("load", myInit, true); function myInit(){updateChartData()}

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
