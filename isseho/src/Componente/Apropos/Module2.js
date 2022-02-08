import React from 'react';
import '../../Style/AproposCss/Module2.css'

function Module2() {
  return (

  <div className='module2_wrapper'>

        <div className='text_block'>
          <h1>Espace de partage</h1>
          <h5>Savoirs & Connaissances</h5>
        </div>

      <div className='bulle_block'>
        <dvi className='bulle_ligne'>
          <img className='icon_fix' src={require('../../assets/chimi.jpg')}></img>
          <img className='icon_fix' src={require('../../assets/math.jpg')}></img>
        </dvi>
        <dvi className='bulle_ligne'>
          <img className='icon_fix' src={require('../../assets/histoire.png')}></img>
          <img className='icon_fix' src={require('../../assets/images.jpeg')}></img>
        </dvi>
      </div>
      <div className='container_text_m'></div>
      <div className='text_block_m'>
        <h1 className='text_1_m'>PLATEFORME SOLIDAIRE DE PARTAGE DES COMPÉTENCES</h1>
        <div className='elem_1_m'></div>
        <p className='text_2_m'>La plateforme ISSEHO se veut un espace de partage des savoirs et connaissances mis à disposition de tous les citoyens et citoyennes qui pensent qu’il est nécessaire de rester solidaire face à la crise du COVID19. </p>
      </div>
  </div>
  
  )
}

export default Module2;
