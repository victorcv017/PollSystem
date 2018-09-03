function graph(gradeService, gradeStaff) {

    var ctx = $("#Canvas-Barras");

    var data = {

        datasets: [
            {
                label: "Servicio",
                data: [0,gradeService],
                backgroundColor: [
                    "rgba(10, 20, 30, 0.3)",
                    "rgba(10, 20, 30, 0.3)"
                ],
                borderColor: [
                    "rgba(10, 20, 30, 1)",
                    "rgba(10, 20, 30, 1)"
                ],
                borderWidth: 1
            },
            {
                label: "Personal",
                data: [0,gradeStaff],
                backgroundColor: [
                    "rgba(50, 150, 250, 0.3)",
                    "rgba(50, 150, 250, 0.3)"
                ],
                borderColor: [
                    "rgba(50, 150, 250, 1)",
                    "rgba(50, 150, 250, 1)"
                ],
                borderWidth: 1
            }
        ]
    };

    var options = {
        title: {
            display: true,
            position: "top",
            text: "Grafica de los servicios",
            fontSize: 18,
            fontColor: "#111"
        },
        legend: {
            display: true,
            position: "bottom"
        },
        scales: {
            yAxes: [{
                    ticks: {
                        min: 0
                    }
                }],
            xAxes: [{
                    ticks: {
                        min: 0,
                        max: 100
                    }
                }]

        }
    };

    var chart = new Chart(ctx, {
        type: "line",
        data: data,
        options: options
    });

}