import React from 'react';
import '../Style/Erreur404.css'

function Erreur404() {
  return (
  
  <div className='container_404'>
       <img className='error_img' src={require('../assets/error404.jpg')} alt='Image' />
  </div>
  )
}

export default Erreur404;
