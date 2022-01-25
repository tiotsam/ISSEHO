import React from 'react';
import '../Style/Footer.css';
import { Link } from 'react-router-dom';
import { IoLogoFacebook, IoLogoYoutube, IoLogoInstagram } from "react-icons/io5";

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
            <Link to='/'>Notre Vision</Link>

          </div>
          <div class='footer-link-items'>
            <h4>Contact</h4>
            <Link to='/'>Email: Contact@isseho.com</Link>
            <Link to='/'>Tél: 01 58 95 65 20</Link>
          </div>
        </div>
      </div>
      <div className='footer_elem'></div>
      <div className='container_footer-mediai'>
      </div>
       
      <section class='social-media'>
        <div class='social-media-wrap'>
          <div class='footer-logo'>
          </div>
          <small class='website-rights'>
          <IoLogoFacebook />
            <IoLogoYoutube />
            <IoLogoInstagram/>
          </small>
          <div class='social-icons'>
          </div>
        </div>
      </section>
    </div>
  );
}

export default Footer;