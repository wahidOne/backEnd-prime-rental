import Axios from "axios";
import handleNotif from "./Inbox/handlerNotif";
import * as handleInbox from "./Inbox/handleUI.Inbox";

class Inbox {
	constructor(sidebarLinkInbox, url) {
		this.sidebarLinkInbox = sidebarLinkInbox;

		this.inboxContent = document.querySelector("#inbox-content");
		this.inboxContentUnread = document.querySelector("#inbox-contentunread");

		this.urlLoad = url;
	}

	loadInboxSidebar(url, badge) {
		Axios.get(url)
			.then(function (response) {
				const inbox = response.data.inbox;
				if (inbox != false) {
					handleNotif(inbox, badge);
				}
			})
			.catch(function (error) {
				// handle error
				console.log(error);
			});
	}

	getInbox(url) {
		const inboxContent = this.inboxContent;
		const inboxContentUnread = this.inboxContentUnread;

		if (inboxContentUnread && inboxContent) {
			Axios.get(url)
				.then((res) => {
					const inbox = res.data.inbox;
					const user = res.data.user;

					let containerInbox = "";
					let containerInboxUnread = "";

					let sender;

					if (inbox.length > 0) {
						inbox.map((i) => {
							// const sender = user.filter((user) => {
							// 	const test = user.user_email == i.inbox_from;
							// 	console.log(test);
							// });

							if (user.length > 0) {
								sender = user.filter((e) => e.user_email == i.inbox_from);

								const domain = inboxContent.dataset.domain;
								containerInbox += handleInbox.displayList(i, sender, domain);

								if (i.inbox_status == 0) {
									sender = user.filter((e) => e.user_email == i.inbox_from);
									const domain = inboxContent.dataset.domain;
									containerInboxUnread += handleInbox.displayList(
										i,
										sender,
										domain
									);
									inboxContentUnread.innerHTML = containerInboxUnread;
								}

								inboxContent.innerHTML = containerInbox;
							}
						});
					}
				})
				.catch((err) => console.log(err))
				.then(function () {
					const subject = inboxContent.getElementsByClassName("inbox__subject");

					handleInbox.handleSortSubject(subject);
				});
		}
	}

	render() {
		const badgeInboxSidebar = this.sidebarLinkInbox;
		const idUser = badgeInboxSidebar.dataset.userid;
		const loadurl = this.urlLoad + "?user_id=" + idUser;

		setInterval(() => {
			this.loadInboxSidebar(loadurl, badgeInboxSidebar);
		}, 1000);

		this.getInbox(loadurl);
	}

	autoSendInboxOrderDecline(domain, url, order) {
		const { rent_id } = order;

		let inboxTextContainer = "";

		// console.log(order);
		// console.log(rent_id);

		inboxTextContainer += handleInbox.inboxTextTemplateOrderDecline(
			order,
			domain
		);

		const subject = `Pesanan anda telah dibatalkan`;
		const title = `Pembatalan transaksi `;
		const inbox_to = `${order.user_id}`;
		const inbox_from = "primerental@gmail.com";

		const data = {
			inbox_subject: subject,
			inbox_to: inbox_to,
			inbox_from: inbox_from,
			inbox_text: inboxTextContainer,
			inbox_title: title,
			// rent_id: rent_id.value,
		};

		// console.log(data);

		const config = {
			headers: {
				"Content-Type": "application/json",
			},
		};

		Axios.post(url, JSON.stringify(data), config)
			.then((res) => {
				console.log(res);
			})
			.catch((err) => console.log(err));
	}
}

export default Inbox;
