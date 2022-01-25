import React from 'react';

export default function Mail({ auteur, destinataire , objet , contenu , dateEnvoi}) {
  return (
    <div>
        <div>{auteur}</div>
        <div>{destinataire}</div>
        <h4>{objet}</h4>
        <p>{contenu}</p>
        <div>{dateEnvoi}</div>
    </div>)
}
