const nameCollection = document.getElementsByClassName('name');
const registerCollection = document.getElementsByClassName('register_btn');
const loginCollection = document.getElementsByClassName('login');
const logoutBtn = document.getElementById('logout');
const btnBuy = document.getElementById('btn_buy');

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

	btnBuy.href =
		'https://commerce.coinbase.com/checkout/0ce5367a-5179-41da-8d3c-6e7e80624715';
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
