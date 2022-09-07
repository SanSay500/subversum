const btnSend = document.getElementById('btn_form');

btnSend.addEventListener('click', () => {
	const inputName = document.getElementById('name');
	const inputEmail = document.getElementById('email');
	const inputPassword = document.getElementById('password');
	const inputConfirmPassword = document.getElementById('confirmPassword');

	const dataReg = {
		name: inputName.value,
		email: inputEmail.value,
		password: inputPassword.value,
		password_confirmation: inputConfirmPassword.value,
	};
    const token = btoa('subversuman:mW5ihMGs');
	const dataJson = JSON.stringify(dataReg, null, 4);

	fetch('https://subversum.space/api/register', {
		method: 'POST',
		body: dataJson,
		headers: {
			'Authorization': 'Basic ' + token,
			'Content-Type': 'application/json',
			'Accept': 'application/json'
		},
	})
		.then((res) => res.json())
		.then((data) => {
			window.sessionStorage.setItem('id', data.user.id);
			window.sessionStorage.setItem('name', data.user.name);
		})
		.then(() => window.location.assign('https://subversum.space/index.html#'))
		.catch((res) => console.log('err' + res));
});
