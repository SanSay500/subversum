const nameCollection = document.getElementsByClassName('name');
const registerCollection = document.getElementsByClassName('register_btn');
const loginCollection = document.getElementsByClassName('login');
const logoutBtn = document.getElementById('logout');
const accountLink = document.getElementById('accountLink');

const nameArr = Array.from(nameCollection);
const registerArr = Array.from(registerCollection);
const loginArr = Array.from(loginCollection);

nameArr.forEach((el) => {
	el.style.display = 'none';
});
logoutBtn.style.display = 'none';

if (window.sessionStorage.id) {
	registerArr.forEach((el) => {
		el.style.display = 'none';
	});
	loginArr.forEach((el) => {
		el.style.display = 'none';
	});

	logoutBtn.style.display = 'block';
	nameArr.forEach((el) => {
		el.style.display = 'block';
		el.children[0].innerHTML = window.sessionStorage.name.toUpperCase();
	});

	accountLink.href = 'account.html';
}

logoutBtn.addEventListener('click', () => {
	window.sessionStorage.clear();

	const token = btoa('subversuman:mW5ihMGs');

	axios('/api/logout', {
		method: 'POST',
		headers: {
			Authorization: 'Basic ' + token,
		},
	})
		.then((res) => {
			window.location.reload();
		})
		.catch((error) => {
			console.log(error);
		});
});
