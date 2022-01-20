import React from 'react';
import '../Style/Elempropos.css'
import Cartedata from './Cartedata';

function Elempropos() {
    return (
      
    <div className='container_propos'>
        <div className='container_left_text'>
            <h6 className='text_1'>Accompagnement Scolaire</h6>
            <h1 className='text_2'>Plateforme Solidaire de Partage des Compétences</h1>
            <div className='elem_1'></div>
            <p className='text_3'>Depuis plus d'un deux nous vivons un moment sans précédent.
               La cruse sanitaire que nous subissons avec les différentes
               de confinement qui ont réduit nos déplacements et le contact
               avec nos proches amis sans oublier les fermetures des lieux
               culturels.</p>
        </div >
        <div className='container_rigth_carte'>
            <div className='container_card_right'>
               <div className='card_left'>
                    <img className='cover_cards_left' src={require('../assets/propos.jpg')} ></img>
               </div>

               <div className='card_right'>
                   
               </div>
        
            </div>
        </div>
        
    </div>
      

      
    )
}

export default Elempropos;

