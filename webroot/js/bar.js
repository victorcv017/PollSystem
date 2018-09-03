$(document).ready(function () {

	var ctx = $("#Canvas-Barras");

	var data = {
		labels : ["Servicio1", "Servicio2", "Servicio3"],
		datasets : [
			{
				label : "Gato1",
				data : [10, 50, 25],
				backgroundColor : [
					"rgba(10, 20, 30, 0.3)",
					"rgba(10, 20, 30, 0.3)",
					"rgba(10, 20, 30, 0.3)"					
				],
				borderColor : [
					"rgba(10, 20, 30, 1)",
					"rgba(10, 20, 30, 1)",
					"rgba(10, 20, 30, 1)"					
				],
				borderWidth : 1
			},
			{
				label : "Gato2",
				data : [20, 35,70],
				backgroundColor : [
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)",
					"rgba(50, 150, 250, 0.3)"					
				],
				borderColor : [
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)",
					"rgba(50, 150, 250, 1)"
				],
				borderWidth : 1
			}
		]
	};

	var options = {
		title : {
			display : true,
			position : "top",
			text : "Grafica de los servicios",
			fontSize : 18,
			fontColor : "#111"
		},
		legend : {
			display : true,
			position : "bottom"
		},
		scales : {
			yAxes : [{
				ticks : {
					min : 0
				}
			}]
		}
	};

	var chart = new Chart( ctx, {
		type : "bar",
		data : data,
		options : options
	});

});