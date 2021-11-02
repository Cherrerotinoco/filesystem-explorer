import getRange from "../utils/getRange.js";

const labelRange = getRange(0, 6);
const datasetRange = getRange(0, 3);

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
			text: "Most visited categories (Last 6 months)",
		},
	},
	aspectRatio: 1.5,
	scales: {
		y: {
			min: 0,
		},
	},
};

const labels = labelRange.map((value) => {
	const date = new Date();
	date.setMonth(date.getMonth() - value);

	return date.toLocaleString("es-ES", {
		month: "long",
	});
});

const datasets = datasetRange.map(() => labelRange.map(() => Math.round(Math.random() * 100)));

console.log(datasets);
const data = {
	labels,
	datasets: [
		{
			label: "Services",
			data: datasets[0],
			backgroundColor: "rgb(231, 111, 81, 0.5)",
			borderWidth: 1,
		},
		{
			label: "Relics",
			data: datasets[1],
			backgroundColor: "rgb(42, 157, 143, 0.5)",
			borderWidth: 1,
		},
		{
			label: "Books",
			data: datasets[2],
			borderWidth: 1,
			backgroundColor: "rgb(233, 196, 106, 0.5)",
		},
	],
};

const config = {
	type: "radar",
	data,
	options,
};

new Chart(document.querySelector("#chart04"), config);
