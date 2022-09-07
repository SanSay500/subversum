const btnName = document.getElementById('name');
const btnRegister = document.getElementById('register');
const btnLogin = document.getElementById('login');
const btnLogout = document.getElementById('logout');

btnName.style.display = 'none';
btnLogout.style.display = 'none';

if (window.sessionStorage.id) {
	btnRegister.style.display = 'none';
	btnLogin.style.display = 'none';

	btnLogout.style.display = 'block';
	btnName.style.display = 'block';
	btnName.children[0].innerHTML = window.sessionStorage.name.toUpperCase();
}

btnLogout.addEventListener('click', () => {
	window.sessionStorage.clear();
	const token = btoa('subversuman:mW5ihMGs');

	axios('/api/logout', {
		method: 'POST',
		headers: {
			Authorization: 'Basic ' + token,
		},
	})
		.then(function (res) {
			window.location.reload();
		})
		.catch(function (error) {
			console.log(error);
		});
});
