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
            <div className='top_popup_img'>

            </div>
            <div className='wrapper_popup'>
            <img className='top_popup_img' src={require("../assets/inscription.jpg")}/>
            <div className='container_popup'>
              <h5 className='popup_H5'>Adresse email</h5>
              <input className='input_popup' placeholder='votre adresse-email'></input>
              <h5 className='popup_H5'>Objet</h5>
              <input className='input_popup' placeholder='votre sujet'></input>
              <h5 className='popup_H5'>Message</h5>
              <textarea className='area_popup'  placeholder='votre message' ></textarea>
              <button className='button_popup'>Envoyer</button>
              </div>
            </div>
          </div>
        </Popup>
      </section>
      <div className='footer-links'>
        <div className='footer-link-wrapper'>
          <div className='footer-link-items'>
            <h4>Qui somme nous ?</h4>
            <Link to='/'>Notre Société</Link>
            <Link to='/'>Notre Vision</Link>

          </div>
          <div className='footer-link-items'>
            <h4>Contact</h4>
            <Link to='/'>Email: Contact@isseho.com</Link>
            <Link to='/'>Tél: 01 58 95 65 20</Link>
          </div>
        </div>
      </div>
      <div className='footer_elem'></div>
      <div className='container_footer-mediai'>
      </div>

      <section className='social-media'>
        <div className='social-media-wrap'>
          <div className='footer-logo'>
          </div>
          <small className='website-rights'>
            <IoLogoFacebook />
            <IoLogoYoutube />
            <IoLogoInstagram />
          </small>
          <div className='social-icons'>
          </div>
        </div>
      </section>
    </div>
  );
}

export default Footer;