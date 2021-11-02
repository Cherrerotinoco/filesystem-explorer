import getRange from "../utils/getRange.js";

const range = getRange(0, 30);

const options = {
	plugins: {
		legend: {
			display: false,
		},
		title: {
			display: true,
			text: "Revenue, expenses & profit (Last 30 days)",
		},
	},
	aspectRatio: 1.5,
	backgroundColor: "#0b2d51",
	borderColor: "#253f5a",
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

const revenue = range.map(() => Math.round(Math.random() * 2500) + 5000);
const expenses = range.map(() => Math.round(Math.random() * 1000) + 500);
const profit = range.map((index) => revenue[index] - expenses[index]);

const data = {
	labels,
	datasets: [
		{
			label: "Profit (€)",
			data: profit,
			backgroundColor: "green",
			borderColor: "green",
			type: "line",
		},
		{
			label: "Revenue (€)",
			data: revenue,
			backgroundColor: "rgba(0, 0, 255, 0.75)",
		},
		{
			label: "Expenses (€)",
			data: expenses,
			backgroundColor: "rgba(255, 0, 0, 0.75)",
		},
	],
};

const config = {
	type: "bar",
	data,
	options,
};

new Chart(document.querySelector("#chart03"), config);
