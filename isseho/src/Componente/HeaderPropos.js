import React from 'react';
import '../Style/HeaderPropos.css';


function HeaderPropos() {
    return (
        <div className='hero-container'>
          <img className='img_bg' src={require('../assets/propos.jpg')} alt='Image' />
          <h1 className='text-white'> Notre entreprise nos valeurs</h1>
        <p className='text-white'>Apprendre n'as jamais était aussi facile</p> 
      </div>
    )
}

export default HeaderPropos;
