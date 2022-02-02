import React from 'react';
import '../Style/App.css'
import { Button } from './Button';
import '../Style/HeaderSection.css'
import { useNavigate } from 'react-router-dom';





function HeaderSection() {

  let navigation= useNavigate();

    return (
      <div className='hero-container'>
        {/* <video src='../assets/v1.mp4' alt='video' autoPlay loop muted type='video/mp4' /> */}
        <video className='videoHeader'  autoPlay muted playsInline={true} preaload="auto" type='mp4'  src={require('../assets/bghome.mp4')} alt='vidéo' /> 
        <h1 className='text-white'>Partager votre savoir et vos connaissance!</h1>
        <p className='text-white-p'>Apprendre n'as jamais était aussi facile</p>
        <div className='hero-btns'>

          
          <Button 
            buttonStyle='btn--primary'
            buttonSize='btn--large'
            onClick={() => navigation("/a-propos")}
          >
            Voir les cours 
          </Button>
          <Button
            className='btns'
            buttonStyle='btn--outline'
            buttonSize='btn--large'
            onClick={() => navigation("/inscription")}
          >
            Inscription
          </Button>
          
        </div>
      </div>
    );
  }

export default HeaderSection;

