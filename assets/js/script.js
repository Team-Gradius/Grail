class GrailHandler {
	logout() {
		alert('Error Logging Out');
	}

	open($page) {
		window.location.href = "/"+$page;
	}
}

var Grail = new GrailHandler();