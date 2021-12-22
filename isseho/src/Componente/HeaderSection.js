import React from 'react';
import '../Style/App.css'
import { Button } from './Button';
import '../Style/HeaderSection.css'





function HeaderSection() {
    return (
      <div className='hero-container'>
        {/* <video src='../assets/v1.mp4' alt='video' autoPlay loop muted type='video/mp4' /> */}
        <img src='https://images.pexels.com/photos/4145354/pexels-photo-4145354.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260' alt='img' /> 
        <h1>Partager votre savoir et vos connaissance!</h1>
        <p>Apprendre n'as jamais était aussi facile</p>
        <div className='hero-btns'>
          <Button
            className='btns'
            buttonStyle='btn--outline'
            buttonSize='btn--large'
          >
            Inscription
          </Button>
          <Button
            
            buttonStyle='btn--primary'
            buttonSize='btn--large'
            onClick="location.href = 'http://localhost:3000/cours'"
          >
            Voir les cours 
          </Button>
        </div>
      </div>
    );
  }

export default HeaderSection;

