const displayList = (inbox, sender, userPath) => {
	const _sender = sender[0];

	return `
    <a href="${userPath}user/${inbox.user_id}/dashboard/inbox/${inbox.inbox_id}" class="message-link row py-2">
        <div class="col-2 text-center">
            <img class="rounded-circle" height="50" src="${userPath}assets/uploads/ava/${_sender.user_photo}" alt=""></div>
            <div class="col-10 d-flex flex-row align-items-center justify-content-between flex-wrap px-2">
            <h5 class="text-dark font-13px font-md-20px my-auto text-left flex-grow-1">
                ${_sender.user_name}
            </h5>
            <div class="d-flex flex-row align-items-center justify-content-between flex-grow-1 text-dark">
                <p class="inbox__subject font-w-400 font-11px font-md-15px my-auto text-left">
                ${inbox.inbox_subject}
                </p>
                <small class="text-right text-dark flex-grow-1 ml-3">
                   ${inbox.date_format_sort}
                </small>
            </div>
        </div>
    </a>
    
    `;
};

const handleSortSubject = (selector) => {
	[...selector].map((title) => {
		let titleText = title.textContent
			.replace(/\s+/g, " ")
			.replace(/(\r\n|\n|\r)/gm, " ");
		const arrayText = titleText.split(" ");
		const content = title;

		let sortText;

		sortText = arrayText.splice(0, 12).join(" ");

		content.innerHTML = `${sortText} ...`;
	});
};

// exports = {
// 	handleSortSubject: handleSortSubject,
// 	listMessageUI: listMessageUI,
// };

export { handleSortSubject, displayList };

// export default listMessageUI;
