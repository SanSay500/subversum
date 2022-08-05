import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import './styles.css';

const appStyle = {
	height: '250px',
	display: 'flex',
};

const formStyle = {
	margin: 'auto',
	padding: '10px',
	border: '1px solid #c9c9c9',
	borderRadius: '5px',
	background: '#f5f5f5',
	width: '220px',
	display: 'block',
};

const labelStyle = {
	margin: '10px 0 5px 0',
	fontFamily: 'Arial, Helvetica, sans-serif',
	fontSize: '15px',
};

const inputStyle = {
	margin: '5px 0 10px 0',
	padding: '5px',
	border: '1px solid #bfbfbf',
	borderRadius: '3px',
	boxSizing: 'border-box',
	width: '100%',
};

const submitStyle = {
	margin: '10px 0 0 0',
	padding: '7px 10px',
	border: '1px solid #efffff',
	borderRadius: '3px',
	background: '#3085d6',
	width: '100%',
	fontSize: '15px',
	color: 'white',
	display: 'block',
};

const Field = React.forwardRef(({ label, type }, ref) => {
	return (
		<div>
			<label style={labelStyle}>{label}</label>
			<input ref={ref} type={type} style={inputStyle} />
		</div>
	);
});

const Form = ({ onSubmit, setLogin, setDataLogin }) => {
	const usernameRef = React.useRef();
	const passwordRef = React.useRef();

	const handleSubmit = (e) => {
		e.preventDefault();

		const data = {
			email: usernameRef.current.value,
			password: passwordRef.current.value,
		};

		onSubmit(data);
	};

	const logout = (e) => {
		e.preventDefault();
		fetch('https://subversum.space/api/logout', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
			},
		})
			.then((res) => res.json())
			.then((str) => {
				setLogin(false);
				setDataLogin(str);
			});
	};

	return (
		<form style={formStyle} onSubmit={handleSubmit}>
			<Field ref={usernameRef} label='Email:' type='text' />

			<Field ref={passwordRef} label='Password:' type='password' />

			<div>
				<button style={submitStyle} type='submit'>
					Submit
				</button>

				<button style={submitStyle} onClick={logout} type='button'>
					Logout
				</button>
			</div>
		</form>
	);
};

// Usage example:

const App = () => {
	const [buildings_ar, setBuildings_ar] = useState();
	const [users_ar, setUsers_ar] = useState();
	const [planets_ar, setPlanets_ar] = useState();
	const [login, setLogin] = useState(false);
	const [dataLogin, setDataLogin] = useState();

	const handleSubmit = (data) => {
		const json = JSON.stringify(data, null, 4);

		// setLogin(json);
		// console.clear();
		console.log(json);
		fetch('https://subversum.space/api/login', {
			method: 'POST',
			body: json,
			headers: {
				'Content-Type': 'application/json',
			},
		})
			.then((res) => res.json())
			.then((res) => {
				setDataLogin(res.data);
				setLogin(true);
			});
	};

	function buildings() {
		fetch('https://subversum.space/api/buildings')
			.then((response) => response.json())
			.then((d) => {
				setBuildings_ar(d.data);
			});
	}

	function users() {
		fetch('https://subversum.space/api/users')
			.then((response) => response.json())
			.then((d) => {
				setUsers_ar(d.data);
			});
	}

	function planets() {
		fetch('https://subversum.space/api/planets')
			.then((response) => response.json())
			.then((d) => {
				setPlanets_ar(d.data);
			});
	}
	console.log(dataLogin);
	return (
		<>
			<div style={appStyle}>
				<Form
					onSubmit={handleSubmit}
					setLogin={setLogin}
					setDataLogin={setDataLogin}
				/>
			</div>

			{login ? (
				<div>
					{dataLogin.id}
					<br /> {dataLogin.name} <br /> {dataLogin.email}
				</div>
			) : (
				<div>{dataLogin}</div>
			)}

			<button style={submitStyle} onClick={buildings}>
				Buildings
			</button>

			{buildings_ar === undefined ? (
				<></>
			) : (
				buildings_ar.map((el, i) => <div key={i}>{el.type}</div>)
			)}

			<button style={submitStyle} onClick={users}>
				Users
			</button>

			{users_ar === undefined ? (
				<></>
			) : (
				users_ar.map((el, i) => (
					<div key={i}>
						{el.name} - {el.email}- regions :{' '}
						{el.regions.map((region, index) => {
							return <p key={index}>{region.name}</p>;
						})}
						{console.log(el)}
					</div>
				))
			)}

			<button style={submitStyle} onClick={planets}>
				Planets
			</button>

			{planets_ar === undefined ? (
				<></>
			) : (
				planets_ar.map((el, i) => <div key={i}>{el.name}</div>)
			)}
		</>
	);
};

export default App;
