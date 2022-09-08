const btnLogin = document.getElementById('btn_form');

const formSubmit = () => {
	const inputEmail = document.getElementById('email');
	const inputPassword = document.getElementById('password');
	const errorMessage = document.getElementById('error');

	const dataLogin = {
		email: inputEmail.value,
		password: inputPassword.value,
	};
	const dataJson = JSON.stringify(dataLogin, null, 4);

	const token = btoa('subversuman:mW5ihMGs');

	fetch('https://subversum.space/api/login', {
		method: 'POST',
		body: dataJson,
		headers: {
			Authorization: 'Basic ' + token,
			'Content-Type': 'application/json',
			Accept: 'application/json',
		},
	})
		.then((res) => res.json())
		.then((data) => {
			window.sessionStorage.setItem('id', data.user.id);
			window.sessionStorage.setItem('name', data.user.name);
		})
		.then(() => window.location.assign('https://subversum.space/index.html#'))
		.catch((res) => (errorMessage.style.display = 'block'));
};

btnLogin.addEventListener('click', formSubmit);
document.addEventListener('keyup', (e) => {
	if (e.code === 'Enter') formSubmit();
});
