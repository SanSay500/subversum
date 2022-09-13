// axios
// 	.get('https://subversum.space/api/sanctum/csrf-cookie')
// 	.then((response) => response.json())
// 	.then((response) => console.log(response));

console.log('main');

const btnLogout = document.getElementById('logout');

btnLogout.addEventListener('click', (e) => {
	e.preventDefault();

	axios
		.post('/api/logout')
		.then(function (response) {
			console.log(response.data);
		})
		.catch(function (error) {
			console.log(error);
		});
});
