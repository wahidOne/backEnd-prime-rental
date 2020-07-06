const handleNotif = (data, selector) => {
	const notRead = data.filter((row) => {
		return row.inbox_status == 0;
	});
	const lenghtNotRead = notRead.length;

	selector.innerHTML = lenghtNotRead;
};

export default handleNotif;
