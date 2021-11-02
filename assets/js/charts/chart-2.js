import getRange from "../utils/getRange.js";

const options = {
	plugins: {
		legend: {
			display: true,
			position: "bottom",
			labels: {
				padding: 20,
			},
		},
		title: {
			display: true,
			text: "Best selling products (Last 30 days)",
		},
	},
	aspectRatio: 1.5,
	scales: {
		y: {
			min: 0,
		},
	},
};

const labels = [
	"Haroon's Holy Sword",
	"Gonzalistic Missile",
	"Pere's TypeScript Knowledge",
	"Alberto's Laravel Tutorials",
	"Sergi's Adventures Book",
	"Marc's Financial Advises",
];

const values = getRange(0, labels.length).map(() => Math.round(Math.random() * 100));

const data = {
	labels,
	datasets: [
		{
			label: "# units",
			data: values,
			backgroundColor: [
				"rgba(255, 99, 132, 0.2)",
				"rgba(54, 162, 235, 0.2)",
				"rgba(255, 206, 86, 0.2)",
				"rgba(75, 192, 192, 0.2)",
				"rgba(153, 102, 255, 0.2)",
				"rgba(255, 159, 64, 0.2)",
			],
			borderColor: [
				"rgba(255, 99, 132, 1)",
				"rgba(54, 162, 235, 1)",
				"rgba(255, 206, 86, 1)",
				"rgba(75, 192, 192, 1)",
				"rgba(153, 102, 255, 1)",
				"rgba(255, 159, 64, 1)",
			],
			borderWidth: 1,
		},
	],
};

const config = {
	type: "pie",
	data,
	options,
};

new Chart(document.querySelector("#chart02"), config);
