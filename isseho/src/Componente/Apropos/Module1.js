import React from 'react';
import '../../Style/AproposCss/Module1.css';


function Module1() {
    return (
      
    <div className='wrapper_elm1'>
        <div className='container_left_wp'>
            
            <h6 className='text_1'>Accompagnement Scolaire</h6>
            <h1 className='text_2'>Plateforme Solidaire de Partage des Compétences</h1>
            <div className='elem_1'></div>
            <p className='text_3'>Depuis plus d'un deux nous vivons un moment sans précédent.
               La cruse sanitaire que nous subissons avec les différentes
               de confinement qui ont réduit nos déplacements et le contact
               avec nos proches amis sans oublier les fermetures des lieux
               culturels.</p>

        </div >

        <div className='container_rigth_wp'>
            <div className='container_cards'>
               <div className='card_left'>
                   <img className='img_left' src={require('../../assets/cardleft.jpg')} ></img>
                   <h5 className='titre_card_l'>Plateforme ISSEHO</h5>
                   <p className='text_card_l'>Un espace de partage des savoirs et de connaissances mis à disposition de tous et qui pensent qu’il est nécessaire de rester solidaire face à la crise du COVID19.</p>
               </div>

               <div className='card_right'>
               <img className='img_left' src={require('../../assets/cardright.jpg')} ></img>
               <h5 className='titre_card_r'>Exclusive Support</h5>
                   <p className='text_card_r'>Les cours et ateliers proposés sont gratuits et aucune contrepartie financière n’est demandée aux utilisateurs-trices.</p>
            </div>
            </div>
        </div>
    </div>
      

      
    )
}

export default Module1;

