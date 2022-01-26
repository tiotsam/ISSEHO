import React from 'react';
import '../Style/Footer.css';
import { Link } from 'react-router-dom';
import { IoLogoFacebook, IoLogoYoutube, IoLogoInstagram } from "react-icons/io5";
import Popup from 'reactjs-popup';



function Footer() {
  return (


    <div className='footer-container'>
      <section className='footer-subscription'>
        <p className='footer-subscription-text'>
          NOUS CONTACTER
        </p>
        <Popup trigger={<button className='trigger_footer'> c'est ici </button>} position="top center">
          <div className='popup_footer'>
            <div className='wrapper_popup'>
            <div className='container_popup'>
              <h5 className='popup_H5'>Adress email</h5>
              <input className='input_area' placeholder='votre adress-email'></input>
              <h5 className='popup_H5'>Objet</h5>
              <input placeholder='votre sujet'></input>
              <h5 className='popup_H5'>Message</h5>
              <textarea className='area_popup'  placeholder='votre message' ></textarea>
              <button className='button_popup'>Envoyer</button>
              </div>
            </div>
          </div>
        </Popup>
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
            <IoLogoInstagram />
          </small>
          <div class='social-icons'>
          </div>
        </div>
      </section>
    </div>
  );
}

export default Footer;