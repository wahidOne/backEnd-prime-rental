import Profile from "./Profile";
import UserTransaction from "./userTransactions";
import Inbox from "./Inbox";

import * as HandleFileUploadUI from "./_handleUIFileUpload";

class Dashboard {
	constructor() {
		this.sidebar = document.querySelector(".dashboard--sidebar");
	}

	render() {
		const sidebar = this.sidebar;
		new Profile().render();
		new UserTransaction().render();

		const badgeLinkInboxSidebar = sidebar.querySelector("#bagde-sidebar-inbox");
		const urlLoadInbox = sidebar.dataset.loadinbox;

		new Inbox(badgeLinkInboxSidebar, urlLoadInbox).render();

		HandleFileUploadUI.handleDropifyFile();
	}
}

export default Dashboard;
