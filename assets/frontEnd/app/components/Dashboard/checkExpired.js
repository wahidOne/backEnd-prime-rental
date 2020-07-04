class CheckExpired {
	constructor(selector) {
		this.selector = selector;
		this.dateStart = selector.dataset.time;
		this.expired = new Date(this.dateStart).getTime();
		this.remeaningtime = {};
	}

	countRemeaning() {
		return new Promise((resolve) => {
			this.now = new Date().getTime();

			const distance = this.expired - this.now;

			this.remeaningtime.days = Math.floor(distance / (1000 * 60 * 60 * 24));

			this.remeaningtime.hours = Math.floor(
				(distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
			);
			this.remeaningtime.minutes = Math.floor(
				(distance % (1000 * 60 * 60)) / (1000 * 60)
			);
			this.remeaningtime.seconds = Math.floor((distance % (1000 * 60)) / 1000);

			this.remeaningtime.distance = distance;
			resolve(this.remeaningtime);
		});
	}

	stop(interval) {
		clearInterval(interval);
	}
}

export default CheckExpired;
