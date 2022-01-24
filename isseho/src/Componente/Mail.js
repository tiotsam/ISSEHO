import React from 'react';

export default function Mail({ expediteur, destinataire , msg , dateMsg}) {
  return (
    <div>
        <div>{expediteur}</div>
        <div>{destinataire}</div>
        <p>{msg}</p>
        <div>{dateMsg}</div>
    </div>)
}
