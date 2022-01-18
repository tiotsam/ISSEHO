import React, { useState } from 'react';
import { NavLink } from 'react-router-dom';
import '../Style/Navbar.css'



function Navbar() {


    //Si tu as des fonction pour la navbar ajoute c'est ici :p
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

            <NavLink to='/' className='navbar-logo' onClick={closeMobileMenu}>
              ISSEHO
            </NavLink>
            <div className='menu-icon' onClick={handleClick}>
              <i className={click ? 'fas fa-times' : 'fas fa-bars'} />
            </div>
            <ul className={click ? 'nav-menu active' : 'nav-menu'}>

              <li className='nav-item'>
                <NavLink to='/'  className='nav-links' onClick={closeMobileMenu}>
                  Accueil
                </NavLink>
              </li>

              <li className='nav-item'>
                <NavLink to='/cours' className='nav-links'onClick={closeMobileMenu} >
                  Cours
                </NavLink>
              </li>

              <li className='nav-item'>
                <NavLink to='/a-propos'className='nav-links'onClick={closeMobileMenu} >
                  À propos
                </NavLink>
              </li>

              <li className='nav-item'>
                <NavLink
                  to='/inscription' className='nav-links' onClick={closeMobileMenu}>
                Inscription
                  </NavLink>
              </li>

              <li className='nav-item'>
                <NavLink
                  to='/login'className='nav-links'onClick={closeMobileMenu}>
                Connexion
                  </NavLink>
              </li>

            </ul>
                
          </div>
        </nav>
      </>
    );
  }

export default Navbar;
