const btnSend = document.getElementById('btn_form');

const inputEmail = document.getElementById('email');
const errorMessage = document.getElementById('error');

btnSend.addEventListener('click', () => {
	formSubmit(inputEmail, errorMessage);
});
document.addEventListener('keyup', (e) => {
	if (e.code === 'Enter') formSubmit(inputEmail, errorMessage);
});

function formSubmit(email, error) {
	const emailRegex =
		/^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;

	if (!emailRegex.test(email.value)) {
		error.style.display = 'block';
		return;
	}

	const dataReg = {
		email: email.value,
	};
	const dataJson = JSON.stringify(dataReg, null, 4);
	const token = btoa('subversuman:mW5ihMGs');

	fetch('https://subversum.space/api/forgot-password', {
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
				throw 'err';
			}
		})
		.then(() => window.location.assign('https://subversum.space/index.html#'))
		.catch((res) => console.log(res));
}
