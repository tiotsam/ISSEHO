import React, { useState } from 'react'
import '../Style/Inscription.css'
import jwtDecode from 'jwt-decode';

export default function Inscription() {

    const [error, seterror] = useState('');

    const register = async (e)=>{

        e.preventDefault();

    }

    return (
        <div className='login-container'>
            <img className='img-fond' src={require('../assets/inscription.jpg')} alt="fond" />
            <div className='container2-transp'>
                <img className='register-img' src={require('../assets/registerImg.png')} alt='form' />
                    <div className='container2-dark'>

                        <form className='registerForm' onSubmit={register}>
                            <h2>Formulaire d'inscription</h2>
                            <span>{error}</span>

                            <div className='form-champ-double'>

                                <div className='form-sschamp-double'>
                                    <label className='form-label'>Prénom :</label>
                                    <input className='form-input' type='text' name='prenom' id='prenom' />
                                </div>

                                <div className='form-sschamp-double'>
                                    <label className='form-label'>Nom :</label>
                                    <input className='form-input' type='text' name='nom' id='nom' />
                                </div>

                            </div>

                            <div className='form-champ'>
                                <label className='form-label'>Adresse mail :</label>
                                <input className='form-input' type='text' name='mail' id='mail' />
                            </div>

                            <div className='form-champ'>
                                <label className='form-label'>Mot de passe :</label>
                                <input className='form-input' type='password' name='pass' id='pass' />
                            </div>

                            <div className='form-champ'>
                                <label className='form-label'>Confirmer le mot de passe :</label>
                                <input className='form-input' type='password' name='confPass' id='Pass' />
                            </div>

                            <div className='form-champ'>
                                <label className='form-label'>Rue :</label>
                                <input className='form-input' type='text' name='rue' id='rue' />
                            </div>

                            <div className='form-champ'>
                                <label className='form-label'>Département :</label>
                                <input className='form-input' type='number' name='dpt' id='dpt' />
                            </div>

                            <div className='form-champ'>
                                <label className='form-label'>Ville :</label>
                                <input className='form-input' type='text' name='ville' id='ville' />
                            </div>

                            <div className='form-champ'>
                                <label className='form-label'>Date de naissance :</label>
                                <input className='form-input' type='date' name='birthdate' id='birthdate' />
                            </div>



                            <input className='form-submit' type='submit' value="S'inscrire" />
                        </form>
                </div>
            </div>
        </div>
    )
}

