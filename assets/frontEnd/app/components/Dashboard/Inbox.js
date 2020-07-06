import Axios from "axios";
import handleNotif from "./Inbox/handlerNotif";
import * as handleInbox from "./Inbox/handleUI.Inbox";

class Inbox {
	constructor(sidebarLinkInbox, url) {
		this.sidebarLinkInbox = sidebarLinkInbox;

		this.inboxContent = document.querySelector("#inbox-content");
		this.inboxContentUnread = document.querySelector("#inbox-contentunread");

		this.urlLoad = url;

		this.linkTabInbox = document.getElementsByName(".");
	}

	loadInboxSidebar(url, badge) {
		Axios.get(url)
			.then(function (response) {
				const inbox = response.data.inbox;
				handleNotif(inbox, badge);
			})
			.catch(function (error) {
				// handle error
				console.log(error);
			});
	}

	getInbox(url) {
		const inboxContent = this.inboxContent;
		const inboxContentUnread = this.inboxContentUnread;

		Axios.get(url)
			.then((res) => {
				const inbox = res.data.inbox;
				const user = res.data.user;

				let containerInbox = "";
				let containerInboxUnread = "";

				inbox.map((i) => {
					const sender = user.filter((e) => e.user_email == i.inbox_from);

					const domain = inboxContent.dataset.domain;

					containerInbox += handleInbox.displayList(i, sender, domain);

					if (i.inbox_status == 0) {
						containerInboxUnread += handleInbox.displayList(i, sender, domain);
						inboxContentUnread.innerHTML = containerInboxUnread;
					}

					inboxContent.innerHTML = containerInbox;
				});
			})
			.catch((err) => console.log(err))
			.then(function () {
				const subject = inboxContent.getElementsByClassName("inbox__subject");

				handleInbox.handleSortSubject(subject);
			});
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
}

export default Inbox;
