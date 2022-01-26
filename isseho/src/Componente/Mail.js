import React from 'react';
import '../Style/Mail.css'
export default function Mail({ auteur, destinataire , objet , contenu , dateEnvoi}) {
  
  console.log('auteur : ' + auteur);
  console.log('destinataire : ' + destinataire);
  console.log('objet : ' + objet);
  console.log('contenu : ' + contenu);
  console.log('date envoi : ' + dateEnvoi);
  
  return (
    <div className='mail'>
      Page de mail
        <div>{auteur}</div>
        <div>{destinataire}</div>
        <h4>{objet}</h4>
        <p>{contenu}</p>
        <div>{dateEnvoi}</div>
    </div>)
}
