import getRange from "../utils/getRange.js";

const range = getRange(0, 30);

const options = {
	plugins: {
		legend: {
			display: false,
		},
		title: {
			display: true,
			text: "Number of daily sales (Last 30 days)",
		},
	},
	tension: 0.25,
	backgroundColor: "#0b2d51",
	borderColor: "#253f5a",
	aspectRatio: 1.5,
	scales: {
		y: {
			min: 0,
		},
	},
};

const labels = range.map((value) => {
	const date = new Date();
	date.setDate(date.getDate() - value);

	return date.toLocaleString("es-ES", {
		year: "2-digit",
		month: "2-digit",
		day: "2-digit",
	});
});

const values = range.map(() => Math.round(Math.random() * 200) + 100);

const data = {
	labels,
	datasets: [
		{
			data: values,
		},
	],
};

const config = {
	type: "line",
	data,
	options,
};

new Chart(document.querySelector("#chart01"), config);
