const months = {
	января: "january",
	февраля: "february",
	марта: "march",
	апреля: "april",
	мая: "may",
	июня: "june",
	июля: "july",
	августа: "august",
	сентября: "september",
	октября: "october",
	ноября: "november",
	декабря: "december",
};

function getCyrToEngDate(input) {
	let date = input.replace(",", "");
	date = date.split(" ");

	return new Date(date[0] + months[date[1]] + date[2]);
}

export default getCyrToEngDate;
