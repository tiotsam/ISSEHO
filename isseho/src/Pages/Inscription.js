import React, { useState } from 'react'
import '../Style/Inscription.css'
import jwtDecode from 'jwt-decode';
import { useNavigate } from 'react-router-dom';

export default function Inscription({setisAuthenticated}) {

    const [error, seterror] = useState(null);
    var validator = require("email-validator");
    let navigate = useNavigate();

    const register = async (e) => {

        e.preventDefault();
        seterror(null);
        
        // On récupère les données du formulaire
        
        let roleUser = e.target.typeUser.value == 'Professeur' ? 'prof' : 'parent';
        let mail = e.target.mail.value;
        let pass = e.target.pass.value;
        let confPass = e.target.confPass.value;
        let nom = e.target.nom.value;
        let prenom = e.target.prenom.value;
        let rue = e.target.rue.value;
        let departement = e.target.dpt.value;
        let ville = e.target.ville.value;
        let birthdate = e.target.birthdate.value;
        let today = new Date().toLocaleString();

        // On vérifie les données avant de les envoyer au back
        // On teste le mail
        if (validator.validate(mail) === false) {
            seterror('Veuillez entrer un e-mail valide.');
        }
        
        // On vérifie les mots de passe
        if (pass !== confPass) {
            seterror('Le mot de passe et la confirmation de mot de passe ne correspondent pas.');
        } else if (pass.length < 6) {
            seterror('Le mot de passe doit contenir au moins 6 caractères');
        }
        
        // On vérifie les départements
        if (departement.length === 2 || departement.length === 3) {
            if (isNaN(departement)) {
                if (departement !== '2A' && departement !== '2a' && departement !== '2B' && departement !== '2b') {
                    seterror('Le département doit être un nombre');
                }
            } else if (departement < 0 || departement > 95 || departement == 20) {
                if (departement < 971 || departement > 974 && departement != 976) {
                    
                    seterror('Merci de renseigner un numéro de département valide');
                    
                }
            }
        } else {
            seterror('Un département doit être entre 2 et 3 caractères.');
        }
        
        if( new Date(birthdate) - today < 18){
            seterror('Vous devez être adulte pour vous inscrire sur ce site.');
        }
        
        console.log(error);
        // Si tout est Bon, on l'envoie dans le back

        if (error !== undefined) {
            console.log('Données valides');

            let options = {
                method: 'POST',
                body: JSON.stringify({
                    email: mail,
                    prenom: prenom,
                    nom: nom,
                    password: pass,
                    role: roleUser,
                    rue: rue,
                    departement: departement,
                    ville: ville,
                    birthdate: birthdate,
                    dateInscription: today,
                }),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            }

            const resp = await fetch(process.env.REACT_APP_URL + '/register', options);

            // Si l'utilisateur est bien créé on redirige sur la page mon compte
            if (resp.status === 200) {

                const registerRet = await resp.json();

                console.log('Utilisateur Enregistré');

                let optionLog = {
                    method: 'POST',
                    body: JSON.stringify({
                        username: mail,
                        password: pass,
                    }),
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                }

                console.log(process.env.REACT_APP_URL);

                const resplog = await fetch(process.env.REACT_APP_URL + '/login', optionLog);

                if (resplog === 200) {

                    console.log('utilisateur connectéé');

                    const jwt = await resplog.json();

                    let user = {
                        id: jwtDecode(jwt.token).id,
                        email: jwtDecode(jwt.token).username,
                        role: jwtDecode(jwt.token).roles
                    }

                    sessionStorage.setItem('user', JSON.stringify(user));
                    sessionStorage.setItem('token', jwt.token);

                    setisAuthenticated(true);
                    navigate('/MonCpt');
                }
                else{
                    seterror(resplog);
                }
            }
            else {
                console.log(resp);
                seterror(resp.stringify);
            }
        }

    }

    return (
        <div className='login-container'>
            <img className='img-fond' src={require('../assets/inscription.jpg')} alt="fond" />
            <div className='container2-transp'>
                <img className='register-img' src={require('../assets/registerImg.jpg')} alt='form' />
                <div className='container2-dark'>

                    <form className='registerForm' onSubmit={register}>
                        <h2>Formulaire d'inscription</h2>
                        <span className='errorMsg'>{error}</span>

                        <div className='form-champ-double'>

                            <div className='form-sschamp-double'>
                                <label className='form-label'>Prénom :</label>
                                <input className='form-input' type='text' name='prenom' id='prenom' required placeholder='Prénom requis' />
                            </div>

                            <div className='form-sschamp-double'>
                                <label className='form-label'>Nom :</label>
                                <input className='form-input' type='text' name='nom' id='nom' required placeholder='Nom requis' />
                            </div>

                        </div>

                        <div className='form-champ'>
                            <label className='form-label'>Adresse mail :</label>
                            <input className='form-input' type='text' name='mail' id='mail' required placeholder='Veuillez renseigner votre adresse mail' />
                        </div>

                        <div className='form-champ'>
                            <label className='form-label'>Mot de passe :</label>
                            <input className='form-input' type='password' name='pass' id='pass' required placeholder='Veuillez renseigner votre mot de passe' />
                        </div>

                        <div className='form-champ'>
                            <label className='form-label'>Confirmer le mot de passe :</label>
                            <input className='form-input' type='password' name='confPass' id='confPass' required placeholder='Veuillez confirmer votre mot de passe' />
                        </div>

                        <div className='form-champ'>
                            <label className='form-label'>Rue :</label>
                            <input className='form-input' type='text' name='rue' id='rue' required placeholder='Veuillez renseigner votre rue' />
                        </div>

                        <div className='form-champ-double'>
                            <div className='form-sschamp-double'>
                                <label className='form-label'>Département :</label>
                                <input className='form-input' type='text' name='dpt' id='dpt' required placeholder='Numéro de département' />
                            </div>

                            <div className='form-sschamp-double'>
                                <label className='form-label'>Ville :</label>
                                <input className='form-input' type='text' name='ville' id='ville' required placeholder='Veuillez entrer votre ville' />
                            </div>
                        </div>

                        <div className='form-champ-double'>
                            <div className='form-sschamp-double'>
                                <label className='form-label'>Date de naissance :</label>
                                <input className='form-input' type='date' name='birthdate' id='birthdate' required />
                            </div>
                            <div className='form-sschamp-double'>
                                <label className='form-label'>Etes-vous ?</label>
                                <select id="typeUser" name='typeUser' className='form-input'>
                                    <option value="Parent">Un parent ou élève adulte</option>
                                    <option value="Professeur">Un professeur</option>
                                </select>
                            </div>
                        </div>

                        <input className='form-submit' type='submit' value="S'inscrire" />
                    </form>
                </div>
            </div>
        </div>
    )

}



