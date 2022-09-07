import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';
// import axios from 'axios';
import './styles.css';

const appStyle = {
    height: '350px',
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

const Field = React.forwardRef(({label, type}, ref) => {
    return (
        <div>
        <label style={labelStyle}>{label}</label>
        <input ref={ref} type={type} style={inputStyle}/>
        </div>
        );
    });

    const Form = ({setLogin, setDataLogin}) => {
        const emailRef = React.useRef();
        const passwordRef = React.useRef();


        function login(e) {
            e.preventDefault();

            const dataLogin = {
                email: emailRef.current.value,
                password: passwordRef.current.value,
            };
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

        const logout = (e) => {
            e.preventDefault();
            fetch('https://subversum.space/api/logout', {
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer 1|TKs9DCANgCIzNLZFTYfzifpNv41WsitYNhJYpd5v',
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
        <form style={formStyle} onSubmit={login}>
        <Field ref={emailRef} label='Email:' type='text'/>
        <Field ref={passwordRef} label='Password:' type='password'/>

        <div>
        <button style={submitStyle} type='submit'>
        Login
        </button>
        <button style={submitStyle} onClick={logout} type='button'>
        Logout
        </button>
        </div>
        </form>
        );
    };

    //Form Reg
    const FormReg = () => {
        const RegUsernameRef = React.useRef();
        const RegEmailRef = React.useRef();
        const RegPasswordRef = React.useRef();
        const RegPasswordConfirmRef = React.useRef();

        function register(e) {
            e.preventDefault();
            const dataReg = {
                name: RegUsernameRef.current.value,
                email: RegEmailRef.current.value,
                password: RegPasswordRef.current.value,
                password_confirmation: RegPasswordConfirmRef.current.value,
            };
            const json = JSON.stringify(dataReg, null, 4);
            console.log(json);
            fetch('https://subversum.space/api/register', {
                method: 'POST',
                body: json,
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then((res) => res.json())
            .then((res) => {
                console.log(res);
            });
        };


        return (
            <form style={formStyle} onSubmit={register}>
            <Field ref={RegUsernameRef} label='Name:' type='text'/>
            <Field ref={RegEmailRef} label='Email:' type='text'/>
            <Field ref={RegPasswordRef} label='Password:' type='password'/>
            <Field ref={RegPasswordConfirmRef} label='Password Confirm:' type='password'/>

            <div>
            <button style={submitStyle} type='submit'>
            Register
            </button>

            </div>
            </form>
            );
        };


        // Usage example:

        const App = () => {
            const [buildings_ar, setBuildings_ar] = useState();
            const [workers_ar, setWorkers_ar] = useState();
            const [resources_ar, setResources_ar] = useState();
            const [users_ar, setUsers_ar] = useState();
            const [planets_ar, setPlanets_ar] = useState();
            const [regions_ar, setRegions_ar] = useState();
            const [login, setLogin] = useState(false);
            const [dataLogin, setDataLogin] = useState();

            function buildings() {
                fetch('https://subversum.space/api/buildings')
                .then((response) => response.json())
                .then((d) => {
                    setBuildings_ar(d.data);
                });
            }

            function workers() {
                fetch('https://subversum.space/api/workers', {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer 1|TKs9DCANgCIzNLZFTYfzifpNv41WsitYNhJYpd5v',
                    },
                })
                .then((res) => res.json())
                .then((res) => {
                    setWorkers_ar(res)
                });
            }

            function resources() {
                fetch('http://localhost:83/api/resources')
                .then((response) => response.json())
                .then((d) => {
                    setResources_ar(d);
                });
            }

            function users() {
                // axios.get('http://localhost:83/api/users')
                // .then(response => console.log(response))
                // .catch(error => console.log(error));
                fetch('https://subversum.space/api/users')
                .then((response) => response.json())
                .then((d) => {
                    setUsers_ar(d.data);
                    // console.log(users_ar);
                });
            }

            function planets() {
                fetch('https://subversum.space/api/planets')
                .then((response) => response.json())
                .then((d) => {
                    setPlanets_ar(d.data);
                });
            }

            function regions() {
                fetch('https://subversum.space/api/regions')
                .then((response) => response.json())
                .then((d) => {
                    console.log(d);
                    setRegions_ar(d);
                });
            }

            return (
                <>
                <div style={appStyle}>
                <Form
                setLogin={setLogin}
                setDataLogin={setDataLogin}
                />
                <FormReg/>
                </div>


                {login ? (
                    <div>
                    {dataLogin.id}
                    <br/> {dataLogin.name} <br/> {dataLogin.email}
                    </div>
                    ) : (
                    <div>{dataLogin}</div>
                    )}

                    <button style={submitStyle} onClick={regions}>
                    Regions
                    </button>

                    {regions_ar === undefined ? (
                        <></>
                        ) : (
                        regions_ar.map((el, i) => <div key={i}>name: {el.name} - user_id: {el.user_id}</div>)
                        )}

                        <button style={submitStyle} onClick={buildings}>
                        Buildings
                        </button>

                        {buildings_ar === undefined ? (
                            <></>
                            ) : (
                            buildings_ar.map((el, i) => <div key={i}>{el.type} - id: {el.id}</div>)
                            )}

                            <button style={submitStyle} onClick={workers}>
                            Workers
                            </button>

                            {workers_ar === undefined ? (
                                <></>
                                ) : (
                                workers_ar.map((el, i) => <div key={i}>{el.type} - id: {el.id}</div>)
                                )}

                                <button style={submitStyle} onClick={resources}>
                                Resources
                                </button>

                                {resources_ar === undefined ? (
                                    <></>
                                    ) : (
                                    resources_ar.map((el, i) => <div key={i}>{el.type} - id: {el.id}</div>)
                                    )}


                                    <button style={submitStyle} onClick={users}>
                                    Users
                                    </button>

                                    {users_ar === undefined ? (
                                        <></>
                                        ) : (
                                        users_ar.map((el, i) => (
                                        <div key={i}>
                                        name: {el.name} - email: {el.email} - regions :{' '}
                                        {el.regions.map((region, index) => {
                                            return <>{region.name}, </>;
                                        })}
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
