import React from 'react';
import '../Style/Footer.css';
import {Button} from './Button';
import {Link} from 'react-router-dom';

function Footer() {
    return (
      <div className='footer-container'>
        <section className='footer-subscription'>
    
          <p className='footer-subscription-text'>
            Nous contacter
          </p>
          <div className='input-areas'>
            <form>
              <input
                className='footer-input'
                name='email'
                type='email'
                placeholder='Votre Email'
              />
              {/* <Button buttonStyle='btn--outline'>Envoyer</Button> */}
            </form>
          </div>
        </section>
        <div className='footer-links'>
          <div className='footer-link-wrapper'>
            <div className='footer-link-items'>
              <h4>Qui somme nous ?</h4>
              <Link to='/'>Notre Société</Link>
              <Link to='/'>Nos Projets</Link>
              <Link to='/'>Notre Vision</Link>
          
            </div>
            <div className='footer-link-items'>
              <h4>Contact</h4>
              <Link to='/'>Email: Contact@isseho.com</Link>
              <Link to='/'>Téléphone: 01 58 95 65 20</Link>
            </div>
            </div>
        </div>
        <section className='social-media'>
          <div className='social-media-wrap'>
            <div className='footer-logo'>
              <Link to='/' className='social-logo'>
                Isseho
              </Link>
            </div>
            <small className='website-rights'>ISSEHO © 2021</small>
            <div className='social-icons'>
              <Link
                className='social-icon-link facebook'
                to='/'
                target='_blank'
                aria-label='Facebook'
              >
                <i className='fab fa-facebook-f' />
              </Link>
              <Link
                className='social-icon-link instagram'
                to='/'
                target='_blank'
                aria-label='Instagram'
              >
                <i className='fab fa-instagram' />
              </Link>
              <Link
                className='social-icon-link youtube'
                to='/'
                target='_blank'
                aria-label='Youtube'
              >
                <i className='fab fa-youtube' />
              </Link>
              <Link
                className='social-icon-link twitter'
                to='/'
                target='_blank'
                aria-label='Twitter'
              >
                <i className='fab fa-twitter' />
              </Link>
              <Link
                className='social-icon-link twitter'
                to='/'
                target='_blank'
                aria-label='LinkedIn'
              >
                <i className='fab fa-linkedin' />
              </Link>
            </div>
          </div>
        </section>
      </div>
    );
  }
  
  export default Footer;