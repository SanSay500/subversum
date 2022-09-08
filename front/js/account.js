const title = document.getElementById('title');

window.sessionStorage.id
	? (title.innerHTML = window.sessionStorage.name.toUpperCase())
	: (title.innerHTML = 'account');
