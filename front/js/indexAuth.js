const nameCollection = document.getElementsByClassName('name');
const registerCollection = document.getElementsByClassName('register_btn');
const loginCollection = document.getElementsByClassName('login');
const logoutCollection = document.getElementsByClassName('logout');

const nameArr = Array.from(nameCollection);
const registerArr = Array.from(registerCollection);
const loginArr = Array.from(loginCollection);
const logoutArr = Array.from(logoutCollection);

nameArr.forEach((el) => {
	el.style.display = 'none';
});
logoutArr.forEach((el) => {
	el.style.display = 'none';
});

// btnName.style.display = 'none';
// btnLogout.style.display = 'none';

if (window.sessionStorage.id) {
	registerArr.forEach((el) => {
		el.style.display = 'none';
	});
	loginArr.forEach((el) => {
		el.style.display = 'none';
	});
	// btnRegister.style.display = 'none';
	// btnLogin.style.display = 'none';
	logoutArr.forEach((el) => {
		el.style.display = 'block';
	});
	// btnLogout.style.display = 'block';
	nameArr.forEach((el) => {
		el.style.display = 'block';
		el.children[0].innerHTML = window.sessionStorage.name.toUpperCase();
	});
	// btnName.style.display = 'block';
	// btnName.children[0].innerHTML = window.sessionStorage.name.toUpperCase();
}

logoutArr.forEach((el) => {
	el.addEventListener('click', () => {
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
});
