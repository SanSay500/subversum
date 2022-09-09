const btnSend = document.getElementById('btn_form');

const inputName = document.getElementById('name');
const inputEmail = document.getElementById('email');
const inputPassword = document.getElementById('password');
const inputConfirmPassword = document.getElementById('confirmPassword');
const errorMessage = document.getElementById('error');

btnSend.addEventListener('click', () => {
	formSubmit(
		inputName,
		inputEmail,
		inputPassword,
		inputConfirmPassword,
		errorMessage
	);
});
document.addEventListener('keyup', (e) => {
	if (e.code === 'Enter')
		formSubmit(
			inputName,
			inputEmail,
			inputPassword,
			inputConfirmPassword,
			errorMessage
		);
});

function formSubmit(name, email, password, confirmPassword, error) {
	const emailRegex =
		/^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;

	if (!emailRegex.test(email.value)) {
		error.children[0].innerHTML = `Email is not valid.`;
		error.style.display = 'block';
		return;
	}

	if (password.value !== confirmPassword.value) {
		error.children[0].innerHTML = `Password confirmation doesn't match password.`;
		error.style.display = 'block';
		return;
	}

	const dataReg = {
		name: name.value,
		email: email.value,
		password: password.value,
		password_confirmation: confirmPassword.value,
	};
	const dataJson = JSON.stringify(dataReg, null, 4);
	const token = btoa('subversuman:mW5ihMGs');

	fetch('https://subversum.space/api/register', {
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
			if (data.message) {
				error.children[0].innerHTML = data.message;
				error.style.display = 'block';
			}

			window.sessionStorage.setItem('id', data.user.id);
			window.sessionStorage.setItem('name', data.user.name);
		})
		.then(() => window.location.assign('https://subversum.space/index.html#'))
		.catch((res) => console.log(res));
}
