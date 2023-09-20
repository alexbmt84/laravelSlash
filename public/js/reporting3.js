function updateChart3() {

    async function fetchData() {

        const url = '/data';
        const response = await fetch(url);
        const datapoints = await response.json();

        console.log(datapoints);

        return datapoints;
    }

    fetchData().then(datapoints => {

        let recettes = [];
        let depenses = [];
        let noms = [];

        datapoints.recettesDepenses.forEach((element) => {

            let recette = element.recette;
            let depense = element.recette;

            recettes.push(recette);
            depenses.push(depense);

        });

        datapoints.data.forEach((element) => {

            let event = element.nom_evenement;
            noms.push(event);

        });

        graph2.data.datasets[0].data = depenses;
        graph2.data.labels = noms;

        graph3.data.datasets[0].data = recettes;
        graph3.data.labels = noms;

        graph2.update();
        graph3.update();

    });

}

window.addEventListener("load", myInit2, true); function myInit2(){updateChart3()}

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
