import React, { useState } from 'react'
import '../Style/Login.css'
import jwtDecode from 'jwt-decode';
import { useNavigate } from 'react-router-dom';

export default function Login({setisAuthenticated}) {

    const [error, seterror] = useState(null);
    let navigate = useNavigate();

    const Login = async (e) =>{

        e.preventDefault();

        if( e.target.mail.value !== '' && e.target.pass.value !== ''){

            let option = {
                method: 'POST',
                body: JSON.stringify({
                    username: e.target.mail.value,
                    password: e.target.pass.value,
                }),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            }

            console.log(process.env.REACT_APP_URL);

            const resp = await fetch( process.env.REACT_APP_URL + '/login' , option );

            if(resp.status === 200){
                
                
                const jwt = await resp.json();
                

                let user = {
                    id : jwtDecode(jwt.token).id,
                    email : jwtDecode(jwt.token).username,
                    role : jwtDecode(jwt.token).roles
                }
                
                sessionStorage.setItem('user', JSON.stringify(user));
                sessionStorage.setItem('token', jwt.token);

                console.log('user logged');
                console.log(jwtDecode(sessionStorage.getItem('token')));
                setisAuthenticated(true);
                navigate('/MonCpt');
            }
            else if(resp.status !== 200){
                let obj = await resp.json();
                seterror(obj.message);
            }
        }else{
            seterror('Merci de renseigner le formulaire.');
        }

    }
    
    return (
        <div className='login-container'>
            <img className='img-fond' src={require('../assets/inscription.jpg')} alt="fond" />
            <div className='container-transp'>
                <div className='container-dark'>

                    <form className='loginForm' onSubmit={Login}>
                        <h2>Connexion</h2>
                        <img className='form-img' src={require('../assets/ImgLoginForm.jpg')} alt='form' />
                        
                        <span>{error}</span>
                        <div className='form-champ'>
                            <label className='form-label'>Adresse mail :</label>
                            <input className='form-input' type='text' name='mail' id='mail' />
                        </div>

                        <div className='form-champ'>
                            <label className='form-label'>Mot de passe :</label>
                            <input className='form-input' type='password' name='pass' id='pass' />
                        </div>

                        <input className='form-submit' type='submit' value='Se connecter' />
                    </form>
                </div>
            </div>
        </div>
    )
}
