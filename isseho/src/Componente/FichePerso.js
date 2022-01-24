import React from 'react';

export default function FichePerso({nom,prenom,mail,adrs,dpt,ville,birthdate,role}) {
  return (
    <div className='containerFicheUser'>
        <form>
            <img/>
            <label>Nom :</label>
            <input type='text' placeholder={nom}></input>
            <label>Prénom :</label>
            <input type='text' placeholder={prenom}></input>
            <label>Adress mail :</label>
            <input type='text' placeholder={mail}></input>
            <label>Mot de passe :</label>
            <input type='text'></input>
            <label>Confirmer votre mot de passe :</label>
            <input type='text'></input>
            <label>Adresse :</label>
            <input type='text' placeholder={adrs}></input>
            <label>Département :</label>
            <input type='text' placeholder={dpt}></input>
            <label>Ville :</label>
            <input type='text' placeholder={ville}></input>
            <label>Date de Naissance :</label>
            <input type='text' placeholder={birthdate}></input>
            <label>Role :</label>
            <input placeholder={role}></input>
        </form>
    </div>)
}
