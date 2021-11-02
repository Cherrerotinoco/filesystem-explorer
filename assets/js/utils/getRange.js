export default function getRange(start, end, step = 1) {
	const list = [];

	for (let i = start; i < end; i += step) {
		list.push(i);
	}

	return list;
}
