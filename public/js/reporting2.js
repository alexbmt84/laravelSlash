function updateChart2() {

    async function fetchData() {

        const url = '/data';
        const response = await fetch(url);
        const datapoints = await response.json();

        return datapoints;

    }

    fetchData().then(datapoints => {

        let sphereMetier = [];
        let sphereLabel = [];

        datapoints.spheres.forEach((element) => {

            let total = element.total;
            let label = element.label

            sphereMetier.push(total);
            sphereLabel.push(label);

        });

        graphSphere.data.datasets[0].data = sphereMetier;
        graphSphere.data.labels = sphereLabel;

        graphSphere.update();

    });
}

window.addEventListener("load", myInit, true); function myInit(){updateChart2()}

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
