import React, { useState } from 'react';
import { Button } from './Button';
import { Link } from 'react-router-dom';
import '../Style/Navbar.css'



function Navbar() {


    //Si tu as des fonction pour la navbar ajoute sa ici :p
    const [click, setClick] = useState(false);
    const [button, setButton] = useState(true);
  
    const handleClick = () => setClick(!click);
    const closeMobileMenu = () => setClick(false);
  
    const showButton = () => {
      if (window.innerWidth <= 960) { setButton(false);} 
      else {setButton(true);}
    };
  
  
    window.addEventListener('resize', showButton);
  
    return (
      <>
        <nav className='navbar'>
          <div className='navbar-container'>

            <Link to='/' className='navbar-logo' onClick={closeMobileMenu}>
              ISSEHO
            </Link>
            <div className='menu-icon' onClick={handleClick}>
              <i className={click ? 'fas fa-times' : 'fas fa-bars'} />
            </div>
            <ul className={click ? 'nav-menu active' : 'nav-menu'}>

              <li className='nav-item'>
                <Link to='/' className='nav-links' onClick={closeMobileMenu}>
                  Accueil
                </Link>
              </li>

              <li className='nav-item'>
                <Link to='/services'className='nav-links'onClick={closeMobileMenu} >
                  Cours
                </Link>
              </li>

              <li className='nav-item'>
                <Link to='/services'className='nav-links'onClick={closeMobileMenu} >
                  À propos
                </Link>
              </li>

              <li className='nav-item'>
                <Link
                  to='/products'className='nav-links'onClick={closeMobileMenu}>
                Inscription
                  </Link>
              </li>
  
              <li>

                <Link
                  to='/connexion'className='nav-links-mobile'onClick={closeMobileMenu}>
                  Connexion
                </Link>

              </li>
            </ul>
                {button && <Button buttonStyle='btn--outline'>SIGN UP</Button>}
          </div>
        </nav>
      </>
    );
  }

export default Navbar;
