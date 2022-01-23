import React from 'react';
import '../../Style/Cours/HeaderCours.css'

function HeaderCours() {
  return (

  <div className='cours-container'>
     <img className='img_bg' src={require('../../assets/Headercours.jpg')} alt='Image' />
          <h1 className='text-white'> Des cours en illimité </h1>
        <p className='text-white-p'>Apprendre n'as jamais était aussi facile</p> 
  </div>
  
  )
}

export default HeaderCours;
