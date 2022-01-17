import React from 'react';
import { Link } from 'react-router-dom';

function Cartedata(props) {
  return (
    <>
      <li className='cards__item'>
        <Link className='cards__item__link' to={props.path}>
          <figure className='cards__item__pic-wrap' data-category={props.label}>
            <img
              className='cards__item__img'
              alt='Background'
              src={props.src}
            />
          <img 
          className='cards_item_profil'
          alt='profile'
          src={props.img} />
          </figure>

          <div className='cards__item__info'>
            <h5 className='cards__item__text'>{props.titre}</h5>
            <h6 className='cards__item__description'>{props.description}</h6>
          </div>
        </Link>
      </li>
    </>
  );
}

export default Cartedata;