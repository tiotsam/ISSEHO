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

            </form>
          </div>
        </section>
        <div class='footer-links'>
          <div className='footer-link-wrapper'>
            <div class='footer-link-items'>
              <h4>Qui somme nous ?</h4>
              <Link to='/'>Notre Société</Link>
              <Link to='/'>Nos Projets</Link>
              <Link to='/'>Notre Vision</Link>
          
            </div>
            <div class='footer-link-items'>
              <h4>Contact</h4>
              <Link to='/'>Email: Contact@isseho.com</Link>
              <Link to='/'>Téléphone: 01 58 95 65 20</Link>
            </div>
            </div>
        </div>
        <section class='social-media'>
          <div class='social-media-wrap'>
            <div class='footer-logo'>
              <Link to='/' className='social-logo'>
                Isseho
              </Link>
            </div>
            <small class='website-rights'>ISSEHO © 2021</small>
            <div class='social-icons'>
              <Link
                class='social-icon-link facebook'
                to='/'
                target='_blank'
                aria-label='Facebook'
              >
                <i class='fab fa-facebook-f' />
              </Link>
              <Link
                class='social-icon-link instagram'
                to='/'
                target='_blank'
                aria-label='Instagram'
              >
                <i class='fab fa-instagram' />
              </Link>
              <Link
                class='social-icon-link youtube'
                to='/'
                target='_blank'
                aria-label='Youtube'
              >
                <i class='fab fa-youtube' />
              </Link>
              <Link
                class='social-icon-link twitter'
                to='/'
                target='_blank'
                aria-label='Twitter'
              >
                <i class='fab fa-twitter' />
              </Link>
              <Link
                class='social-icon-link twitter'
                to='/'
                target='_blank'
                aria-label='LinkedIn'
              >
                <i class='fab fa-linkedin' />
              </Link>
            </div>
          </div>
        </section>
      </div>
    );
  }
  
  export default Footer;