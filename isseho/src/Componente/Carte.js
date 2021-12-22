import React from 'react';
import Cartedata from './Cartedata';
import '../Style/Carte.css'

function Carte() {

    return (
      <div className='cards'>
        <h1>Liste de Cours</h1>
        <div className='cards__container'>
          <div className='cards__wrapper'>
            <ul className='cards__items'>
              <Cartedata
                src=''
                text='Mathématique'
                label='Niveau 1 '
                path='/'
              />
              <Cartedata
                src=''
                text='France'
                label='Niveau 2'
                path='/'
              />
            </ul>
            <ul className='cards__items'>
              <Cartedata
                src=''
                text='Histoire'
                label='Niveau 3'
                path='/'
              />
              <Cartedata
                src=''
                text='echec'
                label='Niveau 1'
                path='/'
              />
              <Cartedata
                src=''
                text='Grammaire'
                label='Niveau 2'
                path='/'
              />
            </ul>
          </div>
        </div>
      </div>
    );
  }
  
  export default Carte;