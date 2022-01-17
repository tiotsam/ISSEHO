import React from 'react';
import Cartedata from './Cartedata';
import '../Style/Carte.css'

function Carte() {

    return (
      <div className='cards'>
        <h1>Cours à venir</h1>
        <div className='cards__container'>
          <div className='cards__wrapper'>
            <ul className='cards__items'>
              <Cartedata
                src={require('../assets/inscription.jpg')}
                img={require('../assets/prof1.jpg')}
                titre='Mathématique'
                description='fesfsesf'
                label='Niveau 1 '
                path='/'
              />
              <Cartedata
                src={require('../assets/inscription.jpg')}
                img={require('../assets/prof1.jpg')}
                titre='France'
                description='fesfsesf'
                label='Niveau 2'
                path='/'
              />
            </ul>
            <ul className='cards__items'>
              <Cartedata
                src={require('../assets/inscription.jpg')}
                img={require('../assets/prof1.jpg')}
                titre='Histoire'
                description='fesfsesf'
                label='Niveau 3'
                path='/'
              />
             <Cartedata
                src={require('../assets/inscription.jpg')}
                img={require('../assets/prof1.jpg')}
                titre='echec'
                description='fesfsesf'
                label='Niveau 1'
                path='/'
              />
            
            </ul>
          </div>
        </div>
      </div>
    );
  }
  
  export default Carte;