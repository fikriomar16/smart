(function () {
	var contador = 0;
	setInterval(setDates, 1000);

	function setDates() {
		var date = new Date;
		var hour = date.getHours(),
		minutes = (date.getMinutes() < 10) ? '0' + String(date.getMinutes()):
		date.getMinutes();
		hourTitle = document.getElementById('hour');
		if (!contador) {
			hourTitle.textContent = hour + ':' + minutes;
			contador = 1;
		} else {
			hourTitle.textContent = hour + ' ' + minutes;
			contador = 0;
		}
	}
})()