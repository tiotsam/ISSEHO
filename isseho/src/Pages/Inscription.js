import React, { useState } from 'react'
import '../Style/Inscription.css'

export default function Inscription() {
    
    const [error, seterror] = useState(null);

    const Login = async (e) =>{

        e.preventDefault();

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

            // setisAuthenticated(true);
            // handleLog();

        }
        else if(resp.status === 200){
            let obj = await resp.json();
            seterror(obj.message);
        }

    }

    return (
        <div className='inscrip-container'>
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
                            <input className='form-input' type='text' name='pass' id='pass' />
                        </div>

                        <input className='form-submit' type='submit' value='Se connecter' />
                    </form>
                </div>

            </div>
        </div>
    )
}

