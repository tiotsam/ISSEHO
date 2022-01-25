import React, { useState } from 'react';
import '../Style/FichePerso.css'

export default function FichePerso({nom,prenom,mail,adrs,dpt,ville,birthdate,role}) {
  const [error, seterror] = useState('');

  dpt = dpt.toString();

  if ( dpt.length == 1){
      dpt = '0'+dpt;
  }

  const updateUser = async (e)=>{
      e.preventDefault();
  }

  switch (role) {
    case 'ROLE_PARENT':
      role = 'Parent';
      break;
    case 'ROLE_ENFANT':
        role = 'Enfant';
        break;
    case 'ROLE_PROF':
      role = 'Professeur';
      break;
  }

    return (

    <div className='containerFicheUser'>
        <form onSubmit={updateUser}>
            <img src={require("../assets/ficheUser.png")}/>
            <span>{error}</span>
            <div className='form-champ-double'>
                <div className='form-sschamp-double'>
                    <label className='form-label'>Prénom :</label>
                    <input className='form-input' type='text' placeholder={prenom}></input>
                </div>
                <div className='form-sschamp-double'>
                    <label className='form-label'>Nom :</label>
                    <input className='form-input' type='text' placeholder={nom}></input>
                </div>
            </div>
            <div className='form-champ'>
                <label className='form-label'>Adress mail :</label>
                <input className='form-input' type='text' placeholder={mail}></input>
            </div>
            <div className='form-champ'>
                <label className='form-label'>Mot de passe :</label>
                <input className='form-input' type='text'></input>
            </div>
            <div className='form-champ'>
                <label className='form-label'>Confirmer votre mot de passe :</label>
                <input className='form-input' type='text'></input>
            </div>
            <div className='form-champ'>
                <label className='form-label'>Adresse :</label>
                <input className='form-input' type='text' placeholder={adrs}></input>
            </div>

            <div className='form-champ-double'>
                <div className='form-sschamp-double'>
                    <label className='form-label'>Département :</label>
                    <input className='form-input' type='text' placeholder={dpt}></input>
                </div>
                <div className='form-sschamp-double'>
                    <label className='form-label'>Ville :</label>
                    <input className='form-input' type='text' placeholder={ville}></input>
                </div>
            </div>
            <div className='form-champ-double'>
                <div className='form-sschamp-double'>
                    <label className='form-label'>Date de Naissance :</label>
                    <input className='form-input' type='text' placeholder={birthdate}></input>
                </div>
                <div className='form-sschamp-double'>
                    <label className='form-label'>Role :</label>

                    <select defaultValue={role} id="typeUser" name='typeUser' className='form-input'>
                        <option value="Parent">Un parent ou élève adulte</option>
                        <option value="Professeur">Un professeur</option>
                        <option value="Enfant">Un enfant</option>
                    </select>

                </div>
            </div>
            <div className='form-champ'>
                <input className='form-submit' type='submit' value='Mettre à jour'/>
            </div>
        </form>
    </div>)
}
