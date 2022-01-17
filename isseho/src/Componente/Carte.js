import React from 'react';
import Cartedata from './Cartedata';
import '../Style/Carte.css'

function Carte() {

    return (
      <div className='cards'>
        <h1 className='titre_text'>Soutiens Scolaire</h1>
        <h5 className='soustitre_text'>PLATEFORME SOLIDAIRE DE PARTAGE DES COMPÉTENCES</h5>
        <div className='cards__container'>
          <div className='cards__wrapper'>
            <ul className='cards__items'>
              <Cartedata
                src={require('../assets/inscription.jpg')}
                img={require('../assets/prof1.jpg')}
                Nom='Frédéric Pi'
                information='Mardi 15 janvier 2022 - 16h'
                matière='Mathématique'
                path='/'
              />
              <Cartedata
                src={require('../assets/inscription.jpg')}
                img={require('../assets/prof2.jpeg')}
                Nom='Marine marechal'
                information='Mercredi 16 janvier 2022 - 14h'
                matière='Français'
                path='/'
              />
            </ul>
            <ul className='cards__items'>
              <Cartedata
                src={require('../assets/inscription.jpg')}
                img={require('../assets/prof3.jpg')}
                Nom='Albert Bibot'
                information='Jeudi 1 janvier 2022 - 15h'
                matière='Histoire'
                path='/'
              />
             <Cartedata
                src={require('../assets/inscription.jpg')}
                img={require('../assets/prof4.jpg')}
                Nom='Uguette Faris'
                information='Vendredi 18 janvier 2022 - 14h30'
                matière='Anglais'
                path='/'
              />
            </ul>
          </div>
        </div>
      </div>
    );
  }
  
  export default Carte;